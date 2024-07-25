<?php

namespace App\Models;

use App\Models\MeetingRoom;
use App\Models\Employee;
use App\Models\MeetingInternalGuest;
use App\Models\MeetingExternalGuest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingBooking extends Model
{
    use HasFactory;
    protected $primaryKey = 'booking_id';
    protected $fillable = [
        'employee_id',
        'room_id',
        'title',
        'description',
        'phone',
        'start_time',
        'end_time',
        'booking_number',
        'confirmation_sent',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function room()
    {
        return $this->belongsTo(MeetingRoom::class, 'room_id');
    }

    public function externalGuest()
    {
        return $this->hasMany(MeetingExternalGuest::class, 'booking_id');
    }

    public function internalGuest()
    {
        return $this->hasMany(MeetingInternalGuest::class, 'booking_id');
    }
}
