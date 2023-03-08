<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if (Auth::user()->image)
                        <img src="{{ asset('storage/uploads/users/'.Auth::user()->image) }}" alt="user" class="rounded-circle">
                    @else
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle">
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" href="{{route('employee.profile')}}"><i class="mdi mdi-account-circle "></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link style="padding: 0px;" class="dropdown-item text-danger" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="mdi mdi-power text-danger"></i> Logout
                        </x-dropdown-link>
                    </form>
                    <!-- <a class="dropdown-item text-danger" href="#"></i> Logout</a> -->
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="hide-phone app-search">
                <form role="search" class="">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>