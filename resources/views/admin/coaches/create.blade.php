@extends('admin_temp')
@section('content')
   <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.add_new_coach')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.add_new_coach')}}</li>
                <li class="breadcrumb-item"><a href="{{url('coaches')}}">{{trans('admin.nav_coaches')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>   
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">{{trans('admin.coach_info')}}</h4>
                  <hr>
                  {{ Form::open( ['url' => ['coaches/store'],'method'=>'post', 'files'=>'true'] ) }}
                      {{ csrf_field() }}
                      <div class="form-group row">
                          <label for="example-month-input" class="col-md-2 col-form-label">
                              {{trans('admin.club_name')}}
                          </label>
                          <div class="col-md-10">
                              {{ Form::select('club_id',App\Club::pluck('club_name','id'),null
                          ,["class"=>"custom-select col-12" ,'placeholder'=>trans('admin.choose_club') ]) }}
                          </div>
                      </div>
                      <div class="form-group m-t-40 row">
                          <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.coach_name')}}</label>
                          <div class="col-md-10">
                              {{ Form::text('coach_name',old('coach_name'),["class"=>"form-control" ,"required"]) }}
                          </div>
                      </div>
                      <div class="form-group m-t-40 row">
                          <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.coach_name_en')}}</label>
                          <div class="col-md-10">
                              {{ Form::text('coach_name_en',old('coach_name_en'),["class"=>"form-control" ,"required"]) }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="example-search-input" class="col-md-2 col-form-label">{{trans('admin.age')}}</label>
                          <div class="col-md-10">
                              {{ Form::number('age',old('age'),["class"=>"form-control" ,"required","min"=>'1']) }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="example-email-input" class="col-md-2 col-form-label">{{trans('admin.desc')}}</label>
                          <div class="col-md-10">
                              {{ Form::textArea('desc',old('desc'),["class"=>"form-control",'placeholder'=>trans('admin.write_coach_desc')]) }}
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="example-tel-input" class="col-md-2 col-form-label">{{trans('admin.club_image')}}</label>
                          <div class="col-md-10">
                                {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control' ,'placeholder'=>trans('admin.coach_image'))) }}
                          </div>
                      </div>
                      <div class="center">
                          {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                      </div>
                  {{ Form::close() }}
              </div>
          </div>
      </div>
  </div>
@endsection

