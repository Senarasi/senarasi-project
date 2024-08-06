<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetName extends Model
{
    use HasFactory;

    protected $table = 'budget_names';
    protected $primaryKey = 'budget_name_id';
    protected $fillable = ['name', 'employee_id', 'budget_code'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function yearlyBudgets()
    {
        return $this->hasMany(ProgramYearlyBudget::class, 'budget_name_id');
    }

    public function quarterlyBudgets()
    {
        return $this->hasMany(ProgramQuarterlyBudget::class, 'budget_name_id');
    }

    public function monthlyBudgets()
    {
        return $this->hasMany(ProgramMonthlyBudget::class, 'budget_name_id');
    }
}
