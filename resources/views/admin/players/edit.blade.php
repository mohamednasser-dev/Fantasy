@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.update_player')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.update_player')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('players')}}" >{{trans('admin.nav_players')}}</a> </li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('admin.coach_info')}}</h4>
                    <hr>
                    {!! Form::model($player_data, ['url' => ['players/'.$player_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="example-month-input" class="col-md-2 col-form-label">
                                {{trans('admin.club_name')}}
                            </label>
                            <div class="col-md-10">
                                {{ Form::select('club_id',App\Club::pluck('club_name','id'),$player_data->club_id
                                ,["class"=>"custom-select col-12" ,'placeholder'=>trans('admin.choose_club') ]) }}
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">
                                {{trans('admin.player_name')}}
                            </label>
                            <div class="col-md-10">
                                {{ Form::text('player_name',$player_data->player_name,["class"=>"form-control" ,"required"]) }}
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">
                                {{trans('admin.player_name_en')}}
                            </label>
                            <div class="col-md-10">
                                {{ Form::text('player_name_en',$player_data->player_name_en,["class"=>"form-control" ,"required"]) }}
                            </div>
                        </div>
                        <div class="form-group m-t-40 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">
                                {{trans('admin.center_name')}}
                            </label>
                            <div class="col-md-10">
                             
                                {{Form::select('center_name',
                                ['GK' => trans('admin.GK'),
                                 'RB' => trans('admin.RB'),
                                 'LB' => trans('admin.LB'),
                                 'RF' => trans('admin.RF'),
                                 'LF' => trans('admin.LF')
                                ],
                                $player_data->center_name
                                ,["class"=>"custom-select col-12" ,"required",'placeholder'=>trans('admin.choose_center_name') ])}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-search-input" class="col-md-2 col-form-label">
                                {{trans('admin.age')}}
                            </label>
                            <div class="col-md-10">
                                  {{ Form::number('age',$player_data->age,["class"=>"form-control" ,"required","min"=>'1']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-md-2 col-form-label">
                                {{trans('admin.desc')}}
                            </label>
                            <div class="col-md-10">
                               {{ Form::textArea('desc',$player_data->desc,["class"=>"form-control",'placeholder'=>trans('admin.write_player_desc')]) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-tel-input" class="col-md-2 col-form-label">
                                {{trans('admin.club_image')}}
                            </label>
                            <div class="col-md-10">
                                {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                                @if(!empty($player_data->image))
                                    <img src="{{ url($player_data->image) }}"
                                         style="width:250px;height:250px;"/>
                                @endif
                            </div>
                        </div>
                        <div class="center">
                            {{ Form::submit( trans('admin.public_Edit'),['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

