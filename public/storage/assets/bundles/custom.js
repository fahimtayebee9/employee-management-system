$(document).ready(function() {
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
});
