<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1"/>
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="RhinoIO.v1">

        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="RhinoIO.v1">

        <meta name="theme-color" content="#4C7FF0">

        <title>RhinoIO.v1 - Pug Ventures, LLC</title>

        <link rel="stylesheet" href="{{ asset('vendor/jquery.tagsinput/src/jquery.tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/jquery-labelauty/source/jquery-labelauty.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/multiselect/css/multi-select.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/ui-select/dist/select.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/select2/select2.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/selectize/dist/css/selectize.css') }}">

        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/pace/themes/blue/pace-theme-minimal.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/sweetalert/dist/sweetalert.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/summernote/dist/summernote.css') }}"/>
        <link rel="stylesheet" href="{{ asset('styles/app.css') }}"/>
        <link rel="stylesheet" href="{{ asset('styles/app.skins.css') }}"/>
    </head>
    <body>
        <div class="app">

            @include('layouts.nav')

            <div class="main-panel">
                <nav class="header navbar">
                    <div class="header-inner">
                        <a class="navbar-item navbar-spacer-right navbar-heading hidden-md-down" href="#">
                            <span>@yield('title')</span>
                        </a>
                        <div class="navbar-search navbar-item">
                            <form class="search-form">
                                <i class="material-icons">search</i>
                                <input class="form-control" type="text" placeholder="Search" />
                            </form>
                        </div>
                    </div>
                </nav>

                <div class="main-content">
                    @include('layouts.alerts')

                    <div class="content-view">
                        @yield('content')
                    </div>

                    <div class="content-footer">
                        <nav class="footer-right">
                            <ul class="nav">
                                <li>
                                    <a href="javascript:;">Feedback</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            window.paceOptions = {
                document: true,
                eventLag: true,
                restartOnPushState: true,
                restartOnRequestAfter: true,
                ajax: {
                    trackMethods: ['POST', 'GET']
                }
            };
        </script>

        <script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('vendor/pace/pace.js') }}"></script>
        <script src="{{ asset('vendor/tether/dist/js/tether.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('vendor/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('scripts/constants.js') }}"></script>
        <script src="{{ asset('scripts/main.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="{{ asset('vendor/summernote/dist/summernote.js') }}"></script>
        <script src="{{ asset('vendor/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
        <script src="{{ asset('vendor/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('vendor/select2/select2.js') }}"></script>
        <script src="{{ asset('vendor/selectize/dist/js/standalone/selectize.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-labelauty/source/jquery-labelauty.js') }}"></script>
        <script src="{{ asset('vendor/multiselect/js/jquery.multi-select.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js') }}"></script>
        <script src="{{ asset('scripts/helpers/noty-defaults.js') }}"></script>

        @stack('scripts')

        <script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    </body>
</html>