<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Match;
use Carbon\Carbon;
class MatchesController extends Controller
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

    public function today_matches(Request $request)
    {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',
            ]);
            if (!is_array($validate)) {

            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();

            if($user != null){
  
            // to get today`s matches
            $mytime = Carbon::now();
            $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
      
            $matches = Match::where('date', $today)->get();
            
            // this line for check numbers of matches if exists
           if(count($matches)>0){
            return $this->sendResponse(200, 'تم اظهار مباريات اليوم ',  $matches);

           }else{
            return $this->sendResponse(403, 'لا يوجد مباريات اليوم',null);
           }
        }else{
            return $this->sendResponse(403, 'يرجى تسجيل الدخول ',null);
        }
    }else {
        return $this->sendResponse(403, $validate, null);
    }
}

}

