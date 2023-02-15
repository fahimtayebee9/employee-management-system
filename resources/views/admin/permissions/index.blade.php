@extends("admin.layouts.app")

@section("body")

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>{{ session('page_title') }}</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Administrative Permissions
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <a class="btn btn-primary" href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i> Add New</a>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    @php
                    $columns = [
                    'Employee',
                    'Attendance',
                    'Holiday',
                    'Company Policy',
                    'Launch',
                    'Leave',
                    'Departments',
                    'Payroll',
                    'Accounts',
                    'Task',
                    'Report',
                    'Administration',
                    ];
                    @endphp
                    @if(!empty($permissions_list))
                    <table class="table table-hover attendance_list">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="320px">Role</th>
                                @foreach($columns as $column)
                                <th width="240px" class="text-center">{{ $column }}</th>
                                @endforeach
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach loop for permissions -->
                            @foreach($permissions_list as $permission)
                                @if($permission->role->id != 1)
                                <tr>
                                    <td>{{ $loop->iteration -1 }}</td>
                                    <td>{{ $permission->role->name }}</td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->employee_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->employee_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->employee_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->employee_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->attendance_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->attendance_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->attendance_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->attendance_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->holiday_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->holiday_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->holiday_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->holiday_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->company_policy_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->company_policy_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->company_policy_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->company_policy_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->launch_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->launch_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->launch_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->launch_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->leaves_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->leaves_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->leaves_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->leaves_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->departments_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->departments_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->departments_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->departments_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->accounts_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->accounts_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->accounts_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->accounts_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->payroll_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->payroll_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->payroll_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->payroll_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->report_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->report_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->report_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->report_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->task_management_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->task_management_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->task_management_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->task_management_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div style="display: grid!important;">
                                            @if($permission->administration_read == 1)
                                            <p class="badge badge-success d-inline">Read <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Read <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->administration_create == 1)
                                            <p class="badge badge-success">Create <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Create <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->administration_update == 1)
                                            <p class="badge badge-success">Update <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Update <i class="icon-close text-danger"></i></p>
                                            @endif

                                            @if($permission->administration_delete == 1)
                                            <p class="badge badge-success">Delete <i class="icon-check text-success"></i></p>
                                            @else
                                            <p class="badge badge-danger">Delete <i class="icon-close text-danger"></i></p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('permissions.edit', $permission) }}"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">
                        <strong>Info!</strong> No permissions found.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection