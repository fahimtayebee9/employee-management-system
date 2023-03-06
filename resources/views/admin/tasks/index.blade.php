@extends("admin.layouts.app")

@section("body")
<div class="block-header">
    <div class="row">
        @include('admin.includes.breadcrumb-v2')

        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <a class="btn btn-primary" href="{{ route('admin.tasks.forms.create') }}"><i class="fa fa-plus"></i> Add New Form</a>
        </div>
    </div>

    <div class="row clearfix row-deck mt-4">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card number-chart">
                <div class="body pb-3">
                    <span class="text-uppercase">TOTAL EMPLOYEES</span>
                    <h4 class="mb-0 mt-2">{{ count($employees) }}</h4>
                    <!-- <small class="text-muted">Analytics for last week</small> -->
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card number-chart">
                <div class="body pb-3">
                    <span class="text-uppercase">TASKS SUBMITTED TODAY</span>
                    <h4 class="mb-0 mt-2">
                        {{ \App\Models\TaskSubmission::whereDate('created_at', \Carbon\Carbon::today())->count() }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card number-chart">
                <div class="body pb-3">
                    <span class="text-uppercase">TOTAL TASKS FORMS</span>
                    <h4 class="mb-0 mt-2">{{ count($taskForms) }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row justify-content-between">
                    <div class="col-md-4">
                        <h2>{{ session()->get('page_title_description') }}</h2>
                    </div>
                    <div class="col-md-6">
                        <!-- filter by date, designation, status -->
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <select class="w-100 form-control custom-select select2-hidden-accessible" name="filter_by_designation" id="filter_by_designation">
                                    <option></option>
                                    @foreach($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="filter_by_date" id="filter_by_date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0" id="tbl-tasks-submissions">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Employee</th>
                                <th>Date</th>
                                <th>Tasks Completed</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tby-tasks-submissions">
                            @foreach($taskSubmissions as $item)
                                <tr class="">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="d-flex justify-content-start align-items-center">
                                        <span>
                                            <h6 class="mb-0">{{$item->employee->user->first_name . ' '.$item->employee->user->last_name}}</h6>
                                            <span>{{ $item->employee->designation->name . ' || ' . $item->employee->designation->id }}</span>
                                        </span>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->date)->format('d M, Y') }}
                                    </td>
                                    <td>
                                        @php
                                            $total_fields_count = 15;
                                            $active_fields = 0;
                                            $total_fields = 0;
                                            for($i = 1; $i <= $total_fields_count; $i++){
                                                $lkey_name = 'field_'.$i.'_label';
                                                if(!empty($item->taskForm->$lkey_name)){
                                                    $total_fields++;
                                                }
                                            }

                                            for($i = 1; $i <= $total_fields_count; $i++){
                                                $lkey_name = 'field_'.$i;
                                                if(!empty($item->$lkey_name)){
                                                    $active_fields++;
                                                }
                                            }
                                            echo $active_fields.' / '.$total_fields;
                                        @endphp
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#md-delete-holidays">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection