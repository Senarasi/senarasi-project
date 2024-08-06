<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_budget_id', 'total_locations_cost', 'total_operationals_cost',
        'total_performers_cost', 'total_production_crews_cost', 'total_production_tools_cost'
    ];

    public function requestBudget()
    {
        return $this->belongsTo(RequestBudget::class, 'request_budget_id');
    }
}
