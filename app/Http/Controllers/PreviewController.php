<?php

namespace App\Http\Controllers;

use App\models\Employee;
use App\Models\Performer;
use App\Models\RequestBudget;
use App\Models\SubDescription;
use App\Models\Approval;
use App\Models\History;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function create()
    {
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
        return view('requestbudget.preview', compact('employee', 'subdescription'));
    }

    public function store(Request $request)
    {
        $approverIds = [
            'manager' => $request->input('manager_id'), // Example: Employee ID for manager
            'reviewer' => '3', // Example: Employee ID for reviewer
            'hc' => '7', // Example: Employee ID for the new approver after reviewer
            'finance 1' => '5', // Employee ID for finance 1
        ];

        // If budget is less than or equal to 200 million, add approval 3
        if ($request->input('budget') >= 200000000) {
            $approverIds['finance 2'] = '6'; // Example: Employee ID for approval 3
        }

        // Create approval stages
        foreach ($approverIds as $stage => $employeeId) {
            // Validate stage to prevent check constraint violation
            if (!in_array($stage, ['manager', 'reviewer', 'hc', 'finance 1', 'finance 2'])) {
                continue; // Skip invalid stages
            }

            Approval::create([
                'request_budget_id' => $request->input('request_budget_id'),
                'employee_id' => $employeeId,
                'stage' => $stage,
                'status' => 'pending',
                // Add other fields as needed
            ]);
        }

        $validateData = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'request_budget_id' => 'required|exists:request_budgets,request_budget_id',
            'history_status' => 'required|string|max:255'
        ]);

        // Create the history
        History::create($validateData);

        return redirect()->route('request-budget.index')->with('success', 'Budget request submitted successfully.');
    }
}
