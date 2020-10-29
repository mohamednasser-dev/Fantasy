@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.update_match')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.update_match')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('matches')}}" >{{trans('admin.nav_matches')}}</a> </li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('admin.match_info')}}</h4>
                    <hr>
                        {!! Form::model($match_data, ['url' => ['matches/'.$match_data->gwla_id.'/'.$match_data->home_club_id.'/'.$match_data->away_club_id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                                {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.classification')}}</label>
                            <div class="col-md-10">
                                {{Form::select('classification',
                                ['1st' => trans('admin.1st'),
                                 '2nd' => trans('admin.2nd')
                                ],
                                $match_data->getTournament->classification
                                ,["class"=>"custom-select col-12","id"=>"classif" ,"required",'placeholder'=>trans('admin.choose_classification') ])}}
                            </div>
                        </div>
                         <div class="form-group row" id="tour_cont" >
                            <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.tour')}}</label>                      
                            <div class="col-md-10">
                                {{ Form::select('tour_id',App\Tournament::pluck('tour_name','id'),$match_data->tour_id
                                ,["class"=>"custom-select col-12" ,"id"=>"tour" ]) }}
                            </div>
                        </div>
                        <div class="form-group row" id="gawalatCon" >
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.gwalat')}}</label>
                        <div class="col-md-10">
                                {{ Form::select('gwla_id',App\Gwalat::pluck('name','id'),$match_data->gwla_id
                                ,["class"=>"custom-select col-12" ,"id"=>"gwalat"]) }}
                        </div>
                        </div>
                        <div class="form-group row" id="home_club_cont" >                
                            <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.home_club')}}</label>
                            <div class="col-md-10">
                                {{ Form::select('home_club_id',App\Club::pluck('club_name','id'),$match_data->home_club_id
                                ,["class"=>"custom-select col-12" ,"id"=>"home_clubs",'placeholder'=>trans('admin.choose_home_club') ]) }}
                            </div>
                        </div>
                        <div class="form-group row" id="away_club_cont" >
                            <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.away_club')}}</label>
                            <div class="col-md-10">
                                {{ Form::select('away_club_id',App\Club::pluck('club_name','id'),$match_data->away_club_id
                                ,["class"=>"custom-select col-12" ,"id"=>"away_clubs",'placeholder'=>trans('admin.choose_away_club') ]) }}
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.stad')}}</label>
                            <div class="col-md-10">
                                {{ Form::select('stadium_id',App\Stadium::pluck('stadium_name','id'),$match_data->stadium_id
                                ,["class"=>"custom-select col-12" ,'placeholder'=>trans('admin.choose_stad') ]) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.status')}}</label>
                            <div class="col-md-10">
                                {{Form::select('status',
                                    ['not started' => trans('admin.not_started'),
                                     'started' => trans('admin.started'),
                                     'ended' => trans('admin.ended')
                                     ],
                                     $match_data->status
                                     ,["class"=>"custom-select col-12" ,"required",'placeholder'=>trans('admin.status') ])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.match_date')}}</label>
                            <div class="col-md-10">
                                {{ Form::date('date',$match_data->date,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.match_date') ]) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.match_time')}}</label>
                            <div class="col-md-10">
                                {{ Form::time('time',$match_data->time,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.match_time') ]) }}
                            </div>
                        </div>
                        <div class="center">
                                {{ Form::submit( trans('admin.public_Edit') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        </div>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{url('/js/matchAjax.js') }}"></script>
@endsection
