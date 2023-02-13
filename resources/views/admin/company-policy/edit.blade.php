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
                <form id="policy-update-form" method="POST" action="{{ route('company-policy.update', $company_policy) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Office Start Time</label>
                                <br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-clock"></i></span>
                                    </div>
                                    <input type="time" name="office_start_time" class="form-control time12">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Office End Time</label>
                                <br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-clock"></i></span>
                                    </div>
                                    <input type="time" name="office_end_time" class="form-control time12">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Attendance Buffer Time (in minutes)</label>
                                <br>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-clock"></i></span>
                                    </div>
                                    <input type="text" name="attendance_buffer_time" class="form-control time12" placeholder="Ex: 30">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Late Attendance Rule</label>
                                <br>
                                <select id="late-attendance-rule" name="late_attendance_rule" class="form-control">
                                    <option value="0">Choose An Option</option>
                                    <option value="1">Count As Half Day</option>
                                    <option value="2">Count As Full Day</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Half Day Absent Rule <span style="font-size: 12px; color: #e3e3e3;">[Calculated on Daily Basis]</span></label>
                                        <br>
                                        <select id="half-day-absent-rule" name="half_day_absent_rule" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Deduct Salary By Percentage (%)</option>
                                            <option value="2">Deduct Salary By Fixed Amount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Value</label>
                                        <br>
                                        <input type="number" name="half_day_absent_rule_value" class="form-control time12">
                                        <input type="hidden" name="half_day_absent_rule_value_type" id="half-day-absent-rule-value-type">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Full Day Absent Rule<span style="font-size: 12px; color: #e3e3e3;">[Calculated on Daily Basis]</span></label>
                                        <br>
                                        <select id="full-day-absent-rule" name="full_day_absent_rule" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Deduct Salary By Percentage (%)</option>
                                            <option value="2">Deduct Salary By Fixed Amount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Value</label>
                                        <br>
                                        <input type="number" name="full_day_absent_rule_value" class="form-control time12">
                                        <input type="hidden" name="full_day_absent_rule_value_type" id="full-day-absent-rule-value-type">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Yearly Paid Leaves</label>
                                <br>
                                <input type="text" id="yearly-paid-leaves" name="yearly_paid_leaves" class="form-control time12">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Weekly Holiday</label>
                                <br>
                                <select id="weekly-holiday" name="weekly_holiday" class="form-control">
                                    <option value="0">Choose An Option</option>
                                    @php
                                    $days = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
                                    @endphp
                                    @foreach($days as $key => $day)
                                    <option value="{{ $key + 1 }}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Paid Leave Rule</label>
                                <br>
                                <select id="paid-leave-rule" name="paid_leave_rule" class="form-control">
                                    <option value="0">Choose An Option</option>
                                    <option value="3">Applicable after 3 months</option>
                                    <option value="6">Applicable after 6 months</option>
                                    <option value="9">Applicable after 9 months</option>
                                    <option value="12">Applicable after 12 months</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unpaid Leave Rule</label>
                                <br>
                                <select id="unpaid-leave-rule" name="unpaid_leave_rule" class="form-control">
                                    <option value="0">Choose An Option</option>
                                    <option value="1">Count As Absent</option>
                                    <option value="2">Count As Half Day Leave</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Attendance Bonus Rule</label>
                                        <br>
                                        <select id="attendance-bonus-rule" name="attendance_bonus_rule" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Applicable If 100% Attendance</option>
                                            <option value="2">Not Applicable If Absent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Increments By</label>
                                        <br>
                                        <select id="attendance-bonus-rule-value-type" name="attendance_bonus_rule_value_type" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Percentage Of Salary</option>
                                            <option value="2">Fixed Amount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Value</label>
                                        <br>
                                        <input type="text" id="attendance-bonus-rule-value" name="attendance_bonus_rule_value" class="form-control time12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Overtime Rule</label>
                                        <br>
                                        <select id="overtime-rule" name="overtime_rule" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Not applicable</option>
                                            <option value="2">Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Value</label>
                                        <br>
                                        <input type="text" id="overtime-rule-value" name="overtime_rule_value" class="form-control time12">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <br>
                                        <input type="text" id="overtime-rule-value-type" name="overtime_rule_value_type" class="form-control time12">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Launch Wastage Rule</label>
                                        <br>
                                        <select id="launch-wastage-rule" name="launch_wastage_rule" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Not applicable</option>
                                            <option value="2">Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Value</label>
                                        <br>
                                        <select id="launch-wastage-rule-value" name="launch_wastage_rule_value" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Pay Launch Payment</option>
                                            <option value="2">Deduct Launch Payment From Salary</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Festival Bonus Rule</label>
                                        <br>
                                        <select id="festival-bonus-rule" name="festival_bonus_rule" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Not applicable</option>
                                            <option value="2">Applicable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Increments By</label>
                                        <br>
                                        <select id="festival-bonus-rule-value-type" name="festival_bonus_rule_value_type" class="form-control">
                                            <option value="0">Choose An Option</option>
                                            <option value="1">Percentage Of Salary</option>
                                            <option value="2">Fixed Amount</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Value</label>
                                        <br>
                                        <input type="text" id="festival-bonus-rule-value" name="festival_bonus_rule_value" class="form-control time12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-md-3">
                            <button type="submit" class="w-100 btn btn-primary">Update Poklicy</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection