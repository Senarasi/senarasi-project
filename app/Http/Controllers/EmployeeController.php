<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Position;
use App\Models\Employee;
use App\Models\Access;
use App\Models\EmployeeStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::with(['department', 'position'])->orderBy('employee_id', 'asc')->get();
        $managers = Employee::whereIn('employee_status_id', [2, 3, 4])->orderBy('full_name', 'asc')->get();
        $total_employees = $employees->count();
        $departments = Department::orderBy('department_name', 'asc')->pluck('department_name', 'department_id');
        $positions = Position::orderBy('position_name', 'asc')->pluck('position_name', 'position_id');
        $access = Access::all();
        $employeeStatus = EmployeeStatus::all();
        return view('employee.index', compact('employees', 'total_employees', 'departments', 'positions', 'managers', 'access', 'employeeStatus'));
    }

    public function show(Request $request)
    {
        $employees = Employee::with(['department', 'position'])->orderBy('employee_id', 'asc')->get();
        $managers = Employee::whereIn('employee_status_id', [2, 3, 4])->orderBy('full_name', 'asc')->get();
        $total_employees = $employees->count();
        $departments = Department::orderBy('department_name', 'asc')->pluck('department_name', 'department_id');
        $positions = Position::orderBy('position_name', 'asc')->pluck('position_name', 'position_id');
        $access = Access::all();
        $employeeStatus = EmployeeStatus::all();
        return view('employee.index', compact('employees', 'total_employees', 'departments', 'positions', 'managers', 'access', 'employeeStatus'));
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
            'access' => 'required|array', // Validate roles as an array
            'access.*' => 'exists:access,access_id', // Validate each role exists in the roles table

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
        $employee->employee_status_id = $request->role;

        // Attempt to save the Employee to the database
        if ($employee->save()) {
            // Attach roles to the employee
            $employee->access()->sync($request->access);

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
        $access = Access::all();
        $employeeStatus = EmployeeStatus::all();
        return view('employee.edit', compact('employee', 'department', 'position', 'access', 'employeeStatus'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'employee_id' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id . ',employee_id',
            'password' => 'nullable|string|min:5',
            'department_id' => 'required|exists:departments,department_id',
            'position_id' => 'required|exists:positions,position_id',
            'access' => 'required|array', // Validate roles as an array
            'access.*' => 'exists:access,access_id', // Validate each role exists in the roles table
        ]);

        $employee = Employee::findOrFail($id);
        $employee->employee_id = $request->employee_id;
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        if (!empty($request->password)) {
            $employee->password = Hash::make($request->password);
        }
        $employee->department_id = $request->department_id;
        $employee->position_id = $request->position_id;
        $employee->employee_status_id = $request->role;

        // Save the employee
        if ($employee->save()) {
            // Sync roles
            $employee->access()->sync($request->access);

            // Save successful
            return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
        } else {
            // Save failed
            return redirect()->back()->with('error', 'Failed to update employee.');
        }
    }

    public function destroy($employee_id): RedirectResponse
    {
        $employee = Employee::findOrFail($employee_id);
        $employee->delete();
        return redirect()->route('employee.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
