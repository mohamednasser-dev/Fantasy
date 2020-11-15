@extends('admin_temp')
@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
          <h3 class="text-themecolor">{{trans('admin.add_new_match')}}</h3>
      </div>
      <div class="col-md-7 align-self-center">
          <ol class="breadcrumb">
              <li class="breadcrumb-item">{{trans('admin.add_new_match')}}</li>
              <li class="breadcrumb-item active"><a href="{{url('matches')}}" >{{trans('admin.nav_matches')}}</a> </li>
              <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
          </ol>
      </div>
   </div>

   <div class="alert alert-warning"> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> {{trans('admin.attention')}}</h3>
    {{trans('admin.create_match_hint')}}              
   </div>
   <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
                 <h4 class="card-title">{{trans('admin.match_info')}}</h4>
                 <hr>   
                    {{ Form::open( ['url' => ['matches/store'],'method'=>'post', 'files'=>'true'] ) }}
                    {{ csrf_field() }}
                      <div class="form-group row">
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.classification')}}</label>
                        <div class="col-md-10">
                            {{Form::select('classification',
                            ['1st' => trans('admin.1st'),
                             '2nd' => trans('admin.2nd')
                            ],
                            null
                            ,["class"=>"custom-select col-12","id"=>"classif" ,"required",'placeholder'=>trans('admin.choose_classification') ])}}
                        </div>
                      </div>         
                      <div class="form-group row" id="tour_cont" style="display:none;">
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.tour')}}</label>                    
                        <div class="col-md-10">
                            {{ Form::select('tour_id',App\Tournament::pluck('tour_name','id'),null
                            ,["class"=>"custom-select col-12" ,"id"=>"tour" ]) }}
                        </div>
                      </div>
                      <div class="form-group row" id="gawalatCon" style="display:none;">
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.gwalat')}}</label>
                        <div class="col-md-10">
                            {{ Form::select('gwla_id',App\Gwalat::pluck('name','id'),null
                            ,["class"=>"custom-select col-12" ,"id"=>"gwalat"]) }}
                        </div>
                      </div>
                      <div class="form-group row" id="home_club_cont" style="display:none;">                
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.home_club')}}</label>
                        <div class="col-md-10">
                            {{ Form::select('home_club_id',App\Club::pluck('club_name','id'),null
                            ,["class"=>"custom-select col-12" ,"id"=>"home_clubs",'placeholder'=>trans('admin.choose_home_club') ]) }}
                        </div>
                      </div>
                      <div class="form-group row" id="away_club_cont" style="display:none;">
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.away_club')}}</label>
                        <div class="col-md-10">
                            {{ Form::select('away_club_id',App\Club::pluck('club_name','id'),null
                            ,["class"=>"custom-select col-12" ,"id"=>"away_clubs",'placeholder'=>trans('admin.choose_away_club') ]) }}
                        </div>
                      </div>
                      <div class="form-group row"> 
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.stad')}}</label>
                        <div class="col-md-10">
                            {{ Form::select('stadium_id',App\Stadium::pluck('stadium_name','id'),null
                            ,["class"=>"custom-select col-12" ,'placeholder'=>trans('admin.choose_stad') ]) }}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.match_date')}}</label>
                        <div class="col-md-10">
                            {{ Form::date('date',\Carbon\Carbon::now()->format('Y-MM-ddd'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.match_date') ]) }}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-month-input" class="col-md-2 col-form-label">{{trans('admin.match_time')}}</label>
                        <div class="col-md-10">
                            {{ Form::time('time',\Carbon\Carbon::now()->format('HH:mm'),["class"=>"form-control" ,"required",'placeholder'=>trans('admin.') ]) }}
                        </div>
                      </div>
                      <div class="center">
                            {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
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


