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
                    @foreach($monitor_clubArray as $club_id )
                        @if($club_id == $selected_match->home_club_id)
                            <div class="card" style="width: 250px;">
                                <a href="javascript:void(0)" style="margin-right: 10px; margin-top: 10px;">
                                    <img src="{{ url($selected_match->getHomeclub->image) }}" style="width: 35px;" alt="user-img" class="img-circle"> 
                                    <span>{{trans('admin.play')}} {{$selected_match->getHomeclub->club_name}}</span>
                                </a>
                                <div class="scroll">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <h5>{{trans('admin.basic')}}</h5>
                                                @foreach($home_players as $player)
                                                    <div class="radio-list">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio3" name="home_player_id" data-player="{{$player->player_id}}" type="radio" checked="" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">{{$player->getPlayer->player_name}}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <hr>
                                                <h5>{{trans('admin.replacement')}}</h5>
                                                @foreach($home_replacement_players as $player)
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            {!! Form::checkbox('selected_players[]',$player->id,false,['class'=>'form-control','data-player'=>$player->player_id,'id'=>'selected_player']) !!}
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
                        @endif
                    @endforeach
                    @foreach($monitor_clubArray as $club_id )
                        @if($club_id == $selected_match->away_club_id)
                            <div class="card" style="width: 250px;">
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
                                                            {!! Form::checkbox('away_player_id',$player->player_id,false,['class'=>'form-control','data-player'=>$player->player_id,'id'=>'selected_player']) !!}
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
                                                            {!! Form::checkbox('selected_players[]',$player->id,false,['class'=>'form-control','data-player'=>$player->player_id,'id'=>'selected_player']) !!}
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
                        @endif
                    @endforeach
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
                            <div class="row" style="margin-right: 75px;">
                                <div class="col-md-8">
                                     <div class="form-group row">
                                        <div class="col-md-12">
                                            {{ Form::open( ['url' => ['club_formations/store'],'method'=>'post' ,'id'=>'match_event_form'])}}
                                                {{ csrf_field() }}
                                                {{ Form::hidden('match_id',$selected_match->id,["class"=>"form-control" ]) }}
                                                {{ Form::hidden('player_id',null,["class"=>"form-control","id"=>"txtPlayer" ]) }}
                                                {{ Form::select('event_id',App\Event::pluck('key','id'),null
                                              ,["class"=>"form-control custom-select" ,'placeholder'=>trans('admin.choose_event') ]) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                        {{ Form::button( trans('admin.done') ,['class'=>'btn btn-info btn-min-width mr-1 mb-1','style'=>'width: 90px;','id'=>'save_event_Button','type'=>'submit']) }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var player_id ;
        $(document).on('click', '#selected_player', function () {
            player_id = $(this).data('player');
            $("#txtPlayer").val(player_id);
              console.log(player_id);
           
        });
        $('#match_event_form').submit(function (e) {
            e.preventDefault();
            // console.log($('#match_event_form').serialize());
            $.ajax({
                url: "{{url('monitor_match/store')}}",
                type:'POST',
                data: {inputs: $('#match_event_form').serialize(),"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    // el.parent().parent().html(data);
                    if(data.status){
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                }
            })
        });
    </script>
@endsection



