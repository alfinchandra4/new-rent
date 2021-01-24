<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('page-title')</title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- style -->
    <!-- build:css ../assets/css/site.min.css -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/theme.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}" type="text/css" />

    <Link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <Link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />

    <strong><script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script></strong>
        <script>
            tinymce.init({
                selector: "#mytextarea",
                plugins: 'lists',
                toolbar: 'undo redo | bold italic underline | numlist bullist | styleselect',
                menubar:false,
                branding: false
            });
        </script>
        <style>
            .mce-notification {display: none !important;}
        </style>

    @yield('css-top')

</head>

<body class="layout-row" style="font-family: 'Nunito Sans', sans-serif;">
    <!-- ############ Aside START-->
    <div id="aside" class="page-sidenav no-shrink bg-light nav-dropdown fade" aria-hidden="true">
        <div class="sidenav h-100 bg-light modal-dialog">
            <!-- sidenav top -->
            <div class="navbar">
                <!-- brand -->
                <a href="index.html" class="navbar-brand ">
                    <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor">
                        <g class="loading-spin" style="transform-origin: 256px 256px">
                            <path
                                d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z">
                            </path>
                        </g>
                    </svg>
                    <!-- <img src="../assets/img/logo.png" alt="..."> -->
                    <span class="hidden-folded d-inline l-s-n-1x ">Basik</span>
                </a>
                <!-- / brand -->
            </div>
            <!-- Flex nav content -->
            @include('layouts.sidebar')


        </div>
    </div>
    <!-- ############ Aside END-->
    <div id="main" class="layout-column flex">
        <!-- ############ Header START-->
        <div id="header" class="page-header ">
            <div class="navbar navbar-expand-lg">
                <!-- brand -->
                <a href="index.html" class="navbar-brand d-lg-none">
                    <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor">
                        <g class="loading-spin" style="transform-origin: 256px 256px">
                            <path
                                d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z">
                            </path>
                        </g>
                    </svg>
                    <!-- <img src="../assets/img/logo.png" alt="..."> -->
                    <span class="hidden-folded d-inline l-s-n-1x d-lg-none">Basik</span>
                </a>
                <!-- / brand -->
                <!-- Navbar collapse -->
                @include('layouts.navbar')
            </div>
        </div>
        <!-- ############ Footer END-->

        <!-- ############ Content START-->
        <div id="content" class="flex ">
            <!-- ############ Main START-->
            <div>
                <div class="page-hero page-container" id="page-hero">
                    <div class="padding d-flex">
                        <div class="page-title">
                            <h2 class="text-md text-highlight">@yield('content-title')</h2>
                            @yield('path')
                        </div>
                        <div class="flex"></div>
                        <nav aria-label="breadcrumb">
                            @yield('btn')
                        </nav>
                    </div>
                </div>
                <div class="page-content page-container" id="page-content" style="margin-top:-50px">
                    <div class="padding">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert"> {{ session('error') }} </div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- ############ Main END-->
        </div>
        <!-- ############ Content END-->

    </div>

    @yield('modal')


    <!-- build:js ../assets/js/site.min.js -->
    <!-- jQuery -->
    <script src="{{ asset('template/libs/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('template/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('template/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ajax page -->
    {{-- <script src="{{ asset('template/libs/pjax/pjax.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/ajax.js') }}"></script> --}}

    <!-- lazyload plugin -->
    <script src="{{ asset('template/assets/js/lazyload.config.js') }}"></script>
    <script src="{{ asset('template/assets/js/lazyload.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugin.js') }}"></script>

    <!-- scrollreveal -->
    <script src="{{ asset('template/libs/scrollreveal/dist/scrollreveal.min.js') }}"></script>
    <!-- feathericon -->
    <script src="{{ asset('template/libs/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/plugins/feathericon.js') }}"></script>
    <!-- theme -->
    <script src="{{ asset('template/assets/js/theme.js') }}"></script>
    <script src="{{ asset('template/assets/js/utils.js') }}"></script>
    <!-- endbuild -->
    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/d5e78ac528.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    @yield('js-bottom')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>
