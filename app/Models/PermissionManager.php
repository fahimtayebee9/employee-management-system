<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'employee_read',
        'employee_create',
        'employee_update',
        'employee_delete',
        'attendance_read',
        'attendance_create',
        'attendance_update',
        'attendance_delete',
        'holiday_read',
        'holiday_create',
        'holiday_update',
        'holiday_delete',
        'company_policy_read',
        'company_policy_create',
        'company_policy_update',
        'company_policy_delete',
        'launch_read',
        'launch_create',
        'launch_update',
        'launch_delete',
        'leaves_read',
        'leaves_create',
        'leaves_update',
        'leaves_delete',
        'departments_read',
        'departments_create',
        'departments_update',
        'departments_delete',
        'accounts_read',
        'accounts_create',
        'accounts_update',
        'accounts_delete',
        'payroll_read',
        'payroll_create',
        'payroll_update',
        'payroll_delete',
        'report_read',
        'report_create',
        'report_update',
        'report_delete',
        'task_management_read',
        'task_management_create',
        'task_management_update',
        'task_management_delete',
        'administration_read',
        'administration_create',
        'administration_update',
        'administration_delete',
    ];

    public function role()
    {
        return $this->belongsTo(RoleManager::class, 'role_id', 'id');
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
