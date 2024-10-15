<?php

namespace App\Models;

use App\Models\DepartmentMonthlyBudget;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentYearlyBudget extends Model
{
    use HasFactory;

    protected $primaryKey = 'department_yearly_budget_id';

    protected $fillable = [
        'employee_id',
        'department_id',
        'budget_name',
        'year',
        'budget_code',
        'budget_yearly',
        'budget_monthly',
        'remaining_budget'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function user()
    {
        return $this->belongsTo(Employee::class);
    }

    public function departmentMonthlyBudgets()
    {
        return $this->hasMany(DepartmentMonthlyBudget::class, 'department_yearly_budget_id');
    }
}
