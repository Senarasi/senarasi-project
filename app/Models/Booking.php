<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Guest;
use App\Models\Externalguest;
use App\Models\HybridMeeting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'employee_id',
        'room_id',
        'desc',
        'start',
        'end',
        'br_number',
        'confirmation_sent',
        'google_event_id',
    ];

    public function user()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }


    public function externalGuests()
    {
        return $this->hasMany(Externalguest::class);
    }

    public function hybrid()
    {
        return $this->hasOne(HybridMeeting::class);
    }

    public function isBookingDatePassed()
    {
        // Ganti 'start' dengan nama kolom tanggal mulai booking di tabel Anda
        return Carbon::now()->greaterThan($this->start);
    }

}
