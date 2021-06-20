<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/forms.css')}}"/>
</head>
<body>
<div class="container">
    @if(session('status'))
        <div class='alert alert-success mb-1 mt-1'>{{ session('status') }}</div>
    @endif
        <a class="button" href="{{route('home')}}">Home</a>
    @yield('content')
</div>
</body>
</html>
