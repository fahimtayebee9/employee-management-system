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
                    Departments
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-department"><i class="fa fa-plus"></i> Add New</button>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>Departments List</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">
                        
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @if(!empty($departments))
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
                                <th>Description</th>
                                <th>Assigned To</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- foreach loop for departments --}}

                            @foreach($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->description }}</td>
                                <td>{{ $department->assigned_to }}</td>
                                <td>
                                    <button type="button" data-toggle="modal" type="button" data-target="#md-edit-department-{{ Illuminate\Support\Str::slug($department->name) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm js-sweetalert" data-element-id="md-delete-department-{{ Illuminate\Support\Str::slug($department->name) }}" data-type="confirm" id="md-delete-department-{{ Illuminate\Support\Str::slug($department->name) }}"><i class="fa fa-trash"></i></button>
                                    <input type="hidden" class="md-delete-department-{{ Illuminate\Support\Str::slug($department->name) }}" name="dlt_department_id" value="{{ $department->id }}">
                                    @include("admin.includes.modals.md-edit-department")
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">No Departments Found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include("admin.includes.modals.md-create-department")

@endsection