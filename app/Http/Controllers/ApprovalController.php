<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approval;
use App\Models\CrewPosition;
use App\Models\Employee;
use App\Models\ItemCategory;
use App\Models\Position;
use App\Models\Program;
use App\Models\ProgramMonthlyBudget;
use App\Models\ProgramQuarterlyBudget;
use App\Models\Operational;
use App\Models\Performer;
use App\Models\ProductionCrew;
use App\Models\ProductionTool;
use App\Models\ItemType;
use App\Models\ItemTool;
use App\Models\Location;
use App\Models\PerformerList;
use App\Models\RequestBudget;
use App\Models\SubDescription;
use App\Models\TotalCost;
use App\Mail\RequestBudgetProgram\NextApproverNotificationMail;
use App\Mail\RequestBudgetProgram\FinalApprovalNotificationMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        // $approvals = RequestBudget::with([
        //     'program',
        //     'totalCost',
        //     'approval' => function ($query) {
        //         $query->whereIn('stage', ['approval 1', 'reviewer', 'approval 2', 'approval 3'])
        //             ->with('employee');
        //     },
        // ])->get();

        // $requestBudgets = RequestBudget::with('manager', 'approval', 'employee');

        // if (Auth::User()->role !== 'Admin') {
        //     $requestBudgets = $requestBudgets->where('manager_id', Auth::id());
        // }

        // // Check if any request budget has approval 3
        // $hasApproval3 = $approvals->pluck('approval')->flatten()->where('stage', 'approval 3')->isNotEmpty();

        // return view('approval.index', compact('requestBudgets','approvals', 'hasApproval3'));

        $user = Auth::user();

        // Fetch request budgets where the logged-in user is involved
        $requestBudgets = RequestBudget::with([
            'program',
            'totalCost',
            'approval' => function ($query) {
                $query->whereIn('stage', ['manager', 'reviewer', 'hc', 'finance 1', 'finance 2'])
                    ->with('employee');
            },
        ])
            ->where(function ($query) use ($user) {
                $query->where('manager_id', $user->employee_id)
                    ->orWhere('producer_id', $user->employee_id)
                    ->orWhere('finance1_id', $user->employee_id)
                    ->orWhere('reviewer_id', $user->employee_id)
                    ->orWhere('hc_id', $user->employee_id)
                    ->orWhere('finance2_id', $user->employee_id);
            })
            ->get();

        // Check if any request budget has approval 3
        $hasApprovalFinance2 = $requestBudgets->pluck('approval')->flatten()->where('stage', 'finance 2')->isNotEmpty();

        return view('approval.index', compact('requestBudgets', 'hasApprovalFinance2'));
    }

    public function show($id)
    {
        $requestBudgets = RequestBudget::with([
            'program',
            'performer',
            'productionCrew',
            'productionTool',
            'operational',
            'location',
            'approval' => function ($query) {
                $query->whereIn('stage', ['manager', 'reviewer', 'hc', 'finance 1', 'finance 2'])
                    ->with('employee');
            },
        ])->findOrFail($id);

        // Check if Finance 2 approval is required based on existing approvals
        $hasApprovalFinance2 = $requestBudgets->approval->where('stage', 'finance 2')->isNotEmpty();

        // Get approval statuses
        $managerApproval = $requestBudgets->approval->where('stage', 'manager')->first()->status ?? null;
        $reviewerApproval = $requestBudgets->approval->where('stage', 'reviewer')->first()->status ?? null;
        $hcApproval = $requestBudgets->approval->where('stage', 'hc')->first()->status ?? null;
        $finance1Approval = $requestBudgets->approval->where('stage', 'finance 1')->first()->status ?? null;
        $finance2Approval = $requestBudgets->approval->where('stage', 'finance 2')->first()->status ?? null;

        // Determine if each approval stage is allowed
        $canApproveManager = true; // Manager can always approve
        $canApproveReviewer = $managerApproval === 'approved';
        $canApproveHC = $canApproveReviewer && $reviewerApproval === 'approved';
        $canApproveFinance1 = $canApproveHC && $hcApproval === 'approved';
        $canApproveFinance2 = $hasApprovalFinance2 && $canApproveFinance1 && $finance1Approval === 'approved';

        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        return view('approval.detail', compact(
            'id',
            'hasApprovalFinance2',
            'managerApproval',
            'reviewerApproval',
            'hcApproval',
            'finance1Approval',
            'finance2Approval',
            'canApproveManager',
            'canApproveReviewer',
            'canApproveHC',
            'canApproveFinance1',
            'canApproveFinance2',
            'requestBudgets',
            'totalperformer',
            'totalproductioncrew',
            'totalproductiontool',
            'totaloperational',
            'totallocation',
            'totalAll'
        ));
    }

    public function view($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        // Fetch and group performers by sub_description_id
        $performer = Performer::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Calculate the number of NCS and OUT entries for each sub_description_id
        $repPerformerCounts = $performer->map(function ($group) {
            return [
                'NCS' => $group->where('rep', 'NCS')->count(),
                'OUT' => $group->where('rep', 'OUT')->count(),
            ];
        });

        // Calculate the total NCS and OUT across all sub_description_id
        $totalRepPerformerCounts = $repPerformerCounts->reduce(function ($carry, $item) {
            return [
                'NCS' => $carry['NCS'] + $item['NCS'],
                'OUT' => $carry['OUT'] + $item['OUT'],
            ];
        }, ['NCS' => 0, 'OUT' => 0]);

        // Calculate the total cost for performers
        $totalPerformerCost = $performer->map(function ($group) {
            return $group->sum('total_cost');
        })->sum();

        // Fetch and group production crews by sub_description_id
        $productioncrew = ProductionCrew::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Calculate the number of NCS and OUT entries for each sub_description_id
        $repCrewCounts = $productioncrew->map(function ($group) {
            return [
                'NCS' => $group->where('rep', 'NCS')->count(),
                'OUT' => $group->where('rep', 'OUT')->count(),
            ];
        });

        // Calculate the total NCS and OUT across all sub_description_id
        $totalRepCrewCounts = $repCrewCounts->reduce(function ($carry, $item) {
            return [
                'NCS' => $carry['NCS'] + $item['NCS'],
                'OUT' => $carry['OUT'] + $item['OUT'],
            ];
        }, ['NCS' => 0, 'OUT' => 0]);

        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        // Fetch and group production tools by sub_description_id
        $productiontool = ProductionTool::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Fetch and group operational by sub_description_id
        $operational = Operational::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Fetch and group location by sub_description_id
        $location = Location::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Fetch the approvals for the request budget
        $approvals = Approval::where('request_budget_id', $id)->get()->keyBy('stage');

        // Total cost of all categories
        $approval1 = Employee::findOrFail(120017081704);
        $approval2 = Employee::findOrFail(120021071261);
        $reviewer = Employee::findOrFail(220017110117);
        $hc = Employee::findOrFail(220017110117);
        $pdf = Pdf::loadView('report.view', ['budget' => $requestbudget->budget], compact('approval1', 'approval2', 'reviewer', 'hc', 'requestbudget', 'performer', 'productioncrew', 'productiontool', 'operational', 'location', 'totalAll', 'totalRepCrewCounts', 'totalRepPerformerCounts' ,'approvals'));
        // Mengatur format kertas menjadi lanskap
        $pdf->setPaper('LEGAL', 'landscape');
        return $pdf->stream('document.pdf');
    }

    public function approve(Request $request, $id)
    {
        // $requestBudget = RequestBudget::findOrFail($id);

        // $currentStage = $this->determineStage($requestBudget);

        // // Find the current stage approval
        // $approval = $requestBudget->approval->where('stage', $currentStage)->first();

        // if ($approval && $approval->status === 'pending') {
        //     // Approve the current stage
        //     $approval->status = 'approved';
        //     $approval->save();

        //     // Check if there's a next stage
        //     $nextStage = $this->getNextStage($currentStage, $requestBudget);

        //     if (!$nextStage) {
        //         // This is the final approval stage (either finance 1 or finance 2)
        //         $this->deductBudget($requestBudget);
        //     } else {
        //         // Find the next stage approval and set its status to pending
        //         $nextApproval = $requestBudget->approval->where('stage', $nextStage)->first();

        //         if ($nextApproval) {
        //             // Update the status to 'pending' for the next approver
        //             $nextApproval->status = 'pending';
        //             $nextApproval->save();
        //         }
        //     }

        //     return redirect()->route('approval.show', $id)->with('success', 'Approval successfully updated.');
        // }

        // return redirect()->route('approval.show', $id)->with('error', 'Approval not found or already processed.');

        $requestBudget = RequestBudget::findOrFail($id);

        $currentStage = $this->determineStage($requestBudget);

        // Find the current stage approval
        $approval = $requestBudget->approval->where('stage', $currentStage)->first();

        if ($approval && $approval->status === 'pending') {
            // Approve the current stage
            $approval->status = 'approved';
            $approval->save();

            // Check if there's a next stage
            $nextStage = $this->getNextStage($currentStage, $requestBudget);

            if (!$nextStage) {
                // This is the final approval stage (either finance 1 or finance 2)
                $this->deductBudget($requestBudget);

                // Send final approval email to the submitting user
                $totalAll = $this->calculateTotalCost($requestBudget->request_budget_id); // Calculate total cost
                $submitterEmail = $requestBudget->employee->email;
                // Generate the PDF report
                $pdf = $this->report($requestBudget->request_budget_id)->output(); // Generate PDF output

                if ($submitterEmail) {
                    Mail::to($submitterEmail)->send(new FinalApprovalNotificationMail(
                        $requestBudget,
                        $totalAll,
                        $pdf
                    ));
                }
            } else {
                // Find the next stage approval and set its status to pending
                $nextApproval = $requestBudget->approval->where('stage', $nextStage)->first();

                if ($nextApproval) {
                    // Update the status to 'pending' for the next approver
                    $nextApproval->status = 'pending';
                    $nextApproval->save();

                    // Get next approver details
                    $nextApprover = Employee::findOrFail($nextApproval->employee_id);
                    $totalAll = $this->calculateTotalCost($requestBudget->request_budget_id); // Calculate total cost
                    $currentStage = $this->getCurrentStage($requestBudget); // Get the current stage

                    // Generate the PDF report
                    $pdf = $this->report($requestBudget->request_budget_id)->output(); // Generate PDF output

                    // Send email notification to the next approver with the report attached
                    Mail::to($nextApprover->email)->send(new NextApproverNotificationMail(
                        $requestBudget,
                        $nextApprover,
                        $currentStage,
                        $totalAll,
                        $pdf // Attach the PDF report
                    ));
                }
            }

            return redirect()->route('approval.show', $id)->with('success', 'Approval successfully updated.');
        }

        return redirect()->route('approval.show', $id)->with('error', 'Approval not found or already processed.');
    }

    public function report($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        // Fetch and group performers by sub_description_id
        $performer = Performer::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Calculate the number of NCS and OUT entries for each sub_description_id
        $repPerformerCounts = $performer->map(function ($group) {
            return [
                'NCS' => $group->where('rep', 'NCS')->count(),
                'OUT' => $group->where('rep', 'OUT')->count(),
            ];
        });

        // Calculate the total NCS and OUT across all sub_description_id
        $totalRepPerformerCounts = $repPerformerCounts->reduce(function ($carry, $item) {
            return [
                'NCS' => $carry['NCS'] + $item['NCS'],
                'OUT' => $carry['OUT'] + $item['OUT'],
            ];
        }, ['NCS' => 0, 'OUT' => 0]);

        // Calculate the total cost for performers
        $totalPerformerCost = $performer->map(function ($group) {
            return $group->sum('total_cost');
        })->sum();

        // Fetch and group production crews by sub_description_id
        $productioncrew = ProductionCrew::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Calculate the number of NCS and OUT entries for each sub_description_id
        $repCrewCounts = $productioncrew->map(function ($group) {
            return [
                'NCS' => $group->where('rep', 'NCS')->count(),
                'OUT' => $group->where('rep', 'OUT')->count(),
            ];
        });

        // Calculate the total NCS and OUT across all sub_description_id
        $totalRepCrewCounts = $repCrewCounts->reduce(function ($carry, $item) {
            return [
                'NCS' => $carry['NCS'] + $item['NCS'],
                'OUT' => $carry['OUT'] + $item['OUT'],
            ];
        }, ['NCS' => 0, 'OUT' => 0]);

        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        // Fetch and group production tools by sub_description_id
        $productiontool = ProductionTool::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Fetch and group operational by sub_description_id
        $operational = Operational::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Fetch and group location by sub_description_id
        $location = Location::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Total cost of all categories
        $approval1 = Employee::findOrFail(120017081704);
        $approval2 = Employee::findOrFail(120021071261);
        $reviewer = Employee::findOrFail(220017110117);
        $hc = Employee::findOrFail(220017110117);
        // Generate the PDF (but do not stream it)
        $pdf = Pdf::loadView('report.view', [
            'budget' => $requestbudget->budget,
            'approval1' => $approval1,
            'approval2' => $approval2,
            'reviewer' => $reviewer,
            'hc' => $hc,
            'requestbudget' => $requestbudget,
            'performer' => $performer,
            'productioncrew' => $productioncrew,
            'productiontool' => $productiontool,
            'operational' => $operational,
            'location' => $location,
            'totalperformer' => $totalperformer,
            'totalproductioncrew' => $totalproductioncrew,
            'totalproductiontool' => $totalproductiontool,
            'totaloperational' => $totaloperational,
            'totallocation' => $totallocation,
            'totalAll' => $totalAll,
            'totalRepCrewCounts' => $totalRepCrewCounts,
            'totalRepPerformerCounts' => $totalRepPerformerCounts,
        ]);

        // Set the paper format
        $pdf->setPaper('LEGAL', 'landscape');

        // Return the PDF object (not streaming)
        return $pdf;
    }

    private function calculateTotalCost($id)
    {
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        return $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;
    }

    private function getCurrentStage($requestBudget)
    {
        $pendingApproval = $requestBudget->approval->where('status', 'pending')->first();
        return $pendingApproval ? $pendingApproval->stage : 'completed';
    }



    private function determineStage($requestBudget)
    {
        if (Auth::id() == $requestBudget->manager_id) {
            return 'manager';
        } elseif (Auth::id() == $requestBudget->reviewer_id) {
            return 'reviewer';
        } elseif (Auth::id() == $requestBudget->hc_id) { // Insert HC stage check
            return 'hc';
        } elseif (Auth::id() == $requestBudget->finance1_id) {
            return 'finance 1';
        } elseif ($requestBudget->approval->where('stage', 'finance 2')->isNotEmpty() && Auth::id() == $requestBudget->finance2_id) {
            return 'finance 2';
        }
        return null;
    }

    private function getNextStage($currentStage, $requestBudget)
    {
        $stages = [
            'manager' => 'reviewer',
            'reviewer' => 'hc', // Insert HC stage after reviewer
            'hc' => 'finance 1', // HC comes before finance 1
            'finance 1' => $requestBudget->approval->where('stage', 'finance 2')->isNotEmpty() ? 'finance 2' : null,
            'finance 2' => null, // Last stage
        ];

        return $stages[$currentStage] ?? null;
    }

    private function deductBudget($requestBudget)
    {
        // Get the related total cost
        $totalCost = $requestBudget->totalCost;

        // Calculate the total amount to deduct
        $totalAmountToDeduct = $totalCost->total_locations_cost +
            $totalCost->total_operationals_cost +
            $totalCost->total_performers_cost +
            $totalCost->total_production_crews_cost +
            $totalCost->total_production_tools_cost;

        // Get the related ProgramQuarterlyBudget
        $quarterlyBudget = $requestBudget->quarterlyBudget;

        if ($quarterlyBudget) {
            // Deduct the total cost from the remaining budget
            $quarterlyBudget->remaining_budget -= $totalAmountToDeduct;
            $quarterlyBudget->save();
        }
    }

    public function rejectview($id)
    {
        $requestBudgets = RequestBudget::with([
            'program',
            'performer',
            'productionCrew',
            'productionTool',
            'operational',
            'location',
            'approval' => function ($query) {
                $query->whereIn('stage', ['manager', 'reviewer', 'hc', 'finance 1', 'finance 2']) // Include 'hc'
                    ->with('employee');
            },
        ])->findOrFail($id);

        // Check if Finance 2 approval is required based on existing approvals
        $hasApprovalFinance2 = $requestBudgets->approval->where('stage', 'finance 2')->isNotEmpty();

        // Get approval statuses
        $managerApproval = $requestBudgets->approval->where('stage', 'manager')->first()->status ?? null;
        $reviewerApproval = $requestBudgets->approval->where('stage', 'reviewer')->first()->status ?? null;
        $hcApproval = $requestBudgets->approval->where('stage', 'hc')->first()->status ?? null; // Get HC approval status
        $finance1Approval = $requestBudgets->approval->where('stage', 'finance 1')->first()->status ?? null;
        $finance2Approval = $requestBudgets->approval->where('stage', 'finance 2')->first()->status ?? null;

        // Determine if each approval stage is allowed
        $canApproveManager = true; // Manager can always approve
        $canApproveReviewer = $managerApproval === 'approved';
        $canApproveHC = $canApproveReviewer && $reviewerApproval === 'approved'; // HC can approve only if Reviewer has approved
        $canApproveFinance1 = $canApproveHC && $hcApproval === 'approved'; // Finance 1 can approve only if HC has approved
        $canApproveFinance2 = $hasApprovalFinance2 && $canApproveFinance1 && $finance1Approval === 'approved';

        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        return view('approval.reject', compact(
            'id',
            'hasApprovalFinance2',
            'managerApproval',
            'reviewerApproval',
            'hcApproval', // Pass HC approval to the view
            'finance1Approval',
            'finance2Approval',
            'canApproveManager',
            'canApproveReviewer',
            'canApproveHC', // Pass HC approval permissions to the view
            'canApproveFinance1',
            'canApproveFinance2',
            'requestBudgets',
            'totalperformer',
            'totalproductioncrew',
            'totalproductiontool',
            'totaloperational',
            'totallocation',
            'totalAll'
        ));
    }

    public function submitReject(Request $request, $id)
    {
        // $requestBudget = RequestBudget::findOrFail($id);

        // // Retrieve notes from the request
        // $notes = $request->input('notes', []);

        // // Filter out empty notes
        // $filteredNotes = array_filter($notes, function ($note) {
        //     return !empty($note['content']);
        // });

        // // Proceed if there are any valid notes
        // if (!empty($filteredNotes)) {
        //     $jsonNotes = json_encode($filteredNotes);
        //     $currentStage = $this->determineStage($requestBudget);

        //     $approval = $requestBudget->approval()->where('stage', $currentStage)->first();

        //     if ($approval && $approval->status === 'pending') {
        //         $approval->status = 'rejected';
        //         $approval->reason = $jsonNotes;
        //         $approval->save();

        //         return redirect()->route('approval.show', $id)->with('success', 'Request has been rejected and notes saved.');
        //     } else {
        //         return redirect()->route('approval.show', $id)->with('error', 'Approval record not found or already processed.');
        //     }
        // } else {
        //     return redirect()->route('approval.show', $id)->with('error', 'No valid notes provided.');
        // }

        $requestBudget = RequestBudget::findOrFail($id);

        // Retrieve notes from the request
        $notes = $request->input('notes', []);

        // Filter out empty notes
        $filteredNotes = array_filter($notes, function ($note) {
            return !empty($note['content']);
        });

        // Proceed if there are any valid notes
        if (!empty($filteredNotes)) {
            $jsonNotes = json_encode($filteredNotes);
            $currentStage = $this->determineStage($requestBudget);

            // Retrieve the current approval record
            $currentApproval = $requestBudget->approval()->where('stage', $currentStage)->first();

            if ($currentApproval && $currentApproval->status === 'pending') {
                // Reject the current approval with notes
                $currentApproval->status = 'rejected';
                $currentApproval->reason = $jsonNotes;
                $currentApproval->save();

                // Reject all subsequent stages without notes
                $stages = ['manager', 'reviewer', 'hc', 'finance 1', 'finance 2']; // Added 'hc'
                $currentStageIndex = array_search($currentStage, $stages);

                if ($currentStageIndex !== false) {
                    for ($i = $currentStageIndex + 1; $i < count($stages); $i++) {
                        $nextApproval = $requestBudget->approval()->where('stage', $stages[$i])->first();
                        if ($nextApproval && $nextApproval->status === 'pending') {
                            $nextApproval->status = 'rejected';
                            $nextApproval->reason = null; // No notes for subsequent rejections
                            $nextApproval->save();
                        }
                    }
                }

                return redirect()->route('approval.show', $id)->with('success', 'Request has been rejected and notes saved.');
            } else {
                return redirect()->route('approval.show', $id)->with('error', 'Approval record not found or already processed.');
            }
        } else {
            return redirect()->route('approval.show', $id)->with('error', 'No valid notes provided.');
        }
    }
}
