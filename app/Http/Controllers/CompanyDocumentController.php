<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\DocumentCategory;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DocumentCategoryRequest;

class CompanyDocumentController extends Controller
{
    public function index()
    {
        $docCategories = DocumentCategory::all();

        return view('company_document.index', compact('docCategories') );
    }

    // public function dashboard()
    // {
    //     $docCategories = DocumentCategory::all();

    //     return view('company_document.index', compact('docCategories'));
    // }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = str()->slug($data['category']);

        DocumentCategory::create($data);

        return redirect()->route('company-document.index')->with('status', 'Category created successfully !');
    }



    public function destroy(DocumentCategory $docCategory)
    {
        $docCategory->delete();
        return redirect()->route('company-document.index')->with('status', 'Category has been successfully deleted!');
    }



}
