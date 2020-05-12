<!DOCTYPE html>
<!-- saved from url=(0037)https://omni.myhosting.com/host/1512/ -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link href="https://omni.myhosting.com/static/img/omni_favicon.png') }}" rel="icon" type="image/png') }}">
    <link href="{{ asset('public/assets/blacktheme/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/pace-theme-minimal.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/sticky-footer-navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/feedback-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/blacktheme/ribbon.css') }}" rel="stylesheet">
    <script src="{{ asset('public/assets/blacktheme/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/blacktheme/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/blacktheme/pace.min.js') }}"></script>
    <title> {{$title}}</title>
</head>
<body data-gr-c-s-loaded="true" class="  pace-done pace-done">
<div class="pace  pace-inactive pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99"
         style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><div class="col-7">
                <h2>India Host</h2>
            </div>
        </a>
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span
                    class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown {{$menukey == 'dataCenter' ? 'active' : ''}}">
                    <a aria-expanded="false" aria-haspopup="true"
                       class="nav-link"
                       href="{{route('home')}}"
                    id="navbarDropdown" role="button">Datacenter </a>
                </li>
                <li class="nav-item dropdown {{$menukey == 'physicalHost' ? 'active' : ''}}">
                    <a aria-expanded="false" aria-haspopup="true"
                       class="nav-link"
                       href="{{route('physical-host')}}"
                    id="navbarDropdown" role="button">Physical Host</a>
                </li>
                <li class="nav-item dropdown {{$menukey == 'severSelect' ? 'active' : ''}}">
                    <a aria-expanded="false" aria-haspopup="true"
                       class="nav-link"
                       href="{{route('select-server')}}"
                       id="navbarDropdown" role="button">Server Select</a>
                </li>
                @if(Auth::user()->is_admin == 1)
                    <li class="nav-item dropdown {{$menukey == 'register' ? 'active' : ''}}">
                        <a aria-expanded="false" aria-haspopup="true"
                           class="nav-link"
                           href="{{route("register")}}"
                           id="navbarDropdown" role="button">Add User</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav pr-3">
                <li class="nav-item dropdown">
                    <a aria-expanded="false" aria-haspopup="true"
                       class="nav-link" data-toggle="dropdown"
                       href="https://omni.myhosting.com/host/1512/#" id="navbarDropdown"
                       role="button">{{ Auth::user()->username }}</a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

                <li class="nav-item">
                    <a href="*" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();"
                       class="nav-link"><i class="icon-switch2"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>

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
