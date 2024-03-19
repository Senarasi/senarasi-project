<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $primaryKey = 'position_id';
    protected $fillable = ['position_name', 'department_id'];
    use HasFactory;

    public function employee(){
        return $this->hasMany(Employee::class, 'department_id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }
}
