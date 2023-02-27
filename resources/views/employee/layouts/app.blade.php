<!DOCTYPE html>
<html lang="en">

<head>
    @include('employee.includes.header')

    @include('employee.includes.css')

</head>


<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('employee.includes.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                @include('employee.includes.topbar')
                <!-- Top Bar End -->

                <div class="page-content-wrapper">

                    <div class="container-fluid">

                        @include('employee.includes.breadcrumb')
                        <!-- end page title end breadcrumb -->

                        @yield('content')
                        
                    </div><!-- container -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->


            @include('employee.includes.footer')

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    @include('employee.includes.scripts')

</body>

</html>