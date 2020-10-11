@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('matches')}}">matches</a>
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
                    <h3 class="card-title">Update match data</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($match_data, ['url' => ['matches/'.$match_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                        <strong>Club name</strong>
                                {{ Form::select('club_id',$match_data->id,App\Club::pluck('club_name','id'),$player_data->club_id
                                ,["class"=>"form-control" ,'placeholder'=>'choose Club' ]) }}
                            </div>

                            <div class="form-group">
                        <strong>Home club name</strong>
                            {{ Form::select('home_club_id',$match_data->home_club_id,App\Club::pluck('club_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>'Choose home club' ]) }}
                        </div>

                        <div class="form-group">
                        <strong>Away club name</strong>
                        
                                {{ Form::select('away_club_id',$match_data->away_club_id,App\Club::pluck('club_name','id'),null
                                ,["class"=>"form-control" ,'placeholder'=>'Choose away club' ]) }}
                            </div>
                        
                        <div class="form-group">
                        <strong>Stadium name</strong>
                            {{ Form::select('stadium_id',$match_data->stadium_id,App\Stadium::pluck('stadium_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>'choose stadium' ]) }}
                        </div>

                        <div class="form-group">
                        <strong>Tournament name</strong>                        
                            {{ Form::select('tournament_id',$match_data->tournament_id,App\Tournament::pluck('tour_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>'choose tournament' ]) }}
                        </div>

                        <div class="form-group">
                        <strong>Match date</strong>                       
                        {{ Form::date('date',\Carbon\Carbon::now()->format('Y-MM-ddd'),["class"=>"form-control round" ,"required",'placeholder'=>'match date' ]) }}
                        </div>

                        <div class="form-group">
                        <strong>Match time</strong>                       
                        {{ Form::time('time',\Carbon\Carbon::now()->format('Y-MM-ddd'),["class"=>"form-control round" ,"required",'placeholder'=>'match time' ]) }}
                        </div>


                        {{ Form::submit( 'Edit',['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

