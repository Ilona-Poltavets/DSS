@extends('layouts.forms_layout')

@section('title','Log In')

@section('content')
    <a class="btn btn-primary" href="{{route('attribute.index')}}"><i class="fa fa-long-arrow-left"
                                                                      aria-hidden="true"></i> Back</a>
    @if(session('status'))
        <div class='alert alert-success mb-1 mt-1'>{{ session('status') }}</div>
    @endif
    <form method="post" action="{{ route('auth.authenticate') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Login</label>
                    <input type="text" name="login" class="form-control" placeholder="login"/>
                </div>
            </div>
            @error('login')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="**********"/>
                </div>
                @error('password')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary ml-3">Log In</button>
        </div>
    </form>
@endsection
