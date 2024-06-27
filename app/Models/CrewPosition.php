<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewPosition extends Model
{
    use HasFactory;
    protected $primaryKey = 'crew_position_id';
    protected $fillable = [
        'crew_position_name',
    ];
}
