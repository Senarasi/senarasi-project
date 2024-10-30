<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;
    protected $table = 'access';
    protected $primaryKey = 'access_id';
    protected $fillable = [
        'access_name',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_access', 'access_id', 'employee_id');
    }
}
