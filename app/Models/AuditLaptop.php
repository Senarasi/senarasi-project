<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLaptop extends Model
{

    protected $primaryKey = 'audit_laptop_id';

    protected $casts = [
        'user_image' => 'array',
    ];
    use HasFactory;
    protected $fillable = [
        'employee_id', 'laptop_number', 'laptop_type', 'serial_number',
        'no_asset', 'processor', 'processor_other',
        'ram', 'ram_other',
        'ssd', 'ssd_other',
        'battery_current_capacity', 'battery_design_capacity',
        'audit_status', // Add audit status to fillable
        'charger', 'charger_reason',
        'lcd', 'lcd_reason',
        'keyboard', 'keyboard_reason',
        'body', 'body_reason',
        'speaker', 'speaker_reason',
        'camera', 'camera_reason',
        'other', 'user_image'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
