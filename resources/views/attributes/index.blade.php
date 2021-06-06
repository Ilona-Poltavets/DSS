@extends('layouts.main_layout')

@section('title', 'Attributes')

@section('content')
    @if ($message=Session::get('success'))
        <div class='alert alert-success'>
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1>Attributes</h1>
    <table class='table table-bordered'>
        <tr>
            <th>№</th>
            <th>Reason id</th>
            <th>Description</th>
            <th width="100px"></th>
        </tr>
        @foreach($attributes as $attribut)
            <tr>
                <td>{{$attribut->id}}</td>
                <td>{{$attribut->reason_id}}</td>
                <td>{{$attribut->description}}</td>
                <td>
                    <form action="{{ route('attribute.destroy',$attribut->id) }}" method="post">
                        <div class="btn-group">
                            <a class="btn btn-primary" href="{{route('attribute.edit',$attribut)}}">edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
