<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    use HasFactory;
    protected $primaryKey = 'room_id';
    protected $fillable = [
        'room_name',
        'capacity',
        'description',
    ];

    public function booking()
    {
        return $this->hasMany(MeetingBooking::class, 'booking_id');
    }
}
