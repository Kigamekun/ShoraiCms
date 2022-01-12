@extends('layouts.base')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')



<div class="header bg-primary pb-1">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">agenda</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('management') }}">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="{{ route('agenda.index') }}">agenda</li>
              </ol>
            </nav>
          </div>

        </div>
        <!-- Card stats -->

      </div>
    </div>
  </div>

  <br>
  @if (Session::has('message'))
  <div class="alert alert-{{ session('status') }}">
      {{ session('message') }}
  </div>
@endif
  <br>
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="{{ route('agenda.create') }}" class="btn btn-success">Buat agenda</a>

        </div>
        <br>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Deskripsi</th>
                    <th>Lokasi</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($agenda as $item)

                <tr>
                    <td>{{$item->judul}}</td>
                    <td>{{$item->tanggal}}</td>
                    <td>{{$item->waktu_mulai}}</td>
                    <td>{{$item->waktu_selesai}}</td>
                    <td>{{$item->deskripsi}}</td>
                    <td>{{$item->lokasi}}</td>

                    <td class="d-flex justify-content-end">
                        <a class="btn btn-info" href="{{ route('agenda.edit', ['id'=>$item->id]) }}">Update</a>
                        <a class="btn btn-danger" href="{{ route('agenda.delete', ['id'=>$item->id]) }}">Delete</a>
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
    $('#example').DataTable({   language: {
    'paginate': {
      'previous': '<i class="bi bi-arrow-left-circle"></i>',
      'next': '<i class="bi bi-arrow-right-circle"></i>'
    }
  }});
} );
</script>
@endsection
