<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\BudgetName;
use App\Models\Program;
use App\Models\YearlyBudget;
use App\Models\QuarterlyBudget;
use App\Models\MonthlyBudget;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class BudgetController extends Controller
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
        // $budget = YearlyBudget::with('employee', 'program', 'quarterlyBudgets.monthlyBudgets')->get();
        $budget = YearlyBudget::with(['employee', 'program', 'quarterlyBudgets.monthlyBudgets'])->when($request->cari, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->cari}%");
        })->orderBy('yearly_budget_id', 'asc')->paginate(15);
        $totalBudget = $budget->sum('yearly_budget');
        $totalRemainingBudget = $budget->sum('remaining_budget');
        $totalSpendingBudget = $totalBudget - $totalRemainingBudget;
        $employee = Employee::orderBy('full_name', 'asc')->pluck('full_name', 'employee_id');
        $program = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id');
        return view('budget.index', compact('budget', 'program', 'employee', 'totalBudget', 'totalRemainingBudget', 'totalSpendingBudget'));
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
            'budget_code' => 'required|unique:quarterly_budgets,budget_code',
            'raw_budget' => 'required|numeric',
            'quarter' => 'required|in:1,2,3,4',
        ]);

        // Find or create the yearly budget
        $yearlyBudget = YearlyBudget::firstOrCreate(
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

        $quarterlyBudget = QuarterlyBudget::create([
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
            MonthlyBudget::create([
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

    public function update(Request $request, $budget_name_id)
    {
        $request->validate([
            'program_name' => 'required|string|max:255',
            'raw_budget' => 'required|numeric',
        ]);

        // Find the existing BudgetName by ID
        $budgetName = BudgetName::findOrFail($budget_name_id);
        $budgetName->update([
            'name' => $request->input('program_name'),
            'budget_code' => $request->input('budget_code'), // Assuming budget_code can be updated
        ]);

        // Assuming there's only one yearly budget per BudgetName and you are updating the current year's budget
        $yearlyBudget = $budgetName->yearlyBudgets()->where('year', date('Y'))->firstOrFail();
        $newBudgetAmount = $request->input('raw_budget');
        $yearlyBudget->update([
            'budget_amount' => $newBudgetAmount,
            'remaining_budget' => $newBudgetAmount - ($yearlyBudget->budget_amount - $yearlyBudget->remaining_budget),
        ]);

        $quarterlyBudgetAmount = $newBudgetAmount / 4;

        // Update quarterly and monthly budgets
        foreach ($yearlyBudget->quarterlyBudgets as $quarterlyBudget) {
            $quarterlyBudget->update([
                'budget_amount' => $quarterlyBudgetAmount,
                'remaining_budget' => $quarterlyBudgetAmount - ($quarterlyBudget->budget_amount - $quarterlyBudget->remaining_budget),
            ]);

            $monthlyBudgetAmount = $quarterlyBudgetAmount / 3;

            foreach ($quarterlyBudget->monthlyBudgets as $monthlyBudget) {
                $monthlyBudget->update([
                    'budget_amount' => $monthlyBudgetAmount,
                    'remaining_budget' => $monthlyBudgetAmount - ($monthlyBudget->budget_amount - $monthlyBudget->remaining_budget),
                ]);
            }
        }

        return redirect()->route('budget.index')->with('success', 'Budget updated successfully.');


        // // Validate the request data
        // $request->validate([
        //     'program_name' => 'required|string|max:255',
        //     'employee_id' => 'required|exists:employees,employee_id',
        //     'budget' => 'required|numeric',
        // ]);

        // // Retrieve the budget record by its ID
        // $budget = BudgetName::findOrFail($budget_name_id);

        // // Update the budget name and employee ID
        // $budget->update([
        //     'name' => $request->input('program_name'),
        //     'employee_id' => $request->input('employee_id'),
        //     'budget_code' => $request->input('budget_code'),
        // ]);

        // // Update the yearly budget amount and remaining budget
        // $yearlyBudget = $budget->yearlyBudgets()->first();
        // $yearlyBudget->update([
        //     'budget_amount' => $request->input('budget'),
        //     'remaining_budget' => $request->input('budget'),
        // ]);

        // // Calculate quarterly and monthly budget amounts
        // $quarterlyBudgetAmount = $request->input('budget') / 4;
        // $monthlyBudgetAmount = $request->input('budget') / 12; // Assuming 3 months per quarter

        // // Update quarterly budgets
        // foreach ($yearlyBudget->quarterlyBudgets as $quarterlyBudget) {
        //     $quarterlyBudget->update([
        //         'budget_amount' => $quarterlyBudgetAmount,
        //         'remaining_budget' => $quarterlyBudgetAmount,
        //     ]);

        //     // Update monthly budgets within each quarter
        //     foreach ($quarterlyBudget->monthlyBudgets as $monthlyBudget) {
        //         $monthlyBudget->update([
        //             'budget_amount' => $monthlyBudgetAmount,
        //             'remaining_budget' => $monthlyBudgetAmount,
        //         ]);
        //     }
        // }

        // // Redirect back to the index page with a success message
        // return redirect()->route('budget.index')->with('success', 'Budget updated successfully.');
    }

    public function destroy($budget_name_id)
    {
        try {
            // Retrieve the budget record by its ID
            $budget = BudgetName::findOrFail($budget_name_id);

            // Delete associated yearly, quarterly, and monthly budgets
            $budget->yearlyBudgets()->delete();

            // Delete the budget record
            $budget->delete();

            // Redirect back to the index page with a success message
            return redirect()->route('budget.index')->with('success', 'Budget deleted successfully.');
        } catch (QueryException $e) {
            // Handle constraint violation exception
            return redirect()->route('budget.index')->with('error', 'Cannot delete budget. It has associated records.');
        }
    }
}
