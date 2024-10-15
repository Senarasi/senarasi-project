<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentRequestPayment extends Model
{
    use HasFactory;

    protected $primaryKey = 'department_request_payment_id';

    protected $fillable = [

        'department_request_payment_number',
        'department_monthly_budget_id',
        'employee_id',
        'date',
        'paid_to',
        'paid_via',
        'bank_name',
        'account_name',
        'account_number',
        'document_number',
        'file_invoice',
        'note',
        'manager_id',
        'finance_id',
        'total_cost',

    ];

    public function user()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function departmentMonthlyBudget()
    {
        return $this->belongsTo(DepartmentMonthlyBudget::class, 'department_monthly_budget_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function finance()
    {
        return $this->belongsTo(Employee::class, 'finance_id');
    }

    public function departmentRequestPaymentItems()
    {
        return $this->hasMany(DepartmentRequestPaymentItem::class, 'department_request_payment_id');
    }

    public function DepartmentPaymentApprovals()
    {
        return $this->hasMany(DepartmentPaymentApproval::class, 'department_request_payment_id' );
    }

    public function fileDocument()
    {
        return Storage::url($this->file_invoice);
    }


}
