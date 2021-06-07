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
    </div>
    @yield('content')
</div>
</body>
</html>
