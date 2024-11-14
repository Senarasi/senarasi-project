<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function announcementCategory()
    {
        return $this->belongsTo(AnnouncementCategory::class);
    }

    public function attachments()
    {
        return $this->hasMany(AnnouncementAttachment::class);
    }
}
