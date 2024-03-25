<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyBudget extends Model
{
    use HasFactory;
    protected $table = 'yearly_budgets';
    protected $primaryKey = 'yearly_budget_id';
    protected $fillable = ['year', 'budget_amount', 'remaining_budget', 'budget_name_id'];

    public function budgetName()
    {
        return $this->belongsTo(BudgetName::class, 'budget_name_id');
    }

    public function quarterlyBudgets()
    {
        return $this->hasMany(QuarterlyBudget::class, 'yearly_budget_id');
    }
}
