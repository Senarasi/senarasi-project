<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformerList extends Model
{
    use HasFactory;
    protected $primaryKey = 'performer_id';
    protected $fillable = [
        'performer_name',
        'price',
    ];
}
