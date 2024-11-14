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
        $department = Department::orderBy('department_name', 'asc')->with('position')->get();
        $total_department = $department->count();
        return view('admin.hc.department.index', compact('department', 'total_department'));
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
        return view('admin.hc.department.edit', compact('department'));
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

    public function destroy($department_id): RedirectResponse
    {
        $department = Department::findOrFail($department_id);
        $department->delete();
        return redirect()->route('department.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
