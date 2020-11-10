<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manual_pass_reset;
use Validator;
use App\User;
class ManulPasswordController extends Controller
{

    public function sendResponse($code = null, $msg = null, $data = null){
        return response([
                'code' => $code,
                'msg' => $msg,
                'data' => $data
            ]);
    }
    public function validationErrorsToString($errArray){
        $valArr = array();
        foreach ($errArray->toArray() as $key => $value) 
        {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }
        return $valArr;
    }
    public function makeValidate($inputs, $rules){
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails()) 
        {
            return $this->validationErrorsToString($validator->messages());
        } else {
            return true;
        }
    }
    public function forgot(Request $request) {
        $manual_pas;
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'email' => 'required|email|exists:users,email',
            ]);
        if (!is_array($validate)) {
            $six_digit_random_number = mt_rand(1000, 9999);
            $pass_reset = Manual_pass_reset::where('email',$input['email'])->first();
                // dd($pass_reset);
            if($pass_reset == null){
                $data['token'] = $six_digit_random_number;
                $data['email'] = $input['email'];
                $manual_pass = Manual_pass_reset::create($data);
                return $this->sendResponse(200,'Reset password link sent on your email.',null);
            }else{
                $data['token'] = $six_digit_random_number;
                $manual_pass =Manual_pass_reset::where('email',$input['email'])->update($data);
                return $this->sendResponse(200,'Reset password link sent on your email.',null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function reset(Request $request) {
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'email' => 'required|email|exists:users,email',
            'token' => 'required|string|exists:Manual_pass_reset,email',
            'password' => 'required|string|confirmed'
            ]);
        if (!is_array($validate)) {
            $pass_reset = Manual_pass_reset::where('email',$input['email'])->first();
            if( $input['token'] == $pass_reset->email ){
                // $data['']
                $user =User::where('email',$input['email'])->update($data);
            }
            $pass_reset = Manual_pass_reset::where('email',$input['email'])->first();
                // dd($pass_reset);
            if($pass_reset == null){
                $data['token'] = $six_digit_random_number;
                $data['email'] = $input['email'];
                $manual_pass = Manual_pass_reset::create($data);
                return $this->sendResponse(200,'Reset password link sent on your email.',null);
            }else{
                $data['token'] = $six_digit_random_number;
                $manual_pass =Manual_pass_reset::where('email',$input['email'])->update($data);
                return $this->sendResponse(200,'Reset password link sent on your email.',null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
}
