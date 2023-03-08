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
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body pb-3">
                <span class="text-uppercase">Total Attendance Today</span>
                @php
                    $total_attendance = \App\Models\Attendance::whereDate('created_at', \Carbon\Carbon::today())->count();
                @endphp
                <h4 class="mb-0 mt-2">{{ $total_attendance }} <i class="fa fa-level-up font-12"></i></h4>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body pb-3">
                <span class="text-uppercase">Total Employee's</span>
                <h4 class="mb-0 mt-2">
                    @php
                        $total_employee = \App\Models\User::where('role_id', 5)->count();
                    @endphp
                    {{ $total_employee }} <i class="fa fa-level-up font-12"></i>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card number-chart">
            <div class="body pb-3">
                <span class="text-uppercase">TIME ON SITE</span>
                <h4 class="mb-0 mt-2">1,070</h4>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix row-deck">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>Google Analytics Dashboard</h2>
            </div>
            <div class="body">
                <div id="Google-Analytics-Dashboard" style="height: 230px; max-height: 230px; position: relative;" class="c3">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix row-deck">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header d-flex justify-content-between align-items-center">
                <h2>Today's Attendance Log</h2>
                <a href="{{ route('admin.attendance.index') }}" class="btn btn-outline-info">View Details</a>
            </div>
            <div class="body">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Punch In At</th>
                            <th>Punch Out At</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\Attendance::whereDate('created_at', \Carbon\Carbon::today())->get() as $attendance)
                            <tr>
                                <td>{{ $attendance->employee->name }}</td>
                                <td>{{ $attendance->in_time }}</td>
                                <td>{{ $attendance->out_time }}</td>
                                <td>
                                    @if ($attendance->status == 1)
                                        <span class="badge badge-success">Present</span>
                                    @elseif($attendance->status == 6)
                                        <span class="badge badge-warning">Late</span>
                                    @else
                                        <span class="badge badge-danger">Absent</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection