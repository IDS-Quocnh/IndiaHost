<!DOCTYPE html>
<!-- saved from url=(0037)https://omni.myhosting.com/host/1512/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link href="{{ asset('public/assets/blacktheme/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/pace-theme-minimal.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/sticky-footer-navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/feedback-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/ribbon.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/chartjs/Chart.min.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/blacktheme/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/blacktheme/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/blacktheme/pace.min.js') }}"></script>
    <script src="{{ asset('public/assets/chartjs/Chart.min.js') }}"></script>
    <title> {{$title}}</title>
</head>
<body style="margin-bottom:0px;min-height: 100vh;" >
@yield('content')

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<footer class="footer">
    <div class="container">
        <div class="row">
        </div>
    </div>
</footer>
</body>
</html>
