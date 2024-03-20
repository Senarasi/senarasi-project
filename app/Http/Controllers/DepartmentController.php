<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        // $department = Department::with('position')->when($request->cari, function ($query) use ($request) {
        //     $query->where('department_name', 'like', "%{$request->cari}%");
        // })->paginate(15);
        // $total_department = $department->count();
        // return view('department.index', compact('department', 'total_department'));
        return view('department.index');
    }
}
