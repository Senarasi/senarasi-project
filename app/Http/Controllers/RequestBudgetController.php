<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\CrewPosition;
use Illuminate\Http\Request;
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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class RequestBudgetController extends Controller
{
    public function index(Request $request)
    {
        $requestBudgets = RequestBudget::with([
            'program',
            'approval' => function ($query) {
                $query->whereIn('stage', ['manager', 'reviewer', 'hc', 'finance 1', 'finance 2'])
                    ->with('employee');
            },
        ])->get();

        // Check if any request budget has approval 3
        $hasApprovalFinance2 = $requestBudgets->pluck('approvals')->flatten()->where('stage', 'finance 2')->isNotEmpty();

        return view('requestbudget.program.index', compact('requestBudgets', 'hasApprovalFinance2'));
    }

    public function create()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Retrieve the employee record for the logged-in user
        $employee = Employee::with('manager') // Load the manager relationship
            ->find($user->employee_id);
        // Prepare data to pass to the view
        $managerName = $employee->manager ? $employee->manager->full_name : 'No Manager Assigned';
        $managerId = $employee->manager_id;
        $employees = Employee::orderBy('full_name', 'asc')->pluck('full_name', 'employee_id');
        $managers = Employee::where('role', 'manager')->get();
        $producers = Employee::join('positions', 'employees.position_id', '=', 'positions.position_id')
            ->where('positions.position_name', 'like', '%PRODUCER%')
            ->get();
        $users = Employee::orderBy('full_name', 'asc')->get();
        $programs = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id');
        return view('requestbudget.program.create', compact('users', 'employees', 'managers', 'programs', 'producers', 'managerName', 'managerId'));
    }

    public function getMonthlyBudget(Request $request)
    {
        $programId = $request->query('program_id');
        $month = $request->query('month');

        $budget = ProgramMonthlyBudget::where('program_id', $programId)
            ->where('month', $month)
            ->first();

        if ($budget) {
            return response()->json([
                'budget_code' => $budget->budget_code,
                'monthly_budget' => $budget->remaining_budget,
                'monthly_budget_id' => $budget->monthly_budget_id
            ]);
        } else {
            return response()->json([
                'budget_code' => '',
                'monthly_budget' => '',
                'monthly_budget_id' => ''
            ]);
        }
    }

    public function getBudgetData(Request $request)
    {
        $program_id = $request->program_id;
        $month = $request->month;

        // Determine the quarter based on the month
        $quarter = ceil($month / 3);

        // Fetch the budget data for the selected program and quarter
        $budget = ProgramQuarterlyBudget::where('program_id', $program_id)
            ->where('quarter', $quarter)
            ->first();

        if ($budget) {
            return response()->json([
                'budget_code' => $budget->budget_code,
                'quarterly_budget' => $budget->remaining_budget,
                'quarterly_budget_id' => $budget->quarterly_budget_id
            ]);
        }

        return response()->json([
            'budget_code' => 'DATA NOT FOUND',
            'budget_allocation' => 'DATA NOT FOUND',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'month' => 'required|integer|between:1,12',
            'producer_id' => 'required|exists:employees,employee_id',
            'manager_id' => 'required|exists:employees,employee_id',
            'quarterly_budget_id' => 'required|exists:program_quarterly_budgets,quarterly_budget_id',
            'budget_code' => 'required|string|max:255',
            'budget' => 'required|numeric',
            'episode' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'type' => 'required|string|max:255',
            'date_upload' => 'required|date',
            'reviewer_id' => 'required|exists:employees,employee_id',
            'finance1_id' => 'required|exists:employees,employee_id',
            'finance2_id' => 'required|exists:employees,employee_id',
            'hc_id' => 'required|exists:employees,employee_id',
        ]);
        $validatedData['employee_id'] = Auth::id();

        // Generate the unique request number
        $currentYear = date('Y'); // Get the current year
        $currentMonth = date('m'); // Get the current month

        // Fetch the maximum serial number for the current month and year
        $lastRequest = RequestBudget::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->orderBy('request_budget_number', 'desc')
            ->first();

        $lastSerialNumber = 0;
        if ($lastRequest) {
            // Extract the serial number part from the last request number
            if (preg_match('/\d{3}(?=-\d{2}-' . $currentYear . '$)/', $lastRequest->request_budget_number, $matches)) {
                $lastSerialNumber = intval($matches[0]);
            }
        }

        // Increment the serial number
        $newSerialNumber = $lastSerialNumber + 1;

        // Format the new request number
        $requestNumber = sprintf('NRS-RB-%03d-%02d-%d', $newSerialNumber, $currentMonth, $currentYear);

        // Add the request number to the validated data
        $validatedData['request_budget_number'] = $requestNumber;

        $requestBudget = RequestBudget::create($validatedData);

        return redirect()->route('request-budget.performer', ['id' => $requestBudget->request_budget_id]);
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

        // Check approval statuses
        $managerApproval = $requestBudgets->approval->where('stage', 'manager')->first()->status ?? null;
        $reviewerApproval = $requestBudgets->approval->where('stage', 'reviewer')->first()->status ?? null;
        $hcApproval = $requestBudgets->approval->where('stage', 'hc')->first()->status ?? null; // Add HC stage
        $finance1Approval = $requestBudgets->approval->where('stage', 'finance 1')->first()->status ?? null;
        $finance2Approval = $requestBudgets->approval->where('stage', 'finance 2')->first()->status ?? null;

        // Determine if any stage has been approved
        $isApproved = in_array('approved', [$managerApproval, $reviewerApproval, $hcApproval, $finance1Approval, $finance2Approval]);

        // Determine if any stage has been rejected
        $isRejected = in_array('rejected', [$managerApproval, $reviewerApproval, $hcApproval, $finance1Approval, $finance2Approval]);

        // Perform calculations
        $performer = Performer::where('request_budget_id', $id)->get();
        $totalperformer = $performer->sum('total_cost');
        $productioncrew = ProductionCrew::where('request_budget_id', $id)->get();
        $totalproductioncrew = $productioncrew->sum('total_cost');
        $productiontool = ProductionTool::where('request_budget_id', $id)->get();
        $totalproductiontool = $productiontool->sum('total_cost');
        $operational = Operational::where('request_budget_id', $id)->get();
        $totaloperational = $operational->sum('total_cost');
        $location = Location::where('request_budget_id', $id)->get();
        $totallocation = $location->sum('total_cost');
        $total = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        // Retrieve notes from all approvals and decode them
        $allNotes = [];
        foreach ($requestBudgets->approval as $approval) {
            if (!empty($approval->reason)) {
                $notes = json_decode($approval->reason, true);
                $allNotes = array_merge($allNotes, $notes);
            }
        }

        return view('requestbudget.program.detail', compact(
            'hasApprovalFinance2',
            'requestBudgets',
            'performer',
            'totalperformer',
            'productioncrew',
            'totalproductioncrew',
            'productiontool',
            'totalproductiontool',
            'operational',
            'totaloperational',
            'location',
            'totallocation',
            'total',
            'isApproved',
            'isRejected',
            'allNotes' // Pass notes to the view
        ));
    }

    public function edit($id)
    {
        $requestBudget = RequestBudget::findOrFail($id);
        $programs = Program::pluck('program_name', 'program_id');
        $producers = Employee::join('positions', 'employees.position_id', '=', 'positions.position_id')
            ->where('positions.position_name', 'like', '%PRODUCER%')
            ->get();
        $users = Employee::all();
        $manager = Employee::find($requestBudget->manager_id);

        return view('requestbudget.program.edit', compact('requestBudget', 'programs', 'producers', 'manager', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Fetch the existing request budget
        $requestBudget = RequestBudget::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'program_id' => 'required|exists:programs,program_id',
            'month' => 'required|integer|between:1,12',
            'producer_id' => 'required|exists:employees,employee_id',
            'manager_id' => 'required|exists:employees,employee_id',
            'monthly_budget_id' => 'required|exists:monthly_budgets,monthly_budget_id',
            'budget_code' => 'required|string|max:255',
            'budget' => 'required|numeric',
            'episode' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'type' => 'required|string|max:255',
            'date_upload' => 'required|date',
            'reviewer_id' => 'required|exists:employees,employee_id',
            'finance1_id' => 'required|exists:employees,employee_id',
            'finance2_id' => 'required|exists:employees,employee_id',
        ]);

        // Preserve the existing request_budget_number
        $validatedData['request_budget_number'] = $requestBudget->request_budget_number;
        $validatedData['employee_id'] = $requestBudget->employee_id;

        // Update the request budget
        $requestBudget->update($validatedData);

        return redirect()->route('request-budget.performer', ['id' => $requestBudget->request_budget_id])
            ->with('success', 'Request budget updated successfully!');
    }

    public function performer($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $performer_list = PerformerList::orderBy('performer_name', 'asc')->get();
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');

        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        // Retrieve performers and other related data
        $performer = Performer::where('request_budget_id', $id)->get();
        $location = Location::where('request_budget_id', $id)->get();

        // Pass the retrieved data to the view
        return view('requestbudget.program.performer', [
            'budget' => $requestbudget->budget,
            'performer_list' => $performer_list,
            'totallocation' => $totallocation,
            'location' => $location,
            'totaloperational' => $totaloperational,
            'totalproductiontool' => $totalproductiontool,
            'totalperformer' => $totalperformer,
            'totalproductioncrew' => $totalproductioncrew,
            'performer' => $performer,
            'requestbudget' => $requestbudget,
            'subdescription' => $subdescription,
            'id' => $id,
            'totalAll' => $totalAll
        ]);
    }

    public function productioncrew($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $crew = Employee::all();
        $crewposition = CrewPosition::pluck('crew_position_name', 'crew_position_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');

        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        // Retrieve production crew data
        $productioncrew = ProductionCrew::where('request_budget_id', $id)->get();

        // Pass the retrieved data to the view
        return view('requestbudget.program.productioncrew', [
            'budget' => $requestbudget->budget,
            'crewposition' => $crewposition,
            'crew' => $crew,
            'totallocation' => $totallocation,
            'totaloperational' => $totaloperational,
            'totalproductiontool' => $totalproductiontool,
            'totalperformer' => $totalperformer,
            'totalproductioncrew' => $totalproductioncrew,
            'productioncrew' => $productioncrew,
            'requestbudget' => $requestbudget,
            'subdescription' => $subdescription,
            'id' => $id,
            'totalAll' => $totalAll
        ]);
    }

    public function productiontool($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $subdescription = SubDescription::whereNotIn('sub_description_name', [
            'Host/Performer/Guest',
            'Internal Team NCS',
            'Production Studio',
            'Business Development',
            'Operational',
            'Sewa Lokasi'
        ])->pluck('sub_description_name', 'sub_description_id');
        $itemcategory = ItemCategory::orderBy('item_category_name', 'asc')->get();
        $itemtype = ItemType::pluck('item_type_name', 'item_type_id');
        $itemtool = ItemTool::pluck('item_tool_name', 'item_tool_id');

        $productiontool = ProductionTool::where('request_budget_id', $id)->get();
        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        return view('requestbudget.program.productiontool', [
            'budget' => $requestbudget->budget,
            'itemcategory' => $itemcategory,
            'itemtype' => $itemtype,
            'itemtool' => $itemtool,
            'totallocation' => $totallocation,
            'totaloperational' => $totaloperational,
            'productiontool' => $productiontool,
            'totalproductiontool' => $totalproductiontool,
            'totalperformer' => $totalperformer,
            'totalproductioncrew' => $totalproductioncrew,
            'subdescription' => $subdescription,
            'requestbudget' => $requestbudget,
            'id' => $id,
            'totalAll' => $totalAll
        ]);
    }

    public function operational($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);

        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');

        $operational = Operational::where('request_budget_id', $id)->get();
        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        return view('requestbudget.program.operational', [
            'budget' => $requestbudget->budget,
            'totallocation' => $totallocation,
            'totaloperational' => $totaloperational,
            'operational' => $operational,
            'totalproductiontool' => $totalproductiontool,
            'totalperformer' => $totalperformer,
            'totalproductioncrew' => $totalproductioncrew,
            'subdescription' => $subdescription,
            'requestbudget' => $requestbudget,
            'id' => $id,
            'totalAll' => $totalAll
        ]);
    }

    public function location($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);

        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');

        $location = Location::where('request_budget_id', $id)->get();
        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        return view('requestbudget.program.location', [
            'budget' => $requestbudget->budget,
            'totallocation' => $totallocation,
            'location' => $location,
            'totaloperational' => $totaloperational,
            'totalproductiontool' => $totalproductiontool,
            'totalperformer' => $totalperformer,
            'totalproductioncrew' => $totalproductioncrew,
            'subdescription' => $subdescription,
            'requestbudget' => $requestbudget,
            'id' => $id,
            'totalAll' => $totalAll
        ]);
    }

    public function preview($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);

        // Calculate total costs
        $totalcost = TotalCost::where('request_budget_id', $id)->first();
        $totalperformer = $totalcost ? $totalcost->total_performers_cost : 0;
        $totalproductioncrew = $totalcost ? $totalcost->total_production_crews_cost : 0;
        $totalproductiontool = $totalcost ? $totalcost->total_production_tools_cost : 0;
        $totaloperational = $totalcost ? $totalcost->total_operationals_cost : 0;
        $totallocation = $totalcost ? $totalcost->total_locations_cost : 0;
        $totalAll = $totalperformer + $totalproductioncrew + $totalproductiontool + $totaloperational + $totallocation;

        return view('requestbudget.program.preview', [
            'budget' => $requestbudget->budget,
            'totallocation' => $totallocation,
            'totaloperational' => $totaloperational,
            'totalproductiontool' => $totalproductiontool,
            'totalproductioncrew' => $totalproductioncrew,
            'totalperformer' => $totalperformer,
            'totalAll' => $totalAll,
            'id' => $id,
            'requestbudget' => $requestbudget
        ]);
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

        // Fetch the approvals for the request budget
        $approvals = Approval::where('request_budget_id', $id)->get()->keyBy('stage');

        // Total cost of all categories
        $approval1 = Employee::findOrFail(120017081704);
        $approval2 = Employee::findOrFail(120021071261);
        $reviewer = Employee::findOrFail(220017110117);
        $hc = Employee::findOrFail(220017110117);
        $pdf = Pdf::loadView('report.view', ['budget' => $requestbudget->budget], compact('approvals', 'approval1', 'approval2', 'reviewer', 'requestbudget', 'performer', 'productioncrew', 'productiontool', 'operational', 'location', 'totalAll', 'totalRepCrewCounts', 'totalRepPerformerCounts', 'totalperformer', 'totalproductioncrew', 'totalproductiontool', 'totaloperational', 'totallocation'));
        // Mengatur format kertas menjadi lanskap
        $pdf->setPaper('LEGAL', 'landscape');
        return $pdf->stream('document.pdf');
    }

    public function destroy($id)
    {
        // try {
        //     Log::info('Attempting to delete request budget with ID: ' . $id);

        //     // Fetch the existing request budget
        //     $requestBudget = RequestBudget::findOrFail($id);

        //     // Delete the request budget
        //     $requestBudget->delete();

        //     Log::info('Request budget deleted successfully');

        //     return redirect()->route('requestbudget.program.index')->with('success', 'Request budget and all associated records deleted successfully!');
        // } catch (QueryException $e) {
        //     Log::error('Error deleting request budget: ' . $e->getMessage());

        //     // Handle constraint violation exception
        //     return redirect()->route('requestbudget.program.index')->with('error', 'Cannot delete budget. It has associated records.');
        // }\

        // Find the RequestBudget by its ID
        $requestBudget = RequestBudget::findOrFail($id);

        // Optionally, you can add conditions here to prevent deletion if approved/rejected.
        if ($requestBudget->isApproved && !$requestBudget->isRejected) {
            return redirect()->back()->with('error', 'You cannot delete an approved request.');
        }

        // Deleting related records if needed (e.g., approvals, costs)
        $requestBudget->performer()->delete();
        $requestBudget->productionCrew()->delete();
        $requestBudget->productionTool()->delete();
        $requestBudget->operational()->delete();
        $requestBudget->location()->delete();
        $requestBudget->approval()->delete();
        $requestBudget->totalCost()->delete();

        // Delete the RequestBudget itself
        $requestBudget->delete();

        // Redirect after deletion
        return redirect()->route('request-budget.index')->with('success', 'Request Budget deleted successfully.');
    }
}
