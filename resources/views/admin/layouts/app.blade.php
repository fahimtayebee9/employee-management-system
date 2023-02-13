<!doctype html>
<html lang="en">

<head>
    <title>HR :: Holidays</title>
    
    @include("admin.includes.header")

    @include("admin.includes.css")

    
</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-blue">

        <!-- Page Loader -->
        @include("admin.includes.preloader")

        <!-- Top navbar div start -->
        @include("admin.includes.topbar")

        <!-- main left menu -->
        @include("admin.includes.sidebar")

        <!-- rightbar icon div -->
        @include("admin.includes.right-sidebar")

        <!-- mani page content body part -->
        <div id="main-content">
            <div class="container-fluid">
                
                @yield("body")

            </div>
        </div>

    </div>
    
    @include("admin.includes.scripts")

</body>

</html>