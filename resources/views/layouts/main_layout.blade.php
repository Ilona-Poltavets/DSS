<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link href="{{url('css/tabulator.css')}}" rel="stylesheet">
    <link href="{{url('css/tabulator_bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('js/jquery_wrapper.js')}}"></script>
    <script type="text/javascript" src="{{url('js/tabulator_core.js')}}"></script>
    <script type="text/javascript" src="{{url('js/tabulator.js')}}"></script>
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
                                <a class="button" id="modal_logout" data-toggle="modal" data-target="LogOutModal" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endif
    </div>
    <div class="container">
        @yield('content')
    </div>
</div>

</body>
</html>
