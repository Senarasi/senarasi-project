<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportingDocument extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function fileSupportingDoc()
    {
        return Storage::url($this->file_supporting_doc);
    }

    public function getRouteKeyName()
    {
        return 'supporting_doc_slug';
    }
}
