@extends('auth.auth_layout.login_temp')


@section('content')
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
                                <span>{{trans('admin.website_title')}}</span></h6>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block">
                                <form class="form-horizontal form-simple" method="POST" action="{{route('login') }}"
                                      novalidate>
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-0">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                               class="form-control form-control-lg input-lg" id="email"
                                               placeholder="{{trans('admin.email')}}" required>
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
                                               placeholder="{{trans('admin.password')}}" required>
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
                                                <label for="remember-me">{{trans('admin.remember')}}</label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-xs-12 text-xs-center text-md-right">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}"
                                                   class="card-link"> {{trans('admin.forgot')}}</a>
                                            @endif
                                        </div>
                                    </fieldset>
                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="icon-unlock2"></i>{{trans('admin.login')}} </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                <div class="">
                     <a href="{{url('register')}}" class="card-link">{{trans('admin.sign_up')}}</a>
                </div>
            </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection