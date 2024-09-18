<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Externalguest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
