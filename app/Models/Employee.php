<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Employee extends Authenticatable implements CanResetPasswordContract
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'full_name',
        'email',
        'employee_status_id',
        'email_verified_at',
        'password',
        'department_id',
        'position_id',
        'manager_id',
        'phone',
        'employee_status_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function position()
    {
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

    public function access()
    {
        return $this->belongsToMany(Access::class, 'employee_access', 'employee_id', 'access_id');
    }

    public function hasRole($roles)
    {
        if (is_array($roles)) {
            return $this->access->whereIn('access_name', $roles)->isNotEmpty();
        }
        return $this->access->contains('access_name', $roles);
    }


    public function employeeStatus()
    {
        return $this->belongsTo(EmployeeStatus::class, 'employee_status_id');
    }
}
