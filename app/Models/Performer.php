<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    use HasFactory;
    protected $primaryKey = 'performer_id';
    protected $fillable = [
        'request_budget_id',
        'sub_description_id',
        'usage',
        'rep',
        'name',
        'day',
        'qty',
        'cost',
        'total_cost',
        'assign',
        'note',
    ];

    public function requestBudget()
    {
        return $this->belongsTo(RequestBudget::class, 'request_budget_id');
    }

    public function subDescription()
    {
        return $this->belongsTo(SubDescription::class, 'sub_description_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
