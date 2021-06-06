@extends('layouts.main_layout')

@section('title','Reason')

@section('content')
    @if ($message=Session::get('success'))
        <div class='alert alert-success'>
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1>Reasons</h1>
    <a class="btn btn-success" href="{{route('reasons.create')}}">Create reason</a>
    <table class='table table-bordered'>
        <tr>
            <th>№</th>
            <th width="10px">Alarm id</th>
            <th>Priority</th>
            <th>Name</th>
            <th width="100px">Attributes of reason</th>
            <th>Experts count</th>
            <th>Opinion of experts in %</th>
            <th width="100px"></th>
        </tr>
        @foreach($reasons as $reason)
            <tr>
                <td>{{$reason->id}}</td>
                <td>{{$reason->alarm_id}}</td>
                <td>{{$reason->priority}}</td>
                <td>{{$reason->name}}</td>
                <td><a href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="жеееееесть">Attributes of reason</a></td>
                <td>{{$reason->experts_count}}</td>
                <td>{{$reason->expert_opinion}}%</td>
                <td>
                    <form action="{{ route('reasons.destroy',$reason->id) }}" method="post">
                        <div class="btn-group">
                            <a class="btn btn-primary" href="{{route('reasons.edit',$reason)}}">edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{-- $reasons->links() --}}
@endsection
