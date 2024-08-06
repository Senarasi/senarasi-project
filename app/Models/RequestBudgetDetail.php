<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBudgetDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'request_budget_detail_id';

    protected $fillable = [
        'request_budget_id',
        'producer_id',
        'manager_id',
        'employee_id',
        'month',
        'monthly_budget_id',
        'episode',
        'location',
        'type',
        'date_start',
        'date_end',
        'date_upload',
        'budget_code',
        'budget',
        'request_budget_number'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function producer()
    {
        return $this->belongsTo(Employee::class, 'producer_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function performer()
    {
        return $this->hasMany(Performer::class, 'request_budget_id');
    }

    public function productionCrew()
    {
        return $this->hasMany(ProductionCrew::class, 'request_budget_id');
    }

    public function productionTool()
    {
        return $this->hasMany(ProductionTool::class, 'request_budget_id');
    }

    public function operational()
    {
        return $this->hasMany(Operational::class, 'request_budget_id');
    }

    public function location()
    {
        return $this->hasMany(Location::class, 'request_budget_id');
    }

    public function monthlyBudget()
    {
        return $this->belongsTo(ProgramMonthlyBudget::class, 'monthly_budget_id');
    }

    public function approval()
    {
        return $this->hasMany(Approval::class, 'request_budget_id');
    }
}
