@extends("employee.layouts.app")

@section("content")
<!-- mdl-leave-create -->

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-col">
                        <h5 class="page-title">Leave Application</h5>
                    </div>
                    <div class="right-col w-50 d-flex justify-content-end align-items-center">
                        <div class="leave-filter mr-3 w-50">
                            <select class="form-control custom-select select2-hidden-accessible w-100" name="leave_type" id="leave-type-filter">
                                <option>Select Type</option>
                                <option value="1">Full Day Paid Leave</option>
                                <option value="2">Half Day Non-Paid Leave</option>
                                <option value="3">Full Day Non-Paid Leave</option>
                            </select>
                        </div>
                        <a type="button" href data-toggle="modal" data-target="#mdl-apply-leave" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus" style="font-size: 10px;"></i>
                            Apply Leave
                        </a>

                        @include('employee.pages.modals.mdl-leave-create')
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Application ID</th>
                            <th width="15%">Date </th>
                            <th>Subject</th>
                            <th width="10%">Status</th>
                            <th width="10%">Leave Type</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbl-leave-applications">
                        @foreach($leaveApplicationList as $leave)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $leave->leave_id }}</td>
                            <td>
                                <b>{{ Carbon\Carbon::parse($leave->leave_from)->format('d M, Y') }}</b> 
                                to 
                                <b>{{ Carbon\Carbon::parse($leave->leave_to)->format('d M, Y') }}</b>
                            </td>
                            <td>{{ $leave->subject }}</td>
                            <td>
                                @if($leave->status_by_astmanager == 1 && $leave->status_by_hr == 1 )
                                <span class="badge badge-pill badge-success">Approved</span>
                                @elseif($leave->status == 2)
                                <span class="badge badge-pill badge-danger">Rejected</span>
                                @else
                                <span class="badge badge-pill badge-warning">Pending</span>
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
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div><!-- end row-->

@endsection