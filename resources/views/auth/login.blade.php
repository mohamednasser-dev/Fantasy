<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Fantasy</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/app-assets/images/ico/apple-icon-60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/app-assets/images/ico/apple-icon-76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/app-assets/images/ico/apple-icon-152.png') }}">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/app-assets/images/ico/favicon.ico') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/app-assets/images/ico/favicon-32.png') }}"> -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
@if(session('lang')=='en')
    <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap.css') }}">
        <!-- font icons-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/fonts/icomoon.css') }}">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/pace.css') }}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN ROBUST CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/colors.css') }}">
        <!-- END ROBUST CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css"
              href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/pages/login-register.css') }}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
        <!-- END Custom CSS-->
@else
    <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/bootstrap.css') }}">
        <!-- font icons-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/fonts/icomoon.css') }}">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/extensions/pace.css') }}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN ROBUST CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/colors.css') }}">
        <!-- END ROBUST CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css"
              href="{{ asset('/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('/app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css-rtl/pages/login-register.css') }}">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style-rtl.css') }}">
        <!-- END Custom CSS-->
    @endif

</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column"
      class="vertical-layout vertical-menu 1-column  blank-page blank-page">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1"><img src="{{ asset('/app-assets/images/logo/robust-logo-.png') }}"
                                                      alt="branding logo"></div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2">
                                <span>login Title</span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal form-simple" method="POST" action="{{route('login') }}"
                                      novalidate>
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                               class="form-control form-control-lg input-lg" id="email"
                                               placeholder="Email" required>
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                        @error('email')
                                        <span role="alert">
                                        <strong class="red">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </fieldset>
                                    <br>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input type="password" class="form-control form-control-lg input-lg"
                                               name="password" id="password"
                                               placeholder="Password" required>
                                        <div class="form-control-position">
                                            <i class="icon-key3"></i>
                                        </div>
                                        @error('password')
                                        <span role="alert">
                                        <strong class="red">{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="form-group row">
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                            <fieldset>
                                                <input type="checkbox" id="remember" name="remember"
                                                       class="chk-remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label for="remember-me">Remember me</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-right">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"
                                                   class="card-link">Forget password</a>
                                            @endif
                                        </div>
                                    </fieldset>
                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="icon-unlock2"></i>Login</button>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="{{ asset('/app-assets/js/core/libraries/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/tether.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/js/core/libraries/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/unison.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/blockUI.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/jquery.matchHeight-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/ui/screenfull.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/vendors/js/extensions/pace.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="{{ asset('/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ asset('/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>
