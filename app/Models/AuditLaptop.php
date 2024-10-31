<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLaptop extends Model
{
    use HasFactory;

    protected $table = 'audit_laptops';

    protected $primaryKey = 'audit_laptop_id';

    protected $casts = [
        'picture' => 'array',
    ];

    protected $fillable = [
        'employee_id',
        'laptop_number',
        'serial_number',
        'no_asset',
        'processor',
        'ram',
        'ssd',
        'charger',
        'battery',
        'layar',
        'keyboard',
        'body',
        'speaker',
        'kamera',
        'lainnya',
        'picture',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
