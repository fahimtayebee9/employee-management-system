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
            <button data-toggle="modal" type="button" class="btn btn-primary" data-target="#md-create-holidays"><i class="fa fa-plus"></i> Add New Holiday</button>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="table-header-actions row  justify-content-between">
                    <div class="col-md-6">
                        <h2>Holidays List</h2>
                        <div class="holiday-scheme">
                            <label for="expired" class="expired-sp">
                                <span class=""></span>
                                Date Expired
                            </label>
                            <label for="available" class="available-sp">
                                <span></span>
                                Available
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control custom-select select2-hidden-accessible w-100" name="month-flt" id="month-filter">
                            <option>Select Month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @php
                        $daysInMonth = Illuminate\Support\Carbon::createFromDate(date("Y"), date('m'), 1)->daysInMonth;
                        $date_in_month = Illuminate\Support\Carbon::create(date("Y"), date('m'), 1);
                        $count = 0;
                    @endphp
                    <table class="table table-hover m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Holiday Title</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach($holidays_list as $holiday)
                                <tr class="{{ Illuminate\Support\Carbon::now() > Illuminate\Support\Carbon::parse($holiday->date)->format('Y-m-d') ? 'text-danger' : 'text-success' }}">
                                    <td>{{ ++$count }}</td>
                                    <td>{{ Illuminate\Support\Carbon::parse($holiday->date)->format('d M, Y') }}</td>
                                    <td>{{ Illuminate\Support\Carbon::parse($holiday->date)->format('l') }}</td>
                                    <td>{{ $holiday->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#md-delete-holidays" 
                                            data-id="{{ $holiday->id }}" data-name="{{ $holiday->name }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include("admin.includes.modals.md-create-holiday")

@endsection