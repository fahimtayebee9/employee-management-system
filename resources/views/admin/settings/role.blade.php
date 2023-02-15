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
                    Administrative Roles
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-admin-role"><i class="fa fa-plus"></i> Add New</button>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>Administrative Roles List</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">

                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @if(!empty($roles_list))
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Shown As</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles_list as $role)
                                @if($role->id != 1)
                                <tr>
                                    <td>{{ $loop->iteration - 1  }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <!-- badge for super admin -->
                                        @if($role->name == "Super Admin")
                                        <span class="badge badge-success font-weight-bold">Super Admin</span>
                                        @elseif($role->name == "Admin")
                                        <span class="badge badge-primary font-weight-bold">Admin</span>
                                        @elseif($role->name == "Launch Manager")
                                        <span class="badge badge-warning font-weight-bold">Launch Manager</span>
                                        @endif

                                    </td>
                                    <td>
                                        <button type="button" data-toggle="modal" type="button" data-target="#md-edit-role-{{ Illuminate\Support\Str::slug($role->name) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm js-sweetalert" data-element-id="md-delete-role-{{ Illuminate\Support\Str::slug($role->name) }}" data-type="confirm" id="md-delete-role-{{ Illuminate\Support\Str::slug($role->name) }}"><i class="fa fa-trash"></i></button>
                                        <input type="hidden" class="md-delete-role-{{ Illuminate\Support\Str::slug($role->name) }}" name="dlt_department_id" value="{{ $role->id }}">

                                        @include("admin.includes.modals.md-edit-admin-role")

                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">No Administrative Roles Found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include("admin.includes.modals.md-create-admin-role")

@endsection