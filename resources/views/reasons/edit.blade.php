@extends('layouts.forms_layout')

@section('title','Edit Reason')

@section('content')
    @if(session('status'))
        <div class='alert alert-success mb-1 mt-1'>{{ session('status') }}</div>
    @endif
{{--<a class="btn btn-success" href="{{route('attribute.index',$reason->id)}}">View attributes</a>--}}
    <a class="btn btn-primary" href="{{route('reasons.index')}}">Back</a>
    <form action="{{route('reasons.update',$reason->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{$reason->name}}"/>
                </div>
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>alarm_id: </label>
                    <input type="text" name="alarm_id" class="form-control" placeholder="alarm id"
                           value="{{$reason->alarm_id}}" disabled/>
                </div>
                @error('alarm_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Expert opinion: </label>
                    <input type="number" name="expert_opinion" class="form-control" placeholder="expert opinion"
                           value="{{$reason->expert_opinion}}"/>
                </div>
                @error('expert_opinion')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Experts count: </label>
                    <input type="number" name="experts_count" class="form-control" placeholder="experts count"
                           value="{{$reason->experts_count}}"/>
                </div>
                @error('experts_count')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Priority: </label>
                    <input type="number" name="priority" class="form-control" placeholder="priority"
                           value="{{$reason->priority}}"/>
                </div>
                @error('priority')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
@endsection
