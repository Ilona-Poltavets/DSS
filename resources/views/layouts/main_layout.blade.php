@php
    session_start();

if(!isset($_SESSION["theme"]))
{
    $_SESSION["theme"] = "light";
}
if($_SESSION["theme"]=='light'){
    $style='main';
}
else{
    $style='main_dark';
}
@endphp
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link href="{{url('css/tabulator.css')}}" rel="stylesheet">
    <link href="{{url('css/tabulator_bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/<?php echo $style ?>.css" id="theme-link"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('js/jquery_wrapper.js')}}"></script>
    <script type="text/javascript" src="{{url('js/tabulator_core.js')}}"></script>
    <script type="text/javascript" src="{{url('js/tabulator.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="{{url('js/script.js')}}"></script>
</head>
<body>
<div id="main">
    <div class="menu">
        <div class="logo"><a class="button" id="logo_btn" href="{{route('home')}}"><img
                    src="{{url('images/logo_btn2.png')}}"></a></div>
        <div class="buttons">
            <a class="button" href="{{route('reasons.index')}}">Reasons</a>
            @guest
                <a class="button" id="register" href="{{route('register')}}">Register</a>
                <a class="button" id="logIn" href="{{route('login')}}">Log In</a>
            @else
                <a class="button" href="{{route('attribute.index')}}">Attributes</a>
                <a class="button">{{ Auth::user()->name }}</a>
                <a type="button" class="button" id="logOut" data-toggle="modal" data-target="#logOutModal">
                    Logout
                </a>
                <div class="modal fade" id="logOutModal" tabindex="-1" role="dialog" aria-labelledby="LogOutLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="LogOutLabel">Log out</h5>
                                @csrf
                                </form>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to log out?
                            </div>
                            <div class="modal-footer">
                                <a class="button" id="modal_close" data-bs-dismiss="modal">Close</a>
                                <a class="button" id="modal_logout" data-toggle="modal" data-target="LogOutModal"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
        <!-- Rounded switch -->
            <label class="switch">
                <input type="checkbox" onchange="ChangeTheme();" <?php echo($_SESSION["theme"]=='dark') ? 'checked' : '';?>/>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>
    <div class="container">
        @yield('content')
        <script>
            $(window).on('load', function() {
                $('.preloader').fadeOut().end().delay(400).fadeOut('slow');
            });
        </script>
    </div>
</div>
</body>
</html>
