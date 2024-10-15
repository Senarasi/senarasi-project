<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentMonthlyBudget extends Model
{
    use HasFactory;
    protected $primaryKey = 'department_monthly_budget_id';

    protected $fillable = [

        'department_yearly_budget_id',
        'budget_code',
        'month',
        'budget_monthly',
        'remaining_budget'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function user()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function departmentYearlyBudget()
    {
        return $this->belongsTo(DepartmentYearlyBudget::class, 'department_yearly_budget_id');
    }

    public function departmentRequestPayments()
    {
        return $this->hasMany(DepartmentRequestPayment::class, 'department_monthly_budget_id');
    }
}
