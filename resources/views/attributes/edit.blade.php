@extends('layouts.forms_layout')

@section('title','Edit attribute')

@section('content')
    @if(session('status'))
        <div class='alert alert-success mb-1 mt-1'>{{ session('status') }}</div>
    @endif
    <a class="btn btn-primary" href="{{route('attribute.index')}}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back</a>
    <form action="{{route('attribute.store',$attribute->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{--@method('PUT')--}}
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Reason id: </label>
                    <input type="text" name="reason_id" class="form-control" value="{{$attribute->reason_id}}" placeholder="reason id"/>
                </div>
                @error('reason_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Description: </label>
                    <input type="text" name="description" class="form-control" value="{{$attribute->description}}" placeholder="description"/>
                </div>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
@endsection
