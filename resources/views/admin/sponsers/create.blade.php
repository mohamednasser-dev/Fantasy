@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.add_new_sponser')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.add_new_sponser')}}</li>
              <li class="breadcrumb-item"><a href="{{url('sponsers')}}">{{trans('admin.nav_sponsers')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>             
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">{{trans('admin.sponser_info')}}</h4>
                  <hr>              
                  {{ Form::open( ['url' => ['sponsers'],'method'=>'POST', 'files'=>'true' , 'class'=>'form'] ) }}
                      {{ csrf_field() }}
                  <div class="form-group row">
                      <label for="example-tel-input" class="col-md-2 col-form-label">{{trans('admin.sponser_image')}}</label>
                      <div class="col-md-10">
                          {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                      </div>
                  </div>
                  <div class="center">
                      {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-info','style'=>'margin:10px']) }}
                  </div>
                  {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
@endsection

