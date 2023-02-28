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
                <div class="statistics mb-2">
                    <div class="row">
                        <div class="col-md-4 col-6 text-center">
                            <div class="stats-box">
                                <p>Punch In</p>
                                <h6>10.00 AM</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center">
                            <div class="stats-box">
                                <p>Break</p>
                                <h6>1.21 hrs</h6>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 text-center">
                            <div class="stats-box">
                                <p>Overtime</p>
                                <h6>3 hrs</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="punch-info">
                    <div class="punch-hours">
                        <span>3.45 hrs</span>
                    </div>
                </div>
                <div class="punch-btn-section text-center">
                    <button type="button" class="btn btn-primary punch-btn">Punch Out</button>
                </div>
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
                    $launchSheet = App\Models\LaunchSheet::where('employee_id', 6)->where('date', date('Y-m-d'))->first();
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
                <div class="punch-btn-section text-center">
                    <p>
                        Do you want to take launch?
                    </p>
                    <form action="{{ route('employee.launch-management.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="employee_id" value="6">
                        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
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
            </div>
        </div>

    </div>

    <div class="col-md-12 col-xl-4">
        <div class="card mini-stat">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-tag-text-outline"></i>
            </div>
            <div class="p-4">
                <h6 class="text-uppercase mb-3">Daily Task Form</h6>
                <div class="float-right">
                    <p class="mb-0"><b>Submitted At:</b> {{date('d M, Y H:i A')}}</p>
                </div>
                <a href="{{ route('') }}" class="btn btn-outline-primary mb-0">View</a>
            </div>
        </div>

        <div class="card mini-stat mt-4">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-buffer"></i>
            </div>
            <div class="p-4">
                <h6 class="text-uppercase mb-3">User Today</h6>
                <div class="float-right">
                    <p class="mb-0"><b>Last:</b> 1250</p>
                </div>
                <h4 class="mb-0">895<small class="ml-2"><i class="mdi mdi-arrow-down text-danger"></i></small></h4>
            </div>
        </div>
    </div>
</div><!-- end row -->

<div class="row">
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
                <div id="morris-donut-example" style="height: 340px;"></div>
            </div>
        </div>
    </div>

</div><!-- end row-->

@endsection