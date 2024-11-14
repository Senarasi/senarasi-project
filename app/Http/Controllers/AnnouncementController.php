<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use App\Models\AnnouncementAttachment;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::latest()->get();
        $categories = AnnouncementCategory::all();
        return view('admin.hc.announcement.index', compact('announcements', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $categories = AnnouncementCategory::all();
    //     return view('announcement.create', compact('categories'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementRequest $request)
    {
        $data = $request->validated();

        $data['employee_id'] = auth()->id();

        $announcement = Announcement::create($data);

        // Cek apakah ada file attachment yang diunggah
        if ($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $folder = 'uploads/fileannounce';
                $filenameToStore = $filename . '.' . $extension;

                // Pastikan filename unik
                $counter = 1;
                while (Storage::exists($folder . '/' . $filenameToStore)) {
                    $filenameToStore = $filename . ' (' . $counter . ').' . $extension;
                    $counter++;
                }

                // Simpan file ke folder penyimpanan
                $attachmentPath = $file->storeAs($folder, $filenameToStore);

                // Buat entri Attachment terkait dengan Announcement
                AnnouncementAttachment::create([
                    'announcement_id' => $announcement->id,
                    'file_path' => $attachmentPath,
                ]);
            }
        }

        return redirect()->route('announcement.index')->with('status', 'Announcement has been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function detail(Announcement $announcement)
    {
        $categories = AnnouncementCategory::all();
        return view('admin.hc.announcement.detail', compact('announcement', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Announcement $announcement)
    // {
    //     $categories = AnnouncementCategory::all();
    //     return view('announcement.edit', compact('announcement','categories'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        // if ($request->hasFile('attachment')) {

        //     if ($announcement->attachment && Storage::exists($announcement->attachment)) {
        //         Storage::delete($announcement->attachment);
        //     }

        //     $file = $request->file('attachment');
        //     $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        //     $extension = $file->getClientOriginalExtension();
        //     $folder = 'uploads/fileannounce';
        //     $filenameToStore = $filename . '.' . $extension;

        //     $counter = 1;
        //     while (Storage::exists($folder . '/' . $filenameToStore)) {
        //         $filenameToStore = $filename . ' (' . $counter . ').' . $extension;
        //         $counter++;
        //     }

        //     // Simpan file baru dengan nama yang unik
        //     $attachment = $file->storeAs($folder, $filenameToStore);
        //     $data['attachment'] = $attachment;
        // }

        $announcement->update($data);


        // Cek apakah ada file attachment baru yang diunggah
        if ($request->hasFile('attachment')) {
            // Menghapus file attachment lama jika diperlukan
            // Ini opsional, Anda bisa menghapus atau mempertahankan file lama sesuai kebutuhan Anda
            foreach ($announcement->attachments as $oldAttachment) {
                // Hapus file dari penyimpanan
                Storage::delete($oldAttachment->file_path);

                // Hapus record dari database
                $oldAttachment->delete();
            }

            // Simpan file attachment baru
            foreach ($request->file('attachment') as $file) {
                $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $folder = 'uploads/fileannounce';
                $filenameToStore = $filename . '.' . $extension;

                // Pastikan nama file unik
                $counter = 1;
                while (Storage::exists($folder . '/' . $filenameToStore)) {
                    $filenameToStore = $filename . ' (' . $counter . ').' . $extension;
                    $counter++;
                }

                // Simpan file di penyimpanan
                $attachmentPath = $file->storeAs($folder, $filenameToStore);

                // Buat entri baru di tabel `AnnouncementAttachment`
                AnnouncementAttachment::create([
                    'announcement_id' => $announcement->id,
                    'file_path' => $attachmentPath,
                ]);
            }
        }

        return redirect()->route('announcement.detail', ['announcement' => $announcement->id])->with('status', 'Announcement has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        // Cek apakah attachment tidak null atau kosong
        if ($announcement->attachment && Storage::exists($announcement->attachment)) {
            // Hapus attachment dari storage
            Storage::delete($announcement->attachment);
        }
        $announcement->delete();
        return redirect()->route('announcement.index')->with('status', 'Announcement has been successfully deleted!');
    }
}
