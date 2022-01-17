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
    <h1>link</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('management') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('link.index') }}">link</a></div>

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
<center><h1>link</h1></center>
  <br>


    <div class="container">
        <div class="card">

            <div class="card-body">
        @if ($act == 'create')

            <form action="{{ route('link.store') }}" method="post" >
                @csrf
                <div class="mb-3">
                    <label for="Judul" class="form-label">nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="isi nama link " required>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Link</label>
                    <textarea class="form-control" name="link" placeholder="Masukan Konten" required></textarea>
                </div>


                <br>
                <center> <button class="btn btn-success" type="submit">Submit</button>
                </center>
            </form>
        @else

            <form action="{{ route('link.update', ['id' => $data->id]) }}" method="post" >
                @csrf
                <div class="mb-3">
                    <label for="Judul" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}"
                        placeholder="isi nama ">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Link</label>
                    <textarea class="form-control" name="link"
                        placeholder="Masukan Konten">{{ $data->link }}</textarea>
                </div>


                <br>


                <br>
                <center> <button class="btn btn-success" type="submit">Submit</button>
                </center>
            </form>
        @endif


    </div>
</div> </div>
@endsection

@section('js')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script> --}}
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <!--Ionicon-->




    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script> --}}

    <script>
        $('.dropify').dropify();
    </script>
@endsection
