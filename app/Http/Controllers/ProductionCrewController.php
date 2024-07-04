<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\ProductionCrew;
use App\Models\SubDescription;
use Illuminate\Http\Request;

class ProductionCrewController extends Controller
{
    public function create(){
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
        return view('requestbudget.productioncrew', compact('employee', 'subdescription'));

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
            'position' => 'required|string',
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
        ProductionCrew::create($validatedData);

        // Redirect back to the performer page with the appropriate request budget ID
        return redirect()->route('request-budget.productioncrew', $request->request_budget_id)
                         ->with('success', 'ProductionCrew added successfully!');
    }

    public function destroy(Request $request, $production_crew_id)
    {
        $productioncrew = ProductionCrew::findOrFail($production_crew_id);
        $productioncrew->delete();
        return redirect($request->url_back);
    }
}
