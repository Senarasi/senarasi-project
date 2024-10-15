<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'full_name',
        'email',
        'role',
        'email_verified_at',
        'password',
        'department_id',
        'position_id',
        'manager_id',
        'phone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    use HasFactory;

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function position(){
        return $this->belongsTo(Position::class, 'position_id');
    }

    // Define the relationship to itself (for manager)
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function googleToken()
    {
        return $this->hasOne(GoogleToken::class, 'employee_id');
    }

    public function departmentYearlyBudgets()
    {
        return $this->hasMany(DepartmentYearlyBudget::class);
    }

    public function departmentRequestPayments()
    {
        return $this->hasMany(DepartmentRequestPayment::class, 'employee_id');
    }
}
