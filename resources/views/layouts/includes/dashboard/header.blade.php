<!DOCTYPE html>
<html class="loading" lang="{{ App::getLocale() }}" data-textdirection="{{ LaravelLocalization::getCurrentLocaleDirection() }}"
    dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
        content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> Dashboard </title>

    <!-- BEGIN Fonts & Icons CSS -->
    <link rel="apple-touch-icon" href="{{ asset('assets/dashboard/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dashboard/images/ico/favicon.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700">
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/forms/icheck/custom.css') }}">
    <!-- BEGIN Font Icons CSS -->

    <!-- BEGIN VENDOR CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/tables/extensions/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/vendors/css/ui/prism.min.css') }}">
    <!-- END VENDOR CSS -->

    <!-- BEGIN MODERN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/core/colors/palette-gradient.css') }}">
    <!-- END MODERN CSS -->

    <!-- BEGIN Page Level CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/core/colors/palette-gradient.css') }}">
    <!-- END Page Level CSS -->

    @if (App::isLocale('ar'))
    @else
    @endif

    <!-- BEGIN Toastr Alert CSS -->
    @toastr_css
    <!-- BEGIN Toastr Alert CSS -->

    <!-- BEGIN Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/assets/css/style.css') }}">
    <!-- END Custom CSS -->

    @yield('style')
    @stack('style')
</head>

<body class="vertical-layout vertical-menu 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
