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
    {{--<div class="row justify-content-center">--}}
        @yield('content')
    {{--</div>--}}
</div>
</body>
</html>
