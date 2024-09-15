<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentCategory;
use App\Models\SupportingDocument;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(DocumentCategory $docCategory)
    {

        return view('company_document.list', compact('docCategory'));
    }

    public function create(DocumentCategory $docCategory)
    {

        return view('company_document.create', compact('docCategory'));
    }

    public function store(DocumentRequest $request, DocumentCategory $docCategory)
    {
        $data = $request->validated();
        $data['slug'] = str()->slug($data['title']);
        $data['status'] = $request->has('enable_download') ? 'downloadable' : 'not_downloadable';
        $file_document = $request->file('file_document')->store('uploads/document');
        $data['file_document'] = $file_document;

        $document = Document::create($data);

        // Cek apakah ada dokumen pendukung
        if ($request->has('file_name') && $request->has('file_supporting_doc')) {
            foreach ($request->file('file_supporting_doc') as $index => $file) {
                $file_path = $file->store('uploads/supporting_documents');

                SupportingDocument::create([
                    'document_id' => $document->id,
                    'file_name' => $request->file_name[$index],
                    'file_supporting_doc' => $file_path,
                    'supporting_doc_slug' => str()->slug($request->file_name[$index]),
                    'supporting_doc_status' => isset($request->supporting_doc_status[$index]) ? 'downloadable' : 'not_downloadable',
                ]);
            }
        }

        return redirect()->route('company-document.detail', $docCategory->slug)->with('status', 'Document uploaded successfully!');
    }


    public function view(DocumentCategory $docCategory, Document $doc)
    {

        return view('company_document.view', compact('docCategory', 'doc'));
    }

    public function edit(DocumentCategory $docCategory, Document $doc)
    {

        return view('company_document.edit', compact('docCategory', 'doc'));
    }


    public function update(DocumentRequest $request, DocumentCategory $docCategory, Document $doc)
    {
        // Validasi dan persiapkan data untuk dokumen utama
        $data = $request->validated();
        $data['slug'] = str()->slug($data['title']);
        $data['status'] = $request->has('enable_download') ? 'downloadable' : 'not_downloadable';

        // Jika ada file dokumen utama yang diupload
        if ($request->hasFile('file_document')) {
            // Hapus file lama jika ada
            if ($doc->file_document) {
                Storage::delete($doc->file_document);
            }
            // Simpan file baru
            $file_document = $request->file('file_document')->store('uploads/document');
            $data['file_document'] = $file_document;
        }

        // Update data dokumen utama
        $doc->update($data);

        // Ambil dokumen pendukung yang sudah ada
        $existingSupportingDocs = $doc->supportingDocuments->keyBy('id');
        $requestSupportingDocs = $request->input('file_name', []);
        $requestSupportingDocIds = $request->input('supporting_doc_id', []);

        // Array untuk menyimpan ID file pendukung yang ada dalam permintaan
        $processedSupportingDocIds = [];

        // Update atau buat dokumen pendukung
        foreach ($requestSupportingDocs as $index => $fileName) {
            // Simpan path file dokumen pendukung jika diupload
            $fileSupportingDocPath = $request->hasFile("file_supporting_doc.{$index}")
                ? $request->file("file_supporting_doc.{$index}")->store('uploads/supporting_documents')
                : null;

            $supportingDocId = $requestSupportingDocIds[$index] ?? null;

            if ($supportingDocId && isset($existingSupportingDocs[$supportingDocId])) {
                // Update dokumen pendukung yang sudah ada
                $supportingDocument = $existingSupportingDocs[$supportingDocId];
                $supportingDocumentData = [
                    'file_name' => $fileName,
                    'supporting_doc_slug' => str()->slug($fileName),
                    'supporting_doc_status' => $request->has("supporting_doc_status.{$index}") ? 'downloadable' : 'not_downloadable',
                ];
                if ($fileSupportingDocPath) {
                    $supportingDocumentData['file_supporting_doc'] = $fileSupportingDocPath;
                } else {
                    // Pastikan tidak mengubah nilai file_supporting_doc jika tidak ada file baru yang diunggah
                    unset($supportingDocumentData['file_supporting_doc']);
                }
                $supportingDocument->update($supportingDocumentData);
            } else {
                // Buat dokumen pendukung baru jika fileSupportingDocPath tidak null
                if ($fileSupportingDocPath) {
                    SupportingDocument::create([
                        'document_id' => $doc->id,
                        'file_name' => $fileName,
                        'file_supporting_doc' => $fileSupportingDocPath,
                        'supporting_doc_slug' => str()->slug($fileName),
                        'supporting_doc_status' => $request->has("supporting_doc_status.{$index}") ? 'downloadable' : 'not_downloadable',
                    ]);
                }
            }

            $processedSupportingDocIds[] = $supportingDocId;
        }

        // Hapus dokumen pendukung yang tidak ada dalam permintaan
        foreach ($existingSupportingDocs as $supportingDocId => $supportingDocument) {
            if (!in_array($supportingDocId, $processedSupportingDocIds)) {
                if ($supportingDocument->file_supporting_doc) {
                    Storage::delete($supportingDocument->file_supporting_doc);
                }
                $supportingDocument->delete();
            }
        }

        return redirect()->route('company-document.detail', $docCategory->slug)->with('status', 'Document updated successfully!');
    }



    public function destroy(DocumentCategory $docCategory, Document $doc)
    {
        // Menghapus file dari penyimpanan
        Storage::delete($doc->file_document);

        // Menghapus record SOP dari database
        $doc->delete();

        return redirect()->route('company-document.detail', $docCategory->slug)->with('status', 'File Doucment has been successfully deleted!');
    }

    public function SupportingView(DocumentCategory $docCategory, Document $doc, SupportingDocument $supportingDoc)
    {

        return view('company_document.view_supporting_doc', compact('docCategory', 'doc',  'supportingDoc' ));
    }



}
