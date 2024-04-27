<!-- jQuery -->
<script src="{{ url('/') }}/assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="{{ url('/') }}/assets/js/popper.min.js"></script>
<script src="{{ url('/') }}/assets/js/bootstrap.min.js"></script>

<!-- Feather Icon JS -->
<script src="{{ url('/') }}/assets/js/feather.min.js"></script>

<!-- Slimscroll JS -->
<script src="{{ url('/') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Chart JS -->
{{-- <script src="{{ url('/') }}/assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="{{ url('/') }}/assets/plugins/apexchart/chart-data.js"></script> --}}

<!-- Custom JS -->
<script src="{{ url('/') }}/assets/js/script.js"></script>

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
