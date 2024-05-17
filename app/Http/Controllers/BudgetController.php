<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\BudgetName;
use App\Models\Program;
use App\Models\YearlyBudget;
use App\Models\QuarterlyBudget;
use App\Models\MonthlyBudget;
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
        $program = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id')->prepend('Select Program', '');
        return view('budget.index', compact('budget', 'program'));
    }

    public function create()
    {
        // $budget = BudgetName::orderBy('name', 'asc')->pluck('name', 'budget_name_id')->prepend('Select Budget', '');
        // $employee = Employee::orderBy('full_name', 'asc')->pluck('full_name', 'employee_id')->prepend('Select Employee', '');
        // return view('budget.create', compact('budget', 'employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'program_name' => 'required|string|max:255',
            'raw_budget' => 'required|numeric',
        ]);

        $budgetName = BudgetName::create([
            'name' => $request->input('program_name'),
            'employee_id' => Auth::user()->employee_id,
            'budget_code' => $request->input('budget_code')
        ]);

        $yearlyBudget = $budgetName->yearlyBudgets()->create([
            'year' => date('Y'), // Example: Set the year to the current year
            'budget_amount' => $request->input('raw_budget'), // Example: Set the initial amount
            'remaining_budget' => $request->input('raw_budget'), // Example: Set the initial remaining amount
        ]);

        $quarterlyBudgetAmount = $yearlyBudget->budget_amount / 4;

        // Create quarterly budgets for each quarter
        for ($quarter = 1; $quarter <= 4; $quarter++) {
            $quarterlyBudget = $yearlyBudget->quarterlyBudgets()->create([
                'quarter' => $quarter,
                'budget_amount' => $quarterlyBudgetAmount,
                'remaining_budget' => $quarterlyBudgetAmount, // Set initial remaining amount
            ]);

            // Calculate the budget amount for each month within the quarter
            $monthlyBudgetAmount = $quarterlyBudgetAmount / 3;

            // Create monthly budgets for each month within the quarter
            for ($month = ($quarter - 1) * 3 + 1; $month <= $quarter * 3; $month++) {
                $monthlyBudget = $quarterlyBudget->monthlyBudgets()->create([
                    'month' => $month,
                    'budget_amount' => $monthlyBudgetAmount,
                    'remaining_budget' => $monthlyBudgetAmount, // Set initial remaining amount
                ]);

                // Add logic to create budget details if needed
            }
        }
        return redirect()->route('budget.index');
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
