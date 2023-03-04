<!-- jQuery  -->
<script src="{{ asset('storage/employee/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/detect.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/waves.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('storage/employee/assets/js/jquery.scrollTo.min.js') }}"></script>

<script src="{{ asset('storage/employee/assets/plugins/metro/MetroJs.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('storage/employee/assets/pages/dashboard.js') }}"></script>
<script src="{{ asset('storage/assets/bundles/sweetalert2@11.js') }}"></script>
<!-- App js -->
<script src="{{ asset('storage/employee/assets/js/app.js') }}"></script>

@php
    $message    = Session::get('message');
    $alert_type = Session::get('type');

    if($message != null){
        echo "<script>
            $(document).ready(function() {
                var messageTxt = '$message';
                var typeTxt = '$alert_type';
                var toastMixin = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: false,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                toastMixin.fire({
                    icon: typeTxt,
                    title: messageTxt,
                });
            });
        </script>";

        Session::forget('message');
        Session::forget('type');
    }
@endphp