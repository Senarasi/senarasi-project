<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DepartmentYearlyBudget;
use App\Models\DepartmentMonthlyBudget;
use Illuminate\Support\Facades\Storage;
use App\Models\DepartmentRequestPayment;
use App\Http\Requests\DepartmentRequestPaymentRequest;

class DepartmentRequestPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmentRequestPayments = DepartmentRequestPayment::all();
        return view('requestbudget.budgetdepartment.payment.index', compact('departmentRequestPayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $departmentMonthlyBudgets = DepartmentMonthlyBudget::all();
        $departmentYearlyBudgets = DepartmentYearlyBudget::all();

        return view('requestbudget.budgetdepartment.payment.create', compact('departments', 'departmentMonthlyBudgets', 'departmentYearlyBudgets'));


    }

    public function getBudgetNames($department_id)
    {
        // Query untuk mendapatkan budget name berdasarkan department_id
        $budgets = DepartmentYearlyBudget::where('department_id', $department_id)->get();
        return response()->json($budgets);
    }

    public function getBudgetCode(Request $request)
    {
        $budgetId = $request->input('department_yearly_budget_id');
        $month = $request->input('month');

        // Query to retrieve the budget code based on budget_id and month
        $budget = DepartmentMonthlyBudget::where('department_yearly_budget_id', $budgetId)->where('month', $month)->first();

        if ($budget) {
            return response()->json([
                'department_monthly_budget_id' => $budget->department_monthly_budget_id,
                'budget_code' => $budget->budget_code,
            ]);
        }

        return response()->json([
            'budget_code' => 'DATA NOT FOUND',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequestPaymentRequest $request)
    {
        $data = $request->validated();
        $data['employee_id'] = auth()->id();

        // Retrieve the manager_id (for example, if the manager is associated with the authenticated user)
        $user = auth()->user();

        // Assuming you have a 'manager_id' field on the User model
        if ($user->manager_id) {
            $data['manager_id'] = $user->manager_id;
        } else {
            // Handle cases where there's no manager assigned, or you could set it to null
            $data['manager_id'] = null;  // Or throw an error if manager is required
        }
        $data['finance_id'] = '5';

        if ($request->hasFile('file_invoice')) {
            $file = $request->file('file_invoice');

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            $extension = $file->getClientOriginalExtension();

            $folder = 'uploads/file_invoice';

            $filenameToStore = $filename . '.' . $extension;

            $counter = 1;
            while (Storage::exists($folder . '/' . $filenameToStore)) {
                $filenameToStore = $filename . ' (' . $counter . ').' . $extension;
                $counter++;
            }

            $file_invoice = $file->storeAs($folder, $filenameToStore);
            $data['file_invoice'] = $file_invoice;
           }

        // Generate the unique request number
        // $currentYear = date('Y'); // Get the current year
        // $currentMonth = date('m'); // Get the current month

        // // Fetch the maximum serial number for the current month and year
        // $lastRequest = DepartmentRequestPayment::whereYear('created_at', $currentYear)
        //     ->whereMonth('created_at', $currentMonth)
        //     ->orderBy('department_request_payment_number', 'desc')
        //     ->first();

        // $lastSerialNumber = 0;
        // if ($lastRequest) {
        //     // Extract the serial number part from the last request number
        //     if (preg_match('/\d{3}(?=-\d{2}-' . $currentYear . '$)/', $lastRequest->department_request_payment_number, $matches)) {
        //         $lastSerialNumber = intval($matches[0]);
        //     }
        // }

        // // Increment the serial number
        // $newSerialNumber = $lastSerialNumber + 1;

        // // Format the new request number
        // $requestNumber = sprintf('NRS-PR-%03d-%02d-%d', $newSerialNumber, $currentMonth, $currentYear);

        // // Add the request number to the validated data
        // $data['department_request_payment_number'] = $requestNumber;

        $data['department_request_payment_number'] = $this->generateRequestNumber();

        $departmentRequestPayment = DepartmentRequestPayment::create($data);

        return redirect()->route('request-budget-department.payment.description', $departmentRequestPayment->department_request_payment_id);
    }


    public function description(DepartmentRequestPayment $departmentRequestPayment)
    {
        return view('requestbudget.budgetdepartment.payment.description', compact('departmentRequestPayment'));
    }


    /**
     * Display the specified resource.
     */
    public function detail(DepartmentRequestPayment $departmentRequestPayment)
    {
        $items = $departmentRequestPayment->departmentRequestPaymentItems;
        return view('requestbudget.budgetdepartment.payment.detail', compact('departmentRequestPayment','items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DepartmentRequestPayment $departmentRequestPayment)
    {

        $departments = Department::all();
        $departmentMonthlyBudgets = DepartmentMonthlyBudget::all();
        $departmentYearlyBudgets = DepartmentYearlyBudget::all();
        return view('requestbudget.budgetdepartment.payment.edit', compact('departmentRequestPayment', 'departments', 'departmentMonthlyBudgets', 'departmentYearlyBudgets' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequestPaymentRequest $request, DepartmentRequestPayment $departmentRequestPayment)
    {
        $data = $request->validated();
        $data['user_id'] = $departmentRequestPayment->user_id;
        $data['department_request_payment_number'] = $departmentRequestPayment->department_request_payment_number;
        $data['manager_id'] = $departmentRequestPayment->manager_id;
        $data['finance_id'] = $departmentRequestPayment->finance_id;

        if ($request->hasFile('file_invoice')) {

            if ($departmentRequestPayment->file_invoice && Storage::exists($departmentRequestPayment->file_invoice)) {
                Storage::delete($departmentRequestPayment->file_invoice);
            }

            $file = $request->file('file_invoice');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $folder = 'uploads/file_invoice';
            $filenameToStore = $filename . '.' . $extension;

            $counter = 1;
            while (Storage::exists($folder . '/' . $filenameToStore)) {
                $filenameToStore = $filename . ' (' . $counter . ').' . $extension;
                $counter++;
            }

            // Simpan file baru dengan nama yang unik
            $file_invoice = $file->storeAs($folder, $filenameToStore);
            $data['file_invoice'] = $file_invoice;
        }

        $departmentRequestPayment->update($data);
        return redirect()->route('request-budget-department.payment.description', $departmentRequestPayment->department_request_payment_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DepartmentRequestPayment $departmentRequestPayment)
    {
        if ($departmentRequestPayment->file_invoice && Storage::exists($departmentRequestPayment->file_invoice)) {
            // Hapus file_invoice dari storage
            Storage::delete($departmentRequestPayment->file_invoice);
        }
        $departmentRequestPayment->delete();

        return redirect()->route('request-budget-department.payment.index')->with('status', 'Request payment has been successfully deleted!');
    }


    public function viewPdf(DepartmentRequestPayment $departmentRequestPayment)
    {

        $items = $departmentRequestPayment->departmentRequestPaymentItems;
        $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'manager')->first();
        $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'finance')->first();

        $pdf = Pdf::loadView('requestbudget.budgetdepartment.payment.view', compact('departmentRequestPayment', 'items', 'managerApproval', 'financeApproval'));
        // Mengatur format kertas menjadi lanskap
        $pdf->setPaper('LEGAL', 'landscape');
        $fileName = 'Department_Request_Payment_' . $departmentRequestPayment->department_request_payment_number. '.pdf';
        return $pdf->stream($fileName);

        // return view('requestbudget.budgetdepartment.payment.viewpdf',compact('departmentRequestPayment', 'items'));
    }

    public function exportPdf(DepartmentRequestPayment $departmentRequestPayment)
    {

        $items = $departmentRequestPayment->departmentRequestPaymentItems;
        $managerApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'manager')->first();
        $financeApproval = $departmentRequestPayment->DepartmentPaymentApprovals->where('stage', 'finance')->first();

        $pdf = Pdf::loadView('requestbudget.budgetdepartment.payment.view', compact('departmentRequestPayment', 'items', 'managerApproval', 'financeApproval'));
        // Mengatur format kertas menjadi lanskap
        $pdf->setPaper('LEGAL', 'landscape');
        $fileName = 'Department_Request_Payment_' . $departmentRequestPayment->department_request_payment_number. '.pdf';
        return $pdf->download($fileName);
    }


    public function duplicate(DepartmentRequestPayment $departmentRequestPayment)
    {
        // Duplikasi DepartmentRequestPayment
        $newDepartmentRequestPayment = $departmentRequestPayment->replicate(); // clone data utama
        $newDepartmentRequestPayment->created_at = now(); // ubah waktu pembuatan
        $newDepartmentRequestPayment->updated_at = now();
        $newDepartmentRequestPayment->department_request_payment_number = $this->generateRequestNumber();

        // Handle file duplication
        if ($departmentRequestPayment->file_invoice) {
            $originalFilePath = $departmentRequestPayment->file_invoice; // Original file path
            $fileExtension = pathinfo($originalFilePath, PATHINFO_EXTENSION); // Get file extension
            $fileName = pathinfo($originalFilePath, PATHINFO_FILENAME); // Get file name without extension

            // Create new file name to avoid overwriting
            $newFileName = $fileName . '_copy_' . time() . '.' . $fileExtension;
            $newFilePath = 'uploads/file_invoice/' . $newFileName;

            // Copy the original file to a new location with a new name
            if (Storage::exists($originalFilePath)) {
                Storage::copy($originalFilePath, $newFilePath); // Copy file
                $newDepartmentRequestPayment->file_invoice = $newFilePath; // Assign new file path to the duplicated record
            }
        }
        $newDepartmentRequestPayment->save(); // Simpan data baru

        // Duplikasi Items terkait
        foreach ($departmentRequestPayment->departmentRequestPaymentItems as $item) {
            $newItem = $item->replicate(); // clone data item
            $newItem->department_request_payment_id = $newDepartmentRequestPayment->department_request_payment_id; // Hubungkan item ke request yang baru
            $newItem->save(); // Simpan item baru
        }

        return redirect()->route('request-budget-department.payment.edit', $newDepartmentRequestPayment->department_request_payment_id)->with('status', 'Department Request Payment has been successfully duplicated.');
    }


    public function generateRequestNumber()
    {
        $currentYear = date('Y'); // Dapatkan tahun saat ini
        $currentMonth = date('m'); // Dapatkan bulan saat ini

        // Ambil serial number tertinggi untuk bulan dan tahun saat ini
        $lastRequest = DepartmentRequestPayment::whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->orderBy('department_request_payment_number', 'desc')
            ->first();

        $lastSerialNumber = 0;
        if ($lastRequest) {
            // Ekstrak bagian nomor seri dari nomor permintaan terakhir
            if (preg_match('/\d{3}(?=-\d{2}-' . $currentYear . '$)/', $lastRequest->department_request_payment_number, $matches)) {
                $lastSerialNumber = intval($matches[0]);
            }
        }

        // Tambahkan nomor serial baru
        $newSerialNumber = $lastSerialNumber + 1;

        // Format nomor permintaan yang baru
        return sprintf('NRS-PR-%03d-%02d-%d', $newSerialNumber, $currentMonth, $currentYear);
    }
    }
