<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            @if(Auth::user()->image)
                <img src="{{ asset('storage/uploads/users/'. Auth::user()->image) }}" class="rounded-circle user-photo" alt="User Profile Picture">
            @else
                <img src="{{ asset('storage/assets/images/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">
            @endif
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li>
                        <a href="{{route('admin.profile')}}">
                            <i class="icon-user"></i>My Profile
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="btn-logout-frm">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link style="padding: 0px;" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="icon-power"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </div>
            <hr>
        </div>

        @php
            $active_menu = session()->get('menu_active');
        @endphp

        <!-- Tab panes -->
        <div class="tab-content padding-0">
            <div class="tab-pane active" id="hr">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul class="metismenu li_animation_delay">
                        <li class="{{ ($active_menu == 'dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                        </li>
                        <li class="{{ ($active_menu == 'holidays') ? 'active' : '' }}"><a href="{{ route('holidays.index') }}"><i class="fa fa-list"></i>Holidays</a></li>
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
                        <li class="{{ ($active_menu == '') ? 'active' : '' }}">
                            <a href="#task-list" class="has-arrow"><i class="fa fa-users"></i><span>Task Management</span></a>
                            <ul>
                                <li><a href="{{ route('admin.tasks.index') }}">Task Submissions</a></li>
                                <li><a href="{{ route('admin.tasks.forms.index') }}">Task Forms</a></li>
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
                        <li class="{{ ($active_menu == 'administrative_users' || $active_menu == 'role_managers' || $active_menu == 'permission_managers' || $active_menu == 'company_policy') ? 
                                'active' : '' }}">
                            <a href="#administrative" class="has-arrow"><i class="fa fa-user"></i><span>Administration</span></a>
                            <ul>
                                <li class="{{ ($active_menu == 'administrative_users') ? 'active' : '' }}">
                                    <a href="{{ route('administration.index') }}">Users</a>
                                </li>
                                <li class="{{ ($active_menu == 'role_managers') ? 'active' : '' }}">
                                    <a href="{{ route('roles.index') }}">Role Manager</a>
                                </li>
                                <li class="{{ ($active_menu == 'permission_managers') ? 'active' : '' }}">
                                    <a href="{{ route('permissions.index') }}">Permission Manager</a>
                                </li>
                                <li class="{{ ($active_menu == 'company_policy') ? 'active' : '' }}">
                                    <a href="{{ route('company-policy.index') }}">
                                        Company Policy
                                    </a>
                                </li>
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
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>