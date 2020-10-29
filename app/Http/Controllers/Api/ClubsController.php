<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Club;

class ClubsController extends Controller
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

    public function coaches_by_classif(Request $request)
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
            
            $coach_with_classif =Club::where('classification',$classification)->get();
           
            return $this->sendResponse(200, 'تم  اظهار نوادى الفئة المطلوبة ', $coach_with_classif);
        }else{
            return $this->sendResponse(403, 'يرجى تسجيل الدخول ',null);
        }
    }else {
        return $this->sendResponse(403, $validate, null);
    }
}

}

