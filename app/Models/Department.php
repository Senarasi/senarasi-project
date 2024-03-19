<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';
    protected $fillable = ['department_name'];
    use HasFactory;

    public function employee(){
        return $this->hasMany(Employee::class, 'department_id');
    }

    public function position(){
        return $this->hasMany(Position::class, 'department_id');
    }
}
