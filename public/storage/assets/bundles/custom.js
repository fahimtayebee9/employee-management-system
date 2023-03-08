$(document).ready(function() {
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    // update launch sheet on select change
    $('.extra-launch-select').change(function(event) {
        var element_id = $(this).attr('id');
        // ajax call to update launch sheet
        // $.ajax({
        //     url: '/launch-management/store',
        //     type: 'POST',
        //     data: {
        //         extra_launch: $(this).val(),
        //         // _token using php
        //         _token: "{{ csrf_token() }}" 
        //     },
        //     success: function(data) {
        //         // update launch sheet
        //         $('#launch_sheet').val(data);
        //     }
        // });
    });

    /** 
     * 
     * Task From Detail Page Scripts
     * 
     **/
    
    $('#filter_by_designation').select2({
        placeholder: 'Select Designation',
        allowClear: true,
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    // filter by status on select change
    $('#filter_by_designation').change(function(event) {
        var selected = $(this).val();
        $.ajax({
            url: '/admin/tasks/getbydesignation/' + selected,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '';
                console.log(data);
                var count = 1;
                $.each(data.taskSubmissions, function(key, value) {
                    var employee_user = data.users.find(user => user.id == data.employees.find(employee => employee.id == value.employee_id).user_id);
                    var employee_name = employee_user.first_name + ' ' + employee_user.last_name;
                    var employee_designation = data.designations.find(designation => designation.id == data.employees.find(employee => employee.id == value.employee_id).designation_id).name;
                    var date = new Date(value.created_at);
                    var submissionDate = date.getDate() + " " + monthNames[date.getMonth()] + ", " + date.getFullYear();
                    // calculate total not empty fields in taskForms
                    var totalFields = 0;
                    var totalFilledFields = 0;
                    $.each(data.taskForms, function(key, tvalue) {
                        if (tvalue.id == value.task_form_id) {
                            var field_count = 1;
                            for(var i = 1; i <= 10; i++){
                                if(tvalue['field_' + i + '_label'] != null){
                                    totalFields++;
                                    if(value['field_' + i] != null){
                                        totalFilledFields++;
                                    }
                                }
                            }
                        }
                    });
                    html += '<tr>';
                    html += '<td>' + count + '</td>';
                    html += `<td class="d-flex justify-content-start align-items-center">
                                <span>
                                    <h6 class="mb-0">${employee_name}</h6>
                                    <span>${employee_designation}</span>
                                </span>
                            </td>`;
                    html += '<td>' + submissionDate + '</td>';
                    html += `<td>${totalFilledFields}/${totalFields}</td>`;
                    html += '<td><a href="/admin/tasks/' + value.id + '" class="btn btn-primary btn-sm">View</a></td>';
                    html += '</tr>';
                    count++;
                });
                $('#tby-tasks-submissions').html(html);
            }
        });
    });

    $('#filter_by_date').change(function(event) {
        var selected = $(this).val();
        $.ajax({
            url: '/admin/tasks/getbydate/' + selected,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '';
                console.log(data);
                var count = 1;
                $.each(data.taskSubmissions, function(key, value) {
                    var employee_user = data.users.find(user => user.id == data.employees.find(employee => employee.id == value.employee_id).user_id);
                    var employee_name = employee_user.first_name + ' ' + employee_user.last_name;
                    var employee_designation = data.designations.find(designation => designation.id == data.employees.find(employee => employee.id == value.employee_id).designation_id).name;
                    var date = new Date(value.created_at);
                    var submissionDate = date.getDate() + " " + monthNames[date.getMonth()] + ", " + date.getFullYear();
                    // calculate total not empty fields in taskForms
                    var totalFields = 0;
                    var totalFilledFields = 0;
                    $.each(data.taskForms, function(key, tvalue) {
                        if (tvalue.id == value.task_form_id) {
                            var field_count = 1;
                            for(var i = 1; i <= 10; i++){
                                if(tvalue['field_' + i + '_label'] != null){
                                    totalFields++;
                                    if(value['field_' + i] != null){
                                        totalFilledFields++;
                                    }
                                }
                            }
                        }
                    });
                    html += '<tr>';
                    html += '<td>' + count + '</td>';
                    html += `<td class="d-flex justify-content-start align-items-center">
                                <span>
                                    <h6 class="mb-0">${employee_name}</h6>
                                    <span>${employee_designation}</span>
                                </span>
                            </td>`;
                    html += '<td>' + submissionDate + '</td>';
                    html += `<td>${totalFilledFields}/${totalFields}</td>`;
                    html += '<td><a href="/admin/tasks/' + value.id + '" class="btn btn-primary btn-sm">View</a></td>';
                    html += '</tr>';
                    count++;
                });
                $('#tby-tasks-submissions').html(html);
            }
        });
    });

    // HOLIDAY MANAGEMENT
    $('#month-filter').select2({
        allowClear: true,
        width: '100%',
        height: '100%',
        minimumResultsForSearch: Infinity
    });

    $('#month-filter').change(function(event) {
        var selected = $(this).val();
        $.ajax({
            url: '/admin/holidays/getbymonth/' + selected,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var html = '';
                console.log(data);
                var count = 1;
                $.each(data.taskSubmissions, function(key, value) {
                    var employee_user = data.users.find(user => user.id == data.employees.find(employee => employee.id == value.employee_id).user_id);
                    var employee_name = employee_user.first_name + ' ' + employee_user.last_name;
                    var employee_designation = data.designations.find(designation => designation.id == data.employees.find(employee => employee.id == value.employee_id).designation_id).name;
                    var date = new Date(value.created_at);
                    var submissionDate = date.getDate() + " " + monthNames[date.getMonth()] + ", " + date.getFullYear();
                    // calculate total not empty fields in taskForms
                    var totalFields = 0;
                    var totalFilledFields = 0;
                    $.each(data.taskForms, function(key, tvalue) {
                        if (tvalue.id == value.task_form_id) {
                            var field_count = 1;
                            for(var i = 1; i <= 10; i++){
                                if(tvalue['field_' + i + '_label'] != null){
                                    totalFields++;
                                    if(value['field_' + i] != null){
                                        totalFilledFields++;
                                    }
                                }
                            }
                        }
                    });
                    html += '<tr>';
                    html += '<td>' + count + '</td>';
                    html += `<td class="d-flex justify-content-start align-items-center">
                                <span>
                                    <h6 class="mb-0">${employee_name}</h6>
                                    <span>${employee_designation}</span>
                                </span>
                            </td>`;
                    html += '<td>' + submissionDate + '</td>';
                    html += `<td>${totalFilledFields}/${totalFields}</td>`;
                    html += '<td><a href="/admin/tasks/' + value.id + '" class="btn btn-primary btn-sm">View</a></td>';
                    html += '</tr>';
                    count++;
                });
                $('#tby-tasks-submissions').html(html);
            }
        });
    });
});
