@extends('layouts.forms_layout')

@section('title','Edit attribute')

@section('button_back')
    <a class="button" href="{{route('attribute.index')}}"><i class="fa fa-long-arrow-left"
                                                             aria-hidden="true"></i>Back</a>
@endsection

@section('content')
    <form action="{{route('attribute.store',$attribute->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{--@method('PUT')--}}
        <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Reason id: </label>
                    <input type="text" name="reason_id" class="form-control" value="{{$attribute->reason_id}}"
                           placeholder="reason id"/>
                </div>
                @error('reason_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class="form-group">
                    <label>Description: </label>
                    <input type="text" name="description" class="form-control"
                           value="{{$attribute->description}}"
                           placeholder="description"/>
                </div>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
@endsection
