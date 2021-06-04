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
    <a class="btn btn-primary" href="{{route('reasons.index')}}">Back</a>
    @yield('content')
</div>
</body>
</html>
