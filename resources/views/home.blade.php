@extends('layouts.main_layout')
@section('title',"HOME")
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            {{--<div class="col-md-8">
                 <div class="card">
                     <div class="card-header">{{ __('Dashboard') }}</div>
                     <div class="card-body">
                         @if (session('status'))
                             <div class="alert alert-success" role="alert">
                                 {{ session('status') }}
                             </div>
                         @endif
                         {{__('You are logged out')}}<!--равно тому что выше-->
                     </div>
                 </div>
             </div>
             --}}
            <div class="center_picture">
                <div class="left">
                    <p>If you have </p>
                    <p class="problem">PROBLEM </p>
                    <p>WITH TECHNICS </p>
                </div>
                <div class="right">
                    <p>We have </p>
                    <p class="solution">SOLUTION </p>
                    <p>OF THIS PROBLEM </p>
                </div>
            </div>
            <div class="footer" >
                <div class="col1">Developed by Ilona Poltavets and Vladislava Maltseva, with the support of Marina Falenkova
                </div>
                <div class="col2"></div>
                <div class="col3">Developed by Ilona Poltavets and Vladislava Maltseva, with the support of Marina Falenkova
                </div>
            </div>
        </div>
    </div>
@endsection
