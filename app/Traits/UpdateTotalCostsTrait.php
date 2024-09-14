<?php

namespace App\Traits;

use App\Models\Location;
use App\Models\Operational;
use App\Models\Performer;
use App\Models\ProductionCrew;
use App\Models\ProductionTool;
use App\Models\TotalCost;

trait UpdateTotalCostsTrait
{
    protected function updateTotalCosts($requestBudgetId)
    {
        $totalCost = TotalCost::firstOrNew(['request_budget_id' => $requestBudgetId]);

        $totalCost->total_locations_cost = Location::where('request_budget_id', $requestBudgetId)->sum('total_cost');
        $totalCost->total_operationals_cost = Operational::where('request_budget_id', $requestBudgetId)->sum('total_cost');
        $totalCost->total_performers_cost = Performer::where('request_budget_id', $requestBudgetId)->sum('total_cost');
        $totalCost->total_production_crews_cost = ProductionCrew::where('request_budget_id', $requestBudgetId)->sum('total_cost');
        $totalCost->total_production_tools_cost = ProductionTool::where('request_budget_id', $requestBudgetId)->sum('total_cost');

        $totalCost->save();
    }
}
