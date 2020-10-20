@extends('auth.auth_layout.login_temp')


@section('content')
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
		<div class="card border-grey border-lighten-3 px-2 py-2 m-0">
			<div class="card-header no-border">
				<div class="card-title text-xs-center">
					<img src="../../app-assets/images/logo/robust-logo-dark.png" alt="branding logo">
				</div>
				<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>أنشاء حساب</span></h6>
			</div>
			<div class="card-body collapse in">	
				<div class="card-block">
                <form method="POST" action="{{ route('register') }}">
                        @csrf
						<fieldset class="form-group position-relative has-icon-left mb-1">

                            <input id="name" type="text" class="form-control form-control-lg input-lg @error('name') is-invalid @enderror" 
                            name="name" placeholder="{{trans('admin.user_name')}}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-position">
							    <i class="icon-head"></i>
							</div>
						</fieldset>

						<fieldset class="form-group position-relative has-icon-left mb-1">
                            <input id="email" type="email" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror" 
                            name="email" placeholder="{{trans('admin.email')}}" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-position">
							    <i class="icon-mail6"></i>
							</div>
						</fieldset>

						<fieldset class="form-group position-relative has-icon-left">

                            <input id="password" type="password" class="form-control form-control-lg input-lg @error('password') is-invalid @enderror" 
                            name="password" placeholder="{{trans('admin.password')}}" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="red">{{ $message }}</strong>
                                </span>
                            @enderror
                        	<div class="form-control-position">
							    <i class="icon-key3"></i>
							</div>
						</fieldset>


                        <fieldset class="form-group position-relative has-icon-left">

                            <input id="password-confirm" type="password" class="form-control form-control-lg input-lg @error('confirm_password') is-invalid @enderror" 
                            name="password_confirmation" placeholder="{{trans('admin.confirm_pass')}}" required autocomplete="new-password">

                            @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong class="red">{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>


                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> {{trans('admin.sign_up')}}</button>
                        {{ Form::close() }}
				</div>
				<p class="text-xs-center">{{trans('admin.i_have_Already_account')}}<a href="{{url('login')}}" class="card-link">{{trans('admin.login')}}</a></p>
			</div>
		</div>
	</div>
</section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection