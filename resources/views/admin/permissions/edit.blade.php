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
            <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-permission"><i class="fa fa-plus"></i> Add New</button>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('permissions.update', $permissionManager) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">Select Role</option>
                                    @foreach(\App\Models\RoleManager::all() as $role)
                                    <option value="{{ $role->id }}" @if($permissionManager->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            
                        </div>
                    </div>
                    <div class="row">
                        @php
                        $columns = [
                        'Employee',
                        'Attendance',
                        'Holiday',
                        'Company Policy',
                        'Launch',
                        'Leaves',
                        'Departments',
                        'Payroll',
                        'Accounts',
                        'Task Management',
                        'Report',
                        'Administration',
                        ];
                        $types = [
                        'Read',
                        'Create',
                        'Update',
                        'Delete',
                        ];
                        @endphp

                        @foreach($columns as $column)
                        <div class="col-md-12">
                            <label for="title">{{$column}} Management</label>
                        </div>
                        @foreach($types as $type)
                        <div class="col-md-3">
                            <div class="form-group">
                                @php $cl_name = (str_contains($column, ' ')) ? str_replace(' ', '_', strtolower($column)) : strtolower($column) .'_'. strtolower($type); @endphp
                                <label for="{{$cl_name}}">{{$type}} Access</label>
                                <select name="{{$cl_name}}" id="{{$cl_name}}" class="form-control">
                                    <option value="">Choose an option</option>
                                    <option value="1" @if($permissionManager[$cl_name] == 1) selected @endif>Granted</option>
                                    <option value="0" @if($permissionManager[$cl_name] == 0) selected @endif>Rejected</option>
                                </select>
                                @error('{{$cl_name}}')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection