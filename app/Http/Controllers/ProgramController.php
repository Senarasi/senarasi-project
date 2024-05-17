<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $program = Program::all();
        $total_program = $program->count(); // Retrieve all vendors from the database
        return view('program.index', compact('program', 'total_program')); // Pass vendors to the view
    }

    public function create()
    {
        return view('program.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Program::create($data);
        return redirect()->route('program.index');
    }
}
