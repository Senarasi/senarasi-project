<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeStatus extends Model
{
    use HasFactory;
    protected $primaryKey = 'employee_status_id';
    protected $fillable = [
        'status_name',
    ];

    public function employeeStatus()
    {
        return $this->hasMany(Employee::class, 'employee_status_id');
    }
}
