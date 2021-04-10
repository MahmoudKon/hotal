<!DOCTYPE html>
<html class="loading" lang="{{ App::getLocale() }}" data-textdirection="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}"
    dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('pageTitle', 'Login')</title>
    <!-- BEGIN PAGE ICON & PAGE FONTS -->
    <link rel="apple-tou ch-icon" href="{{ asset('assets/dashboard/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dashboard/images/ico/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- END PAGE ICON & PAGE FONTS -->
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    @if (App::isLocale('ar'))
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/vendors.css') }}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/custom-rtl.css') }}">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/core/colors/palette-gradient.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css-rtl/pages/login-register.css') }}">
        <!-- END Page Level CSS-->
    @else
        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/vendors.css') }}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN MODERN CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/app.css') }}">
        <!-- END MODERN CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/core/colors/palette-gradient.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/pages/login-register.css') }}">
        <!-- END Page Level CSS-->
    @endif
</head>

<body class="vertical-layout vertical-menu 1-column menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu"
    data-col="1-column">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script type="text/javascript" src="{{ asset('assets/dashboard/js/core/app-menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dashboard/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/fontawesome/js/all.min.js') }}"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script type="text/javascript" src="{{ asset('assets/dashboard/js/scripts/forms/form-login-register.js') }}"></script>
    <!-- END PAGE LEVEL JS-->

    <script>
        $('body').on('click', '.input-group-prepend', function(e) {
            let icon = $(this).find('.toggle-password');
            if (icon.hasClass('toggle-password')) {
                if (icon.hasClass('fa-eye')) {
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                    icon.closest('.input-group').find('input[type=password]').attr('type', 'text');
                } else {
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                    icon.closest('.input-group').find('input[type=text]').attr('type', 'password');
                }
            }
        }); // GET CODE OF ABSENCES DEPENDENT OF ID

    </script>
</body>

</html>
