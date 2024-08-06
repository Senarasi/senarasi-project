<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ProgramYearlyBudget;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getProgramData/{program_id}', function ($program_id) {
    $yearlyBudgets = ProgramYearlyBudget::where('program_id', $program_id)->get();

    if ($yearlyBudgets->isEmpty()) {
        return response()->json(['error' => 'Program not found or no data available'], 404);
    }

    // Format the data for the pie chart
    $data = $yearlyBudgets->map(function($yearlyBudget) {
        return [
            'budget_code' => $yearlyBudget->budget_code,
            'remaining_budget' => (float) $yearlyBudget->remaining_budget,
            'yearly_budget' => (float) $yearlyBudget->yearly_budget,
        ];
    });

    return response()->json($data);
});
