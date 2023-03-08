<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left mt-4">
        <div class="text-center">
            <!--<a href="index.html" class="logo"><i class="fa fa-paw"></i> Aplomb</a>-->
            <a href="index.html" class="logo">
                @if(!empty(\App\Models\CompanyDetail::orderby('id', 'desc')->first()->company_logo))
                    <img src="{{ asset('storage/uploads/company/'. \App\Models\CompanyDetail::orderby('id', 'desc')->first()->company_logo) }}" height="14" width="75%"  
                        alt="company logo" class="img-fluid w-50">
                @else
                    <img src="{{ asset('storage/assets/images/browser.png') }}" alt="company logo" class="img-fluid w-50">
                @endif
            </a>
        </div>
    </div>


    <div class="sidebar-inner slimscrollleft" id="sidebar-main">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Overview</li>

                <li class="">
                    <a href="{{ route('employee.dashboard')}}" class="{{ (Route::getCurrentRoute()->getActionName() == 'employee.dashboard') ? 'active' : '' }} waves-effect waves-light">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('employee.attendance')}}" class="{{ (Route::getCurrentRoute()->getActionName() == 'employee.attendance') ? 'active' : '' }} waves-effect waves-light">
                        <i class="mdi mdi-calendar-clock"></i><span> Attendance </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('employee.leave-management')}}" class="{{ (Route::getCurrentRoute()->getActionName() == 'employee.leave-management') ? 'active' : '' }} waves-effect waves-light">
                        <i class="mdi mdi-calendar-clock"></i><span> Leave Management </span>
                    </a>

                <li>
                    <a href="{{ route('employee.launch-management')}}" class="{{ (Route::getCurrentRoute()->getActionName() == 'employee.launch-management') ? 'active' : '' }} waves-effect waves-light">
                        <i class="mdi mdi-calendar-clock"></i><span> Launch Sheet </span>
                    </a>
                </li>

                <!-- <li>
                    <a href="calendar.html" class="waves-effect waves-light"><i class="mdi mdi-calendar-clock"></i><span> Calendar </span></a>
                </li> -->

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>