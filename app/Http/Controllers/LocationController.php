<?php

namespace App\Http\Controllers;
use App\models\Employee;
use App\Models\Location;
use App\Models\SubDescription;
use App\Traits\UpdateTotalCostsTrait;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    use UpdateTotalCostsTrait;
    public function create(){
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
        return view('requestbudget.location', compact('employee', 'subdescription'));
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
        $location = Location::create($validatedData);

        $this->updateTotalCosts($location->request_budget_id);

        // Redirect back to the performer page with the appropriate request budget ID
        return redirect()->route('request-budget.location', $request->request_budget_id)
                         ->with('success', 'Location added successfully!');
    }

    public function destroy(Request $request, $location_id)
    {
        $location = Location::findOrFail($location_id);
        $location->delete();
        return redirect($request->url_back);
    }
}
