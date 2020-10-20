@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}}</a>
                </li
                <li class="breadcrumb-item"><a href="{{url('coaches')}}">{{trans('admin.nav_coaches')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_coach')}}
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
                    <h3 class="card-title">{{trans('admin.update_coach')}}</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($coach_data, ['url' => ['coaches/'.$coach_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                        <strong>{{trans('admin.club_name')}}</strong>
                                {{ Form::select('club_id',App\Club::pluck('club_name','id'),$coach_data->club_id
                                ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_club') ]) }}
                            </div>

                        <div class="form-group">
                        <strong>{{trans('admin.coach_name')}}</strong>
                        {{ Form::text('coach_name',$coach_data->coach_name,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.club_name') ]) }}
                         </div>

                         <div class="form-group">
                        <strong>{{trans('admin.age')}}</strong>
                        {{ Form::number('age',$coach_data->age,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.age') ]) }}
                         </div>

                        <div class="form-group">
                        <strong>{{trans('admin.desc')}}</strong>      
                            {{ Form::textArea('desc',$coach_data->desc,["class"=>"form-control",'placeholder'=>trans('admin.write_club_desc')]) }}
                        </div>

                        <div class="form-group">
                        <strong>{{trans('admin.change_coach_image')}}</strong>                 
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                            @if(!empty($coach_data->image))
                                <img src="{{ url($coach_data->image) }}"
                                     style="width:250px;height:250px;"/>
                            @endif
                        </div>


                        {{ Form::submit( trans('admin.public_Edit'),['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

