(function(window, undefined) {
    'use strict';

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }); // TO SEND THE CSRF TOKEN WITH AJAX REQUEST

    $(document).ajaxError(function(data, textStatus, jqXHR) {
        if (typeof textStatus.responseJSON !== 'undefined' && textStatus.responseJSON.message == 'Unauthenticated.') { location.reload(true); }
    }); // WHEN MAKE REQUEST AND THE RESPONSE IS ERROR THEN MAKE REFRESH THE PAGE

    $(document).ajaxComplete(function(data, textStatus, jqXHR) {
        $('.loading-animation').removeClass('loading-animation');
    }); // WHEN MAKE REQUEST AND REMOVE THE LOADING CLASS

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
        let route = $(this).find('form').attr('action'),
            data = $(this).find('form').serialize(),
            message = 'are you sure to delete this record ?',
            title = 'Deleteing';
        button_action(message, title, route, data);
    }); // AJAX CODE TO DELETE THE RECORD AND LOAD THE DATA TABLE

    $('body').on('click', '.ban_record', function(e) {
        e.preventDefault();
        let route = $(this).attr('href'),
            ban = $(this).data('ban'),
            message, title;
        if (ban) {
            message = 'are you sure to unban this record ?';
            title = 'Unbunned';
        } else {
            message = 'are you sure to ban this record ?';
            title = 'bunned';
        }
        button_action(message, title, route);
    }); // AJAX CODE TO ban THE RECORD AND LOAD THE DATA TABLE

    $('body').on('click', '.available_record', function(e) {
        e.preventDefault();
        let route = $(this).attr('href'),
            available = $(this).data('available'),
            message, title;
        if (available) {
            message = 'are you sure to un available this record ?';
            title = 'Unavailable';
        } else {
            message = 'are you sure to available this record ?';
            title = 'Available';
        }
        button_action(message, title, route);
    }); // AJAX CODE TO available THE RECORD AND LOAD THE DATA TABLE

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

    function button_action(message, title, route, data = null) {
        swal({
            text: message,
            title: title,
            icon: "warning",
            buttons: [
                'no, cancel',
                'yes, sure'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: route,
                    type: "post",
                    data: data,
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
                toastr.info('canceled', title);
            }
        });
    } // THID FUNCTION TO RETUN CONFIRM ACTION IF WANT DELETE OR BAN OR AVAILABLE





    $('body').on('click', '.load-form', function(e) {
        e.preventDefault();
        let container = $('body').find('#formModal #form_body');
        $(this).attr('data-toggle', 'modal').attr('data-target', '#formModal');
        container.empty();
        $.ajax({
            url: $(this).attr('href'),
            type: "GET",
            success: function(data, textStatus, jqXHR) {
                container.append(data);
            },
            error: function(jqXhr) {
                if(jqXhr.readyState == 0)
                    return false;
                container.append('<div class="alert alert-danger">' + jqXhr.responseJSON.message + '</div>');
            },
            complete: function() {
                $(this).removeAttr('data-toggle').removeAttr('data-target');
            }
        });
    }); // LOAD THE FORM ON MODAL




    $('body').on('submit', 'form#form_data', function (e) {
        e.preventDefault();
        let form = $(this);
        $('.error').empty();
        $.ajax({
            url: form.attr('action'),
            type: "post",
            data: new FormData($(this)[0]),
            dataType:'JSON',
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('body').addClass('loading-animation');
            },
            success: function(data, textStatus, jqXHR) {
                form.find('input').val('');
                toastr.success(data.message, data.title);
                $('.modal').modal("hide");
                rows();
                $('.loading-animation').removeClass('loading-animation');
            },
            error: function(jqXHR) {
                if (jqXHR.status == 422) {
                    $.each(jqXHR.responseJSON.errors, function (key, val) {
                        if(key.split('.')[0] == 'image') {key = 'image'}
                        form.find(`#${key.replace('.', '_')}_error`).text(val[0]);
                    });
                } else {
                    toastr.error(jqXHR.responseJSON.message);
                }
            },
        });

    });





    $("body").on('change', '#image input[type=file]', function () {
        let input = $(this);
        let img = input.parent('#image').find('#images');

        img.find('.background').remove();

        if (this.files && this.files[0]) {
            for (let i = 0; i < this.files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if ( typeof input.attr('multiple') === 'undefined' ) {
                        img.empty();
                    }
                    img.append('<img src="'+ e.target.result +'" class="img-border img-thumbnail">');
                }
                reader.readAsDataURL(this.files[i]);
            }
        }
    }); // PREVIEW THE IMAGE WHEN SELECTED

})(window);
