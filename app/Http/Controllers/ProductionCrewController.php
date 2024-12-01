<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ProductionCrew;
use App\Models\CrewPosition;
use App\Models\SubDescription;
use App\Traits\UpdateTotalCostsTrait;
use Illuminate\Http\Request;

class ProductionCrewController extends Controller
{
    use UpdateTotalCostsTrait;
    public function create()
    {
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
        return view('requestbudget.productioncrew', compact('employee', 'subdescription'));
    }

    // original store
    // public function store(Request $request)
    // {
    //     // Validate the request
    //     $validatedData = $request->validate([
    //         'request_budget_id' => 'required|exists:request_budgets,request_budget_id',
    //         'sub_description_id' => 'required|exists:sub_descriptions,sub_description_id',
    //         'usage' => 'required|string',
    //         'rep' => 'required|string',
    //         'name' => 'required|string',
    //         'position' => 'required|string',
    //         'day' => 'required|integer',
    //         'qty' => 'required|integer',
    //         'raw_budget' => 'required|numeric',
    //         'assign' => 'required|string',
    //         'note' => 'nullable|string',
    //     ]);

    //     // Calculate total_cost
    //     $validatedData['total_cost'] = $validatedData['day'] * $validatedData['qty'] * $validatedData['raw_budget'];
    //     $validatedData['cost'] = $validatedData['raw_budget']; // Assign raw_budget to cost

    //     // Create a new performer
    //     $productioncrew = ProductionCrew::create($validatedData);

    //     $this->updateTotalCosts($productioncrew->request_budget_id);

    //     // Redirect back to the performer page with the appropriate request budget ID
    //     return redirect()->route('request-budget.productioncrew', $request->request_budget_id)
    //         ->with('success', 'ProductionCrew added successfully!');
    // }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'request_budget_id' => 'required|exists:request_budgets,request_budget_id',
            'sub_description_id' => 'required|exists:sub_descriptions,sub_description_id',
            'usage' => 'required|string',
            'rep' => 'required|string',
            // 'name' => 'required|string',
            'name' => 'required|array|min:1', // Ensure at least one name is provided
            'name.*' => 'required|string',   // Validate each name as a string
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

        // Loop through each name and save as a separate record
        foreach ($validatedData['name'] as $name) {
            $productionCrew = ProductionCrew::create([
                'request_budget_id' => $validatedData['request_budget_id'],
                'sub_description_id' => $validatedData['sub_description_id'],
                'usage' => $validatedData['usage'],
                'rep' => $validatedData['rep'],
                'position' => $validatedData['position'],
                'name' => $name,
                'day' => $validatedData['day'],
                'qty' => $validatedData['qty'],
                'assign' => $validatedData['assign'],
                'note' => $validatedData['note'],
                'total_cost' => $validatedData['total_cost'],
                'cost' => $validatedData['cost']
            ]);
            // Call updateTotalCosts for each newly created ProductionCrew
            $this->updateTotalCosts($productionCrew->request_budget_id);
        }

        // Redirect back to the performer page with the appropriate request budget ID
        return redirect()->route('request-budget.productioncrew', $request->request_budget_id)
            ->with('success', 'ProductionCrew added successfully!');
    }

    public function getPositionDetails($crew_position_name)
    {
        // Find the CrewPosition by its name
        $position = CrewPosition::where('crew_position_name', $crew_position_name)->first();

        if ($position) {
            return response()->json([
                'name' => $position->crew_position_name,
                'price' => $position->crew_position_price,
                'note'  => $position->notes
            ]);
        } else {
            return response()->json(['error' => 'Position not found'], 404);
        }
    }

    public function destroy(Request $request, $production_crew_id)
    {
        $productioncrew = ProductionCrew::findOrFail($production_crew_id);
        $productioncrew->delete();
        return redirect($request->url_back);
    }
}
