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
                <div class="punch-det">
                    <h6>Punch In at</h6>
                    <p>Wed, 11th Mar 2019 10.00 AM</p>
                </div>
                <div class="punch-info">
                    <div class="punch-hours">
                        <span>3.45 hrs</span>
                    </div>
                </div>
                <div class="punch-btn-section text-center">
                    <button type="button" class="btn btn-primary punch-btn">Punch Out</button>
                </div>
                <div class="statistics">
                    <div class="row">
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box">
                                <p>Break</p>
                                <h6>1.21 hrs</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 text-center">
                            <div class="stats-box">
                                <p>Overtime</p>
                                <h6>3 hrs</h6>
                            </div>
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
            <div class="p-4">
                <h6 class="text-uppercase mb-3">Paid Leaves</h6>
                <div class="float-right">
                    <p class="mb-0"><b>Last:</b> 1250</p>
                </div>
                <h4 class="mb-0">895<small class="ml-2"><i class="mdi mdi-arrow-down text-danger"></i></small></h4>
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

    <div class="col-md-12 col-xl-4">
        <div class="card mini-stat">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-tag-text-outline"></i>
            </div>
            <div class="p-4">
                <h6 class="text-uppercase mb-3">User This Month</h6>
                <div class="float-right">
                    <p class="mb-0"><b>Last:</b> 40.33k</p>
                </div>
                <h4 class="mb-0">52410<small class="ml-2"><i class="mdi mdi-arrow-up text-primary"></i></small></h4>
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