<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingExternalGuest extends Model
{
    use HasFactory;
    protected $primaryKey = 'external_guest_id';
    protected $fillable = [
        'external_guest_id',
        'booking_id',
        'email'
    ];

    public function booking()
    {
        return $this->belongsTo(MeetingBooking::class, 'booking_id');
    }
}
