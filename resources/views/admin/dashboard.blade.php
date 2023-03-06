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
                <h2>Use by Browser</h2>
                <a href="{{ route('admin.attendance.index') }}" class="btn btn-outline-info">View Details</a>
            </div>
            <div class="body">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Browser</th>
                            <th>Sessions</th>
                            <th>Bounce rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Chrome</td>
                            <td>23,233 <i class="fa fa-level-up"></i></td>
                            <td>47.12%</td>
                        </tr>
                        <tr>
                            <td>Firefox</td>
                            <td>13,901 <i class="fa fa-level-up"></i></td>
                            <td>33.02%</td>
                        </tr>
                        <tr>
                            <td>Safari</td>
                            <td>3,015 <i class="fa fa-level-up"></i></td>
                            <td>24.12%</td>
                        </tr>
                        <tr>
                            <td>Edge</td>
                            <td>233 <i class="fa fa-level-down"></i></td>
                            <td>17.33%</td>
                        </tr>
                        <tr>
                            <td>Opera</td>
                            <td>821 <i class="fa fa-level-down"></i></td>
                            <td>7.12%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection