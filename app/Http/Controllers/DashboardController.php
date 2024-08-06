<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\ProgramYearlyBudget;
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
        $yearlybudget = ProgramYearlyBudget::with('employee', 'program', 'quarterlyBudgets.monthlyBudgets')->get();
        $program = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id');
        $totalBudget = $yearlybudget->sum('yearly_budget');
        $totalRemainingBudget = $yearlybudget->sum('remaining_budget');
        $totalSpendingBudget = $totalBudget - $totalRemainingBudget;
        return view('dashboard.budget', compact('yearlybudget', 'program', 'totalBudget', 'totalRemainingBudget', 'totalSpendingBudget',));
    }
}
