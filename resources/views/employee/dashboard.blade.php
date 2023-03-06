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

    <div class="col-md-12 col-xl-4">
    <div class="card mini-stat">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-tag-text-outline"></i>
            </div>
            <div class="p-4">
                <h6 class="text-uppercase mb-3">
                    Today's Launch
                    <small class="text-muted">{{ date('d M, Y') }}</small>
                </h6>
                @php
                    $launchSheet = App\Models\LaunchSheet::orderby('id','desc')->where('employee_id', 8)->first();
                    $launchStatus = isset($launchSheet->status) ? $launchSheet->status : 0;
                    $statusClass = $launchStatus == 1 ? 'bg-success' : 'bg-danger';
                @endphp
                <div class="punch-info " id="launch-data">
                    <div class="punch-hours">
                        <span>
                            @if($launchStatus == 1)
                                Yes
                            @else
                                No
                            @endif
                        </span>
                    </div>
                </div>
                @if(!App\Models\LaunchSheet::where('employee_id', 6)->where('date', date('Y-m-d'))->exists() && Carbon\Carbon::now() < Carbon\Carbon::parse('17:30:00'))
                    <div class="punch-btn-section text-center">
                        <p>
                            Do you want to take launch?
                        </p>
                        <form action="{{ route('employee.launch-management.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="employee_id" value="8">
                            <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                            <select name="launch_status" class="form-control w-75 mb-3 ml-auto mr-auto text-center" id="launch_status">
                                <option value="1" {{ $launchStatus == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $launchStatus == 0 ? 'selected' : '' }}>No</option>
                            </select>
                            <button type="submit" class="btn btn-primary punch-btn launch-btn">
                                @if($launchStatus == 1)
                                    Cancel Launch Request
                                @else
                                    Submit Launch Request
                                @endif
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <div class="col-md-12 col-xl-4">
        <div class="card mini-stat">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-tag-text-outline"></i>
            </div>
            <div class="p-4">
                @php
                    $date = date('Y-m-d');
                    $tasks = \App\Models\TaskSubmission::where('employee_id', '8')->get();
                    $task = null;
                    foreach($tasks as $task){
                        if(\Carbon\Carbon::parse($task->created_at)->format('Y-m-d') == $date){
                            $task = $task;
                            break;
                        }
                    }
                @endphp
                <h6 class="text-uppercase mb-0">Daily Task Form</h6>
                <p class="mb-2 mt-2">
                    <b>Status: </b> 
                    <span class="badge {{ isset($task) ? 'badge-success' : 'badge-warning' }}">
                        {{ isset($task->created_at) ? 'Submitted' : 'Not Submitted' }}
                    </span>
                </p>
                @if(isset($task))
                <p class="mb-0">
                    <b>Submitted At:</b> 
                    {{ isset($task->created_at) ? \Carbon\Carbon::parse($task->created_at)->format('d M, Y') . '(' . \Carbon\Carbon::parse($task->created_at)->format('g:i A') . ')' : 'Not Submitted' }}
                </p>
                @endif
                
                @if(!isset($task))
                    <a href="{{ route('employee.task-management.create') }}" class="btn btn-outline-primary mb-0">View Task</a>
                @endif
            </div>
        </div>

        <div class="card mini-stat mt-4">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-buffer"></i>
            </div>
            <div class="p-4">
                <h6 class="text-uppercase mb-3">Paid Leaves</h6>
                <div class="float-right">
                    <p class="mb-0"><b>Taken:</b> 1250</p>
                </div>
                <h4 class="mb-0">895<small class="ml-2"><i class="mdi mdi-arrow-down text-danger"></i></small></h4>
            </div>
        </div>
    </div>
</div><!-- end row -->

<!-- <div class="row">
    <div class="col-md-12 col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 mb-3 header-title">Website Overview</h4>
                <div id="morris-area-chart" style="height: 340px;"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 mb-3 header-title">Monthly Attendance</h4>
                <input type="hidden" id="employee_id" name="employee_id" value="8">
                <div id="morris-donut-example" style="height: 340px;"></div>
            </div>
        </div>
    </div>
</div> -->

@endsection