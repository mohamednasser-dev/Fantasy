<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Squad_player;
use App\Player;
use Validator;
use App\User;
class PlayersController extends Controller
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
    public function players_by_classif(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'classif' => 'required',
            'api_token' => 'required',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                $classification = $request->input('classif');
                $players_with_classif =Player::select('id','player_name','center_name','club_id','image')->with('getClub')
                    ->whereHas('getClub', function ($q) use ($classification) {
                        $q->where('classification', '=', $classification);
                    })
                    ->get();
                return $this->sendResponse(200, trans('admin.player_class_shown'), $players_with_classif);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function players_by_club(Request $request)
    {
        $players[] = null;
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',        
            'club_id' => 'required',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                $club_id = $request->input('club_id');
                $players_with_club =Player::select('id','player_name','center_name','club_id','image')
                                    ->where('club_id', $club_id )
                                    ->orderBy('center_name','asc')
                                    ->get();
                foreach ($players_with_club as $key => $player) {
                    $players[$key]['id'] = $player->id;
                    $players[$key]['player_name'] = $player->player_name;
                    if($player->center_name == 'GK'){
                        $players[$key]['center_name'] = $player->center_name;
                    }else{
                        $players[$key]['center_name'] = '';
                    }
                    $players[$key]['club_id'] = $player->club_id;
                    $players[$key]['image'] = $player->image;
                }

                return $this->sendResponse(200, trans('admin.club_players_shown'), $players);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function player_info(Request $request)
    {
        $lang = $request->header('lang');
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',        
            'player_id' => 'required',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                $player_id = $request->input('player_id');
                $player_info =Player::select('id','player_name','center_name','club_id','age','desc','image')
                ->where('id', $player_id )->get()->map(function($player) use ($lang) {
                                if($lang == 'en'){
                                    $player->player_name = $player->player_name_en;
                                }
                                return $player;
                            });
                return $this->sendResponse(200, trans('admin.player_shown'), $player_info);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    //to remove player from my squad ...
    public function remove_player_squad(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',        
            'player_id' => 'required',
            'squad_id' => 'required',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                $player_id = $request->input('player_id');
                $squad_id = $request->input('squad_id');
                $player =Squad_player::where('player_id', $player_id )
                ->where('squad_id', $squad_id )
                ->delete();
                return $this->sendResponse(200, trans('admin.player_deleted'),null);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function transfer_player_position(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',        
            'player1_id' => 'required',
            'player2_id' => 'required',
            'player1_position' => 'required',
            'player2_position' => 'required',
            'squad_id' => 'required',        
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                $player1_id = $request->input('player1_id');
                $player2_id = $request->input('player2_id');
                $squad_id = $request->input('squad_id');
                $player1_position = $request->input('player1_position');
                $player2_position = $request->input('player2_position');
                $player1_input['position'] = $player2_position;
                $player2_input['position'] = $player1_position;
                $empty_input['position'] = null;
                //ُEmpty position cell in DB
                Squad_player::where('player_id',$player1_id)
                ->where('squad_id',$squad_id)
                ->update($empty_input);
                Squad_player::where('player_id',$player2_id)
                ->where('squad_id',$squad_id)
                ->update($empty_input);
                //save first player new position in DB
                Squad_player::where('player_id',$player1_id)
                ->where('squad_id',$squad_id)
                ->update($player1_input);
                //save second player new position in DB
                Squad_player::where('player_id',$player2_id)
                ->where('squad_id',$squad_id)
                ->update($player2_input);
                return $this->sendResponse(200, trans('admin.player_position_change') , null);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
}
