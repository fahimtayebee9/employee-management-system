<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionManagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        /**
         * @var array<string, mixed>
         *  role_id
         *  permission_read
         *  permission_create
         *  permission_update
         *  permission_delete
         */
        return [
            'role_id' => 'required',
            'employee_read' => "nullable|in:0,1",
            'employee_create' => "nullable|in:0,1",
            'employee_update' => "nullable|in:0,1",
            'employee_delete' => "nullable|in:0,1",
            'attendance_read' => "nullable|in:0,1",
            'attendance_create' => "nullable|in:0,1",
            'attendance_update' => "nullable|in:0,1",
            'attendance_delete' => "nullable|in:0,1",
            'holiday_read' => "nullable|in:0,1",
            'holiday_create' => "nullable|in:0,1",
            'holiday_update' => "nullable|in:0,1",
            'holiday_delete' => "nullable|in:0,1",
            'company_policy_read' => "nullable|in:0,1",
            'company_policy_create' => "nullable|in:0,1",
            'company_policy_update' => "nullable|in:0,1",
            'company_policy_delete' => "nullable|in:0,1",
            'launch_read' => "nullable|in:0,1",
            'launch_create' => "nullable|in:0,1",
            'launch_update' => "nullable|in:0,1",
            'launch_delete' => "nullable|in:0,1",
            'leaves_read' => "nullable|in:0,1",
            'leaves_create' => "nullable|in:0,1",
            'leaves_update' => "nullable|in:0,1",
            'leaves_delete' => "nullable|in:0,1",
            'departments_read' => "nullable|in:0,1",
            'departments_create' => "nullable|in:0,1",
            'departments_update' => "nullable|in:0,1",
            'departments_delete' => "nullable|in:0,1",
            'accounts_read' => "nullable|in:0,1",
            'accounts_create' => "nullable|in:0,1",
            'accounts_update' => "nullable|in:0,1",
            'accounts_delete' => "nullable|in:0,1",
            'payroll_read' => "nullable|in:0,1",
            'payroll_create' => "nullable|in:0,1",
            'payroll_update' => "nullable|in:0,1",
            'payroll_delete' => "nullable|in:0,1",
            'report_read' => "nullable|in:0,1",
            'report_create' => "nullable|in:0,1",
            'report_update' => "nullable|in:0,1",
            'report_delete' => "nullable|in:0,1",
            'task_management_read' => "nullable|in:0,1",
            'task_management_create' => "nullable|in:0,1",
            'task_management_update' => "nullable|in:0,1",
            'task_management_delete' => "nullable|in:0,1",
            'administration_read' => "nullable|in:0,1",
            'administration_create' => "nullable|in:0,1",
            'administration_update' => "nullable|in:0,1",
            'administration_delete' => "nullable|in:0,1",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'role_id.required' => 'Role is required',
            'permission_read.required' => 'Read Permission is required',
            'permission_read.integer' => 'Read Permission must be an integer',
            'permission_create.required' => 'Create Permission is required',
            'permission_create.integer' => 'Create Permission must be an integer',
            'permission_update.required' => 'Update Permission is required',
            'permission_update.integer' => 'Update Permission must be an integer',
            'permission_delete.required' => 'Delete Permission is required',
            'permission_delete.integer' => 'Delete Permission must be an integer',
        ];
    }
}
