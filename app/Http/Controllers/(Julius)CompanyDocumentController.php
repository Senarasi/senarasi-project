<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests\DocumentCategoryRequest;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CompanyDocumentController extends Controller
{
    public function index()
    {
        $docCategories = DocumentCategory::all();

        return view('company_document.index', compact('docCategories'));
    }

    public function store(DocumentCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = str()->slug($data['category']);

        DocumentCategory::create($data);

        return redirect()->route('company-document.index')->with('status', 'Category created successfully !');
    }

    public function detail(DocumentCategory $docCategory)
    {

        return view('company_document.list', compact('docCategory'));
    }

    public function storeUpload(DocumentRequest $request, DocumentCategory $docCategory)
    {
        $data = $request->validated();
        $data['slug'] = str()->slug($data['title']);
        $data['status'] = $request->has('enable_download') ? 'downloadable' : 'not_downloadable';
        $file_document = $request->file('file_document')->store('uploads/document');
        $data['file_document'] = $file_document;

        Document::create($data);

        return redirect()->route('company-document.detail', $docCategory->slug)->with('status', 'Document uploaded successfully!');
    }

    public function view(DocumentCategory $docCategory, Document $doc)
    {

        return view('company_document.view', compact('docCategory', 'doc'));
    }

    public function destroy(DocumentCategory $docCategory)
    {
        $docCategory->delete();
        return redirect()->route('company-document.index')->with('status', 'Category has been successfully deleted!');
    }

    public function destroyFile(DocumentCategory $docCategory, Document $doc)
    {
        // Menghapus file dari penyimpanan
        Storage::delete($doc->file_document);

        // Menghapus record SOP dari database
        $doc->delete();

        return redirect()->route('company-document.detail', $docCategory->slug)->with('status', 'File Doucment has been successfully deleted!');
    }
}
