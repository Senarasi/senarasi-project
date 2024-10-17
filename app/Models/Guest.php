<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'booking_id',
        'employee_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
