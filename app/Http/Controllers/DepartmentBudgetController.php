<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentYearlyBudget;
use App\Models\DepartmentMonthlyBudget;
use App\Http\Requests\BudgetDepartmentRequest;

class DepartmentBudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $departmentYearlyBudgets = DepartmentYearlyBudget::all();
        return view('budget.department', compact('departments', 'departmentYearlyBudgets'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BudgetDepartmentRequest $request)
    {

        $data = $request->validated();
        $data['employee_id'] = auth()->id();
        $data['remaining_budget'] = $data['budget_yearly'];
        $data['budget_monthly'] =  $data['budget_yearly'] / 12;


        $yearlyBudget = DepartmentYearlyBudget::create($data);

        $monthlyBudget = $yearlyBudget->budget_monthly;

        for ($month = 1; $month <= 12; $month++) {
            DepartmentMonthlyBudget::create([
                'department_yearly_budget_id' => $yearlyBudget->department_yearly_budget_id,
                'budget_code' => $yearlyBudget->budget_code . '/' . $month, // Assuming monthly budget code derived from quarterly code
                'month' => $month,
                'budget_monthly' => $monthlyBudget,
                'remaining_budget' => $monthlyBudget,
            ]);
        }

        return redirect()->route('budget.department.index')->with('status', 'Budget department created successfully.');


    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(BudgetDepartmentRequest $request, DepartmentYearlyBudget $departmentYearlyBudget)
    // {
    //     $data = $request->validated();
    //     $data['user_id'] = auth()->id();
    //     $data['remaining_budget'] = $data['budget_yearly'];
    //     $data['budget_monthly'] =  $data['budget_yearly'] / 12;

    //     $departmentYearlyBudget->update($data);

    //     // $monthlyBudgetAmount = $departmentYearlyBudget->budget_monthly;

    //     // Update the monthly budgets
    //     foreach ($departmentYearlyBudget->departmentMonthlyBudgets as $index => $monthlyBudget) {
    //         $monthlyBudget->update([
    //             'budget_code' => $departmentYearlyBudget->budget_code . '-' . ($index + 1), // Assuming monthly budget code derived from quarterly code
    //             'month' => ($index + 1),
    //             'budget_monthly' => $departmentYearlyBudget->budget_monthly,
    //             'remaining_budget' => $departmentYearlyBudget->budget_monthly,
    //         ]);

    //     }

    //     return redirect()->route('budget.department.index')->with('status', 'Budget department Updated successfully.');

    // }

    public function update(BudgetDepartmentRequest $request, DepartmentYearlyBudget $departmentYearlyBudget)
    {
        // Validasi data dari request
        $data = $request->validated();
        $data['employee_id'] = auth()->id();

        // Mengambil budget_yearly sebelumnya dan menghitung selisih
        $previousYearlyBudget = $departmentYearlyBudget->budget_yearly;
        $yearlyBudgetDifference = $data['budget_yearly'] - $previousYearlyBudget;

        // Mengatur remaining_budget total untuk tahunan
        $data['remaining_budget'] = $departmentYearlyBudget->remaining_budget + $yearlyBudgetDifference;

        // Menghitung budget bulanan baru
        $data['budget_monthly'] = $data['budget_yearly'] / 12;

        // Update budget yearly department
        $departmentYearlyBudget->update($data);

        // Menghitung selisih bulanan dari perubahan budget tahunan
        $monthlyBudgetDifference = $yearlyBudgetDifference / 12;

        // Update budget bulanan untuk setiap departmentMonthlyBudgets
        foreach ($departmentYearlyBudget->departmentMonthlyBudgets()->orderBy('month', 'asc')->get() as $index => $monthlyBudget) {
            // Debugging: Periksa nilai sebelum diupdate
            // \Log::info("Bulan: {$monthlyBudget->month}, Budget Sebelumnya: {$monthlyBudget->budget_monthly}, Remaining Sebelumnya: {$monthlyBudget->remaining_budget}");

            // Hitung budget bulanan baru dengan menambahkan atau mengurangi selisih bulanan
            $newMonthlyBudget = $monthlyBudget->budget_monthly + $monthlyBudgetDifference;

            // Hitung remaining_budget baru untuk bulan tersebut dengan menambahkan atau mengurangi selisih bulanan
            $newRemainingBudget = $monthlyBudget->remaining_budget + $monthlyBudgetDifference;

            // Update setiap budget bulanan
            $monthlyBudget->update([
                'budget_code' => $departmentYearlyBudget->budget_code . '/' . ($index + 1), // Menyesuaikan budget code jika diperlukan
                'month' => ($index + 1),
                'budget_monthly' => $newMonthlyBudget,
                'remaining_budget' => $newRemainingBudget,
            ]);

            // Debugging: Periksa nilai setelah diupdate
            // \Log::info("Bulan: {$monthlyBudget->month}, Budget Baru: {$newMonthlyBudget}, Remaining Baru: {$newRemainingBudget}");
        }

        return redirect()->route('budget.department.index')->with('status', 'Budget department Updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepartmentYearlyBudget $departmentYearlyBudget)
    {
        // Delete the associated monthly budgets
        foreach ($departmentYearlyBudget->departmentMonthlyBudgets as $monthlyBudget) {
            $monthlyBudget->delete();
        }

        // Delete the quarterly budget
        $departmentYearlyBudget->delete();

        return redirect()->route('budget.department.index')->with('status', 'Budget department delete successfully.');

    }
}
