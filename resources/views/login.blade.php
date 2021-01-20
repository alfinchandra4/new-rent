<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Signin | Basik - Bootstrap 4 Web Application</title>
        <meta name="description" content="Responsive, Bootstrap, BS4" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- style -->
        <!-- build:css ../assets/css/site.min.css -->
        <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/theme.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}" type="text/css" />
        <!-- endbuild -->
    </head>
    <body class="layout-row">
        <div class="d-flex flex-column flex">
            <div class="row no-gutters h-100">
                <div class="col-md-6 bg-primary" style="">
                    <div class="p-3 p-md-5 d-flex flex-column h-100">
                        <h4 class="mb-3 text-white">INTI LAUT RENTAL</h4>
                        <div class="text-fade">Heavy Equipments Web Application</div>
                        <div class="d-flex flex align-items-center justify-content-center">
                        </div>
                        <div class="d-flex text-sm text-fade">
                            {{-- <a href="index.html" class="text-white">System v0.1</a> --}}
                            <span class="flex"></span>
                            {{-- <a href="#" class="text-white mx-1">Terms</a> --}}
                            <a href="#" class="text-white mx-1">System v0.1</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="content-body">
                        <div class="p-3 p-md-5">
                            <h5>Welcome back</h5>
                            <p>
                                <small class="text-muted">Login to manage your account</small>
                            </p>
                            <form role="form" action="/attempting" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Enter email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary mb-4">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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