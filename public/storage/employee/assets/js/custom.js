$(document).ready(function() {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    ];
    $('#attendance-status').on('change', function() {
        var status = $(this).val();
        if(status == "*"){
            window.location.reload();
        }
        else{
            // get all attendance data for status from database
            $.ajax({
                url: '/employee/attendance/status/' + status,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    $.each(data, function(key, value) {
                        var date = new Date(value.date);
                        var in_time = new Date(value.in_time).toLocaleTimeString('en-US',{timeZone:'Asia/Dhaka',hour12:true,hour:'numeric',minute:'numeric'});
                        var out_time = new Date(value.out_time).toLocaleTimeString('en-US',{timeZone:'Asia/Dhaka',hour12:true,hour:'numeric',minute:'numeric'});
                        // difference between in_time and out_time in hours
                        var diff = (new Date(value.out_time) - new Date(value.in_time)) / 1000 / 60 / 60;
                        html += '<tr>';
                        html += '<td>' + value.id + '</td>';
                        html += '<td>' + date.getDate() + " " + monthNames[date.getMonth() ] + ", " + date.getFullYear() + '</td>';
                        html += '<td>' + in_time + '</td>';
                        html += '<td>' + out_time + '</td>';
                        html += '<td>' + Math.round(diff) + ' Hrs</td>';
                        // get launch status for attendance from database
                        var launch_status = function () {
                            var tmp = null;
                            $.ajax({
                                async: false,
                                global: false,
                                url: '/employee/attendance/getlaunchsheet/' + value.id,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    
                                    
                                }
                            });
                            return tmp;
                        }();
                        if(launch_status == 1){
                            html += '<td><span class="badge badge-success">Taken</span></td>';
                        }else{
                            html += '<td><span class="badge badge-danger">Not Taken</span></td>';
                        }
                        if(value.status == 1){
                            html += '<td><span class="badge badge-success">Present</span></td>';
                        }else if(value.status == 6){
                            html += '<td><span class="badge badge-warning">Half Day</span></td>';
                        }
                        else{
                            html += '<td><span class="badge badge-danger">Absent</span></td>';
                        }
                        html += '</tr>';
                    });
                    $('#attendance-table-emp').html(html);
                }
            });
        }
    });

    $('#attendance-month').on('change', function() {
        var month = $(this).val();
        console.log($(this).val());
        // check if month is empty
        if(month == "*"){
            window.location.reload();
        }
        else{
            // get all attendance data for status from database
            $.ajax({
                url: '/employee/attendance/getByMonth/' + month,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    $.each(data, function(key, value) {
                        var date = new Date(value.date);
                        var in_time = new Date(value.in_time).toLocaleTimeString('en-US',{timeZone:'Asia/Dhaka',hour12:true,hour:'numeric',minute:'numeric'});
                        var out_time = new Date(value.out_time).toLocaleTimeString('en-US',{timeZone:'Asia/Dhaka',hour12:true,hour:'numeric',minute:'numeric'});
                        // difference between in_time and out_time in hours
                        var diff = (new Date(value.out_time) - new Date(value.in_time)) / 1000 / 60 / 60;
                        html += '<tr>';
                        html += '<td>' + value.id + '</td>';
                        html += '<td>' + date.getDate() + "-" + monthNames[date.getMonth()] + ", " + date.getFullYear() + '</td>';
                        html += '<td>' + in_time + '</td>';
                        html += '<td>' + out_time + '</td>';
                        html += '<td>' + Math.round(diff) + ' Hrs</td>';
                        // get launch status for attendance from database
                        var launch_status = function () {
                            var tmp = null;
                            $.ajax({
                                async: false,
                                global: false,
                                url: '/employee/attendance/getlaunchsheet/' + value.id,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    
                                    
                                }
                            });
                            return tmp;
                        }();
                        if(launch_status == 1){
                            html += '<td><span class="badge badge-success">Taken</span></td>';
                        }else{
                            html += '<td><span class="badge badge-danger">Not Taken</span></td>';
                        }
                        if(value.status == 1){
                            html += '<td><span class="badge badge-success">Present</span></td>';
                        }else if(value.status == 6){
                            html += '<td><span class="badge badge-warning">Half Day</span></td>';
                        }
                        else{
                            html += '<td><span class="badge badge-danger">Absent</span></td>';
                        }
                        html += '</tr>';
                    });
                    $('#attendance-table-emp').html(html);
                }
            });
        }
        
    });

    // get all leave data from database on leave-type-filter change
    $('#leave-type-filter').on('change', function() {
        var leave_type = $(this).val();
        if(leave_type == "*"){
            window.location.reload();
        }
        else{
            $.ajax({
                url: '/employee/leave/getByType/' + leave_type,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var count = 1;
                    $.each(data, function(key, value) {
                        var date = new Date(value.leave_from);
                        var start_date = date.getDate() + " " + monthNames[date.getMonth()] + ", " + date.getFullYear();
                        var end_date = '';
                        if(value.leave_to != null){
                            var date = new Date(value.leave_to);
                            end_date = date.getDate() + " " + monthNames[date.getMonth()] + ", " + date.getFullYear();
                        }
                        html += '<tr>';
                        html += '<td>' + count + '</td>';
                        html += '<td>' + value.leave_id + '</td>';
                        html += '<td><b>' + start_date + '</b> to <b>' + end_date + '</b></td>';
                        html += '<td>' + value.subject + '</td>';
                        // get leave status 1 for approved, 2 for pending, 3 for rejected
                        if(value.status_by_astmanager == 1 && value.status_by_hr == 1){
                            html += '<td><span class="badge badge-success">Approved</span></td>';
                        }else if(value.status_by_astmanager == 0 || value.status_by_hr == 0){
                            html += '<td><span class="badge badge-warning">Pending</span></td>';
                        }else{
                            html += '<td><span class="badge badge-danger">Rejected</span></td>';
                        }
                        // get leave type 1 for Full Day [Paid], 2 for Half Day [Unpaid], 3 for Full Day [Unpaid]
                        if(value.leave_type == 1){
                            html += '<td><span class="badge badge-success">Full Day [Paid]</span></td>';
                        }else if(value.leave_type == 2){
                            html += '<td><span class="badge badge-warning">Half Day [Unpaid]</span></td>';
                        }else{
                            html += '<td><span class="badge badge-danger">Full Day [Unpaid]</span></td>';
                        }
                        html += '<td></td>';
                        html += '</tr>';
                        count++;
                    });
                    $('#tbl-leave-applications').html(html);
                }
            });
        }
    });

    $('#leave-type-mdl').select2({
        placeholder: 'Select Leave Type',
        allowClear: false,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    $('#leave-type-filter').select2({
        allowClear: false,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    $('#leave-start-date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });
    $('#leave-end-date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd',
    });

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
    });
});
