<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DepartmentRequestPayment;

class ReportDepartmentPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmentRequestPayments = DepartmentRequestPayment::whereHas('departmentPaymentApprovals', function ($query) {
            $query->where('stage', 'manager')
                  ->where('status', 'approved');
        })
        ->whereHas('departmentPaymentApprovals', function ($query) {
            $query->where('stage', 'finance')
                  ->where('status', 'approved');
        })
        ->get();
        return view('report.department.payment.index', compact('departmentRequestPayments'));
    }

    public function viewPdf(DepartmentRequestPayment $departmentRequestPayment)
    {

        $items = $departmentRequestPayment->departmentRequestPaymentItems;
        $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'manager')->first();
        $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'finance')->first();

        $pdf = Pdf::loadView('report.department.payment.view', compact('departmentRequestPayment', 'items', 'managerApproval', 'financeApproval'));
        // Mengatur format kertas menjadi lanskap
        $pdf->setPaper('LEGAL', 'landscape');
        $fileName = 'Department_Request_Payment_' . $departmentRequestPayment->department_request_payment_number. '.pdf';
        return $pdf->stream($fileName);

        // return view('requestbudget.budgetdepartment.payment.viewpdf',compact('departmentRequestPayment', 'items'));
    }
}
