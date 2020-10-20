@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('clubs')}}">{{trans('admin.nav_clubs')}} </a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_club')}} 
                </li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            @include('layouts.errors')
            @include('layouts.messages')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('admin.update_club')}}</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($club_data, ['url' => ['clubs/'.$club_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                        <strong>{{trans('admin.classification')}}</strong>
                        
                        {{Form::select('classification',
                            ['1st' => '1st',
                             '2nd' => '2nd'
                             ],
                             $club_data->classification
                             ,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.choose_classification') ])}}
                                                </div>

                        <div class="form-group">
          
                        <strong>{{trans('admin.club_name')}}</strong>
                        {{ Form::text('club_name',$club_data->name,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.club_name') ]) }}
                    </div>

                    <div class="form-group">
                    <strong>{{trans('admin.tours')}}</strong>
                                     
                        {{ Form::textArea('tournaments',$club_data->name,["class"=>"form-control","required",'placeholder'=>trans('admin.tours') ]) }}
                    </div>
                    <div class="form-group">
                    <strong>{{trans('admin.desc')}}</strong>
                                     
                        {{ Form::textArea('desc',$club_data->desc,["class"=>"form-control",'placeholder'=>trans('admin.write_club_desc') ]) }}
                    </div>
                    <div class="form-group">
                    <strong>{{trans('admin.date_created')}}</strong>
                                    
                        {{ Form::date('date_created',$club_data->date_created,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.date_creatrd')]) }}
                    </div>

               

                        <div class="form-group">
                        <strong>{{trans('admin.change_club_image')}}</strong>
                                             
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                            @if(!empty($club_data->image))
                                <img src="{{ url($club_data->image) }}"
                                     style="width:250px;height:250px;"/>

                            @endif

                        </div>


                        {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

