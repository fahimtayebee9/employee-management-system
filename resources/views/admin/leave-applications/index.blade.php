@extends("admin.layouts.app")

@section("body")

<div class="block-header">
    <div class="row">
        @include('admin.includes.breadcrumb-v2')

        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <!-- <a class="btn btn-primary" href="{{ route('admin.tasks.forms.create') }}"><i class="fa fa-plus"></i> Add New Form</a> -->
        </div>
    </div>
</div>

<div class="row clearfix row-deck">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <span class="text-uppercase">New Sessions</span>
                <h4 class="mb-0 mt-2">22,500 <i class="fa fa-level-up font-12"></i></h4>
                <small class="text-muted">Analytics for last week</small>
            </div>
            <div class="sparkline" data-type="line" data-spot-radius="0" data-offset="90" data-width="100%" data-height="50px" data-line-width="1" data-line-color="#39afa6" data-fill-color="#73cec7"><canvas width="351" height="50" style="display: inline-block; width: 351.25px; height: 50px; vertical-align: top;"></canvas></div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <span class="text-uppercase">Goal Completions</span>
                <h4 class="mb-0 mt-2">1,12,500</h4>
                <small class="text-muted">Analytics for last week</small>
            </div>
            <div class="sparkline" data-type="line" data-spot-radius="0" data-offset="90" data-width="100%" data-height="50px" data-line-width="1" data-line-color="#ffa901" data-fill-color="#efc26b"><canvas width="351" height="50" style="display: inline-block; width: 351.25px; height: 50px; vertical-align: top;"></canvas></div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <span class="text-uppercase">TIME ON SITE</span>
                <h4 class="mb-0 mt-2">1,070</h4>
                <small class="text-muted">Analytics for last week</small>
            </div>
            <div class="sparkline" data-type="line" data-spot-radius="0" data-offset="90" data-width="100%" data-height="50px" data-line-width="1" data-line-color="#38c172" data-fill-color="#84d4a6"><canvas width="351" height="50" style="display: inline-block; width: 351.25px; height: 50px; vertical-align: top;"></canvas></div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body">
                <span class="text-uppercase">BOUNCE RATE</span>
                <h4 class="mb-0 mt-2">10K</h4>
                <small class="text-muted">Analytics for last week</small>
            </div>
            <div class="sparkline" data-type="line" data-spot-radius="0" data-offset="90" data-width="100%" data-height="50px" data-line-width="1" data-line-color="#226fd8" data-fill-color="#7ea7de"><canvas width="351" height="50" style="display: inline-block; width: 351.25px; height: 50px; vertical-align: top;"></canvas></div>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-col">
                        <h5 class="page-title">Leave Application</h5>
                    </div>
                    <div class="right-col w-50 d-flex justify-content-end align-items-center">
                        <div class="leave-filter mr-3 w-50">
                            <select class="form-control custom-select select2-hidden-accessible w-100" name="leave_type" id="leave-type-filter">
                                <option>Select Leave Type</option>
                                <option value="1">Full Day Paid Leave</option>
                                <option value="2">Half Day Non-Paid Leave</option>
                                <option value="3">Full Day Non-Paid Leave</option>
                            </select>
                        </div>
                        <div class="leave-filter mr-3 w-50">
                            <select class="form-control custom-select select2-hidden-accessible w-100" name="leave_type" id="leave-type-filter">
                                <option>Select Status</option>
                                <option value="1">Full Day Paid Leave</option>
                                <option value="2">Half Day Non-Paid Leave</option>
                                <option value="3">Full Day Non-Paid Leave</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0" id="tbl-leave-applications">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Employee</th>
                                <th width="15%">Leave Date </th>
                                <th>Subject</th>
                                <th>Request Date</th>
                                <th>Status</th>
                                <th >Leave Type</th>
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbd-leave-applications">
                            @foreach($leaveApplicationsList as $leave)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-flex justify-content-start align-items-center">
                                    <span>
                                        <h6 class="mb-0">{{$leave->employee->user->first_name . ' '. $leave->employee->user->last_name}}</h6>
                                        <span>ID: <b>{{$leave->employee->employee_id}}</b></span>
                                    </span>
                                </td>
                                <td>
                                    <b>{{ Carbon\Carbon::parse($leave->leave_from)->format('d M, Y') }}</b>
                                    to
                                    <b>{{ Carbon\Carbon::parse($leave->leave_to)->format('d M, Y') }}</b>
                                </td>
                                <td>{{ $leave->subject }}</td>
                                <td>{{ Carbon\Carbon::parse($leave->created_at)->format('d M, Y') }}</td>
                                <td>
                                    @if($leave->status_by_astmanager == 1 && $leave->status_by_hr == 1 )
                                    <span class="badge badge-pill badge-success">Approved</span>
                                    @elseif($leave->status_by_astmanager == 0 || $leave->status_by_hr == 0 )
                                    <span class="badge badge-pill badge-warning">Pending</span>
                                    @else
                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                    @endif
                                </td>

                                <td>
                                    @if($leave->leave_type == 1)
                                    <span class="badge badge-pill badge-success">Full Day Paid Leave</span>
                                    @elseif($leave->leave_type == 2)
                                    <span class="badge badge-pill badge-danger">Half Day Non-Paid Leave</span>
                                    @else
                                    <span class="badge badge-pill badge-warning">Full Day Non-Paid Leave</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-outline-warning">View</a>
                                    <a href="" class="btn btn-outline-danger">Delete</a>
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