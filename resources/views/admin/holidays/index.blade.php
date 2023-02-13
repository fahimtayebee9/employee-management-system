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
                <div class="table-header-actions row">
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
                    <div class="col-md-6 justify-content-end d-flex">
                        
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
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
                            <!-- foreach loop for holidays_list and if date has expired add text-danger class in tr -->
                            @php
                                $months_array = [1,2,3,4,5,6,7,8,9,10,11,12];
                            @endphp

                            @foreach($months_array as $month)
                                @if($month == date('m'))
                                    @php
                                        $daysInMonth = Illuminate\Support\Carbon::createFromDate(date("Y"), $month, 1)->daysInMonth;
                                        $date_in_month = Illuminate\Support\Carbon::create(date("Y"), $month, 1);
                                    @endphp

                                    @for( $day = 1; $day <= $daysInMonth; $day++)
                                        
                                        @php $count = 1; @endphp

                                        @foreach($holidays_list as $holiday)
                                        
                                            @php
                                                $hdate = \App\Models\CompanyPolicy::first()->weekly_holiday;
                                                $mdate = Illuminate\Support\Carbon::create(date("Y"), $month, $day);
                                                $mdateDay = Illuminate\Support\Carbon::create(date("Y"), $month, $day)
                                            @endphp

                                            @if ( $mdate->dayOfWeek == $hdate)
                                                <tr class="{{ Illuminate\Support\Carbon::now() > $mdate->format('Y-m-d') ? 'text-danger' : 'text-success' }}">
                                                    <td></td>
                                                    <td>{{ $mdate->format('d M, Y') }}</td>
                                                    <td>{{ $mdate->next($mdate->dayOfWeek)->format('l') }}</td>
                                                    <td>{{ __('Weekly Holiday') }}</td>
                                                    <td>
                                                        @if($mdate->dayOfWeek !== $hdate)
                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#md-edit-holidays" data-id="{{ $holiday->id }}" 
                                                            data-name="{{ $holiday->name }}" data-date="{{ $holiday->date }}"><i class="fa fa-edit"></i></button>
                                                        @endif
                                                        
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#md-delete-holidays" data-id="{{ $holiday->id }}" 
                                                            data-name="{{ $holiday->name }}"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endif

                                            @php $count++; @endphp
                                            
                                        @endforeach
                                    @endfor
                                @endif
                                
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