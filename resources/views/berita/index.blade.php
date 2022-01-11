@extends('layouts.base')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="{{ route('berita.create') }}" class="btn btn-success">Buat Berita</a>

        </div>
        <br>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>COntent</th>
                    <th>Categories</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $item)

                <tr>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->categories}}</td>

                    <td>
                        <a class="btn btn-info" href="{{ route('berita.edit', ['id'=>$item->id]) }}">Update</a>
                        <a class="btn btn-danger" href="{{ route('berita.delete', ['id'=>$item->id]) }}">Delete</a>
                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
