<footer class="footer footer-static footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a
                class="text-bold-800 grey darken-2"
                href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT
            </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i
                class="ft-heart pink"></i></span>
    </p>
</footer>

<!-- BEGIN VENDOR JS -->
<script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/vendors.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/fontawesome/js/all.min.js') }}"></script>
<!-- BEGIN VENDOR JS -->

<!-- BEGIN PAGE VENDOR JS -->
{{-- <script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/ui/prism.min.js') }}"></script> --}}
<script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/tables/datatable/datatables.min.js') }}">
</script>
<script type="text/javascript"
    src="{{ asset('assets/dashboard/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dashboard/vendors/js/forms/icheck/icheck.min.js') }}"></script>
<!-- END PAGE VENDOR JS -->

<!-- BEGIN MODERN JS -->
<script type="text/javascript" src="{{ asset('assets/dashboard/js/core/app-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dashboard/js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/dashboard/js/scripts/customizer.js') }}"></script>
<!-- END MODERN JS -->

<!-- BEGIN Alerts JS -->
@toastr_js
@toastr_render
@include('sweet::alert')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- END Alerts JS -->

<!-- BEGIN Custom JS -->
<script type="text/javascript" src="{{ asset('assets/dashboard/assets/js/script.js') }}"></script>
<!-- END Custom JS -->

@yield('script')
@stack('script')

</body>

</html>
