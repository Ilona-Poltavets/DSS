@extends('layouts.main_layout')

@section('title','Reason')

@section('content')
    @if ($message=Session::get('success'))
        <div class='alert alert-success'>
            <p>{{ $message }}</p>
        </div>
    @endif
    <h1>Reasons</h1>
    <form action="{{route('reasons_find')}}" method="post" enctype="multipart/form-data">
        @csrf
        Find reason: <input type="text" name="find_reason" value="" placeholder="reason"/>
        <input class="btn btn-secondary" type="submit" value="find"/>
    </form>
    <table class='table table-bordered'>
        <tr>
            <th>№</th>
            {{--<th width="10px">Alarm id</th>--}}
            <th>Priority</th>
            <th>Name</th>
            <th width="100px">Attributes of reason</th>
            <th>Experts count</th>
            <th>Opinion of experts in %</th>
            @auth
                @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
                    <th width="100px"></th>
                @endif
            @endif
        </tr>
        @foreach($reasons as $reason)
            <tr>
                <td>{{$reason->id}}</td>
                {{--<td>{{$reason->alarm_id}}</td>--}}
                <td>{{$reason->priority}}</td>
                <td>{{$reason->name}}</td>
                <td>
                    @php($reasonController=new \App\Http\Controllers\ReasonController())
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="right"
                       title="{{$reasonController->getAttributes($reason->id)}}">Attributes
                        of reason</a>
                </td>
                <td>{{$reason->experts_count}}</td>
                <td>{{$reason->expert_opinion}}%</td>
                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
                        <td>
                            <form action="{{ route('reasons.destroy',$reason->id) }}" method="post">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{route('reasons.edit',$reason)}}"><i
                                            class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-2x"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    @endif
                @endif
            </tr>
        @endforeach
    </table>
    {{-- $reasons->links() --}}
@endsection
