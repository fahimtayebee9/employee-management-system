<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('storage/assets/images/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Pamela Petrus</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
            <hr>
            <!-- <ul class="row list-unstyled">
                <li class="col-4">
                    <small>Sales</small>
                    <h6>561</h6>
                </li>
                <li class="col-4">
                    <small>Order</small>
                    <h6>920</h6>
                </li>
                <li class="col-4">
                    <small>Revenue</small>
                    <h6>$23B</h6>
                </li>
            </ul> -->
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#hr">HR</a></li>
        </ul>
        
        @php
            $active_menu = session()->get('menu_active');
        @endphp

        <!-- Tab panes -->
        <div class="tab-content padding-0">
            <div class="tab-pane active" id="hr">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul class="metismenu li_animation_delay">
                        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                        <li class="{{ ($active_menu == 'holidays') ? 'active' : '' }}"><a href="{{ route('holidays.index') }}"><i class="fa fa-list"></i>Holidays</a></li>
                        <li class="{{ ($active_menu == 'company_policy') ? 'active' : '' }}">
                            <a href="{{ route('company-policy.index') }}">
                                <i class="fa fa-list"></i>Company Policy
                            </a>
                        </li>
                        <li class="{{ ($active_menu == 'launch_sheet') ? 'active' : '' }}">
                            <a href="{{ route('admin.launch-sheet.index') }}"><i class="fa fa-calendar"></i>Launch Sheet</a>
                        </li>
                        <li class="{{ ($active_menu == 'departments' || $active_menu == 'designations' || $active_menu == 'departments' || $active_menu == 'departments') ? 'active' : '' }}">
                            <a href="#Employees" class="has-arrow"><i class="fa fa-users"></i><span>Employees</span></a>
                            <ul>
                                <li><a href="{{ route('admin.employees.index') }}">All Employees</a></li>
                                <li><a href="{{ route('admin.leave.index') }}">Leave Requests</a></li>
                                <li><a href="{{ route('admin.attendance.index') }}">Attendance</a></li>
                                <li class="{{ ($active_menu == 'departments') ? 'active' : '' }}"><a href="{{ route('departments.index') }}">Departments</a></li>
                                <li class="{{ ($active_menu == 'designations') ? 'active' : '' }}"><a href="{{ route('designations.index') }}">Designations</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Accounts" class="has-arrow"><i class="fa fa-briefcase"></i><span>Accounts</span></a>
                            <ul>
                                <li><a href="acc-payments.html">Payments</a></li>
                                <li><a href="acc-expenses.html">Expenses</a></li>
                                <li><a href="acc-invoices.html">Invoices</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Payroll" class="has-arrow"><i class="fa fa-credit-card"></i><span>Payroll</span></a>
                            <ul>
                                <li><a href="payroll-payslip.html">Payslip</a></li>
                                <li><a href="payroll-salary.html">Employee Salary</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Report" class="has-arrow"><i class="fa fa-bar-chart"></i><span>Report</span></a>
                            <ul>
                                <li><a href="report-expense.html">Expense Report</a></li>
                                <li><a href="report-invoice.html">Invoice Report</a></li>
                                <li><a href="report-invoice.html">Launch Report</a></li>
                                <li><a href="report-invoice.html">Attendance Report</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#administrative" class="has-arrow"><i class="fa fa-user"></i><span>Administration</span></a>
                            <ul>
                                <li class="{{ ($active_menu == 'role_managers') ? 'active' : '' }}">
                                    <a href="{{ route('administration.index') }}">Users</a>
                                </li>
                                <li class="{{ ($active_menu == 'role_managers') ? 'active' : '' }}">
                                    <a href="{{ route('roles.index') }}">Role Manager</a>
                                </li>
                                <li class="{{ ($active_menu == 'role_managers') ? 'active' : '' }}">
                                    <a href="{{ route('permissions.index') }}">Permission Manager</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li>
                            <a href="#Authentication" class="has-arrow"><i class="fa fa-lock"></i><span>Authentication</span></a>
                            <ul>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-lockscreen.html">Lockscreen</a></li>
                                <li><a href="page-forgot-password.html">Forgot Password</a></li>
                                <li><a href="page-404.html">Page 404</a></li>
                                <li><a href="page-403.html">Page 403</a></li>
                                <li><a href="page-500.html">Page 500</a></li>
                                <li><a href="page-503.html">Page 503</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>