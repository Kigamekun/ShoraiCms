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
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('management') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">User</a></div>

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
        <h1>User</h1>
    </center>
    <br>


        <div class="card">

            <div class="card-body">
                @if ($act == 'create')

                    <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="name" placeholder="isi nama " required>
                        </div>



                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="isi email " required>
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="isi password "
                                required>
                        </div>

                        <label for="Permission" class="form-label">Permission</label>
                        <br>
                        <br>
                        <div class="mb-3 d-flex w-100" style="height: 150px;flex-wrap:wrap;flex-direction: column">
                            @foreach ($component as $item)
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="permission[]" type="checkbox" id="flexSwitchCheckDefault" value="{{$item}}">
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{$item}}</label>
                              </div>
                            @endforeach
                        </div>
                        <br>
                        {{-- <input type="file" name="foto" class="dropify" data-max-width="2000" data-max-width="2000"
                            required /> --}}

                        <br>
                        <center> <button class="btn btn-success" type="submit">Submit</button>
                        </center>
                    </form>
                @else

                    <form action="{{ route('admin.users.update', ['id' => $data->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="name" placeholder="isi nama " value="{{$data->name}}" required>
                        </div>



                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="isi email " value="{{$data->email}}"  disabled>
                        </div>


                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Secured"
                                 disabled>
                        </div>

                        <label for="Permission" class="form-label">Permission</label>
                        <br>
                        <br>
                        <div class="mb-3 d-flex w-100" style="height: 150px;flex-wrap:wrap;flex-direction: column">
                            @foreach ($component as $item)
                            <div class="form-check form-switch">
                                @if (in_array($item, (array)json_decode($data->permission)))
                                <input class="form-check-input" name="permission[]" type="checkbox" id="flexSwitchCheckDefault" value="{{$item}}" checked>
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{$item}}</label>

                                @else
                                <input class="form-check-input" name="permission[]" type="checkbox" id="flexSwitchCheckDefault" value="{{$item}}">
                                <label class="form-check-label" for="flexSwitchCheckDefault">{{$item}}</label>
                                @endif
                              </div>
                            @endforeach
                        </div>
                        <br>
                        {{-- <input type="file" name="foto" class="dropify"
                            data-default-file="{{ url('staffThumb/' . $data->foto) }}" data-max-width="2000"
                            data-max-width="2000" /> --}}



                        <br>
                        <center> <button class="btn btn-success" type="submit">Submit</button>
                        </center>
                    </form>
                @endif


            </div>

    </div>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Table Js -->

    <script src="https://cdn.tiny.cloud/1/{{ env('TINY_API_TOKEN') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin">
    </script>

    {{-- <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) , {
        plugins: [ CKFinder],

        // Enable the CKFinder button in the toolbar.
        toolbar: [ 'ckfinder']

        ckfinder: {
            // Upload the images to the server using the CKFinder QuickUpload command.
            uploadUrl: 'https://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',

            // Define the CKFinder configuration (if necessary).
            options: {
                resourceType: 'Images'
            }
        }
    })
    .catch( error => {
            console.error( error );
    });
</script> --}}

    <script>
        var editor_config = {
            path_absolute: "/",
            selector: '#editor',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>



    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
