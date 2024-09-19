<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\ProgramYearlyBudget;
use App\Models\Announcement;
use App\Models\AnnouncementCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardmain()
    {
        $announcements = Announcement::latest()->get();
        $categories = AnnouncementCategory::all();
        return view('dashboard.main', compact('announcements', 'categories'));
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
