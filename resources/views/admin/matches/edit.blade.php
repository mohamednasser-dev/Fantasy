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
                <li class="breadcrumb-item">{{trans('admin.update_match')}}
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
                    <h3 class="card-title">{{trans('admin.update_match')}}</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($match_data, ['url' => ['matches/'.$match_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
  

                            <div class="form-group">
                        <strong>Home club name</strong>
                            {{ Form::select('home_club_id',App\Club::pluck('club_name','id'),$match_data->home_club_id
                            ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_home_club') ]) }}
                        </div>

                        <div class="form-group">
                        <strong>{{trans('admin.away_club_name')}}</strong>
                                {{ Form::select('away_club_id',App\Club::pluck('club_name','id'),$match_data->away_club_id
                                ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_away_club') ]) }}
                            </div>
                        
                        <div class="form-group">
                        <strong>{{trans('admin.stad_name')}}</strong>
                            {{ Form::select('stadium_id',App\Stadium::pluck('stadium_name','id'),$match_data->stadium_id
                            ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_stad') ]) }}
                        </div>

                        <div class="form-group">
                        <strong>{{trans('admin.tour_name')}}</strong>                        
                            {{ Form::select('tour_id',App\Tournament::pluck('tour_name','id'),$match_data->tour_id
                            ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_tour') ]) }}
                        </div>
                        <div class="form-group">
                        <strong>{{trans('admin.status')}}</strong> 
                        {{Form::select('status',
                            ['not started' => 'not started',
                             'started' => 'started',
                             'ended' => 'ended'
                             ],
                             $match_data->status
                             ,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.status') ])}}
                             </div>
                       
                        <div class="form-group">
                        <strong>{{trans('admin.match_date')}}</strong>                       
                        {{ Form::date('date',$match_data->date,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.match_date') ]) }}
                        </div>

                        <div class="form-group">
                        <strong>{{trans('admin.match_time')}}</strong>                       
                        {{ Form::time('time',$match_data->time,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.match_time') ]) }}
                        </div>


                        {{ Form::submit( trans('admin.public_Edit'),['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

