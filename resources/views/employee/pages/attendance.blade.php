@extends("employee.layouts.app")

@section("content")


<div class="row">
    <div class="col-md-12 col-xl-4">
        <div class="card mini-stat">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-tag-text-outline"></i>
            </div>
            <div class="p-4">
                <h6 class="text-uppercase mb-3">
                    Today's Attendance
                    <small class="text-muted">{{ date('d M, Y') }}</small>
                </h6>
                @if(\App\Models\Attendance::where('employee_id', 8)->where('date', date('Y-m-d'))->exists())
                @php
                $attendance = \App\Models\Attendance::where('employee_id', 8)->where('date', date('Y-m-d'))->first();
                @endphp
                <div class="statistics mb-3">
                    <div class="row">
                        <div class="col-md-6 col-6 text-center">
                            @php
                            $statusClass = null;
                            if($attendance->status == 6){
                            $statusClass = 'stats-box-warning';
                            }elseif($attendance->status == 1){
                            $statusClass = 'stats-box-success';
                            }else{
                            $statusClass = 'stats-box-danger';
                            }
                            @endphp

                            <div class="stats-box {{ $statusClass }}">
                                <p class="font-weight-bold">Punch In</p>
                                <h6>{{ date('h:i A', strtotime($attendance->in_time)) }}</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box">
                                <p>Break</p>
                                <h6>
                                    @php
                                    $break = \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->first();

                                    $startTime = \Carbon\Carbon::parse($break->break_in);
                                    $finishTime = \Carbon\Carbon::parse($break->break_out);

                                    $totalDuration = $finishTime->diffInMinutes($startTime, true);
                                    @endphp
                                    {{ floor($totalDuration/60) }} mins
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="punch-info">
                    <div class="punch-hours">
                        <span>
                            @php
                            $startTime = \Carbon\Carbon::parse($attendance->in_time);
                            $finishTime = (!empty($attendance->out_time)) ? \Carbon\Carbon::parse($attendance->out_time) : \Carbon\Carbon::now();

                            $totalDuration = $finishTime->diffInMinutes($startTime, true);
                            @endphp
                            {{ floor($totalDuration/60) }} Hrs {{ $totalDuration%60 }} Mins
                        </span>
                    </div>
                </div>
                <div class="row">
                    @if(\App\Models\Attendance::where('id', $attendance->id)->exists() &&
                    empty(\App\Models\Attendance::where('id', $attendance->id)->where('out_time', null)->first()->out_time))
                    <div class="col-md-12">
                        <div class="alert alert-warning">
                            <p class="text-center m-0">You have already punched out at
                                <b>{{ date('h:i A', strtotime(\Carbon\Carbon::parse(\App\Models\Attendance::where('id', $attendance->id)->first()->out_time)))  }}</b>.
                            </p>
                        </div>
                    </div>
                    @else
                    <div class="col-md-6">
                        @if(\App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->where('break_out', null)->exists() &&
                        empty(\App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->where('break_out', null)->first()->break_out))
                        @if( \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->where('break_out', null)->exists() )
                        @php
                        $break = \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->where('break_out', null)->first();
                        @endphp
                        <form action="{{ route('employee.attendance.break.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="break_id" value="{{ $break->id }}">
                            <div class="punch-btn-section text-center">
                                <button type="submit" class="btn btn-success punch-btn w-100">Back In</button>
                            </div>
                        </form>
                        @else
                        <form action="{{ route('employee.attendance.break.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                            <div class="punch-btn-section text-center">
                                <button type="submit" class="btn btn-warning punch-btn w-100">Break</button>
                            </div>
                        </form>
                        @endif
                        @endif
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('employee.attendance.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="employee_id" value="8">
                            <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                            <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                            <div class="punch-btn-section text-center">
                                <button type="submit" class="btn w-100 btn-primary punch-btn w-100">Punch Out</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                @else
                <form action="{{ route('employee.attendance.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="employee_id" value="8">
                    <div class="punch-btn-section text-center">
                        <button type="submit" class="btn btn-primary punch-btn">Punch In</button>
                    </div>
                </form>
                @endif


            </div>
        </div>
    </div>
    @php
    $attendance = \App\Models\Attendance::where('employee_id', 8)->first();
    $attendanceBreaks = \App\Models\AttendanceBreak::where('attendance_id', $attendance->id)->get();
    @endphp
    <div class="col-md-12 col-xl-4">
        <div class="card mini-stat att-statistics">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-cube-outline"></i>
            </div>
            <div class="card-body">
                <h5 class="card-title">Statistics</h5>
                @php
                $companyPolicy = \App\Models\CompanyPolicy::orderby('id', 'desc')->first();
                $startTime = \Carbon\Carbon::parse($companyPolicy->office_start_time);
                $endTime = \Carbon\Carbon::parse($companyPolicy->office_end_time);
                $totalHoursDay = $startTime->diffInHours($endTime);
                $totalHoursMonth = $startTime->diffInHours($endTime) * Carbon\Carbon::now()->daysInMonth;
                $totalHoursWeek = $startTime->diffInHours($endTime) * 7;

                //get attendance details of current month for current employee
                $attendances = \App\Models\Attendance::where('employee_id', 8)->whereMonth('date', date('m'))->get();
                $totalHoursWorkedMonth = 0;
                foreach($attendances as $att){
                $attendanceBreak = \App\Models\AttendanceBreak::where('attendance_id', $att->id)->get();
                $totalBreak = 0;
                foreach($attendanceBreak as $break){
                $startTime = \Carbon\Carbon::parse($break->break_in);
                $endTime = \Carbon\Carbon::parse($break->break_out);
                $totalBreak += $startTime->diffInHours($endTime);
                }

                //calculate total hours worked in current month
                $mstartTime = \Carbon\Carbon::parse($att->in_time);
                $mendTime = \Carbon\Carbon::parse($att->out_time);
                $totalHoursWorkedMonth += $mstartTime->diffInHours($mendTime);
                $totalHoursWorkedMonth -= $totalBreak;

                //calculate total hours worked in current week
                $totalHoursWorkedWeek = 0;
                $attendancesWeek = \App\Models\Attendance::where('employee_id', 8)->whereBetween('date', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->get();
                foreach($attendancesWeek as $attWeek){
                $attendanceBreakWeek = \App\Models\AttendanceBreak::where('attendance_id', $attWeek->id)->get();
                $totalBreakWeek = 0;
                foreach($attendanceBreakWeek as $breakWeek){
                $startTime = \Carbon\Carbon::parse($breakWeek->break_in);
                $endTime = \Carbon\Carbon::parse($breakWeek->break_out);
                $totalBreakWeek += $startTime->diffInHours($endTime);
                }

                //calculate total hours worked in current week
                $wstartTime = \Carbon\Carbon::parse($attWeek->in_time);
                $wendTime = \Carbon\Carbon::parse($attWeek->out_time);
                $totalHoursWorkedWeek += $wstartTime->diffInHours($wendTime);
                $totalHoursWorkedWeek -= $totalBreakWeek;
                }

                //calculate total hours worked in current day
                $totalHoursWorkedDay = 0;
                $attendancesDay = \App\Models\Attendance::where('employee_id', 8)->where('date', date('Y-m-d'))->get();
                foreach($attendancesDay as $attDay){
                $attendanceBreakDay = \App\Models\AttendanceBreak::where('attendance_id', $attDay->id)->get();
                $totalBreakDay = 0;
                foreach($attendanceBreakDay as $breakDay){
                $startTime = \Carbon\Carbon::parse($breakDay->break_in);
                $endTime = \Carbon\Carbon::parse($breakDay->break_out);
                $totalBreakDay += $startTime->diffInHours($endTime);
                }

                //calculate total hours worked in current day
                $dstartTime = \Carbon\Carbon::parse($attDay->in_time);
                $dendTime = \Carbon\Carbon::parse($attDay->out_time);
                $totalHoursWorkedDay += $dstartTime->diffInHours($dendTime);
                $totalHoursWorkedDay -= $totalBreakDay;
                }
                }

                //calculate remaining hours in current month
                $curDate = Carbon\Carbon::now();
                $monthStartDate = Carbon\Carbon::now()->startOfMonth();
                $remainingHoursMonth = $totalHoursMonth - ($curDate->diffInDays($monthStartDate) * $totalHoursDay);

                @endphp
                <div class="stats-list">
                    <div class="stats-info">
                        <p>Today <strong>{{ $totalHoursWorkedDay }} <small>/ {{ $totalHoursDay }} hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>This Week <strong>{{$totalHoursWorkedWeek}} <small>/ {{$totalHoursWeek}} hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">

                        <p>This Month <strong>{{$totalHoursWorkedMonth}} <small>/ {{$totalHoursMonth}} hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Remaining <strong>{{$remainingHoursMonth}} <small>/ {{$totalHoursMonth}} hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-4">
        <div class="card mini-stat">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-buffer"></i>
            </div>
            <div class="card-body">
                <h5 class="card-title">Today Activity</h5>
                <ul class="res-activity-list">

                    <li>
                        <p class="mb-0">Punch In at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($attendance->in_time)->format('h:i A') }}
                        </p>
                    </li>
                    @foreach($attendanceBreaks as $attendanceBreak)
                    <li>
                        <p class="mb-0">Break In at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($attendanceBreak->break_in)->format('h:i A') }}
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">Back at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($attendanceBreak->break_out)->format('h:i A') }}
                        </p>
                    </li>
                    @endforeach
                    <li>
                        <p class="mb-0">Punch Out at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            {{ \Carbon\Carbon::parse($attendance->out_time)->format('h:i A') }}
                        </p>
                    </li>
                </ul>
            </div>
        </div>


    </div><!-- end row -->
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <select class="select2 form-control custom-select select2-hidden-accessible" name="attendance_month" id="attendance-month">
            <option>Select Month</option>
            @for($i = 1; $i <= 12; $i++)
            <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
            @endfor
        </select>
    </div>

    <div class="col-md-4">
        <select class="select2 form-control custom-select select2-hidden-accessible" name="attendance_status" id="attendance-status">
            <option>Select Status</option>
            <option value="1">Present</option>
            <option value="2">Absent</option>
            <option value="3">Leave</option>
            <option value="6">Half Day</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            @php
            $attendanceList = \App\Models\Attendance::where('employee_id', 8)->get();
            @endphp

            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date </th>
                            <th>Punch In</th>
                            <th>Punch Out</th>
                            <th>Production</th>
                            <th>Launch Status</th>
                            <th>Stauts</th>
                        </tr>
                    </thead>
                    <tbody id="attendance-table-emp">
                        @foreach($attendanceList as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($attendance->in_time)->format('h:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($attendance->out_time)->format('h:i A') }}</td>
                                <td>{{ $totalHoursWorkedDay }} hrs</td>
                                <td>
                                    @if(isset($attendance->getLaunchSheet) && $attendance->getLaunchSheet->status == 1)
                                    <span class="badge badge-default">Taken</span>
                                    @else
                                    <span class="badge badge-danger">Not Taken</span>
                                    @endif
                                </td>
                                <td>
                                    @if($attendance->status == 1)
                                    <span class="badge badge-info">Present</span>
                                    @elseif($attendance->status == 6)
                                    <span class="badge badge-warning">Present [LATE]</span>
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

</div><!-- end row-->

@endsection