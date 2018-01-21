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

        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/pace/themes/blue/pace-theme-minimal.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}"/>
        <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}"/>
        <link rel="stylesheet" href="{{ asset('styles/app.css') }}"/>
        <link rel="stylesheet" href="{{ asset('styles/app.skins.css') }}"/>
    </head>
    <body>

        <div class="app no-padding no-footer layout-static">
            <div class="session-panel">
                <div class="session">
                    <div class="session-content">
                        <div class="card card-block form-layout">
                            <form id="validate" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="text-xs-center m-b-3">
                                    <img src="{{ asset('images/logo.png') }}" height="80" alt="" class="m-b-1"/>
                                    <p class="text-muted">
                                        This is a restricted site.
                                    </p>
                                </div>
                                <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">
                                        Email
                                    </label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </fieldset>
                                <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">
                                        Password
                                    </label>
                                    <input type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </fieldset>
                                <button class="btn btn-primary btn-block btn-lg" type="submit">
                                    Login
                                </button>
                            </form>
                        </div>
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

        <script src="{{ asset('vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script type="text/javascript">
            $('#validate').validate();
        </script>
    </body>
</html>
