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
        <table id="example-table" class='table table-bordered'>
            <thead>
            <tr>
                <th width="50">№</th>
                <th width="50">Reason id</th>
                <th>Description</th>
                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
                        <th width="125">Action</th>
                    @endif
                @endif
            </tr>
            </thead>
            <tbody>
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
                                        <a class="button" id="edit" href="{{route('attribute.edit',$attribut)}}"><img
                                                class="icon" src="{{url('images/edit2.png')}}"></a>
                                        @csrf
                                        @method('DELETE')
                                        <a class="button" id="del"><img class="icon"
                                                                        src="{{url('images/delete2.png')}}">
                                        </a>
                                    </div>
                                </form>
                            </td>
                        @endif
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        <script>var table = new Tabulator("#example-table", {
                layout: "fitColumns",
                pagination: "local",
                paginationSize: 20,
                paginationSizeSelector: [5, 10, 20, 30, 50, 100],
                columns:
                    [
                        {title: "№",},
                        {title: "Reason id",},
                        {title: "Description", formatter: "textarea"},
                            @auth
                            @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
                        {
                            title: "Action", formatter: "html"
                        }
                        @endif
                        @endif
                    ]
            })</script>
        <div class="rigth_btn">
            @auth
                @if(\Illuminate\Support\Facades\Auth::user()->name=='admin')
                    <a class="button" id="create" href="{{route('attribute.create')}}">Create attribute</a>
                @endif
            @endif
        </div>
    @endif

@endsection
