<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementAttachment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }

    public function filePath()
    {
        return Storage::url($this->file_path);
    }
}
