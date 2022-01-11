@extends('layouts.base')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
@endsection

@section('content')

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 14px;
        }

    </style>



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
<center><h1>agenda</h1></center>
  <br>
    <div class="container">

        @if ($act == 'create')

            <form action="{{ route('agenda.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="Judul" name="judul" placeholder="isi Judul ">
                </div>

                <div class="mb-3">
                    <label for="Tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="Tanggal" name="tanggal" placeholder="isi Tanggal ">
                </div>
                <div class="mb-3">
                    <label for="Waktu Mulai" class="form-label">Waktu Mulai</label>
                    <input type="time" class="form-control" id="Waktu Mulai" name="waktu_mulai" placeholder="isi Tanggal ">
                </div>
                <div class="mb-3">
                    <label for="Waktu Selesai" class="form-label">Waktu Selesai</label>
                    <input type="time" class="form-control" id="Waktu Selesai" name="waktu_selesai" placeholder="isi Tanggal ">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" placeholder="Masukan Konten"></textarea>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                    <textarea class="form-control" name="lokasi" placeholder="Masukan Konten"></textarea>
                </div>


                <br>
                <center> <button class="btn btn-success" type="submit">Submit</button>
                </center>
            </form>
        @else

            <form action="{{ route('agenda.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" value="{{$data->judul}}" id="Judul" name="judul" placeholder="isi Judul ">
                </div>

                <div class="mb-3">
                    <label for="Tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" value="{{$data->tanggal}}" id="Tanggal" name="tanggal" placeholder="isi Tanggal ">
                </div>
                <div class="mb-3">
                    <label for="Waktu Mulai" class="form-label">Waktu Mulai</label>
                    <input type="time" class="form-control" id="Waktu Mulai" value="{{$data->waktu_mulai}}" name="waktu_mulai" placeholder="isi Tanggal ">
                </div>
                <div class="mb-3">
                    <label for="Waktu Selesai" class="form-label">Waktu Selesai</label>
                    <input type="time" class="form-control" id="Waktu Selesai" value="{{$data->waktu_selesai}}" name="waktu_selesai" placeholder="isi Tanggal ">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" placeholder="Masukan Konten">{{$data->deskripsi}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                    <textarea class="form-control" name="lokasi" placeholder="Masukan Konten">{{$data->lokasi}}</textarea>
                </div>

                <br>
                <center> <button class="btn btn-success" type="submit">Submit</button>
                </center>
            </form>
        @endif


    </div>

@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <!--Ionicon-->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

@endsection
