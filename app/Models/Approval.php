<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $primaryKey = 'approval_id';
    protected $fillable = [
        'request_budget_id',
        'employee_id',
        'stage',
        'status',
        'reason'
    ];
    protected $casts = [
        'reason' => 'array',
    ];

    public function requestBudget()
    {
        return $this->belongsTo(RequestBudget::class, 'request_budget_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}
