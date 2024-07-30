<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestBudget;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        $approvals = RequestBudget::with([
            'program',
            'approval' => function ($query) {
                $query->whereIn('stage', ['approval 1', 'reviewer', 'approval 2', 'approval 3'])
                    ->with('employee');
            },
        ])->get();

        // Check if any request budget has approval 3
        $hasApproval3 = $approvals->pluck('approval')->flatten()->where('stage', 'approval 3')->isNotEmpty();

        return view('approval.index', compact('approvals', 'hasApproval3'));
    }
}
