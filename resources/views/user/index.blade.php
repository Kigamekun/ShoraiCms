@extends('layouts.base')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('management') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">User</a></div>

        </div>
    </div>
@endsection


@section('content')
<style>
.permission-toggle::after {
    display: inline-block;
width: 0;
height: 0;
margin-left: .255em;
vertical-align: .255em;
content: "";
border-top: .3em solid;
border-right: .3em solid transparent;
border-bottom: 0;
border-left: .3em solid transparent;
}
</style>


<div class="card">


    <div class="card-body">

    <br>
    @if (Session::has('message'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <br>

        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Buat User</a>

        </div>
        <br>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Permission</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)

                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <button class="btn btn-primary collapsed permission-toggle" type="button" data-toggle="collapse" data-target="#collapseExample{{$item->id}}" aria-expanded="false" aria-controls="collapseExample{{$item->id}}">
                                Role
                              </button>

                              <div class="collapse" id="collapseExample{{$item->id}}" style="">
<br>
                                    <ul class="list-group">

                                        @foreach ((array)json_decode($item->permission) as $perm)

                                        <li class="list-group-item">{{$perm}}</li>
                                        @endforeach
                                      </ul>

                              </div>
                        </td>

                        <td class="d-flex justify-content-end">
                            <a class="btn btn-info" href="{{ route('admin.users.edit', ['id' => $item->id]) }}">Update</a>
                            <a class="btn btn-danger" href="{{ route('admin.users.delete', ['id' => $item->id]) }}">Delete</a>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
</div>
@endsection

@section('js')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({



                language: {
                    'paginate': {
                        'previous': '<i class="bi bi-arrow-left-circle"></i>',
                        'next': '<i class="bi bi-arrow-right-circle"></i>'
                    }
                }
            });
        });
    </script>
@endsection
