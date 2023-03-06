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
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0" id="tbl-tasks-submissions">
                        <tr class="">
                            <td>1</td>
                            <td class="d-flex justify-content-start align-items-center">
                                ABC
                            </td>
                            <td>
                                ABC
                            </td>
                            <td>
                                ABC
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection