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
                    Timesheet
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
                    <button type="button" class="btn btn-warning punch-btn">Punch Out</button>
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
        <div class="card mini-stat att-statistics">
            <div class="mini-stat-icon text-right">
                <i class="mdi mdi-cube-outline"></i>
            </div>
            <div class="card-body">
                <h5 class="card-title">Statistics</h5>
                <div class="stats-list">
                    <div class="stats-info">
                        <p>Today <strong>3.45 <small>/ 8 hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>This Week <strong>28 <small>/ 40 hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>This Month <strong>90 <small>/ 160 hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Remaining <strong>90 <small>/ 160 hrs</small></strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="stats-info">
                        <p>Overtime <strong>4</strong></p>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
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
                            10.00 AM.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">Punch Out at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            11.00 AM.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">Punch In at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            11.15 AM.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">Punch Out at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            1.30 PM.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">Punch In at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            2.00 PM.
                        </p>
                    </li>
                    <li>
                        <p class="mb-0">Punch Out at</p>
                        <p class="res-activity-time">
                            <i class="fa fa-clock-o"></i>
                            7.30 PM.
                        </p>
                    </li>
                </ul>
            </div>
        </div>


    </div><!-- end row -->
</div>

<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date </th>
                            <th>Punch In</th>
                            <th>Punch Out</th>
                            <th>Production</th>
                            <th>Break</th>
                            <th>Overtime</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>19 Feb 2019</td>
                            <td>10 AM</td>
                            <td>7 PM</td>
                            <td>9 hrs</td>
                            <td>1 hrs</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>20 Feb 2019</td>
                            <td>10 AM</td>
                            <td>7 PM</td>
                            <td>9 hrs</td>
                            <td>1 hrs</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div><!-- end row-->

@endsection