<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingInternalGuest extends Model
{
    use HasFactory;
    protected $primaryKey = 'internal_guest_id';
    protected $fillable = [
        'booking_id',
        'employee_id'
    ];

    public function booking()
    {
        return $this->belongsTo(MeetingBooking::class, 'booking_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
