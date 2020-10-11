@extends('admin_temp')


@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('matches')}}">Matches</a>
                </li>
                <li class="breadcrumb-item"> Add new match
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
                    <h3 class="card-title">Add new match</h3>
                </div>

            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['matches/store'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}


                        <div class="form-group">
                            {{ Form::select('home_club_id',App\Club::pluck('club_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>'Choose home club' ]) }}
                        </div>

                        <div class="form-group">
                                {{ Form::select('away_club_id',App\Club::pluck('club_name','id'),null
                                ,["class"=>"form-control" ,'placeholder'=>'Choose away club' ]) }}
                            </div>
                        
                        <div class="form-group">
                            {{ Form::select('stadium_id',App\Stadium::pluck('stadium_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>'choose stadium' ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::select('tour_id',App\Tournament::pluck('tour_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>'choose tournament' ]) }}
                        </div>

                        <div class="form-group">
                        {{ Form::date('date',\Carbon\Carbon::now()->format('Y-MM-ddd'),["class"=>"form-control round" ,"required",'placeholder'=>'match date' ]) }}
                        </div>

                        <div class="form-group">
                        {{ Form::time('time',\Carbon\Carbon::now()->format('HH:mm'),["class"=>"form-control round" ,"required",'placeholder'=>'match time' ]) }}
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

