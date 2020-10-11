@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('players')}}">Players</a>
                </li>
                <li class="breadcrumb-item"> Update player data
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
                    <h3 class="card-title">Update player data</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($player_data, ['url' => ['players/'.$player_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                        <strong>Club name</strong>
                                {{ Form::select('club_id',App\Club::pluck('club_name','id'),$player_data->club_id
                                ,["class"=>"form-control" ,'placeholder'=>'choose Club' ]) }}
                            </div>

                        <div class="form-group">
                        <strong>Player name</strong>
                        {{ Form::text('player_name',$player_data->player_name,["class"=>"form-control round" ,"required",'placeholder'=>'club name' ]) }}
                         </div>
                         <div class="form-group">
                         {{Form::select('center_name',
                          ['LWB' => 'LWB : Left Wing Back',
                           'CDM' => 'CDM : Center Defensive Midfielder',
                           'CM' => 'CM : Center Midfielder',
                           'LM' => 'LM : Left Midfielder', 
                           'RM' => 'RM : Right Midfielder',
                           'CAM' => 'CAM : Central Attacking Midfielder',
                           'CF' => 'CF : Center Forward', 
                           'ST' => 'ST : Striker'],
                           $player_data->center_name
                           ,["class"=>"form-control round" ,"required",'placeholder'=>'center name' ])}}
                                                </div>
                         <div class="form-group">
                        <strong>Age</strong>
                        {{ Form::number('age',$player_data->age,["class"=>"form-control round" ,"required",'placeholder'=>'age' ]) }}
                         </div>

                        <div class="form-group">
                        <strong>description</strong>      
                            {{ Form::textArea('desc',$player_data->desc,["class"=>"form-control round",'placeholder'=>'write club description' ]) }}
                        </div>

                        <div class="form-group">
                        <strong>Change player image</strong>                 
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round')) }}
                            @if(!empty($player_data->image))
                                <img src="{{ url($player_data->image) }}"
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

