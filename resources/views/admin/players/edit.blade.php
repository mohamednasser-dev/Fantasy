@extends('admin_temp')

@section('content')
    <br>

    <div class="app-content content container-fluid">
        <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('home')}}">{{trans('admin.nav_home')}} </a>
                </li>
                <li class="breadcrumb-item"><a href="{{url('players')}}">{{trans('admin.nav_players')}}</a>
                </li>
                <li class="breadcrumb-item"> {{trans('admin.update_player')}}
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
                    <h3 class="card-title">{{trans('admin.update_player')}}</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div class="card-block">

                        {!! Form::model($player_data, ['url' => ['players/'.$player_data->id.'/update'] , 'method'=>'post' ,'files'=> true]) !!}
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                        <strong>{{trans('admin.club_name')}}</strong>
                                {{ Form::select('club_id',App\Club::pluck('club_name','id'),$player_data->club_id
                                ,["class"=>"form-control" ,'placeholder'=>trans('admin.choose_club') ]) }}
                            </div>

                        <div class="form-group">
                        <strong>{{trans('admin.player_name')}}</strong>
                        {{ Form::text('player_name',$player_data->player_name,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.player_name') ]) }}
                         </div>
                        <strong>{{trans('admin.center_name')}}</strong>
                         
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
                           ,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.center_name') ])}}
                                                </div>
                         <div class="form-group">
                        <strong>{{trans('admin.age')}}</strong>
                        {{ Form::number('age',$player_data->age,["class"=>"form-control" ,"required",'placeholder'=>trans('admin.age') ]) }}
                         </div>

                        <div class="form-group">
                        <strong>{{trans('admin.desc')}}</strong>      
                            {{ Form::textArea('desc',$player_data->desc,["class"=>"form-control",'placeholder'=>trans('admin.write_player_desc') ]) }}
                        </div>

                        <div class="form-group">
                        <strong>{{trans('admin.change_player_image')}}</strong>                 
                            {{ Form::file('image',array('accept'=>'image/*','class'=>'form-control')) }}
                            @if(!empty($player_data->image))
                                <img src="{{ url($player_data->image) }}"
                                     style="width:250px;height:250px;"/>
                            @endif
                        </div>


                        {{ Form::submit( trans('admin.public_Edit'),['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'margin:10px']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

