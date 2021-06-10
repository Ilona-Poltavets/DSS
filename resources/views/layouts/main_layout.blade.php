<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/main.css')}}"/>
    {{--
    <link rel="stylesheet" type="text/css" href="{{url('css/tabulator.min.css')}}">
    <script type="text/javascript" src="{{url('js/tabulator.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/script.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
    --}}
</head>
<body>
<div class="container">
    <div>
        <a class="btn btn-primary" href="{{route('reasons.index')}}">Home</a>
        <a class="btn btn-success" href="{{route('attribute.index')}}">View attributes</a>
        <a class="btn btn-success" href="{{route('reasons.create')}}">Create reason</a>
        <a class="btn btn-success" href="{{route('attribute.create')}}">Create attribute</a>
        @guest
            <a class="btn btn-info" href="{{route('register')}}">Register</a>
            <a class="btn btn-info" href="{{route('login')}}">Log In</a>
        @else
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
