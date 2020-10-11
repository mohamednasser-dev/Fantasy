@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('stadiums')}}">Stadiums</a>
                </li>
                <li class="breadcrumb-item"> Update stadium
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
                    <h3 class="card-title">Update stadium</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($stadium_data, ['url' => ['stadiums/'.$stadium_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                 
                        <div class="form-group">
          
                        <strong>stadium name</strong>
                        {{ Form::text('stadium_name',$stadium_data->name,["class"=>"form-control round" ,"required",'placeholder'=>'stadium name' ]) }}
                    </div>
                    
                        <div class="form-group">
                        <strong>Change stadium image</strong>
                                             
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round')) }}
                            @if(!empty($stadium_data->image))
                                <img src="{{ url($stadium_data->image) }}"
                                     style="width:250px;height:250px;"/>

                            @endif

                        </div>


                        {{ Form::submit( 'Edit' ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

