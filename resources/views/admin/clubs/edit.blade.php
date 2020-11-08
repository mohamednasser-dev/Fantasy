@extends('admin_temp')
@section('content')
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h3 class="text-themecolor">{{trans('admin.update_club')}}</h3>
    </div>
    <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">{{trans('admin.update_club')}}</li>
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
              {!! Form::model($club_data, ['url' => ['clubs/'.$club_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.classification')}}</label>
                <div class="col-md-10">
                  {{Form::select('classification',
                      ['1st' => trans('admin.1st'),
                       '2nd' => trans('admin.2nd')
                       ],
                       $club_data->classification
                       ,["class"=>"custom-select col-12" ,"required",'placeholder'=>trans('admin.choose_classification') ])}}
                </div>
              </div>
              <div class="form-group m-t-40 row">
                  <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.club_name')}}</label>
                  <div class="col-md-10">
                   {{ Form::text('club_name', $club_data->club_name,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.club_name')]) }}
                  </div>
              </div>

              <div class="form-group row">
                  <label for="example-search-input" class="col-md-2 col-form-label">{{trans('admin.tours')}}</label>
                  <div class="col-md-10">
                   {{ Form::textArea('tournaments',$club_data->tournaments,["class"=>"form-control","required"]) }}
                  </div>
              </div>

              <div class="form-group row">
                  <label for="example-email-input" class="col-md-2 col-form-label">{{trans('admin.desc')}}</label>
                  <div class="col-md-10">
                    {{ Form::textArea('desc',$club_data->desc,["class"=>"form-control",'placeholder'=>trans('admin.write_club_desc') ]) }}
                  </div>
              </div>
              <div class="form-group row">
                <label for="example-url-input" class="col-md-2 col-form-label">{{trans('admin.date_created')}}</label>
                <div class="col-md-10">
                  {{ Form::date('date_created',$club_data->date_created,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.date_creatrd')]) }}
                </div>
              </div>
              <div class="form-group row">
                <label for="example-tel-input" class="col-md-2 col-form-label">{{trans('admin.club_image')}}</label>
                <div class="col-md-10">
                  {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                  @if(!empty($club_data->image))
                    <img src="{{ url($club_data->image) }}"
                         style="width:250px;height:250px;"/>
                  @endif
                </div>
              </div>
              <div class="center">
                {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
              </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
  </div>
@endsection

