<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\DepartmentRequestPayment;
use App\Mail\DepartmentRequestPayment\FinanceNotification;
use App\Mail\DepartmentRequestPayment\ApprovedNotification;
use App\Mail\DepartmentRequestPayment\RejectedNotification;

class DepartmentPaymentApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Dapatkan ID user yang sedang login
        $userId = Auth::user()->employee_id; // atau Auth::user()->id;

        // $departmentRequestPayments = DepartmentRequestPayment::where(function ($query) use ($userId) {
        //     $query->where('manager_id', $userId)
        //           ->orWhere('finance_id', $userId);
        // })
        // ->whereHas('departmentPaymentApprovals')
        // ->get();

        $departmentRequestPayments = DepartmentRequestPayment::where(function ($query) use ($userId) {
            $query->where('manager_id', $userId)
                  ->orWhere('finance_id', $userId);
        })
        ->whereHas('departmentPaymentApprovals', function($query) {
            // Kondisi untuk stage 'manager' dan 'finance' dengan status selain 'approved'
            $query->where(function($query) {
                $query->where('stage', 'manager')
                      ->where('status', '!=', 'approved');
            })
            ->orWhere(function($query) {
                $query->where('stage', 'finance')
                      ->where('status', '!=', 'approved');
            });
        })
        ->get();

        return view('approval.department.payment.index', compact('departmentRequestPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function detail(DepartmentRequestPayment $departmentRequestPayment)
    {
        $items = $departmentRequestPayment->departmentRequestPaymentItems;

        // Get approval statuses
        $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'manager')->first()->status ?? null;
        $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'finance')->first()->status ?? null;
        // Determine if each approval stage is allowed
        $canApproveManager = true; // Manager can always approve
        $canApproveFinance = $managerApproval === 'approved';

        return view('approval.department.payment.detail', compact(
            'departmentRequestPayment',
            'items',
            'canApproveManager',
             'canApproveFinance',
             'managerApproval',
              'financeApproval' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function approve(Request $request, DepartmentRequestPayment $departmentRequestPayment)
    {
        $currentStage = $this->determineStage($departmentRequestPayment);

        // Find the current stage approval
        $approval = $departmentRequestPayment->departmentPaymentApprovals->where('stage', $currentStage)->first();

        if ($approval->stage === 'manager' && $approval->status === 'pending') {
            // Approve the current stage
            $approval->status = 'approved';
            $approval->save();

            $pdf = $this->report($departmentRequestPayment->department_request_payment_id)->output();

            // $finance = $departmentRequestPayment->finance;

            // if ($finance && $finance->email) {
            //     Mail::to($finance->email)->send(new FinanceNotification(
            //         $departmentRequestPayment,
            //         $pdf, // Attach the PDF report
            //     ));
            // }


            $finance = 'test-notif-senarasi@narasi.tv';
            Mail::to($finance)->send(new FinanceNotification(
                $departmentRequestPayment,
                $pdf, // Attach the PDF report
            ));

            return redirect()->back()->with('status', 'Request payment has been succcessfully approved.');
        } elseif ($approval->stage === 'finance' && $approval->status === 'pending') {
            $approval->status = 'approved';
            $approval->save();

            $departmentMonthlyBudget = $departmentRequestPayment->departmentMonthlyBudget;
            if($departmentMonthlyBudget) {
                $departmentMonthlyBudget->remaining_budget -= $departmentRequestPayment->total_cost;
                $departmentMonthlyBudget->save();
            }

            $departmentYearlyBudget = $departmentRequestPayment->departmentMonthlyBudget->departmentYearlyBudget;
            if($departmentYearlyBudget) {
                $departmentYearlyBudget->remaining_budget -= $departmentRequestPayment->total_cost;
                $departmentYearlyBudget->save();
            }

            $pdf = $this->report($departmentRequestPayment->department_request_payment_id)->output();

            Mail::to($departmentRequestPayment->user->email)->send(new ApprovedNotification(
                $departmentRequestPayment,
                $pdf, // Attach the PDF report
            ));

            return redirect()->back()->with('status', 'Request payment has been succcessfully approved.');

        }

        return redirect()->back()->with('error', 'Approval not found or already processed.');
    }

    public function reject(Request $request, DepartmentRequestPayment $departmentRequestPayment)
    {

        $note = $request->input('note');

        $currentStage = $this->determineStage($departmentRequestPayment);

        // Find the current stage approval
        $currentApproval = $departmentRequestPayment->departmentPaymentApprovals->where('stage', $currentStage)->first();

        if ($currentApproval && $currentApproval->status === 'pending') {
            // Approve the current stage
            $currentApproval->status = 'rejected';
            $currentApproval->note = $note;
            $currentApproval->save();


            $stages = ['manager', 'finance'];
            $currentStageIndex = array_search($currentStage, $stages);
            if ($currentStageIndex !== false) {
                for ($i = $currentStageIndex + 1; $i < count($stages); $i++) {
                    $nextApproval = $departmentRequestPayment->departmentPaymentApprovals->where('stage', $stages[$i])->first();
                    if ($nextApproval && $nextApproval->status === 'pending') {
                        $nextApproval->status = 'rejected';
                        $nextApproval->note = null; // No notes for subsequent rejections
                        $nextApproval->save();
                    }
                }
            }

            $pdf = $this->report($departmentRequestPayment->department_request_payment_id)->output();

            // Get the name of the current approver
            $approverName = $currentApproval->user->name;
            $rejectNotes = $currentApproval->note;

            // Send email notification
            Mail::to($departmentRequestPayment->user->email)->send(new RejectedNotification(
                $departmentRequestPayment,
                $pdf, // Attach the PDF report
                $approverName,
                $rejectNotes // Include the approver's name
            ));

            return redirect()->back()->with('status', 'Request has been rejected and notes saved.');
        } else {
            return redirect()->back()->with('error', 'Approval record not found or already processed.');
        }
    }


    private function determineStage($departmentRequestPayment)
    {
        if (Auth::id() == $departmentRequestPayment->manager_id) {
            return 'manager';
        } elseif (Auth::id() == $departmentRequestPayment->finance_id) {
            return 'finance';
        }
        return null;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function report($id)
    {
        $departmentRequestPayment = DepartmentRequestPayment::findOrFail($id);
        $items = $departmentRequestPayment->departmentRequestPaymentItems;
        $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'manager')->first();
        $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'finance')->first();

        $pdf = Pdf::loadView('report.department.payment.view', compact('departmentRequestPayment', 'items', 'managerApproval', 'financeApproval'));
        // Mengatur format kertas menjadi lanskap
        $pdf->setPaper('LEGAL', 'landscape');
        // $fileName = 'Department_Request_Payment_' . $departmentRequestPayment->department_request_payment_number. '.pdf';
        return $pdf;
    }
}
