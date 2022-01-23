@php
    session_start();

if(!isset($_SESSION["theme"]))
{
    $_SESSION["theme"] = "light";
}
if($_SESSION["theme"]=='light'){
    $style='forms';
}
else{
    $style='forms_dark';
}
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $style?>.css" id="theme-link"/>
    <script type="text/javascript" src="{{url('js/form_script.js')}}"></script>
</head>
<body>
<div class="container">
    @if(session('status'))
        <div class='alert alert-success mb-1 mt-1'>{{ session('status') }}</div>
    @endif
    <a class="button" href="{{route('home')}}">Home</a>
    <!-- Rounded switch -->
    <label class="switch">
        <input type="checkbox" onchange="ChangeTheme();" <?php echo($_SESSION["theme"]=='dark') ? 'checked' : '';?>>
        <span class="slider round"></span>
    </label>
    @yield('content')
</div>
</body>
</html>
