<?php
namespace App\Http\Controllers;
use App\ApiCode;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
class ForgotPasswordController extends Controller
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
    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);
        Password::sendResetLink($credentials);
        return $this->sendResponse(200,'Reset password link sent on your email.',null);
    }
    public function reset(ResetPasswordRequest $request) {
        
        $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
            $user->password =bcrypt($password);
            $user->save();
        });
        if ($reset_password_status == Password::INVALID_TOKEN) {
        	return $this->sendResponse(403,"Token invaled" ,null);
        }
        return $this->sendResponse(200,"Password has been successfully changed",null);
    }
}