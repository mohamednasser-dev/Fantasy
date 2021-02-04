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
                            <div class="card" >
                                <a href="javascript:void(0)" style="margin-right: 10px; margin-top: 10px;">
                                    <img src="{{ url($selected_match->getHomeclub->image) }}" style="width: 35px;" alt="user-img" class="img-circle"> 
                                    <span>{{trans('admin.play')}} {{$selected_match->getHomeclub->club_name}}</span>
                                </a>
                                <div class="scroll">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <h5>{{trans('admin.coach')}}</h5>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{$home_coach->coach_name}}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <a class="dropdown-item" href=" {{url('monitor_match/'.$home_coach->id.'/'.$selected_match->id.'/fire_coach')}}">{{trans('admin.out')}}</a>
                                                    </div>
                                                </div>
                                            <h5>{{trans('admin.basic')}}</h5>
                                            @foreach($home_players as $player)
                                                <div class="radio-list">
                                                    <label class="custom-control custom-radio" style="width: 100%;">
                                                        <input id="radio3" name="home_player_id" data-player="{{$player->player_id}}" type="radio" checked="" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">{{$player->getPlayer->player_name}}</span>
                                                        <small style="position: absolute;left: 0;color: red;">{{$player->position}}</small>
                                                    </label>
                                                </div>
                                            @endforeach
                                            <hr>
                                            <h5>{{trans('admin.replacement')}}</h5>
                                            @foreach($home_replacement_players as $player)
                                                <div class="radio-list">
                                                    <label class="custom-control custom-radio" style="width: 100%;">
                                                        <input id="radio3" name="home_player_id" data-player="{{$player->id}}" type="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">{{$player->player_name}} </span>
                                                        <small style="position: absolute;left: 0;color: red;">{{$player->center_name}}</small>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Begin action panel  -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                           {{ Form::open( [null,'method'=>'post' ,'id'=>'match_home_event_form'])}}
                                                        {{ csrf_field() }}
                                                        {{ Form::hidden('match_id',$selected_match->id,["class"=>"form-control" ]) }}
                                                        {{ Form::hidden('player_id',null,["class"=>"form-control","id"=>"txt_home_Player" ]) }}
                                                        {{ Form::select('event_id',$all_events,null
                                                      ,["class"=>"form-control custom-select" ,'placeholder'=>trans('admin.choose_event') ]) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-actions center">
                                                {{ Form::button( trans('admin.done') ,['class'=>'btn btn-info btn-min-width mr-1 mb-1','style'=>'width: 90px;','id'=>'save_event_Button','type'=>'submit']) }}
                                                {{ Form::close() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @foreach($monitor_clubArray as $club_id )
                        @if($club_id == $selected_match->away_club_id)
                            <div class="card" >
                                <a href="javascript:void(0)" style="margin-right: 10px; margin-top: 10px;">
                                    <img src="{{ url($selected_match->getAwayclub->image) }}" style="width: 35px;" alt="user-img" class="img-circle"> 
                                    <span>{{trans('admin.play')}} {{$selected_match->getAwayclub->club_name}}</span>
                                </a>
                                <div class="scroll">
                                    <div class="card-body">
                                        <div class="card-block">
                                            <h5>{{trans('admin.coach')}}</h5>
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{$away_coach->coach_name}}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item">{{trans('admin.out')}}</a>
                                                </div>
                                            </div>
                                            <h5>{{trans('admin.basic')}}</h5>
                                            @foreach($away_players as $player)
                                                <div class="radio-list">
                                                    <label class="custom-control custom-radio" style="width: 100%;">
                                                        <input id="radio3" name="away_player_id" data-player="{{$player->player_id}}" type="radio"  class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">{{$player->getPlayer->player_name}}</span>
                                                        <small style="position: absolute;left: 0;color: red;">{{$player->position}}</small>
                                                    </label>
                                                </div>
                                            @endforeach
                                            <hr>
                                            <h5>{{trans('admin.replacement')}}</h5>
                                            @foreach($away_replacement_players as $player)
                                                <div class="radio-list">
                                                    <label class="custom-control custom-radio" style="width: 100%;">
                                                        <input id="radio3" name="away_player_id" data-player="{{$player->id}}" type="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">{{$player->player_name}} </span>
                                                        <small style="position: absolute;left: 0;color: red;">{{$player->center_name}}</small>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-md-10">
                                           {{ Form::open( [null,'method'=>'post' ,'id'=>'match_away_event_form'])}}
                                                {{ csrf_field() }}
                                                {{ Form::hidden('match_id',$selected_match->id,["class"=>"form-control" ]) }}
                                                {{ Form::hidden('player_id',null,["class"=>"form-control","id"=>"txt_away_Player" ]) }}
                                                {{ Form::select('event_id',$all_events,null,["class"=>"form-control custom-select" ,'placeholder'=>trans('admin.choose_event') ]) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-actions center">
                                                    {{ Form::button( trans('admin.done') ,['class'=>'btn btn-info btn-min-width mr-1 mb-1','style'=>'width: 90px;','id'=>'save_event_Button','type'=>'submit']) }}
                                                    {{ Form::close() }}
                                            </div>
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
                                <div style="margin-right: 100px;">
                                    {{ Form::open( ['url' => ['monitor_match/destroy'],'method'=>'post' ,'id'=>'match_event_end'])}}
                                        {{ csrf_field() }}
                                        {{ Form::hidden('match_id',$selected_match->id,["class"=>"form-control" ]) }}
                                        {{ Form::button( trans('admin.match_ended') ,['class'=>'btn btn-success btn-min-width mr-1 mb-1','style'=>'width: 130px','type'=>'submit']) }}
                                    {{ Form::close() }}                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card " >
                        <div class="message-scroll">
                            <div class="card-body">
                                <div class="card shadow-none">
                                    <div class="inbox-center table-responsive">
                                        <table class="table table-hover no-wrap">
                                            <tbody>
                                                @forelse($events as $event)
                                                @php
                                                    $label = 'label-info';
                                                    if($event->Event->key == 'yellow_card'){
                                                        $label = 'label-warning';
                                                    }elseif($event->Event->key == 'red_card'){
                                                        $label = 'label-danger';
                                                    }elseif($event->Event->key == 'score_goal'){
                                                        $label = 'label-success';
                                                    }elseif($event->Event->key == 'coach_fired'){
                                                        $label = 'label-danger';
                                                    }
                                                @endphp
                                                    <tr class="unread">
                                                        @if($event->person == 'player')
                                                            <td class="hidden-xs-down">{{$event->Player->player_name}}</td>
                                                        @elseif($event->person == 'coach')
                                                            <td class="hidden-xs-down">{{$event->Coach->coach_name}}</td>
                                                        @endif
                                                        <td class="max-texts">
                                                            <a href="javascript:;">
                                                                <span class="label {{$label}} m-r-10">{{$event->Event->name}}</span> 
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr class="unread">
                                                        <td class="hidden-xs-down">{{__('admin.emptyEvents')}}</td>
                                                    </tr>                                                
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
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
        $(document).on('click', 'input[name="home_player_id"]', function () {
            player_id = $(this).data('player');
            $("#txt_home_Player").val(player_id);
              console.log(player_id);
        });
        $(document).on('click', 'input[name="away_player_id"]', function () {
            player_id = $(this).data('player');
            $("#txt_away_Player").val(player_id);
              console.log(player_id);
        });
        $('#match_home_event_form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{url('monitor_match/store')}}",
                type:'POST',
                data: {inputs: $('#match_home_event_form').serialize(),"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    // el.parent().parent().html(data);
                    if(data.status){
                        location.reload();
                    }else{
                        toastr.error(data.msg);
                    }
                }
            })
        });
        $('#match_away_event_form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{url('monitor_match/store')}}",
                type:'POST',
                data: {inputs: $('#match_away_event_form').serialize(),"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    // el.parent().parent().html(data);
                    if(data.status){
                        location.reload();
                    }else{
                        toastr.error(data.msg);
                    }
                }
            })
        });
    </script>
@endsection



