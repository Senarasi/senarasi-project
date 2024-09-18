<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleToken extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'employee_id',
        'access_token',
        'refresh_token'
    ];

    public function user()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
