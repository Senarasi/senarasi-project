<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardmain()
    {
        return view('dashboard.main');
    }

    public function dashboardbudget()
    {
        return view('dashboard.budget');
    }
}
