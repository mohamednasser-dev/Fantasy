<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Squad;
use App\Player;
use App\Squad_player;
use Illuminate\Database\QueryException;

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
    public function store_squad(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'user_id' => 'required|exists:users,id',
                'coach_id' => 'required|exists:coaches,id',
                'squad_name' => 'required|min:8',
                'squad_type' => 'required',
                ]);
            if (!is_array($validate)) {
                $api_token = $request->input('api_token');
                $user = User::where('api_token',$api_token)->first();
                if($user != null){
                    //for limit user to add only one squad with each type 1st & 2nd ...
                    $user_id = $request->input('user_id');
                    $squad_type = $request->input('squad_type');
                    $mySquad = Squad::where('user_id',$user_id)
                    ->where('squad_type',$squad_type)
                    ->get(); 
                    if(count($mySquad)>0){
                        return $this->sendResponse(403, 'لقد قمت بأنشاء فريق من الفئة المختارة من قبل', null);
                    }else{
                        $squad = Squad::create($input);
                        return $this->sendResponse(200, 'تم اضافة فريق',$squad);
                    }
                }else{
                    return $this->sendResponse(403, $this->LoginWarning,null);
                }
            }else {
                return $this->sendResponse(403, $validate, null);
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
                $player_id = $request->input('player_id');                
                $is_captain = $request->input('is_captain');                
                $selected_player =Player::where('id',$player_id)->first();
                $selected_squad =Squad_player::where('squad_id',$squad_id)->get();
                if(count($selected_squad)==7){
                    return $this->sendResponse(403,'هذا الفريق وصل لعدد اللاعبين المطلوب');
                }else{
                    // to force user to select only one capain in squade
                    if($is_captain == 1){
                        $selected_captin_squad =Squad_player::where('squad_id',$squad_id)->where('is_captain','1')->get();
                        if(count($selected_captin_squad)==1){
                            return $this->sendResponse(403,'لقد تم اختيار الكابتن من قبل !!!',null);
                        }
                    }
                    // this to make user to choose to players only from one club ...
                    $squad_players =Squad_player::where('club_id',$selected_player->club_id)
                    ->where('squad_id',$squad_id)
                    ->get();
                    if(count($squad_players) == 2){
                        return $this->sendResponse(403,'لا يمكن اختيار اكثر من لاعبين لنفس الفريق',null);
                    }else{
                        //this try catch to block user to add two same players in single squad
                        // or two sam position in single squad
                        try{
                            $input['club_id'] = $selected_player->club_id;
                            $squad_player = Squad_player::create($input);
                        }catch(QueryException $ex){
                            return $this->sendResponse(403,'هذا اللاعب موجود من قبل'); 
                        }
                            //end try catch
                            return $this->sendResponse(200, 'تم اضافة لاعب بالفريق',$squad_player);
                        }
                    }
            }else{
                return $this->sendResponse(403, $this->LoginWarning,null);
            }
        }else {
            return $this->sendResponse(403, $validate, null);
        }
    }
}
