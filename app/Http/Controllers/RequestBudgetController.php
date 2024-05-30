<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class RequestBudgetController extends Controller
{
    public function index(Request $request)
    {
        return view('requestbudget.index');
    }

    public function create()
    {
        $program = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id')->prepend('Select Program', '');
        return view('requestbudget.create', compact('program'));
    }

}
