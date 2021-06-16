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
    <script type="text/javascript" src="{{url('js/jquery_wrapper.js')}}"></script>
    <script type="text/javascript" src="{{url('js/tabulator_core.js')}}"></script>
    <script type="text/javascript" src="{{url('js/tabulator.js')}}"></script>

</head>
<body>
<div class="container">
    <div>
        <a class="btn btn-primary" href="{{route('reasons.index')}}">Home</a>
        @guest
            <a class="btn btn-info" href="{{route('register')}}">Register</a>
            <a class="btn btn-info" href="{{route('login')}}">Log In</a>
        @else
            <a class="btn btn-success" href="{{route('attribute.index')}}">View attributes</a>
            @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
                <a class="btn btn-success" href="{{route('reasons.create')}}">Create reason</a>
                <a class="btn btn-success" href="{{route('attribute.create')}}">Create attribute</a>
            @endif
            <label class="btn btn-dark">{{ Auth::user()->name }}</label>
            <a class="btn btn-info" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endif
    </div>
    @yield('content')
    <div class="footer">
        <p>Developed by Ilona Poltavets and Vladislava Maltseva, with the support of Marina Falenkova</p>
    </div>
</div>
</body>
</html>
