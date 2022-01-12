<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Admin</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ url('assets/img/brand/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/argon.css?v=1.2.0') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    @yield('css')
</head>

<body>

    <style>
        .alert {
            width:80%;
            margin:auto;
        }
    </style>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="{{ url('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('management') }}">

                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>



                        {{-- @if (env('APP_TYPE') == 1) --}}

                            <li class="nav-item">
                                <a href="{{ route('berita.index') }}" class="nav-link ">
                                    <span class="nav-link-text">Berita</span>
                                </a>
                            </li>

                        {{-- @endif --}}


                        <li class="nav-item">
                            <a href="{{ route('banner.index') }}" class="nav-link ">
                                <span class="nav-link-text">Banner</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}" class="nav-link ">
                                <span class="nav-link-text">Slider</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('staff.index') }}" class="nav-link ">
                                <span class="nav-link-text">Staff</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('link.index') }}" class="nav-link ">
                                <span class="nav-link-text">Link</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('maps.index') }}" class="nav-link ">
                                <span class="nav-link-text">Maps</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('agenda.index') }}" class="nav-link ">
                                <span class="nav-link-text">Agenda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link ">
                                <span class="nav-link-text">Category</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('page.index') }}" class="nav-link ">
                                <span class="nav-link-text">Page</span>
                            </a>
                        </li>
                    </ul>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">

        @yield('content')
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <!-- Argon JS -->
    <script src="{{ url('assets/js/argon.js?v=1.2.0') }}"></script>


    @yield('js')
</body>

</html>
