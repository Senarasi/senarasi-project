<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Operational;
use App\Models\SubDescription;
use Illuminate\Http\Request;

class OperationalController extends Controller
{
    public function create(){
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
        return view('requestbudget.operational', compact('employee', 'subdescription'));

    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'request_budget_id' => 'required|exists:request_budgets,request_budget_id',
            'sub_description_id' => 'required|exists:sub_descriptions,sub_description_id',
            'usage' => 'required|string',
            'rep' => 'required|string',
            'name' => 'required|string',
            'day' => 'required|integer',
            'qty' => 'required|integer',
            'raw_budget' => 'required|numeric',
            'assign' => 'required|string',
            'note' => 'nullable|string',
        ]);

        // Calculate total_cost
        $validatedData['total_cost'] = $validatedData['day'] * $validatedData['qty'] * $validatedData['raw_budget'];
        $validatedData['cost'] = $validatedData['raw_budget']; // Assign raw_budget to cost

        // Create a new performer
        Operational::create($validatedData);

        // Redirect back to the performer page with the appropriate request budget ID
        return redirect()->route('request-budget.operational', $request->request_budget_id)
                         ->with('success', 'Operational added successfully!');
    }

    public function destroy(Request $request, $operational_id)
    {
        $operational = Operational::findOrFail($operational_id);
        $operational->delete();
        return redirect($request->url_back);
    }
}
