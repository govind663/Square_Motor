<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Square Motor | Login</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/img/Gadi-Insurance.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">

    <!-- Toaster Message -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">

                <img class="img-fluid logo-dark mb-2 logo-color" src="{{ url('/') }}/assets/img/Gadi_Insuranca.png" alt="Logo">
                <div class="loginbox">

                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>

                            <form method="POST" action="{{ route('login.store') }}" enctype="multipart/form">
                                @csrf

                                <div class="form-group mb-2">
                                    <label class="form-control-label"><b>Mobile Number : <span class="text-danger">*</span></b></label>
                                    <input id="mobile_no" type="mobile_no" onkeypress='validate(event)' maxlength="10"
                                        class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no"
                                        value="{{ old('mobile_no') }}" autocomplete="mobile_no" autofocus
                                        placeholder="Enter Mobile Number">

                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label class="form-control-label"><b>Password : <span class="text-danger">*</span></b></label>
                                    <div class="pass-group">
                                        <input id="password" type="password"
                                            class="form-control pass-input @error('password') is-invalid @enderror"
                                            name="password" autocomplete="current-password"
                                            placeholder="Enter Password">
                                        <span class="fas fa-eye toggle-password"></span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ url('/') }}/assets/js/jquery-3.7.1.min.js"></script>

    <!-- Feather Icon JS -->
    <script src="{{ url('/') }}/assets/js/feather.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ url('/') }}/assets/js/script.js"></script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script>
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>

</body>

</html>
