<?php

namespace App\Http\Controllers\Budget;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\BudgetName;
use App\Models\Program;
use App\Models\ProgramYearlyBudget;
use App\Models\ProgramQuarterlyBudget;
use App\Models\ProgramMonthlyBudget;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;

class BudgetProgramController extends Controller
{
    public function index(Request $request)
    {
        // // Retrieve all budgets from the database with associated employee
        // $budget = BudgetName::with(['employee', 'yearlyBudgets', 'yearlyBudgets.quarterlyBudgets', 'yearlyBudgets.quarterlyBudgets.monthlyBudgets'])->when($request->cari, function ($query) use ($request) {
        //     $query->where('name', 'like', "%{$request->cari}%");
        // })->orderBy('budget_name_id', 'asc')->paginate(15);
        // $total_budget = $budget->count();
        // // Pass the retrieved budgets to the view
        // return view('budget.index', compact('budget', 'total_budget'));
        // $budget = ProgramYearlyBudget::with('employee', 'program', 'quarterlyBudgets.monthlyBudgets')->get();
        $budget = ProgramYearlyBudget::with(['employee', 'program', 'quarterlyBudgets.monthlyBudgets'])->when($request->cari, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->cari}%");
        })->orderBy('yearly_budget_id', 'asc')->paginate(15);
        $totalBudget = $budget->sum('yearly_budget');
        $totalRemainingBudget = $budget->sum('remaining_budget');
        $totalSpendingBudget = $totalBudget - $totalRemainingBudget;
        $employee = Employee::orderBy('full_name', 'asc')->pluck('full_name', 'employee_id');
        $program = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id');
        return view('budget.program', compact('budget', 'program', 'employee', 'totalBudget', 'totalRemainingBudget', 'totalSpendingBudget'));
    }

    public function create()
    {
        // $program = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id')->prepend('Select Program', '');
        // $employee = Employee::orderBy('full_name', 'asc')->pluck('full_name', 'employee_id')->prepend('Select Employee', '');
        // return view('budget.create2', compact('program', 'employee'));
    }

    public function store(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'program_id' => 'required|exists:programs,program_id',
            'budget_code' => 'required|unique:program_quarterly_budgets,budget_code',
            'raw_budget' => 'required|numeric',
            'quarter' => 'required|in:1,2,3,4',
        ]);

        // Find or create the yearly budget
        $yearlyBudget = ProgramYearlyBudget::firstOrCreate(
            [
                'employee_id' => $request->employee_id,
                'program_id' => $request->program_id,
                'year' => $currentYear,
            ],
            [
                'budget_code' => $request->budget_code, // Assuming yearly budget code can be same as the quarterly for simplification
                'yearly_budget' => 0,
                'remaining_budget' => 0,
            ]
        );

        // Update the yearly budget totals
        $yearlyBudget->yearly_budget += $request->raw_budget;
        $yearlyBudget->remaining_budget += $request->raw_budget;
        $yearlyBudget->save();

        $quarterlyBudget = ProgramQuarterlyBudget::create([
            'yearly_budget_id' => $yearlyBudget->yearly_budget_id,
            'employee_id' => $request->employee_id,
            'program_id' => $request->program_id,
            'budget_code' => $request->budget_code,
            'quarter' => $request->quarter,
            'quarter_budget' => $request->raw_budget,
            'remaining_budget' => $request->raw_budget,
        ]);

        $monthlyBudgetAmount = $request->raw_budget / 3;

        for ($month = 1; $month <= 3; $month++) {
            ProgramMonthlyBudget::create([
                'quarterly_budget_id' => $quarterlyBudget->quarterly_budget_id,
                'employee_id' => $request->employee_id,
                'program_id' => $request->program_id,
                'budget_code' => $request->budget_code . '-' . $month, // Assuming monthly budget code derived from quarterly code
                'month' => ($request->quarter - 1) * 3 + $month,
                'monthly_budget' => $monthlyBudgetAmount,
                'remaining_budget' => $monthlyBudgetAmount,
            ]);
        }

        return redirect()->route('budget.index')->with('success', 'Quarterly Budget created successfully.');
        return response()->json([
            'message' => 'Data stored successfully!',
        ]);
    }

    public function edit($id)
    {
        // Retrieve the budget record by its ID
        $budget = BudgetName::findOrFail($id);

        // Retrieve all employees for the dropdown menu
        $program = Program::pluck('program_name', 'program_id')->prepend('Select Program', '');

        // Pass the retrieved data to the edit view
        return view('budget.edit', compact('budget', 'program'));
    }

    public function update(Request $request, $quarterly_budget_id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'program_id' => 'required|exists:programs,program_id',
            'budget_code' => 'required|unique:program_quarterly_budgets,budget_code,' . $quarterly_budget_id . ',quarterly_budget_id',
            'raw_budget' => 'required|numeric',
            'quarter' => 'required|in:1,2,3,4',
        ]);

        // Find the existing QuarterlyBudget by ID
        $quarterlyBudget = ProgramQuarterlyBudget::findOrFail($quarterly_budget_id);

        // Find the associated YearlyBudget
        $yearlyBudget = $quarterlyBudget->yearlyBudget;

        // Calculate the difference in budget
        $budgetDifference = $request->raw_budget - $quarterlyBudget->quarter_budget;

        // Update the yearly budget totals
        $yearlyBudget->yearly_budget += $budgetDifference;
        $yearlyBudget->remaining_budget += $budgetDifference;
        $yearlyBudget->save();

        // Update the quarterly budget
        $quarterlyBudget->update([
            'employee_id' => $request->employee_id,
            'program_id' => $request->program_id,
            'budget_code' => $request->budget_code,
            'quarter' => $request->quarter,
            'quarter_budget' => $request->raw_budget,
            'remaining_budget' => $request->raw_budget,
        ]);

        // Calculate the new monthly budget amount
        $monthlyBudgetAmount = $request->raw_budget / 3;

        // Update the monthly budgets
        foreach ($quarterlyBudget->monthlyBudgets as $index => $monthlyBudget) {
            $monthlyBudget->update([
                'employee_id' => $request->employee_id,
                'program_id' => $request->program_id,
                'budget_code' => $request->budget_code . '-' . ($index + 1), // Assuming monthly budget code derived from quarterly code
                'month' => ($request->quarter - 1) * 3 + ($index + 1),
                'monthly_budget' => $monthlyBudgetAmount,
                'remaining_budget' => $monthlyBudgetAmount,
            ]);
        }

        return redirect()->route('budget.index')->with('success', 'Quarterly Budget updated successfully.');
    }

    public function destroy($quarterly_budget_id)
    {
        // Find the existing QuarterlyBudget by ID
        $quarterlyBudget = ProgramQuarterlyBudget::findOrFail($quarterly_budget_id);

        // Find the associated YearlyBudget
        $yearlyBudget = $quarterlyBudget->yearlyBudget;

        // Calculate the budget to be subtracted from the yearly budget
        $budgetReduction = $quarterlyBudget->quarter_budget;

        // Update the yearly budget totals
        $yearlyBudget->yearly_budget -= $budgetReduction;
        $yearlyBudget->remaining_budget -= $budgetReduction;
        $yearlyBudget->save();

        // Delete the associated monthly budgets
        foreach ($quarterlyBudget->monthlyBudgets as $monthlyBudget) {
            $monthlyBudget->delete();
        }

        // Delete the quarterly budget
        $quarterlyBudget->delete();

        return redirect()->route('budget.index')->with('success', 'Quarterly Budget deleted successfully.');
    }
}
