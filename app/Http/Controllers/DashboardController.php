<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\YearlyBudget;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardmain()
    {
        return view('dashboard.main');
    }

    public function dashboardbudget()
    {
        $budget = YearlyBudget::with('employee', 'program', 'quarterlyBudgets.monthlyBudgets')->get();
        $program = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id')->prepend('Select Program', '');
        $totalBudget = $budget->sum('yearly_budget');
        $totalRemainingBudget = $budget->sum('remaining_budget');
        $totalSpendingBudget = $totalBudget - $totalRemainingBudget;
        return view('dashboard.budget', compact('budget', 'program', 'totalBudget', 'totalRemainingBudget', 'totalSpendingBudget'));
    }
}
