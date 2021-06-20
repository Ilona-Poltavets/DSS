@extends('layouts.forms_layout')

@section('title','Create Reason')

@section('button_back')
    <a class="button" href="{{route('reasons.index')}}"><i class="fa fa-long-arrow-left"
                                                                    aria-hidden="true"></i>Back</a>
@endsection

@section('content')
    <form action="{{route('reasons.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" name="name" class="form-control" placeholder="name"/>
                </div>
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>alarm_id: </label>
                    <input type="text" name="alarm_id" class="form-control" placeholder="alarm id" disabled/>
                </div>
                @error('alarm_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Expert opinion: </label>
                    <input type="number" name="expert_opinion" class="form-control"
                           placeholder="expert opinion"/>
                </div>
                @error('expert_opinion')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Experts count: </label>
                    <input type="number" name="experts_count" class="form-control" placeholder="experts count"/>
                </div>
                @error('experts_count')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Priority: </label>
                    <input type="number" name="priority" class="form-control" placeholder="priority"/>
                </div>
                @error('priority')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="button">Submit</button>
        </div>
    </form>
@endsection
