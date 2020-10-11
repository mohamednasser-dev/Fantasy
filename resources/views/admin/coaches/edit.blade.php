@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('coaches')}}">Coaches</a>
                </li>
                <li class="breadcrumb-item"> Update coach data
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
                    <h3 class="card-title">Update coach data</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($coach_data, ['url' => ['coaches/'.$coach_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                        <strong>Club name</strong>
                                {{ Form::select('club_id',App\Club::pluck('club_name','id'),$coach_data->club_id
                                ,["class"=>"form-control" ,'placeholder'=>'choose Club' ]) }}
                            </div>

                        <div class="form-group">
                        <strong>Coach name</strong>
                        {{ Form::text('coach_name',$coach_data->coach_name,["class"=>"form-control round" ,"required",'placeholder'=>'club name' ]) }}
                         </div>

                         <div class="form-group">
                        <strong>Age</strong>
                        {{ Form::number('age',$coach_data->age,["class"=>"form-control round" ,"required",'placeholder'=>'age' ]) }}
                         </div>

                        <div class="form-group">
                        <strong>description</strong>      
                            {{ Form::textArea('desc',$coach_data->desc,["class"=>"form-control round",'placeholder'=>'write club description' ]) }}
                        </div>

                        <div class="form-group">
                        <strong>Change coach image</strong>                 
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round')) }}
                            @if(!empty($coach_data->image))
                                <img src="{{ url($coach_data->image) }}"
                                     style="width:250px;height:250px;"/>
                            @endif
                        </div>


                        {{ Form::submit( 'Edit',['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

