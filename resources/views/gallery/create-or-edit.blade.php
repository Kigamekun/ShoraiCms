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
        <h1>Gallery</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('management') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></div>

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
        <h1>Gallery</h1>
    </center>
    <br>
    @if (Session::has('message'))
    <div class="alert alert-{{ session('status') }}">
        {{ session('message') }}
    </div>
@endif

    <div class="card">

        <div class="card-body">
            @if ($act == 'create')

                <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Album</label>
                        <input type="text" class="form-control" id="album_name" name="album_name"
                            placeholder="isi album_name " required>
                    </div>



                    <div class="mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input type="file" name="image[]" class="form-control" accept="image/*" multiple>
                    </div>

                    <br>
                    <center> <button class="btn btn-success" type="submit">Submit</button>
                    </center>
                </form>
            @else

                <form id="updt" action="{{ route('gallery.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Album</label>
                        <input type="text" class="form-control" id="album_name" name="album_name"
                            placeholder="isi album_name " value="{{ $data->album_name }}" required>
                    </div>




                    <div class="mb-3">
                        <label for="nama" class="form-label">Gambar Dalam Album</label>
                        <ul id="gallery-image" class="list-group">

                            @foreach ((array) json_decode($data->image) as $it)
                                <img draggable="true" ondragend="dragEnd()" ondragover="dragOver(event)"
                                    ondragstart="dragStart(event)" data-src="{{ $it }}"
                                    style="display: block; max-width: 200px;max-height: 200px;min-width: 200px;min-height:200px; border-radius:20px;margin:5px;"
                                    src="{{ url('gallery/' . $it) }}" alt="">
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Tambah Image</label>
                        <input type="file" name="image[]" class="form-control" accept="image/*" multiple>
                    </div>

                    <br>


                    <br>
                    <center> <button class="btn btn-success" id="btn-submit">Submit</button>
                    </center>
                </form>
            @endif


        </div>


    </div>



@endsection


@section('js')
    <script>
        $(function() {
            $('img').on("dblclick", function(e) {
                if (confirm('Are you sure?')) {
                    e.target.remove();
                }
            });
        });


        // now that our current phrase is completely build we add it to our outer array

        $('#btn-submit').click(function(eventObj) {
            eventObj.preventDefault();
            var phrase = '';
            $('#gallery-image').find('img').each(function() {
                // console.log(im);
                var src = $(this).data('src');
                phrase += src + ',';
            });
            console.log(phrase);
    $(this).append('<input type="hidden" name="imgold" value="'+phrase+'" /> ');
    $('#updt').submit();
});





        let selected = null

        function dragOver(e) {

            if (isBefore(selected, e.target)) {
                e.target.parentNode.insertBefore(selected, e.target)
            } else {
                e.target.parentNode.insertBefore(selected, e.target.nextSibling)
            }
        }

        function dragEnd() {
            selected = null
        }

        function dragStart(e) {
            e.dataTransfer.effectAllowed = 'move'
            e.dataTransfer.setData('text/plain', null)
            selected = e.target
        }

        function isBefore(el1, el2) {
            let cur
            if (el2.parentNode === el1.parentNode) {
                for (cur = el1.previousSibling; cur; cur = cur.previousSibling) {
                    if (cur === el2) return true
                }
            }
            return false;
        }
    </script>
@endsection
