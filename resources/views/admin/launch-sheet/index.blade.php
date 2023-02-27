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
                    Attendance List
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row">
                    <div class="col-md-6">
                        <h2>{{ session()->get('page_title_description') }}</h2>
                    </div>
                    <div class="col-md-6 justify-content-end d-flex">

                    </div>
                </div>
            </div>
            <div class="body attendance-table-box">
                <div class="table-responsive" id="attendance-tbl">
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
                                <th class="sorting" tabindex="0" aria-controls="employees_tbl" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" 
                                    style="width: 120.812px;">Summary</th>
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
                                            $ldate_sheet = \App\Models\LaunchSheet::where('employee_id', $item->id)->whereDate('date', $date)->first();
                                            
                                        @endphp
                                        @if($date->format('l') == $day)
                                            <td>
                                                <span class="badge badge-danger">H</span>
                                            </td>
                                        @elseif(empty($ldate_sheet))
                                            <td>
                                                <span class="badge badge-danger">
                                                    <i class="fa fa-close text-danger"></i>
                                                </span>
                                            </td>
                                        @elseif(!empty($ldate_sheet))
                                            <td class="text-center p-1">
                                                @if($ldate_sheet->status == 1)
                                                    <a href="javascript:void(0);" class="m-0 badge badge-success" data-toggle="modal" data-target="#attendance_info_{{ $item->employee_id }}">
                                                        <i class="fa fa-check text-success"></i> Y
                                                    </a> 
                                                @elseif($ldate_sheet->status == 0)
                                                <a href="javascript:void(0);"  class="badge badge-danger" data-toggle="modal" data-target="#attendance_info_{{ $item->employee_id }}">
                                                    <i class="fa fa-close text-danger"></i> N
                                                </a>
                                                @elseif($ldate_sheet->status == 2)
                                                <span class="badge badge-danger">
                                                    <a href="javascript:void(0);"  data-toggle="modal" data-target="#attendance_info_{{ $item->employee_id }}">
                                                        <i class="fa fa-close text-danger"></i> W
                                                    </a>
                                                </span>
                                                @endif

                                                @include('admin.includes.modals.mdl-attendance-info')
                                            </td>
                                        @endif
                                    @endfor
                                    <!-- Summary of attendance -->
                                    <td class="text-center">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#attendance_summary_{{ $item->employee_id }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @include('admin.includes.modals.mdl-attendance-summary')
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <!-- Extra Launch -->
                                <td>
                                    <h6 class="mb-0">Extra Launch</h6>
                                </td>
                                @for($i = 1; $i <= $total_days; $i++)
                                <td>
                                    <!-- Ajax Form with select box -->
                                    <select name="extra-launch" id="extra-launch">
                                        <option value="0"  @if(false) selected @endif>0</option>
                                        <option value="1"  @if("false" == "selected") selected @endif>1</option>
                                        <option value="2"  @if("false" == "selected") selected @endif>2</option>
                                        <option value="3"  @if("false" == "selected") selected @endif>3</option>
                                        <option value="4"  @if("false" == "selected") selected @endif>4</option>
                                        <option value="5"  @if("false" == "selected") selected @endif>5</option>
                                        <option value="6"  @if("false" == "selected") selected @endif>6</option>
                                        <option value="7"  @if("false" == "selected") selected @endif>7</option>
                                        <option value="8"  @if("false" == "selected") selected @endif>8</option>
                                        <option value="9"  @if("false" == "selected") selected @endif>9</option>
                                        <option value="10" @if("false" == "selected") selected @endif>10</option>
                                    </select>
                                </td>
                                @endfor
                            </tr>
                            <tr>
                                <td>
                                    <h6 class="mb-0">Total</h6>
                                </td>
                                @for($i = 1; $i <= $total_days; $i++)
                                    @php
                                        // check if attendance is marked for this date
                                        $ldate_sheet = \App\Models\LaunchSheet::where('date', $date)->where('status', 1)->get();
                                        
                                    @endphp
                                    <td class="text-center p-1">
                                        <span class="badge badge-success">{{ count($ldate_sheet) }}</span>
                                    </td>
                                @endfor
                                <!-- Summary of attendance -->
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-info">No Attendance Details Found</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection