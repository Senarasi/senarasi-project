<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ProductionTool;
use App\Models\SubDescription;
use App\Models\ItemType;
use App\Models\ItemTool;
use Illuminate\Http\Request;

class ProductionToolController extends Controller
{
    public function create()
    {
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
        return view('requestbudget.productiontool', compact('employee', 'subdescription'));
    }

    public function fetchTypes(Request $request)
    {
        $categoryId = $request->input('category_id');

        if (!$categoryId) {
            return response()->json(['error' => 'Invalid category_id'], 400);
        }

        $types = ItemType::where('item_category_id', $categoryId)->get();

        return response()->json(['types' => $types]);
    }

    public function fetchTools(Request $request)
    {
        $typeId = $request->input('type_id');

        if (!$typeId) {
            return response()->json(['error' => 'Invalid type_id'], 400);
        }

        $tools = ItemTool::where('item_type_id', $typeId)->get();

        return response()->json(['tools' => $tools]);
    }

    public function fetchPrice(Request $request)
    {
        $toolId = $request->input('tool_id');

        if (!$toolId) {
            return response()->json(['error' => 'Invalid tool_id'], 400);
        }

        $tool = ItemTool::find($toolId);

        if (!$tool) {
            return response()->json(['error' => 'Tool not found'], 404);
        }

        return response()->json(['price' => $tool->item_price]);
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'request_budget_id' => 'required|exists:request_budgets,request_budget_id',
            'sub_description_id' => 'required|exists:sub_descriptions,sub_description_id',
            'usage' => 'required|string',
            'rep' => 'required|string',
            'tool_name' => 'required|string',
            'category_name' => 'required|string',
            'type_name' => 'required|string',
            'tool_name' => 'required|string',
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
        ProductionTool::create($validatedData);

        // Redirect back to the performer page with the appropriate request budget ID
        return redirect()->route('requestbudget.productiontool', $request->request_budget_id)
            ->with('success', 'ProductionTool added successfully!');
    }

    public function destroy(Request $request, $production_tool_id)
    {
        $productiontool = ProductionTool::findOrFail($production_tool_id);
        $productiontool->delete();
        return redirect($request->url_back);
    }
}
