@extends('layouts.base')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
@endsection


@section('header')
    <div class="section-header">
        <h1>Agenda</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('management') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('agenda.index') }}">Agenda</a></div>

        </div>
    </div>
@endsection


@section('content')

    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 14px;
        }

    </style>





    <br>
    <center>
        <h1>agenda</h1>
    </center>
    <br>
    <div class="container">

        <div class="card">

            <div class="card-body">
                @if ($act == 'create')

                    <form action="{{ route('agenda.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="Judul" name="judul" placeholder="isi Judul "
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="Tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="Tanggal" name="tanggal" placeholder="isi Tanggal "
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="Waktu Mulai" class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="Waktu Mulai" name="waktu_mulai"
                                placeholder="isi Tanggal " required>
                        </div>
                        <div class="mb-3">
                            <label for="Waktu Selesai" class="form-label">Waktu Selesai</label>
                            <input type="time" class="form-control" id="Waktu Selesai" name="waktu_selesai"
                                placeholder="isi Tanggal " required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Masukan Konten"
                                required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi" placeholder="Masukan Konten" required></textarea>
                        </div>


                        <br>
                        <center> <button class="btn btn-success" type="submit">Submit</button>
                        </center>
                    </form>
                @else

                    <form action="{{ route('agenda.update', ['id' => $data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="Judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" value="{{ $data->judul }}" id="Judul" name="judul"
                                placeholder="isi Judul ">
                        </div>

                        <div class="mb-3">
                            <label for="Tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" value="{{ $data->tanggal }}" id="Tanggal"
                                name="tanggal" placeholder="isi Tanggal ">
                        </div>
                        <div class="mb-3">
                            <label for="Waktu Mulai" class="form-label">Waktu Mulai</label>
                            <input type="time" class="form-control" id="Waktu Mulai" value="{{ $data->waktu_mulai }}"
                                name="waktu_mulai" placeholder="isi Tanggal ">
                        </div>
                        <div class="mb-3">
                            <label for="Waktu Selesai" class="form-label">Waktu Selesai</label>
                            <input type="time" class="form-control" id="Waktu Selesai" value="{{ $data->waktu_selesai }}"
                                name="waktu_selesai" placeholder="isi Tanggal ">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi"
                                placeholder="Masukan Konten">{{ $data->deskripsi }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi"
                                placeholder="Masukan Konten">{{ $data->lokasi }}</textarea>
                        </div>

                        <br>
                        <center> <button class="btn btn-success" type="submit">Submit</button>
                        </center>
                    </form>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>



@endsection
