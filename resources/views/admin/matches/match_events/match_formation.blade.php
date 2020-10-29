@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.match_formation')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.match_formation')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('matches')}}" >{{trans('admin.nav_matches')}}</a> </li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
    <div class="row">
                             <!-- ----------------------Begain Home Club formations---------------------- -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                {{ Form::open( ['url' => ['club_formations/store'],'method'=>'post' ,'id'=>'home_Form'] ) }}
                    {{ csrf_field() }}
                    {{ Form::hidden('club_id',$match_data->home_club_id,["class"=>"form-control" ]) }}
                        <div class="row">
                            <div class="col-lg-6 col-md-10">
                                <h6 class="card-title club-title-style">{{trans('admin.home_team')}}</h6>
                                <img src="{{ url($match_data->getHomeclub->image) }}" class="club-image-style"/>
                                <h4 class="card-title" style="margin-right: 20px;">{{$match_data->getHomeclub->club_name}}</h4>
                            </div>
                            <div class="col-lg-6 col-md-10">
                                <h6 class="card-title coach-title-style">{{trans('admin.coach')}}</h6>
                                <img src="{{ url($home_coach->image) }}" class="coach-image-style"/>
                                <h4 class="card-title" style="margin-right: 120px;">{{$home_coach->coach_name}}</h4>
                            </div>
                        </div>
                    <hr>  
                    <!-- Player info in formation   -->
                             <!-- ----------------------Begain Goal keeper player---------------------- -->
                     @foreach($home_players_in_match['GK_Players'] as $gkPlayer)
                        <div class="row">
                            <div class="col-lg-6 col-md-10 " style="margin-right: 120px;">
                               <h6 class="card-title label-Style">{{trans('admin.GK')}}</h6>
                               <button data-player-id="{{$gkPlayer->player_id}}" data-order="1" data-position-name="GK" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_home_player" name="delete_home_player" type="button">
                                    <i class="fa fa-minus"></i> 
                               </button>
                               <img src="{{ url($gkPlayer->getPlayer->image) }}" class="image-Style"/>
                               <h4 class="text-themecolor label-Style">{{$gkPlayer->getPlayer->player_name}}</h4>
                            </div>
                        </div>
                     @endforeach
                     @if(count($home_players_in_match['GK_Players']) ==0)
                        <div class="row">
                            <div class="col-lg-6 col-md-10 " style="margin-right: 120px;">
                                <h6 class="card-title label-Style">{{trans('admin.GK')}}</h6>
                                <button  id="add_home_player" name="add_home_player" data-order="1" data-position-name="GK" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#home_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                <h4 class="text-themecolor label-Style">-----------</h4>
                            </div>
                        </div>
                     @endif      
                                       <!-- ----------------------End Goal keeper player---------------------- -->
                    <br>
                                      <!-- ----------------------Begain Back Defense line players---------------------- -->
                    <div class="row" style="margin-right: -90px;">
                        <div class="col-lg-6 col-md-10">
                             @foreach($home_players_in_match['RB_Players'] as $rbPlayer)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.RB')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                       <button data-player-id="{{$rbPlayer->player_id}}" data-order="2" data-position-name="RB" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_home_player" name="delete_home_player" type="button">
                                            <i class="fa fa-minus"></i> 
                                       </button>
                                       <img src="{{ url($rbPlayer->getPlayer->image) }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">{{$rbPlayer->getPlayer->player_name}}</h4>
                             @endforeach
                             @if(count($home_players_in_match['RB_Players']) ==0)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.RB')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                        <button  id="add_home_player" name="add_home_player" data-order="2" data-position-name="RB" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#home_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                        <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">-----------</h4>
                             @endif     
                        </div>
                     <!-- ***************************************** -->
                         <div class="col-lg-6 col-md-10">
                             @foreach($home_players_in_match['LB_Players'] as $lbPlayer)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.LB')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                       <button data-player-id="{{$lbPlayer->player_id}}" data-order="3" data-position-name="LB" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_home_player" name="delete_home_player" type="button">
                                            <i class="fa fa-minus"></i> 
                                       </button>
                                       <img src="{{ url($lbPlayer->getPlayer->image) }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">{{$lbPlayer->getPlayer->player_name}}</h4>
                             @endforeach
                             @if(count($home_players_in_match['LB_Players']) ==0)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.LB')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                        <button  id="add_home_player" name="add_home_player" data-order="3" data-position-name="LB" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#home_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                        <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">-----------</h4>
                             @endif  
                        </div>
                    </div>
                    <!-- ----------------------End Back Defense line players---------------------- -->
                    <br>
                    <!-- ----------------------Begain Atack line players---------------------- -->
                    <div class="row" style="margin-right: -90px;">
                        <div class="col-lg-6 col-md-10">
                             @foreach($home_players_in_match['RF_Players'] as $rfPlayer)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.RF')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                       <button data-player-id="{{$rfPlayer->player_id}}" data-order="4" data-position-name="RF" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_home_player" name="delete_home_player" type="button">
                                            <i class="fa fa-minus"></i> 
                                       </button>
                                       <img src="{{ url($rfPlayer->getPlayer->image) }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">{{$rfPlayer->getPlayer->player_name}}</h4>
                             @endforeach
                             @if(count($home_players_in_match['RF_Players']) ==0)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.RF')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                        <button  id="add_home_player" name="add_home_player" data-order="4" data-position-name="RF" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#home_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                        <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">-----------</h4>
                             @endif     
                        </div>
                     <!-- ***************************************** -->
                         <div class="col-lg-6 col-md-10">
                             @foreach($home_players_in_match['LF_Players'] as $lfPlayer)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.LF')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                       <button data-player-id="{{$lfPlayer->player_id}}" data-order="5" data-position-name="LF" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_home_player" name="delete_home_player" type="button">
                                            <i class="fa fa-minus"></i> 
                                       </button>
                                       <img src="{{ url($lfPlayer->getPlayer->image) }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">{{$lfPlayer->getPlayer->player_name}}</h4>
                             @endforeach
                             @if(count($home_players_in_match['LF_Players']) ==0)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.LF')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                        <button  id="add_home_player" name="add_home_player" data-order="5" data-position-name="LF" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#home_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                        <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">-----------</h4>
                             @endif  
                        </div>
                    </div>

                      <!-- ----------------------End Atack line players---------------------- -->
                </div>
                  {{ Form::button( trans('admin.save_formation') ,['class'=>'btn waves-effect waves-light btn-success','id'=>'save_format_Button','type'=>'submit']) }}
              {{ Form::close() }}
            </div>
        </div>
     <!-- ----------------------End Home Club formations---------------------- -->
     <!-- ----------------------Begin Away Club formations---------------------- -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                  {{ Form::open( ['url' => ['club_formations/store'],'method'=>'post' ,'id'=>'away_Form'] ) }}
                    {{ csrf_field() }}
                    {{ Form::hidden('club_id_away',$match_data->away_club_id,["class"=>"form-control" ]) }}
                        <div class="row">
                            <div class="col-lg-6 col-md-10">
                                <h6 class="card-title club-title-style">{{trans('admin.away_team')}}</h6>
                                <img src="{{ url($match_data->getAwayclub->image) }}" class="club-image-style"/>
                                <h4 class="card-title" style="margin-right: 20px;">{{$match_data->getAwayclub->club_name}}</h4>
                            </div>
                            <div class="col-lg-6 col-md-10">
                                <h6 class="card-title coach-title-style">{{trans('admin.coach')}}</h6>
                                <img src="{{ url($away_coach->image) }}" class="coach-image-style"/>
                                <h4 class="card-title" style="margin-right: 120px;">{{$away_coach->coach_name}}</h4>
                            </div>
                        </div>
                    <hr>  
                    <!-- Player info in formation   -->
                             <!-- ----------------------Begain Goal keeper player---------------------- -->
                     @foreach($away_players_in_match['GK_Players_away'] as $gkPlayer_away)
                        <div class="row">
                            <div class="col-lg-6 col-md-10 " style="margin-right: 120px;">
                               <h6 class="card-title label-Style">{{trans('admin.GK')}}</h6>
                               <button data-player-id="{{$gkPlayer_away->player_id}}" data-order="6" data-position-name="GK" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_away_player" name="delete_away_player" type="button">
                                    <i class="fa fa-minus"></i> 
                               </button>
                               <img src="{{ url($gkPlayer_away->getPlayer->image) }}" class="image-Style"/>
                               <h4 class="text-themecolor label-Style">{{$gkPlayer_away->getPlayer->player_name}}</h4>
                            </div>
                        </div>
                     @endforeach
                     @if(count($away_players_in_match['GK_Players_away']) ==0)
                        <div class="row">
                            <div class="col-lg-6 col-md-10 " style="margin-right: 120px;">
                                <h6 class="card-title label-Style">{{trans('admin.GK')}}</h6>
                                <button  id="add_away_player" name="add_away_player" data-order="6" data-position-name="GK" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#away_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                <h4 class="text-themecolor label-Style">-----------</h4>
                            </div>
                        </div>
                     @endif      
                                       <!-- ----------------------End Goal keeper player---------------------- -->
                    <br>
                                      <!-- ----------------------Begain Back Defense line players---------------------- -->
                    <div class="row" style="margin-right: -90px;">
                        <div class="col-lg-6 col-md-10">
                             @foreach($away_players_in_match['RB_Players_away'] as $rbPlayer_away)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.RB')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                       <button data-player-id="{{$rbPlayer_away->player_id}}" data-order="7" data-position-name="RB" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_away_player" name="delete_away_player" type="button">
                                            <i class="fa fa-minus"></i> 
                                       </button>
                                       <img src="{{ url($rbPlayer_away->getPlayer->image) }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">{{$rbPlayer_away->getPlayer->player_name}}</h4>
                             @endforeach
                             @if(count($away_players_in_match['RB_Players_away']) ==0)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.RB')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                        <button  id="add_away_player" name="add_away_player" data-order="7" data-position-name="RB" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#away_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                        <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">-----------</h4>
                             @endif     
                        </div>
                     <!-- ***************************************** -->
                         <div class="col-lg-6 col-md-10">
                             @foreach($away_players_in_match['LB_Players_away'] as $lbPlayer_away)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.LB')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                       <button data-player-id="{{$lbPlayer_away->player_id}}" data-order="8" data-position-name="LB" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_away_player" name="delete_away_player" type="button">
                                            <i class="fa fa-minus"></i> 
                                       </button>
                                       <img src="{{ url($lbPlayer_away->getPlayer->image) }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">{{$lbPlayer_away->getPlayer->player_name}}</h4>
                             @endforeach
                             @if(count($away_players_in_match['LB_Players_away']) ==0)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.LB')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                        <button  id="add_away_player" name="add_away_player" data-order="8" data-position-name="LB" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#away_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                        <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">-----------</h4>
                             @endif  
                        </div>
                    </div>
                    <!-- ----------------------End Back Defense line players---------------------- -->
                    <br>
                    <!-- ----------------------Begain Atack line players---------------------- -->
                    <div class="row" style="margin-right: -90px;">
                        <div class="col-lg-6 col-md-10">
                             @foreach($away_players_in_match['RF_Players_away'] as $rfPlayer_away)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.RF')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                       <button data-player-id="{{$rfPlayer_away->player_id}}" data-order="9" data-position-name="RF" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_away_player" name="delete_away_player" type="button">
                                            <i class="fa fa-minus"></i> 
                                       </button>
                                       <img src="{{ url($rfPlayer_away->getPlayer->image) }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">{{$rfPlayer_away->getPlayer->player_name}}</h4>
                             @endforeach
                             @if(count($away_players_in_match['RF_Players_away']) ==0)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.RF')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                        <button  id="add_away_player" name="add_away_player" data-order="9" data-position-name="RF" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#away_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                        <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">-----------</h4>
                             @endif     
                        </div>
                     <!-- ***************************************** -->
                         <div class="col-lg-6 col-md-10">
                             @foreach($away_players_in_match['LF_Players_away'] as $lfPlayer_away)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.LF')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                       <button data-player-id="{{$lfPlayer_away->player_id}}" data-order="10" data-position-name="LF" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_away_player" name="delete_away_player" type="button">
                                            <i class="fa fa-minus"></i> 
                                       </button>
                                       <img src="{{ url($lfPlayer_away->getPlayer->image) }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">{{$lfPlayer_away->getPlayer->player_name}}</h4>
                             @endforeach
                             @if(count($away_players_in_match['LF_Players_away']) ==0)
                                    <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.LF')}}</h6>
                                    <div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
                                        <button  id="add_away_player" name="add_away_player" data-order="10" data-position-name="LF" class="btn btn-success waves-effect btn-circle add_btn-style" data-toggle="modal" data-target="#away_club_modal" data-whatever="@mdo" type="button"> <i class="fa fa-plus"></i> </button>
                                        <img src="{{ asset('/uploads/players_images/default_player_formation.png') }}" class="image-Style"/>
                                    </div>
                                    <h4 class="text-themecolor" style="margin-right: 120px;">-----------</h4>
                             @endif  
                        </div>
                    </div>

                      <!-- ----------------------End Atack line players---------------------- -->
                </div>
                  {{ Form::button( trans('admin.save_formation') ,['class'=>'btn waves-effect waves-light btn-success','id'=>'save_format_Button','type'=>'submit']) }}
              {{ Form::close() }}
            </div>
        </div>
                             <!-- ----------------------End Away Club formations---------------------- -->
    </div>         
    <!-- -------------------------------------- add new player to formation modal ----------------------------- -->
                 <div class="modal fade" id="home_club_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">{{trans('admin.choose_player')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                {{ Form::open( ['url' => ['club_formations/store'],'method'=>'post' , 'class'=>'form','id'=>'select_home_Player_form'] ) }}
                                    {{ csrf_field() }}
                                    {{ Form::hidden('club_id',$match_data->home_club_id,["class"=>"form-control" ]) }}
                                    {{ Form::hidden('position',null,["class"=>"form-control" ,"id"=>"txt_position" ]) }}
                                    {{ Form::hidden('order',null,["class"=>"form-control" ,"id"=>"txt_order" ]) }}
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">{{trans('admin.player_name')}}</label>
                                    {{ Form::select('player_id',$home_players,null,["class"=>"custom-select col-12"  ]) }}
                                </div>             
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.public_cancel')}}</button>
                                    {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-primary','id'=>'addButton']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                 </div>   
                 <div class="modal fade" id="away_club_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">{{trans('admin.choose_player')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                {{ Form::open( ['url' => ['club_formations/store'],'method'=>'post' , 'class'=>'form','id'=>'select_away_Player_form'] ) }}
                                    {{ csrf_field() }}
                                    {{ Form::hidden('club_id',$match_data->home_club_id,["class"=>"form-control" ]) }}
                                    {{ Form::hidden('position',null,["class"=>"form-control" ,"id"=>"txt_position_away" ]) }}
                                    {{ Form::hidden('order',null,["class"=>"form-control" ,"id"=>"txt_order_away" ]) }}
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">{{trans('admin.player_name')}}</label>
                                    {{ Form::select('player_id',$away_players,null,["class"=>"custom-select col-12"  ]) }}
                                </div>             
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.public_cancel')}}</button>
                                    {{ Form::submit( trans('admin.public_Add') ,['class'=>'btn btn-primary','id'=>'addButton']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                 </div> 
                                                                       <!-- confirm delete modal -->
                <div id="confirmModala" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 align="center" style="margin:0;">{{trans('admin.public_delete_modal_text')}}</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="okbutton" id="okbutton"
                                        class="btn btn-danger">{{trans('admin.public_delete')}}</button>
                                <button type="button" class="btn btn-default"
                                        data-dismiss="modal">{{trans('admin.public_cancel')}}</button>
                            </div>
                        </div>
                    </div>
                </div>           
@endsection
@section('scripts')
    <script>
        var player_id ;
        var position ;
        var order ;
        var el ;
        $(document).on('click', '#delete_home_player', function () {
            position = $(this).data('position-name');
            order = $(this).attr('data-order');
            el = $(this);
            $("#txt_position").val(position);
            $("#txt_order").val(order);
            $('#home_club_modal').modal('show');
        });
        $(document).on('click', '#delete_away_player', function () {
            // console.log('no one');
            position = $(this).data('position-name');
            order = $(this).attr('data-order');
            el = $(this);
            $("#txt_position_away").val(position);
            $("#txt_order_away").val(order);
            $('#away_club_modal').modal('show');
        });
        
        $(document).on('click', '#add_home_player', function () {
            position = $(this).data('position-name');
            order = $(this).attr('data-order');
            el = $(this);
            $("#txt_position").val(position);
            $("#txt_order").val(order);
            $('#home_club_modal').modal('show');
        });

        $(document).on('click', '#add_away_player', function () {
            position = $(this).data('position-name');
            order = $(this).attr('data-order');
            el = $(this);
            $("#txt_position_away").val(position);
            $("#txt_order_away").val(order);
            $('#away_club_modal').modal('show');
        });
        $('#select_home_Player_form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{url('getPlayerInfo')}}",
                type:'POST',
                data: {inputs: $('#select_home_Player_form').serialize(),"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    el.parent().parent().html(data);
                    $('#home_club_modal').modal('hide');
                }
            })
        });
        $('#select_away_Player_form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{url('getPlayerInfo_away')}}",
                type:'POST',
                data: {inputs: $('#select_away_Player_form').serialize(),"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    el.parent().parent().html(data);
                    $('#away_club_modal').modal('hide');
                }
            })
        });
        $('#home_Form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{url('club_formations/store')}}",
                type:'POST',
                data: {inputs: $('#home_Form').serialize(),"_token": "{{ csrf_token() }}"},
                success: function (data) {
                   if(data.status){
                            toastr.success(data.msg);
                        }else{
                            toastr.error(data.msg);
                        }
                }
            })
        });
         $('#away_Form').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{url('club_formations/store_away')}}",
                type:'POST',
                data: {inputs: $('#away_Form').serialize(),"_token": "{{ csrf_token() }}"},
                success: function (data) {
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


