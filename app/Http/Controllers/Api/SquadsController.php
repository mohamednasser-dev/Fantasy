<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Squad;
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
            
                $input['points'] = 0;


                // to limit squad team number  to 7 players only in team

                $squad_id = $request->input('squad_id');                
                $selected_squad =Squad_player::where('squad_id',$squad_id)->get();

                if(count($selected_squad)==7){
                    return $this->sendResponse(403,'هذا الفريق وصل لعدد اللاعبين المطلوب');
                }else{

                    //this try catch to block user to add two same players in single squad
                    // or two sam position in single squad
                         try{

                                    $squad_player = Squad_player::create($input);
                            }catch(QueryException $ex){
                                return $this->sendResponse(403,'هذا اللاعب موجود من قبل');
                                
                            }
                            //end try catch
                          return $this->sendResponse(200, 'تم اضافة لاعب بالفريق',$squad_player);
                    }
        
        }else{
            return $this->sendResponse(403, $this->LoginWarning,null);
        }
    }else {
        return $this->sendResponse(403, $validate, null);
    }

    }

}
