<?php

namespace App\Http\Controllers;

use App\models\Employee;
use App\Models\Performer;
use App\Models\ProductionCrew;
use App\Models\ProductionTool;
use App\Models\Location;
use App\Models\Operational;
use App\Models\RequestBudget;
use App\Models\SubDescription;
use App\Models\Approval;
use App\Models\History;
use App\Models\TotalCost;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestBudgetProgram\ManagerNotificationMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function download($id)
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

        // Generate the PDF
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

        // Dynamically set the file name based on request_budget_number
        $fileName = $requestbudget->request_budget_number . '_report.pdf';

        // Return the PDF file for download with dynamic file name
        return $pdf->download($fileName);
    }
}
