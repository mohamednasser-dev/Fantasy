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
                <li class="breadcrumb-item"> Add new Coach
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
                    <h3 class="card-title">Add new Coach</h3>
                </div>

            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['players/store'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}

                        <div class="form-group">
                                {{ Form::select('club_id',App\Club::pluck('club_name','id'),null
                                ,["class"=>"form-control" ,'placeholder'=>'choose Club' ]) }}
                            </div>
                        <div class="form-group">
                            {{ Form::text('player_name',old('player_name'),["class"=>"form-control round" ,"required",'placeholder'=>'player name' ]) }}
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
                             null
                             ,["class"=>"form-control round" ,"required",'placeholder'=>'center name' ])}}
                                                </div>
                        
                        <div class="form-group">
                            {{ Form::number('age',old('age'),["class"=>"form-control round" ,"required",'placeholder'=>'age' ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::textArea('desc',old('desc'),["class"=>"form-control round",'placeholder'=>'write player description' ]) }}
                        </div>
                 
                        <div class="form-group">
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control round' ,"required",'placeholder'=>'Player image')) }}
                        </div>

                        <div class="center">
                            {{ Form::submit( 'Add' ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

