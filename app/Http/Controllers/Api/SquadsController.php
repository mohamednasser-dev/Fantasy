<?php
namespace App\Http\Controllers\Api;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Squad_player;
use Carbon\Carbon;
use App\Player;
use App\Gwalat;
use Validator;
use App\Squad;
use App\User;
class SquadsController extends Controller
{
    public function sendResponse($code = null, $msg = null, $data = null)
    {
        return response(
            [
                'code' => $code,
                'msg' => $msg,
                'data' => $data
            ]
        );
    }
    public function validationErrorsToString($errArray)
    {
        $valArr = array();
        foreach ($errArray->toArray() as $key => $value) {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }
        return $valArr;
    }
    public function makeValidate($inputs, $rules)
    {
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) {
            return $this->validationErrorsToString($validator->messages());
        } else {
            return true;
        }
    }
    public function test_squad(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'squad_type' => 'required'
                ]);
            if (!is_array($validate)) {
                $api_token = $request->input('api_token');
                $user = User::where('api_token',$api_token)->first();
                if($user != null){
                    //for limit user to add only one squad with each type 1st & 2nd ...
                    $squad_type = $request->input('squad_type');
                    $mySquad = Squad::where('user_id',$user->id)
                    ->where('squad_type',$squad_type)
                    ->get(); 
                    if(count($mySquad)>0){
                        $mySquad= Squad::where('user_id',$user->id)
                                ->where('squad_type',$squad_type)
                                ->first(); 
                        return $this->sendResponse(200, 'There is a team',$mySquad);
                    }else{
                        return $this->sendResponse(403, 'You must create a team !', null);
                    }
                }else{
                    return $this->sendResponse(403, $this->LoginWarning,null);
                }
            }else {
                return $this->sendResponse(403, $validate[0], null);
            }
    }
    public function select_squad(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'squad_type' => 'required'
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                //for limit user to add only one squad with each type 1st & 2nd ...
                $squad_type = $request->input('squad_type');
                $mySquad= Squad::where('user_id',$user->id)
                        ->where('squad_type',$squad_type)
                        ->first(); 
                if($mySquad != null){
                    $squad_players= Squad_player::select('squad_id','player_id','position','is_captain')
                            ->where('squad_id',$mySquad->id)
                            ->with('getPlayer')
                            ->get();
                    $mySquad= Squad::select('id','squad_name','coach_id')
                            ->where('id',$mySquad->id)
                            ->first(); 
                    $players = null;
                    foreach ($squad_players as $key => $player) {
                        $players[$key]['squad_name'] = $player->getSquad->squad_name;
                        $players[$key]['player_id'] = $player->player_id;
                        $players[$key]['player_name'] = $player->getPlayer->player_name;
                        $players[$key]['image'] = $player->getPlayer->image;
                        $players[$key]['position'] = $player->position;
                        $players[$key]['is_captain'] = $player->is_captain;
                    } 
                    if($mySquad->coach_id != null){
                        $coach_location_array = count($squad_players);
                        $players[$coach_location_array]['squad_name'] = $mySquad->squad_name;
                        $players[$coach_location_array]['player_id'] = $mySquad->getCoah->id;
                        $players[$coach_location_array]['player_name'] = $mySquad->getCoah->coach_name;
                        $players[$coach_location_array]['image'] = $mySquad->getCoah->image;
                        $players[$coach_location_array]['position'] = 'CO';
                        $players[$coach_location_array]['is_captain'] = '0';
                    }
                    if($players != null){
                        return $this->sendResponse(200, 'The team has been shown',$players);
                    }else{
                        return $this->sendResponse(403, 'There are no players on the team',null);
                    }
                }else{
                    return $this->sendResponse(403, 'There is no team',null);
                }
            }else{
                return $this->sendResponse(403, $this->LoginWarning,null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function select_squad_players(Request $request)
    {
        $players[] = null;
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'squad_type' => 'required'
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                //for limit user to add only one squad with each type 1st & 2nd ...
                $squad_type = $request->input('squad_type');
                $mySquad= Squad::where('user_id',$user->id)
                        ->where('squad_type',$squad_type)
                        ->first(); 
                if($mySquad != null){
                    // to get all players in squad without replace players
                    $squad_players= Squad_player::select('squad_id','player_id','position','is_captain')
                            ->where('squad_id',$mySquad->id)
                            ->where('position' ,'<>','RP1')
                            ->where('position' ,'<>','RP2')
                            ->with('getPlayer')
                            ->with('getSquad')
                            ->orderBy('position', 'asc')
                            ->get();
                    foreach ($squad_players as $key => $player) {
                            $players[$key]['squad_name'] = $player->getSquad->squad_name;
                            $players[$key]['player_id'] = $player->player_id;
                            $players[$key]['player_name'] = $player->getPlayer->player_name;
                            $players[$key]['image'] = $player->getPlayer->image;
                            $players[$key]['position'] = $player->position;
                            $players[$key]['is_captain'] = $player->is_captain;
                       
                    }
                    if($players != null){
                        return $this->sendResponse(200, 'The team has been shown',$players);
                    }else{
                        return $this->sendResponse(403, 'There are no players on the team',null);
                    }
                }else{
                    return $this->sendResponse(403, 'There is no team',null);
                }
            }else{
                return $this->sendResponse(403, $this->LoginWarning,null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function test_captain(Request $request)
    {
        $players = null ;
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'squad_type' => 'required'
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                //for limit user to add only one squad with each type 1st & 2nd ...
                $squad_type = $request->input('squad_type');
                $mySquad= Squad::where('user_id',$user->id)
                        ->where('squad_type',$squad_type)
                        ->first(); 
                if($mySquad != null){
                    $squad_players= Squad_player::select('squad_id','player_id','position','is_captain')
                            ->where('squad_id',$mySquad->id)
                            ->where('is_captain', '1')
                            ->get();
                    if(count($squad_players) > 0){
                        $final_out['status'] = true ;
                        return $this->sendResponse(200, 'There is a captain',$final_out);
                    }else{
                        $final_out['status'] = false ;
                        return $this->sendResponse(200, 'There is no captain',$final_out);
                    }
                }else{
                    $final_out['status'] = false ;
                    return $this->sendResponse(403, 'There is no team',null);
                }
            }else{
                return $this->sendResponse(403, $this->LoginWarning,null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function store_squad(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'squad_name' => 'required',
                'squad_type' => 'required',
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                //for limit user to add only one squad with each type 1st & 2nd ...
                $squad_type = $request->input('squad_type');
                $mySquad = Squad::where('user_id',$user->id)
                ->where('squad_type',$squad_type)
                ->get(); 
                if(count($mySquad)>0){
                    return $this->sendResponse(403, 'You have already created a team from the selected category', null);
                }else{
                    $input['user_id'] = $user->id;
                    $squad = Squad::create($input);
                    return $this->sendResponse(200, 'A team has been added',$squad);
                }
            }else{
                return $this->sendResponse(403, $this->LoginWarning,null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function update_squad_player(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'squad_id' => 'required',
                'old_player_id' => 'required',
                'new_player_id' => 'required',
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                //for limit user to add only one squad with each type 1st & 2nd ...
                try{
                    $squad_id = $request->input('squad_id');
                    $old_player_id = $request->input('old_player_id');
                    $data['player_id'] = $request->input('new_player_id');
                    $squad_player = Squad_player::where('player_id',$old_player_id)
                                    ->where('squad_id',$squad_id)
                                    ->update($data);

                }catch(QueryException $ex){
                    return $this->sendResponse(403,'This player already exists'); 
                }
                 $data_final['status'] = true ;
                return $this->sendResponse(200, 'Modified successfully',$data_final);
            }else{
                $data_final['status'] = false ;
                return $this->sendResponse(403, $this->LoginWarning,$data_final);
            }
        }else {
            $data_final['status'] = false ;
            return $this->sendResponse(403, $validate[0], $data_final);
        }
    }
    public function update_squad_coach(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'squad_type' => 'required',
                'coach_id' => 'required',
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                //for limit user to add only one squad with each type 1st & 2nd ...
                $squad_type = $request->input('squad_type');
                $data['coach_id'] = $request->input('coach_id');
                $mySquad = Squad::where('user_id',$user->id)
                          ->where('squad_type',$squad_type)
                          ->update($data);
                $data_out['status'] = true ;
                return $this->sendResponse(200, 'A coach has been added to the team ',$data_out);
            }else{
                $data_out['status'] = false ;
                return $this->sendResponse(403, $this->LoginWarning,$data_out);
            }
        }else {
            $data_out['status'] = false ;
            return $this->sendResponse(403, $validate[0], $data_out);
        }
    }
    public function update_to_captain(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'player_id' => 'required|exists:squad_players,player_id',
                'squad_id' => 'required',
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                //for limit user to add only one squad with each type 1st & 2nd ...
                $squad_id = $request->input('squad_id');
                $player_id = $request->input('player_id');
                
                $data_remove_cap['is_captain'] = '0';
                $updated_squad = Squad_player::where('squad_id',$squad_id)->where('is_captain','1')->update($data_remove_cap);
                $data_add_cap['is_captain'] = '1';
                $updated_squad = Squad_player::where('squad_id',$squad_id)->where('player_id',$player_id)->update($data_add_cap);
                $data['status'] = true ;
                return $this->sendResponse(200, 'The captain has changed successfully',$data);
            }else{
                $data['status'] = false ;
                return $this->sendResponse(403, $this->LoginWarning,$data);
            }
        }else {
            $data['status'] = false ;
            return $this->sendResponse(403, $validate[0], $data);
        }
    }
    public function store_squad_player(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'player_id' => 'required|exists:players,id',
                'squad_id' => 'required|exists:squads,id',
                'position' => 'required',
                'is_captain' => 'required',
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to limit squad team number  to 7 players only in team
                $squad_id = $request->input('squad_id');                
                $position = $request->input('position');                
                $player_id = $request->input('player_id');                
                $is_captain = $request->input('is_captain');                
                $selected_player =Player::where('id',$player_id)->first();
                $selected_squad =Squad_player::where('squad_id',$squad_id)->get();
                // $squad_players_not_cap =Squad_player::where('squad_id',$squad_id)->where('is_captain','0')->get();
                if(count($selected_squad)==7){
                    $data['status'] = false ;
                    return $this->sendResponse(403,'This team has reached the required number of players',$data);
                }else{
                    // to force user to select only one capain in squade
                    if($is_captain == 1){
                        $selected_captin_squad =Squad_player::where('squad_id',$squad_id)->where('is_captain','1')->get();
                        if(count($selected_captin_squad)==1){
                            $data['status'] = false ;
                            return $this->sendResponse(403,'The captain has been chosen before !!!',$data);
                        }
                    }
                    // this to make user to choose to players only from one club ...
                    $squad_players =Squad_player::where('club_id',$selected_player->club_id)
                    ->where('squad_id',$squad_id)
                    ->get();
                    if(count($squad_players) == 2){
                        $data['status'] = false ;
                        return $this->sendResponse(403,'It is not possible to select more than two players for the same team',$data);
                    }else{
                        //this try catch to block user to add two same players in single squad
                        // or two sam position in single squad
                        try{
                            //this to make user to select only one player captain
                                    // if(count($squad_players_not_cap) == 6){
                                    //     if($is_captain == 0){
                                    //         $data['status'] = false ;
                                    //         return $this->sendResponse(403,'يجب اختيار لاعب كابتن فالفريق',$data);
                                    //     }
                                    // }
                            if($position == 'RP1' ||$position == 'RP2'){
                                if($is_captain == 1){
                                    $data['status'] = false ;
                                    return $this->sendResponse(403,'Substitutes cannot be captain for a team',$data);
                                }
                            }
                            $input['club_id'] = $selected_player->club_id;
                            $squad_player = Squad_player::create($input);
                        }catch(QueryException $ex){
                            $data['status'] = false ;
                            return $this->sendResponse(403,'This player already exists',$data); 
                        }
                        //end try catch
                        $data['status'] = true ;
                            return $this->sendResponse(200, 'A player has been added to the team',$data);
                    }
                }
            }else{
                $data['status'] = false ;
                return $this->sendResponse(403, $this->LoginWarning,$data);
            }
        }else {
            $data['status'] = false ;
            return $this->sendResponse(403, $validate[0], $data);
        }
    }
    public function test_gwla_open(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'classification' => 'required'
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to get the only started gwla in the tournament ..
                $classification = $request->input('classification');
                $gwla =Gwalat::with('Tournament')
                ->whereHas('Tournament', function ($q) use ($classification) {
                    $q->where('classification', '=', $classification);
                })
                ->where('status','started')
                ->first();
                // to avoid any user to change squad formation befor gwla by 24 hours  ..
                // to get today date by time & date ..
                $mytime = Carbon::now();
                $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d H:i');
                //get start date of active selected gwla ...
                if($gwla != null){
                    $startDate =  $gwla->start;
                    $startTime =  $gwla->start_time;
                    $start = $startDate.' '.$startTime ;
                    $final_Start = date("Y-m-d H:i", strtotime($start));
                    $final_Start = Carbon::createFromFormat('Y-m-d H:i', $final_Start);
                    //get start date befor 24 hour ...
                    $yesterday_gwla_start = $final_Start->subDay();
                    //get end date of active selected gwla ...
                    $endDate =  $gwla->end;
                    $endTime =  $gwla->end_time;
                    $end = $endDate.' '.$endTime ;
                    $final_end = date("Y-m-d H:i", strtotime($end));
                    //make if statement to avoid user to change his squad formation during active gwla ...
                    if(($today >= $yesterday_gwla_start && $today <= $final_end)){
                         $data['status'] = false;
                        return $this->sendResponse(403,'The formation cannot be modified during the tour',$data); 
                    }else{
                        $data['status'] = true;
                        return $this->sendResponse(200, 'formation modification is permitted',$data);
                    }    
                }else{
                    $data['status'] = true;
                    return $this->sendResponse(200,'No tours are open right now ...',$data);
                }
            }else{
                return $this->sendResponse(403, $this->LoginWarning,null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
}
