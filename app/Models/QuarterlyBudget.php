<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuarterlyBudget extends Model
{
    use HasFactory;
    protected $primaryKey = 'quarterly_budget_id';
    protected $fillable = ['quarter', 'budget_amount', 'remaining_budget', 'yearly_budget_id'];

    public function yearlyBudget()
    {
        return $this->belongsTo(YearlyBudget::class, 'yearly_budget_id');
    }

    public function monthlyBudgets()
    {
        return $this->hasMany(MonthlyBudget::class, 'quarterly_budget_id');
    }
}
