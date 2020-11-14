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
                        return $this->sendResponse(200, 'يوجد فريق',$mySquad);
                    }else{
                        return $this->sendResponse(403, 'يجب انشاء فريق !', null);
                    }
                }else{
                    return $this->sendResponse(403, $this->LoginWarning,null);
                }
            }else {
                return $this->sendResponse(403, $validate, null);
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
                    $squad_player= Squad_player::select('squad_id','player_id','club_id','position','is_captain')
                            ->where('squad_id',$mySquad->id)
                            ->with('getPlayer')
                            ->get(); 

                    return $this->sendResponse(200, 'تم اظهار الفريق',array('mySquad' => $mySquad,'squad_player' => $squad_player));
                   
                }else{
                    return $this->sendResponse(403, $this->LoginWarning,null);
                }
            }else {
                return $this->sendResponse(403, $validate, null);
            }
    }
    public function store_squad(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'squad_name' => 'required|min:8',
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
                        return $this->sendResponse(403, 'لقد قمت بأنشاء فريق من الفئة المختارة من قبل', null);
                    }else{
                        $input['user_id'] = $user->id;
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
                        return $this->sendResponse(403,'هذا اللاعب موجود من قبل'); 
                    }
                     return $this->sendResponse(200, 'تم التعديل بنجاح',$squad_player);
                }else{
                    return $this->sendResponse(403, $this->LoginWarning,null);
                }
            }else {
                return $this->sendResponse(403, $validate, null);
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
                     return $this->sendResponse(200, 'تم اضافة مدرب للفريق ',$mySquad);
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
    public function test_gwla_open(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'classification' => 'required|exists:players,id'
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to get the only inprogress gwla in the tournament ..
                $classification = $request->input('classification');
                $gwla =Gwalat::with('Tournament')
                ->whereHas('Tournament', function ($q) use ($classification) {
                    $q->where('classification', '=', $classification);
                })
                ->where('status','started')
                ->first();
                // to disable any user to change  squad formation befor gwla by 24 hours
                // to get today`s matches
                $mytime = Carbon::now();
                $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d H:i');
                $mytomorrowtime = Carbon::tomorrow();
                $tomorrow =  Carbon::parse($mytomorrowtime->toDateTimeString())->format('Y-m-d H:i');
    

                $startDate =  $gwla->start;
                $startTime =  $gwla->start_time;
                $start = $startDate.' '.$startTime ;
                $final_Start = date("Y-m-d H:i", strtotime($start));
                $final_Start = Carbon::createFromFormat('Y-m-d H:i', $final_Start);
                $final_Start_yesterday =  Carbon::parse($final_Start->toDateTimeString())->format('Y-m-d H:i');
                // dd($final_Start_yesterday);
                $endDate =  $gwla->end;
                $endTime =  $gwla->end_time;
                $end = $endDate.' '.$endTime ;
                $final_end = date("Y-m-d H:i", strtotime($end));
                if(($today >= $final_Start_yesterday && $today <= $final_end)){
                    return $this->sendResponse(403,'لا يمكن تعديل التشكيلة اثناء الجولة'); 
                }else{
                    return $this->sendResponse(200, 'تعديل التشكيلة مسموح ',null);
                }
            }else{
                return $this->sendResponse(403, $this->LoginWarning,null);
            }
        }else {
            return $this->sendResponse(403, $validate, null);
        }
    }
}
