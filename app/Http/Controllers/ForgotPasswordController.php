<?php
namespace App\Http\Controllers;
use App\ApiCode;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\User;
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
        $data_final['status']=false;
        $input = request()->all();
        $email = request()->input('email');
        $user = User::where('email',$email)->first();
        if ($user != null) 
        {
            $credentials = request()->validate(['email' => 'required|email|exists:users,email']);
            if (count((array)$credentials) == 1) 
            {
                Password::sendResetLink($credentials);
                $data_final['status']=true;
                return $this->sendResponse(200,'لقد تم ارسال رسالة الى بريدك الالكترونى ...!',$data_final);
            }
        }else {
            return $this->sendResponse(403, 'تأكد من ادخال البريد الالكترونى الصحيح ...!', $data_final);
        }    
    }
    public function reset(ResetPasswordRequest $request) {
        $input = $request->all();
        $email = $request->input('email');
        $user = User::where('email',$email)->first();
        if ($user != null) 
        {
            $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
                $user->password =bcrypt($password);
                $user->save();
            });

            if ($reset_password_status == Password::INVALID_TOKEN) {
            	return $this->sendResponse(403,"Token invaled" ,null);
            }
            return $this->sendResponse(200,"Password has been successfully changed",null);
        }else {
            return $this->sendResponse(403, 'your email is invaled ...!', null);
        } 
    }
}