<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DepartmentRequestPayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentRequestPaymentItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'department_request_payment_item_id';

    protected $fillable = [

        'department_request_payment_id',
        'description',
        'amount',
        'note',
    ];


    public function departmentRequestPayment()
    {
        return $this->belongsTo(DepartmentRequestPayment::class, 'department_request_payment_id');
    }

}
