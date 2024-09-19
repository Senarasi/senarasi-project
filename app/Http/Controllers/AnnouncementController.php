<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnouncementRequest;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $categories = AnnouncementCategory::all();
        return view('announcement.create', compact('categories'));
    }

    public function store(AnnouncementRequest $request)
    {
        $data = $request->validated();

        $data['employee_id'] = auth()->id();

        if ($request->hasFile('attachment')) {
         $file = $request->file('attachment');

         $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

         $extension = $file->getClientOriginalExtension();

         $folder = 'uploads/fileannounce';

         $filenameToStore = $filename . '.' . $extension;

         $counter = 1;
         while (Storage::exists($folder . '/' . $filenameToStore)) {
             $filenameToStore = $filename . ' (' . $counter . ').' . $extension;
             $counter++;
         }

         $attachment = $file->storeAs($folder, $filenameToStore);
         $data['attachment'] = $attachment;
        }

        Announcement::create($data);

        return redirect()->route('dashboard.main')->with('status', 'Announcement has been successfully created!');
    }

    public function show(Announcement $announcement)
    {
        //
    }

    public function edit(Announcement $announcement)
    {
        $categories = AnnouncementCategory::all();
        return view('announcement.edit', compact('announcement','categories'));
    }

    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        if ($request->hasFile('attachment')) {

            if ($announcement->attachment && Storage::exists($announcement->attachment)) {
                Storage::delete($announcement->attachment);
            }

            $file = $request->file('attachment');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $folder = 'uploads/fileannounce';
            $filenameToStore = $filename . '.' . $extension;

            $counter = 1;
            while (Storage::exists($folder . '/' . $filenameToStore)) {
                $filenameToStore = $filename . ' (' . $counter . ').' . $extension;
                $counter++;
            }

            // Simpan file baru dengan nama yang unik
            $attachment = $file->storeAs($folder, $filenameToStore);
            $data['attachment'] = $attachment;
        }

        $announcement->update($data);
        return redirect()->route('dashboard.main')->with('status', 'Announcement has been successfully updated!');
    }

    public function destroy(Announcement $announcement)
    {
       // Cek apakah attachment tidak null atau kosong
        if ($announcement->attachment && Storage::exists($announcement->attachment)) {
            // Hapus attachment dari storage
            Storage::delete($announcement->attachment);
        }
        $announcement->delete();
        return redirect()->route('dashboard.main')->with('status', 'Announcement has been successfully deleted!');
    }
}
