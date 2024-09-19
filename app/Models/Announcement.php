<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'employee_id',
        'announcement_category_id',
        'title',
        'content',
        'attachment',
    ];

    public function user()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function announcementCategory()
    {
        return $this->belongsTo(AnnouncementCategory::class);
    }

    public function attachment()
    {
        return Storage::url($this->attachment);
    }
}
