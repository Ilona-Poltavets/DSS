@extends('layouts.main_layout')

@section('title', 'Attributes')

@section('content')
    @if ($message=Session::get('success'))
        <div class='alert alert-success'>
            <p>{{ $message }}</p>
        </div>
    @endif
    @guest
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ERROR</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        You do not have permission, register or login
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1>Attributes</h1>
        <table class='table table-bordered'>
            <tr>
                <th>№</th>
                <th>Reason id</th>
                <th>Description</th>
                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
                        <th width="100px"></th>
                    @endif
                @endif
            </tr>
            @foreach($attributes as $attribut)
                <tr>
                    <td>{{$attribut->id}}</td>
                    <td>{{$attribut->reason_id}}</td>
                    <td>{{$attribut->description}}</td>
                    @auth
                        @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
                            <td>
                                <form action="{{ route('attribute.destroy',$attribut->id) }}" method="post">
                                    <div class="btn-group">
                                        <a class="btn btn-primary" href="{{route('attribute.edit',$attribut)}}"><i
                                                class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o fa-2x"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
        </table>
    @endif
@endsection
