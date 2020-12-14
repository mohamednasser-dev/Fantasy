@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.add_new_club')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
               <li class="breadcrumb-item">{{trans('admin.add_new_club')}}</li>
              <li class="breadcrumb-item"><a href="{{url('clubs')}}">{{trans('admin.nav_clubs')}}</a></li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>             
  </div>
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">{{trans('admin.club_info')}}</h4>
                  <hr>              
                  {{ Form::open( ['url' => ['clubs/store'],'method'=>'post', 'files'=>'true' , 'class'=>'form'] ) }}
                      {{ csrf_field() }}
                  <div class="form-group row">
                     <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.classification')}}</label>
                      <div class="col-md-10">
                          {{Form::select('classification',
                              ['1st' => trans('admin.1st'),
                               '2nd' => trans('admin.2nd')
                               ],
                               null
                               ,["class"=>"custom-select col-12" ,"required",'placeholder'=>trans('admin.choose_classification') ])}}
                      </div>
                  </div>
                  <div class="form-group m-t-40 row">
                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.club_name')}}</label>
                      <div class="col-md-10">
                         {{ Form::text('club_name',old('club_name'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.club_name')]) }}
                      </div>
                  </div>
                  <div class="form-group m-t-40 row">
                      <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.club_name_en')}}</label>
                      <div class="col-md-10">
                         {{ Form::text('club_name_en',old('club_name_en'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.club_name_en')]) }}
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-search-input" class="col-md-2 col-form-label">{{trans('admin.tours')}}</label>
                      <div class="col-md-10">
                         {{ Form::textArea('tournaments',old('tournaments'),["class"=>"form-control","required"]) }}
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-email-input" class="col-md-2 col-form-label">{{trans('admin.desc')}}</label>
                      <div class="col-md-10">
                          {{ Form::textArea('desc',old('desc'),["class"=>"form-control",'placeholder'=>trans('admin.write_club_desc') ]) }}
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-url-input" class="col-md-2 col-form-label">{{trans('admin.date_created')}}</label>
                      <div class="col-md-10">
                           {{ Form::date('date_created',\Carbon\Carbon::now()->format('Y-MM-ddd'),["class"=>"form-control" ,"required" ]) }}
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-tel-input" class="col-md-2 col-form-label">{{trans('admin.club_image')}}</label>
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

