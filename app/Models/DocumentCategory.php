<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'document_category_id';
    protected $fillable = [
        'category',
        'title',
        'description',
        'slug'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class, 'document_category_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
