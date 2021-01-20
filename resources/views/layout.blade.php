<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>A | Basik - Bootstrap 4 Web Application</title>
        <meta name="description" content="Responsive, Bootstrap, BS4" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- style -->
        <!-- build:css ../assets/css/site.min.css -->
        <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/theme.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}" type="text/css" />
        <!-- endbuild -->
    </head>
    <body class="layout-column">
        <header id="header" class="page-header bg-white box-shadow">
            <div class="navbar navbar-expand-lg">
                <!-- brand -->
                <a href="index.html" class="navbar-brand ">
                    <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                        <g class="loading-spin" style="transform-origin: 256px 256px">
                            <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"></path>
                        </g>
                    </svg>
                    <!-- <img src="../assets/img/logo.png" alt="..."> -->
                    <span class="hidden-folded d-inline l-s-n-1x ">Basik</span>
                </a>
                <!-- / brand -->
                <!-- Navbar collapse -->
                <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler">
                    <form class="input-group m-2 my-lg-0 ">
                        <div class="input-group-prepend">
                            <button type="button" class="btn no-shadow no-bg px-0">
                                <i data-feather="search"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control no-border no-shadow no-bg typeahead" placeholder="Search components..." data-plugin="typeahead" data-api="../assets/api/menu.json">
                    </form>
                    <ul class="navbar-nav mt-lg-0 mx-0 mx-lg-2 ">
                        <li class="nav-item">
                            <a href="layout.a.html" class="nav-link">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                Applications
                            </a>
                            <div class="dropdown-menu mt-3 dropdown-menu-right" role="menu">
                                <a href="app.mail.html" class="dropdown-item">
                                    Email
                                </a>
                                <a href="app.message.html" class="dropdown-item">
                                    Message
                                </a>
                                <a href="app.calendar.html" class="dropdown-item">
                                    Calendar
                                </a>
                                <a href="app.user.html" class="dropdown-item">
                                    Users
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="page.invoice.html" class="dropdown-item">
                                    Invoice
                                </a>
                                <a href="page.faq.html" class="dropdown-item">
                                    FAQ
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-menu order-1 order-lg-2">
                    <li class="nav-item d-none d-sm-block">
                        <a class="nav-link px-2" data-toggle="fullscreen" data-plugin="fullscreen">
                            <i data-feather="maximize"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link px-2" data-toggle="dropdown">
                            <i data-feather="settings"></i>
                        </a>
                        <!-- ############ Setting START-->
                        <div class="dropdown-menu dropdown-menu-center mt-3 w animate fadeIn">
                            <div class="setting px-3">
                                <div class="mb-2 text-muted">
                                    <strong>Setting:</strong>
                                </div>
                                {{-- <div class="mb-3" id="settingLayout">
                                    <label class="ui-check ui-check-rounded my-1 d-block">
                                        <input type="checkbox" name="stickyHeader">
                                        <i></i>
                                        <small>Sticky header</small>
                                    </label>
                                    <label class="ui-check ui-check-rounded my-1 d-block">
                                        <input type="checkbox" name="stickyAside">
                                        <i></i>
                                        <small>Sticky aside</small>
                                    </label>
                                    <label class="ui-check ui-check-rounded my-1 d-block">
                                        <input type="checkbox" name="foldedAside">
                                        <i></i>
                                        <small>Folded Aside</small>
                                    </label>
                                    <label class="ui-check ui-check-rounded my-1 d-block">
                                        <input type="checkbox" name="hideAside">
                                        <i></i>
                                        <small>Hide Aside</small>
                                    </label>
                                </div> --}}
                                <div class="mb-2 text-muted">
                                    <strong>Color:</strong>
                                </div>
                                <div class="mb-2">
                                    <label class="radio radio-inline ui-check ui-check-md">
                                        <input type="radio" name="bg" value="">
                                        <i></i>
                                    </label>
                                    <label class="radio radio-inline ui-check ui-check-color ui-check-md">
                                        <input type="radio" name="bg" value="bg-dark" checked="checked">
                                        <i class="bg-dark"></i>
                                    </label>
                                </div>
                                {{-- <div class="mb-2 text-muted">
                                    <strong>Layout:</strong>
                                </div>
                                <div class="mb-2">
                                    <a href="dashboard.html" class="btn btn-sm btn-white no-ajax">Default</a>
                                    <a href="layout.a.html?bg" class="btn btn-sm btn-white no-ajax">A</a>
                                </div> --}}
                            </div>
                        </div>
                        <!-- ############ Setting END-->
                    </li>

                    <!-- User dropdown menu -->
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color">
                            <span class="avatar w-24" style="margin: -2px;"><img src="{{ asset('template/assets/img/a0.jpg') }}" alt="..."></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn">
                            <a class="dropdown-item" href="#">
                                <span>Jacqueline Reid</span>
                            </a>
                            <a class="dropdown-item" href="signin.html">Sign out</a>
                        </div>
                    </li>
                    <!-- Navarbar toggle btn -->
                    <li class="nav-item d-lg-none">
                        <a href="#" class="nav-link px-2" data-toggle="collapse" data-toggle-class data-target="#navbarToggler">
                            <i data-feather="search"></i>
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link px-1" data-toggle="modal" data-target="#aside">
                            <i data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        <div id="main" class="layout-row flex">
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div class="page-container">
                    <div class="padding">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info alert-dismissible fade show p-4 mb-4" role="alert">
                                    <div class="d-flex">
                                        <span class="w-40 avatar circle gd-info"><i data-feather="award"></i></span>
                                        <div class="d-sm-flex">
                                            <div class="mx-3 align-self-start">
                                                <h6>Welcome back, Jacqueline Reid</h6>
                                                <small>You have 4 notifications unread and 5 tasks assigned today</small>
                                            </div>
                                            <div class="mx-3">
                                                <a href="#" class="btn btn-sm btn-rounded btn-outline-info my-2">Start now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card pb-3">
                                            <div class="p-3-4">
                                                <div class="d-flex">
                                                    <div>
                                                        <h6>Upcoming tasks</h6>
                                                        <small class="text-muted">Active: 9</small>
                                                    </div>
                                                    <span class="flex"></span>
                                                    <div>
                                                        <a href="#" class="btn btn-white btn-sm">Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list list-row">
                                                <div class="list-item " data-id="10">
                                                    <div>
                                                        <label class="ui-check m-0 ui-check-rounded ui-check-md">
                                                            <input type="checkbox" name="id" value="10">
                                                            <i></i>
                                                        </label>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="music.detail.html" class="item-title text-color h-1x">AI assistant</a>
                                                        <div class="item-except text-muted text-sm h-1x">
                                                            Leaders are running an AMA on Reddit. Ask your question and find out how the project is going
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="item-action dropdown">
                                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                                <i data-feather="more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                <a class="dropdown-item" href="#">
                                                                    See detail
                                                                </a>
                                                                <a class="dropdown-item download">
                                                                    Download
                                                                </a>
                                                                <a class="dropdown-item edit">
                                                                    Edit
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item trash">
                                                                    Delete item
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list-item " data-id="13">
                                                    <div>
                                                        <label class="ui-check m-0 ui-check-rounded ui-check-md">
                                                            <input type="checkbox" name="id" value="13">
                                                            <i></i>
                                                        </label>
                                                    </div>
                                                    <div class="flex">
                                                        <a href="music.detail.html" class="item-title text-color h-1x">Feed Reader</a>
                                                        <div class="item-except text-muted text-sm h-1x">
                                                            Email message from a happy user: 'Neat tool.. seems to be the easiest of'
                                                            <a href='#'>#big data</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="item-action dropdown">
                                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                                <i data-feather="more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                <a class="dropdown-item" href="#">
                                                                    See detail
                                                                </a>
                                                                <a class="dropdown-item download">
                                                                    Download
                                                                </a>
                                                                <a class="dropdown-item edit">
                                                                    Edit
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item trash">
                                                                    Delete item
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ############ Main END-->
            </div>
            <!-- ############ Content END-->
        </div>
        @include('layouts.footer')

        <!-- build:js ../assets/js/site.min.js -->
        <!-- jQuery -->
        <script src="{{ asset('template/libs/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('template/libs/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('template/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- ajax page -->
        <script src="{{ asset('template/libs/pjax/pjax.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/ajax.js') }}"></script>
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
    </body>
</html>