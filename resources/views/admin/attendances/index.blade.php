@extends("admin.layouts.app")

@section("body")

<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>{{ session('page_title') }}</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    Employee List
                </li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <a href="{{ route('administration.users.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                <span>Add New User</span>
            </a>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>All Employee List</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">

                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @if(!empty($employees))
                    <table style="width:100%!important; text-overflow: ellipsis;" class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="employees_tbl" role="grid" aria-describedby="employees_tbl_info">
                        <thead class="thead-dark">
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="employees_tbl" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" 
                                    style="width: 120.812px;">Employee</th>
                                @php
                                // get total days in current month
                                $total_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                                @endphp
                                {{-- loop through total days and print column name --}}
                                @for($i = 1; $i <= $total_days; $i++) 
                                    <th tabindex="0" aria-controls="employees_tbl" rowspan="1" colspan="1" class="text-center p-1" style="width: 76px!important;">{{ $i }}</th>
                                @endfor

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $item)
                                <tr role="row" class="even">
                                    <td class="d-flex justify-content-start align-items-center">
                                        <span>
                                            <h6 class="mb-0">{{$item->user->first_name . ' '. $item->user->last_name}}</h6>
                                            <span>{{$item->employee_id}}</span>
                                        </span>
                                    </td>
                                    @for($i = 1; $i <= $total_days; $i++)
                                        @php
                                            // create carbon date from $i
                                            $date = \Carbon\Carbon::create(date('Y'), date('m'), $i);
                                            
                                            // check if date is holiday from weekly_holiday day name in company policy table
                                            $week_days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
                                            $company_policy = \App\Models\CompanyPolicy::first();
                                            $day = $week_days[$company_policy->weekly_holiday];
                                            
                                            // check if attendance is marked for this date
                                            $attendance = \App\Models\Attendance::where('employee_id', $item->id)->whereDate('date', $date)->first();
                                            
                                        @endphp
                                        @if($date->format('l') == $day)
                                                <td>
                                                    <span class="badge badge-danger">H</span>
                                                </td>
                                        @elseif(empty($attendance))
                                            <td>
                                                <span class="badge badge-danger">
                                                    <i class="fa fa-close text-danger"></i>
                                                </span>
                                            </td>
                                        @elseif(!empty($attendance))
                                            <td class="text-center p-1">
                                                @if($attendance->status == 1)
                                                    <a href="javascript:void(0);" class="m-0 badge badge-success" data-bs-toggle="modal" data-bs-target="#attendance_info">
                                                        <i class="fa fa-check text-success"></i>
                                                    </a>
                                                @elseif($attendance->status == 2)
                                                <a href="javascript:void(0);"  class="badge badge-danger" data-bs-toggle="modal" data-bs-target="#attendance_info">
                                                    <i class="fa fa-close text-danger"></i>
                                                </a>
                                                @elseif($attendance->status == 3)
                                                <span class="badge badge-danger">
                                                    <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#attendance_info">
                                                        <i class="fa fa-close text-danger"></i>
                                                    </a>
                                                </span>
                                                @elseif($attendance->status == 5)
                                                    <a href="javascript:void(0);" class="badge badge-warning" data-bs-toggle="modal" data-bs-target="#attendance_info">
                                                        L
                                                    </a>
                                                @elseif($attendance->status == 6)
                                                    <a href="javascript:void(0);" class="badge badge-warning" data-bs-toggle="modal" data-bs-target="#attendance_info">
                                                        H
                                                    </a>
                                                @endif
                                            </td>
                                        @endif
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">No Administrative Roles Found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection