<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramQuarterlyBudget extends Model
{
    use HasFactory;
    protected $table = 'program_quarterly_budgets';
    protected $primaryKey = 'quarterly_budget_id';

    protected $fillable = [
        'yearly_budget_id',
        'employee_id',
        'program_id',
        'budget_code',
        'quarter',
        'quarter_budget',
        'remaining_budget',
    ];

    public function yearlyBudget()
    {
        return $this->belongsTo(ProgramYearlyBudget::class, 'yearly_budget_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function monthlyBudgets()
    {
        return $this->hasMany(ProgramMonthlyBudget::class, 'quarterly_budget_id');
    }
}
