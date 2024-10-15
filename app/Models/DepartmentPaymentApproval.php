<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentPaymentApproval extends Model
{
    use HasFactory;
    protected $primaryKey = 'department_payment_approval_id';

    protected $fillable = [

        'department_request_payment_id',
        'employee_id',
        'stage',

        'status',
        'note',
    ];

    public function departmentRequestPayment()
    {
        return $this->belongsTo(DepartmentRequestPayment::class, 'department_request_payment_id');
    }

    public function user()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


}
