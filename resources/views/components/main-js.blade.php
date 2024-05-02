<!-- jQuery -->
<script src="{{ url('/') }}/assets/js/jquery-3.7.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ url('/') }}/assets/js/bootstrap.bundle.min.js"></script>

<!-- Feather Icon JS -->
<script src="{{ url('/') }}/assets/js/feather.min.js"></script>

<!-- select2 JS -->
<script src="{{ url('/') }}/assets/plugins/select2/js/select2.min.js"></script>

<!--- File Upload JS -->
<script src="{{ url('/') }}/assets/plugins/fileupload/fileupload.min.js"></script>

<!-- Slimscroll JS -->
<script src="{{ url('/') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Datetimepicker JS -->
<script src="{{ url('/') }}/assets/plugins/moment/moment.min.js"></script>
<script src="{{ url('/') }}/assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Datatables JS -->
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>

<script src="{{ url('/') }}/assets/js/jquery-ui.min.js"></script>

<script src="{{ url('/') }}/assets/js/theme-settings.js"></script>
<script src="{{ url('/') }}/assets/js/greedynav.js"></script>

<!-- Custom JS -->
<script src="{{ url('/') }}/assets/js/script.js"></script>
<script src="{{ url('/') }}/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="95d6fa7baa386c7329d0cf92-|49" defer></script>


<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>