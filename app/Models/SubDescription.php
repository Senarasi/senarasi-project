<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDescription extends Model
{
    use HasFactory;
    protected $primaryKey = 'sub_description_id';

    protected $fillable = [
        'sub_description_name',
    ];

    public function performer()
    {
        return $this->hasMany(Performer::class);
    }
}
