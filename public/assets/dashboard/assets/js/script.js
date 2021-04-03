(function(window, undefined) {
    'use strict';

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }); // TO SEND THE CSRF TOKEN WITH AJAX REQUEST

    $(document).ajaxError(function(data, textStatus, jqXHR) {
        if (typeof textStatus.responseJSON !== 'undefined' && textStatus.responseJSON.message == 'Unauthenticated.') { location.reload(true); }
    }); // WHEN MAKE REQUEST AND THE RESPONSE IS ERROR THEN MAKE REFRESH THE PAGE

    document.addEventListener('wheel', (e) => (e.ctrlKey || e.metaKey) && e.preventDefault(), {
        passive: false
    }); // DON'T MAKE ZOOM IN && ZOOM OUT ON THE PAGE

    var url = window.location.href;

    function rows() {
        $.ajax({
            url: url,
            type: "get",
            beforeSend: function() { $('body').addClass('loading-animation'); },
            success: function(data, textStatus, jqXHR) {
                $('#load-datatables').empty().append(data);
                setTimeout(function() {
                    $('.loading-animation').removeClass('loading-animation');
                }, 300);
            },
            error: function(jqXHR) {
                if (jqXHR.readyState == 0)
                    return false;
                toastr.error(jqXHR.responseJSON.message);
            },
        });
    } // AJAX CODE TO LOAD THE DATA TABLE

    // THIS FOR CHECK IF THE PAGE HAVE TABLE OR NOT, IF HAVE THEN RUN THE AJAX CODE TO GET THE TABLE DATA
    if ($('#load-datatables').length) { rows(); }

    $('body').on('click', '.delete_record', function(e) {
        e.preventDefault();
        let form = $(this).find('form');
        swal({
            text: 'are you sure to delete this record ?',
            title: 'DELETEING',
            icon: "warning",
            buttons: [
                'no, cancel',
                'yes, sure'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: form.attr('action'),
                    type: "post",
                    data: form.serialize(),
                    beforeSend: function() { $('body').addClass('loading-animation'); },
                    success: function(data, textStatus, jqXHR) {
                        toastr.success(data.message, data.title);
                        rows();
                    },
                    error: function(jqXHR) {
                        if (jqXHR.readyState == 0)
                            return false;
                        toastr.error(jqXHR.responseJSON.message);
                    },
                });
            } else {
                toastr.info('canceled', 'DELETING');
            }
        });
    }); // AJAX CODE TO DELETE THE RECORD AND LOAD THE DATA TABLE

    $('body').on('change', '#roles', function() {
        $('#permisions').slideUp(200);
        $.ajax({
            url: '/dashboard/employees/permissions',
            type: "post",
            data: { 'role': $(this).val() },
            beforeSend: function() { $('#permisions').addClass('loading-animation'); },
            success: function(data, textStatus, jqXHR) {
                $('.loading-animation').removeClass('loading-animation');
                $('#permisions').empty().append(data).slideDown(200);
            },
            error: function(jqXHR) {
                if (jqXHR.readyState == 0)
                    return false;
                toastr.error(jqXHR.responseJSON.message);
            },
        });
    }); // AJAX CODE TO LOAD THE PERMISSIONS WHEN CHANE THE ROLE

    $('body').on('click', 'button[type=reset]', function() {
        $('#permisions').slideUp(200).empty();
    }); // TO REMOVE THE PERMISSIONS SECTION WHEN RESET THE FORM

    $("body").on('change', '#image input[type=file]', function() {
        let img = $(this).parent('#image').find('img');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    }); // PREVIEW THE IMAGE WHEN SELECTED

})(window);