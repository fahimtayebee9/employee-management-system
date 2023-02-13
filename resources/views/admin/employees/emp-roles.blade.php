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
                    Designations
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-designations"><i class="fa fa-plus"></i> Add New</button>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>Designations List</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">
                        
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @if(!empty($employeeRoles))
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Assigned To</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- foreach loop for departments --}}

                            @foreach($employeeRoles as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->assigned_to }}</td>
                                <td>
                                    <button type="button" data-toggle="modal" type="button" data-target="#md-edit-designations-{{ Illuminate\Support\Str::slug($item->name) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm js-sweetalert" data-element-id="md-delete-designations-{{ Illuminate\Support\Str::slug($item->name) }}" data-type="confirm" id="md-delete-designations-{{ Illuminate\Support\Str::slug($item->name) }}"><i class="fa fa-trash"></i></button>
                                    <input type="hidden" class="md-delete-designations-{{ Illuminate\Support\Str::slug($item->name) }}" name="dlt_department_id" value="{{ $item->id }}">
                                    @include("admin.includes.modals.md-edit-designations")
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

@include("admin.includes.modals.md-create-designations")

@endsection