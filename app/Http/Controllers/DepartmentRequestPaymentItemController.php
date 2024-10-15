<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Models\DepartmentMonthlyBudget;
use App\Models\DepartmentRequestPayment;
use App\Models\DepartmentPaymentApproval;
use App\Models\DepartmentRequestPaymentItem;
use App\Http\Requests\DepartmentRequestPaymentItemRequest;
use App\Mail\DepartmentRequestPayment\ManagerNotification;

class DepartmentRequestPaymentItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DepartmentRequestPayment $departmentRequestPayment)
    {
        $items = $departmentRequestPayment->departmentRequestPaymentItems;

        // Menghitung total amount dari semua item
        $totalAmount = $items->sum('amount');
        return view('requestbudget.budgetdepartment.payment.description', compact('items', 'departmentRequestPayment', 'totalAmount'));
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
    public function store(DepartmentRequestPaymentItemRequest $request)
    {
        $data = $request->validated();
        DepartmentRequestPaymentItem::create($data);
        return redirect()->back()->with('status', 'Item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(DepartmentRequestPaymentItemRequest $request, DepartmentRequestPaymentItem $item)
    {
        $data = $request->validated();
        $item->update($data);
        return redirect()->back()->with('status', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepartmentRequestPaymentItem $item)
    {
        $item->delete();
        return redirect()->back()->with('status', 'Item deleted successfully!');
    }


    public function submit(Request $request, DepartmentRequestPayment $departmentRequestPayment)
    {
        $totalCost =  $request->input('total_cost');

        // Cari budget bulanan berdasarkan department_monthly_budget_id yang ada di DepartmentRequestPayment
        $monthlyBudget = $departmentRequestPayment->departmentMonthlyBudget;

         // Validasi apakah totalCost lebih besar dari remaining_budget
        if ($totalCost > $monthlyBudget->remaining_budget) {
            // Jika total cost melebihi remaining budget, kembalikan error
            return redirect()->back()->withErrors("Total cost exceeds the remaining budget for this month. Remaining budget: Rp " . number_format($monthlyBudget->remaining_budget, 0));
        }


        $departmentRequestPayment->update(['total_cost' => $totalCost]);

        $approverIds = [
            'manager' => $departmentRequestPayment->manager_id, // Example: Employee ID for manager
            'finance' => $departmentRequestPayment->finance_id, // Example: Employee ID for reviewer

        ];

        // Create approval stages
        foreach ($approverIds as $stage => $userId) {
            // Validate stage to prevent check constraint violation
            if (!in_array($stage, ['manager',  'finance'])) {
                continue; // Skip invalid stages
            }

            DepartmentPaymentApproval::updateOrCreate(
                [
                    'department_request_payment_id' => $departmentRequestPayment->department_request_payment_id,
                    'employee_id' => $userId,
                    'stage' => $stage,
                ],
                [
                    'status' => 'pending',
                    'note' => null,
                ]
            );

        }

         // Generate the PDF report (you can reuse the report function logic)
         $pdf = $this->report($departmentRequestPayment->department_request_payment_id)->output(); // Get the PDF output

         // Send email notification to the manager with the report attached
         $manager = $departmentRequestPayment->manager;

         if ($manager && $manager->email) {
             Mail::to($manager->email)->send(new ManagerNotification(
                 $departmentRequestPayment,
                 $pdf, // Attach the PDF report
             ));
         }

        //  $manager = 'test-notif-senarasi@narasi.tv';
        //  Mail::to($manager)->send(new ManagerNotification(
        //     $departmentRequestPayment,
        //     $pdf, // Attach the PDF report
        // ));



        return redirect()->route('request-budget-department.payment.index')->with('status', 'Request payment has been successfully submitted!');

    }


    public function mail(DepartmentRequestPayment $departmentRequestPayment)
    {
        $items = $departmentRequestPayment->departmentRequestPaymentItems;

        return view('requestbudget.budgetdepartment.payment.mail.manager-notif', compact('items', 'departmentRequestPayment'));
    }

    public function report($id)
    {
        $departmentRequestPayment = DepartmentRequestPayment::findOrFail($id);
        $items = $departmentRequestPayment->departmentRequestPaymentItems;
        $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'manager')->first();
        $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'finance')->first();

        $pdf = Pdf::loadView('requestbudget.budgetdepartment.payment.view', compact('departmentRequestPayment', 'items', 'managerApproval', 'financeApproval'));
        // Mengatur format kertas menjadi lanskap
        $pdf->setPaper('LEGAL', 'landscape');
        // $fileName = 'Department_Request_Payment_' . $departmentRequestPayment->department_request_payment_number. '.pdf';
        return $pdf;
    }
}
