<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Performer;
use App\models\SubDescription;
use App\Models\PerformerList;
use Illuminate\Http\Request;

class PerformerController extends Controller
{
    public function create()
    {

        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
        return view('requestbudget.performer', compact('employee', 'subdescription'));
    }

    public function getPerformerPrice(Request $request)
    {
        $nameId = $request->query('performer_list_id');

        $price = PerformerList::where('program_list_id', $nameId)
            ->first();

        if ($price) {
            return response()->json([
                'price' => $price->price,
            ]);
        } else {
            return response()->json([
                'price' => '',
            ]);
        }
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
        Performer::create($validatedData);

        // Redirect back to the performer page with the appropriate request budget ID
        return redirect()->route('requestbudget.performer', $request->request_budget_id)
            ->with('success', 'Performer added successfully!');
    }

    public function edit($id)
    {
        $performer = Performer::findOrFail($id);
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
        $url_update = route('performer.update', $performer->performer_id);
        return json_encode(array('status' => 'ok', 'data' => $performer, 'url_update' => $url_update,));
    }

    public function update()
    {
    }

    public function destroy(Request $request, $performer_id)
    {
        $performer = Performer::findOrFail($performer_id);
        $performer->delete();
        return redirect($request->url_back);
    }
}
