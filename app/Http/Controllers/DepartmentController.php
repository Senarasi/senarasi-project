<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\RedirectResponse;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $department = Department::with('position')->when($request->cari, function ($query) use ($request) {
            $query->where('department_name', 'like', "%{$request->cari}%");
        })->paginate(15);
        $total_department = $department->count();
        return view('department.index', compact('department', 'total_department'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'department_name' => 'required|string|max:255',
        ]);

        // Create a new Department instance
        $department = new Department();
        $department->department_name = $request->department_name;

        // Save the Department to the database
        $department->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Department created successfully.');
    }

    public function edit($department_id)
    {
        $department = Department::findOrFail($department_id);
        return view('department.edit', compact('department'));
    }

    public function update(Request $request, $department_id)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'positions' => 'nullable|array', // Validation for dynamic positions
        ]);

        $department = Department::findOrFail($department_id);
        $department->department_name = $request->department_name;
        $department->save();

        if ($request->positions) {
            foreach ($request->positions as $positionName) {
                $department->position()->create(['position_name' => $positionName]);
            }
        }

        return redirect()->route('department.index');
    }
}
