<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyBudget extends Model
{
    use HasFactory;
    protected $primaryKey = 'monthly_budget_id';
    protected $fillable = ['month', 'budget_amount', 'remaining_budget', 'quarterly_budget_id'];

    public function quarterlyBudget()
    {
        return $this->belongsTo(QuarterlyBudget::class, 'quarterly_budget_id');
    }
}
