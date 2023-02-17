<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'user_id',
        'department_id',
        'designation_id',
        'team_lead_id',
        'temporary_role',
        'monthly_salary',
        'awards_won',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(EmployeeRole::class , 'designation_id', 'id');
    }

    public function teamLead()
    {
        return $this->belongsTo(User::class, 'team_lead_id', 'id');
    }

    public function temporaryRole()
    {
        return $this->belongsTo(RoleManager::class, 'temporary_role', 'id');
    }

    public function getJoiningDateAttribute($value)
    {
        return date('M d, Y', strtotime($value));
    }

}
