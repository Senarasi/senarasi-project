<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Program;
use App\Models\MonthlyBudget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class RequestBudgetController extends Controller
{
    public function index(Request $request)
    {
        return view('requestbudget.index');
    }

    public function create()
    {
        $employee = Employee::orderBy('full_name', 'asc')->pluck('full_name', 'employee_id');
        $manager = Employee::where('role', 'manager')->get();
        $program = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id');
        return view('requestbudget.create', compact('employee', 'manager', 'program'));
    }

    public function getMonthlyBudget(Request $request)
    {
        $programId = $request->query('program_id');
        $month = $request->query('month');

        $budget = MonthlyBudget::where('program_id', $programId)
            ->where('month', $month)
            ->first();

        if ($budget) {
            return response()->json([
                'budget_code' => $budget->budget_code,
                'monthly_budget' => $budget->remaining_budget
            ]);
        } else {
            return response()->json([
                'budget_code' => '',
                'monthly_budget' => ''
            ]);
        }
    }

}
