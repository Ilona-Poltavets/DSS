@extends('layouts.forms_layout')

@section('title','Create attribute')

@section('content')
    @if(session('status'))
        <div class='alert alert-success mb-1 mt-1'>{{ session('status') }}</div>
    @endif
    <form action="{{route('attribute.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Reason id: </label>
                    <input type="text" name="reason_id" class="form-control" placeholder="reason id"/>
                </div>
                @error('reason_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Description: </label>
                    <input type="text" name="description" class="form-control" placeholder="reason id"/>
                </div>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
@endsection
