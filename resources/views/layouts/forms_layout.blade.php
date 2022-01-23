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
    @yield('button_back')
<!-- Rounded switch -->
    <label class="switch">
        <input type="checkbox" onchange="ChangeTheme();" <?php echo($_SESSION["theme"]=='dark') ? 'checked' : '';?>>
        <span class="slider round"></span>
    </label>
    @guest
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ERROR</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You do not have permission, only admin can make changes
                    </div>
                </div>
            </div>
        </div>
    @else
        @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
            @yield('content')
        @endif
    @endif
</div>
</body>
</html>
