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
            <h6 class="h2 text-white d-inline-block mb-0">page</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('management') }}">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="{{ route('page.index') }}">page</li>
              </ol>
            </nav>
          </div>

        </div>
        <!-- Card stats -->

      </div>
    </div>
  </div>

  <br>

    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="{{ route('page.create') }}" class="btn btn-success">Buat page</a>

        </div>
        <br>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>title</th>
                    <th>seo title</th>
                    <th>content</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($page as $item)

                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->seo_title}}</td>
                    <td>{{$item->content}}</td>

                    <td>
                        <a class="btn btn-info" href="{{ route('page.edit', ['id'=>$item->id]) }}">Update</a>
                        <a class="btn btn-danger" href="{{ route('page.delete', ['id'=>$item->id]) }}">Delete</a>
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
