@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('stadiums')}}">{{trans('admin.nav_stadiums')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_stad')}}
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
                    <h3 class="card-title">{{trans('admin.update_stad')}}</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($stadium_data, ['url' => ['stadiums/'.$stadium_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                 
                        <div class="form-group">
          
                        <strong>{{trans('admin.stad_name')}}</strong>
                        {{ Form::text('stadium_name',$stadium_data->name,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.stad_name') ]) }}
                    </div>
                    
                        <div class="form-group">
                        <strong>{{trans('admin.change_stad_image')}}</strong>
                                             
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                            @if(!empty($stadium_data->image))
                                <img src="{{ url($stadium_data->image) }}"
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

