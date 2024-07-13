<?php

namespace App\Models;

use App\Models\DocumentCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $primaryKey = 'document_id';
    protected $fillable = [
        'document_category_id',
        'file_code',
        'title',
        'description',
        'file_document',
        'status',
        'slug'
    ];

    public function fileDocument()
    {
        return Storage::url($this->file_document);
    }

    public function documentCategory()
    {
        return $this->belongsTo(DocumentCategory::class, 'document_category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
