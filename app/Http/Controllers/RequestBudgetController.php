<?php

namespace App\Http\Controllers;

use App\Models\CrewPosition;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\ItemCategory;
use App\Models\Position;
use App\Models\Program;
use App\Models\MonthlyBudget;
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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
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
        $programs = Program::orderBy('program_name', 'asc')->pluck('program_name', 'program_id');
        return view('requestbudget.create', compact('employees', 'managers', 'programs', 'producers', 'managerName', 'managerId'));
    }

    public function getMonthlyBudget(Request $request)
    {
        $programId = $request->query('program_id');
        $month = $request->query('month');

        $budget = MonthlyBudget::where('program_id', $programId)
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

    public function store(Request $request)
    {
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

        return redirect()->route('requestbudget.performer', ['id' => $requestBudget->request_budget_id]);
    }

    public function performer($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $performer_list = PerformerList::orderBy('performer_name', 'asc')->get();
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
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
        return view('requestbudget.performer', ['budget' => $requestbudget->budget], compact('performer_list', 'totallocation', 'location', 'totaloperational', 'operational', 'productiontool', 'totalproductiontool', 'productioncrew', 'totalperformer', 'totalproductioncrew', 'performer', 'requestbudget', 'employee', 'subdescription', 'id'));
    }

    public function productioncrew($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $employee = Employee::pluck('full_name', 'employee_id');
        $crew = Employee::join('positions', 'employees.position_id', '=', 'positions.position_id')
            ->where('positions.position_name', 'like', '%STUDIO%')
            ->get();
        $crewposition = CrewPosition::pluck('crew_position_name', 'crew_position_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
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
        return view('requestbudget.productioncrew', ['budget' => $requestbudget->budget], compact('crewposition', 'crew', 'totallocation', 'location', 'totaloperational', 'operational', 'productiontool', 'totalproductiontool', 'productioncrew', 'totalperformer', 'totalproductioncrew', 'performer', 'requestbudget', 'employee', 'subdescription', 'id'));
    }

    public function productiontool($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::whereNotIn('sub_description_name', ['Host/Performer/Guest', 'Internal Team NCS', 'Production Studio', 'Business Development', 'Operational', 'Sewa Lokasi'])
            ->pluck('sub_description_name', 'sub_description_id');
        $itemcategory = ItemCategory::orderBy('item_category_name', 'asc')->get();
        $itemtype = ItemType::pluck('item_type_name', 'item_type_id');
        $itemtool = ItemTool::pluck('item_tool_name', 'item_tool_id');
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
        return view('requestbudget.productiontool', ['budget' => $requestbudget->budget], compact('itemcategory', 'itemtool', 'itemtype', 'totallocation', 'location', 'totaloperational', 'operational', 'productiontool', 'totalproductiontool', 'productioncrew', 'totalperformer', 'totalproductioncrew', 'performer', 'requestbudget', 'employee', 'subdescription', 'id'));
    }

    public function operational($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
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
        return view('requestbudget.operational', ['budget' => $requestbudget->budget], compact('totallocation', 'location', 'totaloperational', 'operational', 'productiontool', 'totalproductiontool', 'productioncrew', 'totalperformer', 'totalproductioncrew', 'performer', 'requestbudget', 'employee', 'subdescription', 'id'));
    }

    public function location($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
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
        return view('requestbudget.location', ['budget' => $requestbudget->budget], compact('totallocation', 'location', 'totaloperational', 'operational', 'productiontool', 'totalproductiontool', 'productioncrew', 'totalperformer', 'totalproductioncrew', 'performer', 'requestbudget', 'employee', 'subdescription', 'id'));
    }

    public function preview($id)
    {
        $requestbudget = RequestBudget::findOrFail($id);
        $employee = Employee::pluck('full_name', 'employee_id');
        $subdescription = SubDescription::pluck('sub_description_name', 'sub_description_id');
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
        return view('requestbudget.preview', ['budget' => $requestbudget->budget], compact('totallocation', 'location', 'totaloperational', 'operational', 'productiontool', 'totalproductiontool', 'productioncrew', 'totalperformer', 'totalproductioncrew', 'performer', 'requestbudget', 'employee', 'subdescription', 'id'));
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

        // Calculate the total cost for production crews
        $totalProductionCrewCost = $productioncrew->map(function ($group) {
            return $group->sum('total_cost');
        })->sum();

        // Fetch and group production tools by sub_description_id
        $productiontool = ProductionTool::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Calculate the total cost for production tools
        $totalProductionToolCost = $productiontool->map(function ($group) {
            return $group->sum('total_cost');
        })->sum();

        // Fetch and group operational by sub_description_id
        $operational = Operational::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Calculate the total cost for operational
        $totalOperationalCost = $operational->map(function ($group) {
            return $group->sum('total_cost');
        })->sum();

        // Fetch and group location by sub_description_id
        $location = Location::with(['subDescription', 'employee'])
            ->where('request_budget_id', $id)
            ->get()
            ->groupBy('sub_description_id');

        // Calculate the total cost for location
        $totalLocationCost = $location->map(function ($group) {
            return $group->sum('total_cost');
        })->sum();

        // Total cost of all categories
        $approval1 = Employee::findOrFail(120017081704);
        $approval2 = Employee::findOrFail(120021071261);
        $reviewer = Employee::findOrFail(220017110117);
        $totalcost = $totalPerformerCost + $totalProductionCrewCost + $totalProductionToolCost + $totalOperationalCost + $totalLocationCost;
        $pdf = Pdf::loadView('report.view', ['budget' => $requestbudget->budget], compact('approval1','approval2','reviewer','requestbudget', 'performer', 'productioncrew', 'productiontool', 'operational', 'location', 'totalcost', 'totalRepCrewCounts', 'totalRepPerformerCounts'));
        // Mengatur format kertas menjadi lanskap
        $pdf->setPaper('LEGAL', 'landscape');
        return $pdf->stream('document.pdf');
    }
}
