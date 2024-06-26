<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>

<!-- select2 JS -->
{{-- <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>

<!--- File Upload JS -->
<script src="{{ asset('assets/plugins/fileupload/fileupload.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Datetimepicker JS -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Datatables JS -->
<script src="{{ asset('assets/datatables/js/dataTables.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.responsive.js') }}"></script>
<script src="{{ asset('assets/datatables/js/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/datatables/js/dataTables.buttons.js') }}"></script>
<script src="{{ asset('assets/datatables/js/buttons.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/datatables/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>

<script src="{{ asset('assets/js/theme-settings.js') }}"></script>
<script src="{{ asset('assets/js/greedynav.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}" data-cf-settings="f6e2172995d506bdd2e27e54-|49" defer></script>

<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "positionClass": "toast-top-right",
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"

    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "positionClass": "toast-top-right",
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "positionClass": "toast-top-right",
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "positionClass": "toast-top-right",
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>
