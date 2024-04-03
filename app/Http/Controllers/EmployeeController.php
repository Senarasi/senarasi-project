<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Position;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employee = Employee::with(['department', 'position'])->when($request->cari, function ($query) use ($request) {
            $query->where('full_name', 'like', "%{$request->cari}%");
        })->paginate(15);
        $total_employee = $employee->count();
        $department = Department::orderBy('department_name', 'asc')->pluck('department_name', 'department_id');
        $position = Position::orderBy('position_name', 'asc')->pluck('position_name', 'position_id');
        return view('employee.index', compact('employee', 'total_employee', 'department', 'position'));
    }

    public function create()
    {
        $department = Department::orderBy('department_name', 'asc')->pluck('department_name', 'department_id')->prepend('Select Department', '');
        $position = Position::orderBy('position_name', 'asc')->pluck('position_name', 'position_id');
        return view('employee.create', compact('department', 'position'));
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'employee_id' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|string|min:5',
            'department_id' => 'required|exists:departments,department_id',
            'position_id' => 'required|exists:positions,position_id',
        ]);

        // Create a new Employee instance
        $employee = new Employee();
        $employee->employee_id = $request->employee_id;
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->email_verified_at = now();
        $employee->password = bcrypt($request->password); // Hash the password
        $employee->department_id = $request->department_id;
        $employee->position_id = $request->position_id;
        $employee->role = $request->role;

        // Attempt to save the Employee to the database
        if ($employee->save()) {
            // Save successful
            return redirect()->back()->with('success', 'Employee created successfully.');
        } else {
            // Save failed
            return redirect()->back()->with('error', 'Failed to create employee.');
        }
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $department = Department::pluck('department_name', 'department_id')->prepend('Select Department', '');
        $position = Position::pluck('position_name', 'position_id')->prepend('Select Position', '');
        return view('employee.edit', compact('employee', 'department', 'position'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->employee_id = $request->employee_id;
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        if (!empty($request->password)) {
            $employee->password = Hash::make($request->password);
        }
        $employee->department_id = $request->department_id;
        $employee->position_id = $request->position_id;
        $employee->role = $request->role;
        $employee->save();
        return redirect()->route('employee.index');
    }

    public function destroy($employee_id): RedirectResponse
    {
        $employee = Employee::findOrFail($employee_id);
        $employee->delete();
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
