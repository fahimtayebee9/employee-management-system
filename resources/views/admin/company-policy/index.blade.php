@extends("admin.layouts.app")

@section("body")
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>{{ session('page_title') }}</h2>
            <ul class="breadcrumb">
                <!-- get breadcrumb array from session -->
                @php
                    $breadcrumbs = session()->get('breadcrumb');
                @endphp

                @if(!empty($breadcrumbs))
                    <!-- loop through breadcrumb array -->
                    @foreach($breadcrumbs as $key => $value)
                        @if($key === array_search(end($breadcrumbs), $breadcrumbs))
                            <li class="breadcrumb-item active">
                                {{ $key }}
                            </li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ $value }}"><i class="fa fa-dashboard"></i>
                                    {{ $key }}
                                </a>
                            </li>
                        @endif
                    
                    @endforeach
                
                @endif
                
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-end">
            <!-- <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-holidays"><i class="fa fa-plus"></i> Add New Holiday</button> -->
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="body">
                <div class="body table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="border-0" width="25%">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0"  colspan="2" scope="row">
                                                    @if($company_details->company_logo)
                                                        <img src="{{ asset('storage/company-policy/'. $company_details->company_logo) }}" alt="company logo" class="img-fluid">
                                                    @else
                                                        <img src="{{ asset('storage/assets/images/browser.png') }}" alt="company logo" class="img-fluid w-50">
                                                    @endif
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="border-0">
                                    <div class="text-right">
                                        <a href="" class="btn btn-outline-info mb-3 text-right">
                                            <i class="fa fa-edit"></i>
                                            {{ __('Edit') }}
                                        </a>
                                    </div>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Company Name') }}
                                                </th>
                                                <td>{{ __($company_details->company_name) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Company Email Address') }}
                                                </th>
                                                <td>{{ __($company_details->company_email) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Official Phone Number') }}
                                                </th>
                                                <td>{{ __($company_details->company_phone) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row" width="25%">
                                                    {{ __('Career Email Address') }}
                                                </th>
                                                <td>{{ __($company_details->company_career_mail) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="body">
                <div class="text-right">
                    <a href="{{ route('company-policy.edit', $company_policy) }}" class="btn btn-outline-info mb-3 text-right">
                        <i class="fa fa-edit"></i>
                        {{ __('Edit') }}
                    </a>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-center">

                    <div class="border bg-light  w-25 p-3 mr-2">
                        <span class="d-block text-center">
                            <b>{{ __('Office Start Time') }}</b>
                        </span>
                        <span class="d-block text-center">
                            <b>{{ __(\Carbon\Carbon::createFromFormat('H:i:s',$company_policy->office_start_time)->format('h:i A')) }}</b>
                        </span>
                    </div>
                    <div class="border bg-light  w-25 p-3 ml-2">
                        <span class="d-block text-center">
                            <b>{{ __('Office End Time') }}</b>
                        </span>
                        <span class="d-block text-center">
                        <b>{{ __(\Carbon\Carbon::createFromFormat('H:i:s',$company_policy->office_end_time)->format('h:i A')) }}</b>
                        </span>
                    </div>

                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Late Attendance Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->late_attendance_rule == 1)
                                                        {{ __('Count As Half Day') }}
                                                    @elseif($company_policy->late_attendance_rule == 1)
                                                        {{ __('Count As Full Day') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Half Day Absent Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->half_day_absent_rule == 1)
                                                        {{ __('Deduct Salary By Percentage ('. $company_policy->half_day_absent_rule_value .'% of Daily Salary)') }}
                                                    @elseif($company_policy->half_day_absent_rule == 2)
                                                        {{ __('Deduct Salary By Fixed Amount') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Full Day Absent Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->full_day_absent_rule == 1)
                                                        {{ __('Deduct Salary By Percentage ('. $company_policy->full_day_absent_rule_value .'% of Daily Salary)') }}
                                                    @elseif($company_policy->full_day_absent_rule == 2)
                                                        {{ __('Deduct Salary By Fixed Amount') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Paid Leave Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->paid_leave_rule == 3)
                                                        {{ __('Applicable after 3 months') }}
                                                    @elseif($company_policy->paid_leave_rule == 6)
                                                        {{ __('Applicable after 6 months') }}
                                                    @elseif($company_policy->paid_leave_rule == 9)
                                                        {{ __('Applicable after 9 months') }}
                                                    @elseif($company_policy->paid_leave_rule == 12)
                                                        {{ __('Applicable after 12 months') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Unpaid Leave Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->unpaid_leave_rule == 1)
                                                        {{ __('Count As Absent') }}
                                                    @elseif($company_policy->unpaid_leave_rule == 2)
                                                        {{ __('Count As Half Day') }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Attendance Buffer Time') }}
                                                </th>
                                                <td class="border-0">
                                                    {{ __($company_policy->attendance_buffer_time . ' mins')
                                                         . " [" . \Carbon\Carbon::createFromFormat('H:i:s',$company_policy->office_start_time)->format('h:i A') . " - " . \Carbon\Carbon::createFromFormat('H:i:s',$company_policy->office_start_time)->addMinute($company_policy->attendance_buffer_time)->format('h:i A') . "]" }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Attendance Bonus Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->attendance_bonus_rule_value_type == 1)
                                                        {{ __('Applicable If 100% Attendance') . " (" . $company_policy->attendance_bonus_rule_value . "%)" }}
                                                    @elseif($company_policy->attendance_bonus_rule_value_type == 2)
                                                        {{ __('Fixed Amount') . " (" . $company_policy->attendance_bonus_rule_value . " tk)" }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%"> 
                                                    {{ __('Overtime Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->overtime_rule == 1)
                                                        {{ __('Not applicable')}}
                                                    @elseif($company_policy->overtime_rule == 2)
                                                        {{ __('Applicable') . " (" . $company_policy->overtime_rule_value . " tk)" }}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" scope="row" width="25%">
                                                    {{ __('Launch Wastage Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->launch_wastage_rule == 1)
                                                        {{ __('Not applicable')}}
                                                    @elseif($company_policy->launch_wastage_rule == 2)
                                                        @if($company_policy->launch_wastage_rule_value == 1)
                                                            {{ __('Pay Launch Payment')}} 
                                                        @else
                                                            {{ __('Deduct From Salary')}}
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="border-0" width="25">
                                                    {{ __('Festival Bonus Rule') }}
                                                </th>
                                                <td class="border-0">
                                                    @if($company_policy->festival_bonus_rule == 1)
                                                        {{ __('Not applicable')}}
                                                    @elseif($company_policy->festival_bonus_rule == 2)
                                                        @if($company_policy->festival_bonus_rule_value == 1)
                                                            {{ __('Percentage Of Salary') . " (" . $company_policy->festival_bonus_rule_value . "%)" }} 
                                                        @else
                                                            {{ __('Fixed Amount') . " (" . $company_policy->festival_bonus_rule_value . " tk)"}}
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection