@extends('admin_temp')


@section('content')
    <br>
    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('matches')}}">{{trans('admin.nav_matches')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.add_new_match')}}
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
                    <h3 class="card-title">{{trans('admin.add_new_match')}}</h3>
                </div>

            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">
                        {{ Form::open( ['url' => ['matches/store'],'method'=>'post', 'files'=>'true'] ) }}
                        {{ csrf_field() }}


                        <div class="form-group">
                            {{ Form::select('home_club_id',App\Club::pluck('club_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_home_club') ]) }}
                        </div>

                        <div class="form-group">
                                {{ Form::select('away_club_id',App\Club::pluck('club_name','id'),null
                                ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_away_club') ]) }}
                            </div>
                        
                        <div class="form-group">
                            {{ Form::select('stadium_id',App\Stadium::pluck('stadium_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_stad') ]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::select('tour_id',App\Tournament::pluck('tour_name','id'),null
                            ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_tour') ]) }}
                        </div>

                        <div class="form-group">
                        {{ Form::date('date',\Carbon\Carbon::now()->format('Y-MM-ddd'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.match_date') ]) }}
                        </div>

                        <div class="form-group">
                        {{ Form::time('time',\Carbon\Carbon::now()->format('HH:mm'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.match_time') ]) }}
                        </div>

                        <div class="center">
                            {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}

                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

