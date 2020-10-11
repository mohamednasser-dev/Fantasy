@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('clubs')}}">Clubs</a>
                </li>
                <li class="breadcrumb-item"> Update Club
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
                    <h3 class="card-title">Update Club</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($club_data, ['url' => ['clubs/'.$club_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                 
                        <div class="form-group">
          
                        <strong>club name</strong>
                        {{ Form::text('club_name',$club_data->name,["class"=>"form-control round" ,"required",'placeholder'=>'club name' ]) }}
                    </div>

                    <div class="form-group">
                    <strong>tournaments</strong>
                                     
                        {{ Form::textArea('tournaments',$club_data->name,["class"=>"form-control round",'placeholder'=>'tournaments' ]) }}
                    </div>
                    <div class="form-group">
                    <strong>description</strong>
                                     
                        {{ Form::textArea('desc',$club_data->desc,["class"=>"form-control round",'placeholder'=>'write club description' ]) }}
                    </div>
                    <div class="form-group">
                    <strong>date created</strong>
                                    
                        {{ Form::date('date_created',$club_data->date_created,["class"=>"form-control round" ,"required",'placeholder'=>'date created' ]) }}
                    </div>

               

                        <div class="form-group">
                        <strong>Change club image</strong>
                                             
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round')) }}
                            @if(!empty($club_data->image))
                                <img src="{{ url($club_data->image) }}"
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

