@extends('admin_temp')
@section('content')
    <br>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.monitor_match')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.monitor_match')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('matches')}}" >{{trans('admin.nav_matches')}}</a> </li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <a href="javascript:void(0)" style="margin-right: 10px; margin-top: 10px;">
                            <img src="{{ url($selected_match->getHomeclub->image) }}" style="width: 35px;" alt="user-img" class="img-circle"> 
                            <span>{{trans('admin.play')}} {{$selected_match->getHomeclub->club_name}}</span>
                        </a>
                        <div class="scroll">
                            <div class="card-body">
                                <div class="card-block">
                                    <h5>{{trans('admin.basic')}}</h5>
                                        @foreach($home_players as $player)
                                            <div class="row">
                                                <div class="col-md-1">
                                                    {!! Form::checkbox('home_player_id',$player->player_id,false,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="col-md-8">   
                                                    {!! Form::label('player_name',$player->getPlayer->player_name,false,['class'=>'form-control']) !!}
                                                </div>
                                                 <div class="col-md-2">   
                                                    {!! Form::label('position',$player->position,false,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr>
                                        <h5>{{trans('admin.replacement')}}</h5>
                                        @foreach($home_replacement_players as $player)
                                            <div class="row">
                                                <div class="col-md-1">
                                                    {!! Form::checkbox('selected_players[]',$player->id,false,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="col-md-8">   
                                                    {!! Form::label('player_name',$player->player_name,false,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="col-md-2">   
                                                    {!! Form::label('position',$player->center_name,false,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a href="javascript:void(0)" style="margin-right: 10px; margin-top: 10px;">
                            <img src="{{ url($selected_match->getAwayclub->image) }}" style="width: 35px;" alt="user-img" class="img-circle"> 
                            <span>{{trans('admin.play')}} {{$selected_match->getAwayclub->club_name}}</span>
                        </a>
                        <div class="scroll">
                            <div class="card-body">
                                <div class="card-block">
                                    <h5>{{trans('admin.basic')}}</h5>
                                        @foreach($away_players as $player)
                                       
                                             <div class="row">
                                                <div class="col-md-1">
                                                    {!! Form::checkbox('away_player_id',$player->player_id,false,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="col-md-8"> 
                                                     <a>
                                                        {{$player->getPlayer->player_name}}
                                                     </a>
                                                </div>
                                                <div class="col-md-2">   
                                                    {!! Form::label('position',$player->position,false,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr>
                                        <h5>{{trans('admin.replacement')}}</h5>
                                        @foreach($away_replacement_players as $player)
                                            <div class="row">
                                                <div class="col-md-1">
                                                    {!! Form::checkbox('selected_players[]',$player->id,false,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="col-md-8">   
                                                    {!! Form::label('player_name',$player->player_name,false,['class'=>'form-control']) !!}
                                                </div>
                                                <div class="col-md-2">   
                                                    {!! Form::label('position',$player->center_name,false,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-12 col-md-9">
                     <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div>
                                        <a href="javascript:void(0)">
                                            <img src="{{ url($selected_match->getHomeclub->image) }}" style="width: 55px;" alt="user-img" class="img-circle"> 
                                            <span>{{$selected_match->getHomeclub->club_name}}</span>
                                        </a>
                                        <small class="text-success" style="font-size: 200%;">{{$selected_match->home_score}}</small>
                                        <small class="text-success">-</small>
                                        <small class="text-success" style="font-size: 200%;">{{$selected_match->away_score}}</small>
                                        <a href="javascript:void(0)">
                                            <span>{{$selected_match->getAwayclub->club_name}}</span>
                                            <img src="{{ url($selected_match->getAwayclub->image) }}" style="width: 55px;" alt="user-img" class="img-circle"> 
                                        </a>
                                </div>  
                                <div style="margin-right: 330px;">
                                    <button class="btn btn-success btn-min-width mr-1 mb-1" style="width: 130px;">{{trans('admin.match_ended')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="margin-top: -5px; height: 440px;">
                        <div class="message-scroll">
                            <div class="card-body">
                                 <div class="chat-right-aside">
                                        <div class="chat-rbox" style="height: 450px;">
                                            <ul class="chat-list p-20">
                                                <!--chat Row -->
                                                <li>
                                                    <div class="chat-img"><img src="{{ asset('/assets/images/users/1.jpg') }}" alt="user" /></div>
                                                    <div class="chat-content">
                                                        <h5>James Anderson</h5>
                                                        <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing & type setting industry.</div>
                                                    </div>
                                                    <div class="chat-time">10:56 am</div>
                                                </li>
                                                <!--chat Row -->
                                                <li>
                                                    <div class="chat-img"><img src="{{ asset('/assets/images/users/2.jpg') }}" alt="user" /></div>
                                                    <div class="chat-content">
                                                        <h5>Bianca Doe</h5>
                                                        <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                                    </div>
                                                    <div class="chat-time">10:57 am</div>
                                                </li>
                                                <!--chat Row -->
                                                <li class="reverse">
                                                    <div class="chat-content">
                                                        <h5>Steave Doe</h5>
                                                        <div class="box bg-light-inverse">It’s Great opportunity to work.</div>
                                                    </div>
                                                    <div class="chat-img"><img src="{{ asset('/assets/images/users/5.jpg') }}" alt="user" /></div>
                                                    <div class="chat-time">10:57 am</div>
                                                </li>
                                                <!--chat Row -->
                                   
                                                <!--chat Row -->
                                               
                                                <!--chat Row -->
                                            </ul>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Begin action panel  -->
                    <div class="card" style="margin-top: -18px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <ul class="chat-list p-20" style="margin-top: -60px;">
                                        <li>
                                            <div class="chat-img"><img src="{{ asset('/assets/images/users/1.jpg') }}" alt="user" /></div>
                                            <div class="chat-content">
                                                <h5 style="margin-top: 12px;">James Anderson</h5>
                                            </div>
                                        </li>
                                    </ul>  
                                </div>
                                <div class="col-md-5" style="margin-right: -80px;">
                                     <div class="form-group row">
                                        <div class="col-md-12">
                                            <select class="form-control custom-select">
                                                <option>Roule 1</option>
                                                <option>Roule 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                     <button class="btn btn-info btn-min-width mr-1 mb-1" style="width: 90px;">{{trans('admin.done')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
