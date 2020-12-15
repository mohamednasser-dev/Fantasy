<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Sponser_image;
use App\Squad;
use App\User;
class AuthController extends Controller
{
    public $objectName;
    public function __construct(User $model){
        $this->objectName = $model;
    }
    public function sendResponse($code = null, $msg = null, $data = null){
        return response(
            [
                'code' => $code,
                'msg' => $msg,
                'data' => $data
            ]
        );
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
    public function login(Request $request){
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if (!is_array($validate)) 
        {
            if(Auth::attempt([
                'email'=>$request->input('email'),
                'password'=>$request->input('password'),
            ]))
            {
                $user = auth()->user();
                if($user->type =='admin'){
                    return $this->sendResponse(404, trans('admin.not_authorized'),null);
                }
                $user->api_token = Str::random(60);
                $api_token = $user->api_token;
                $user->save();
                return $this->sendResponse(200, trans('admin.login_success'),$user);
            }
            else
            {
                return $this->sendResponse(403, trans('admin.email_pass_not_correct'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function store(Request $request){
        $input = $request->all();
        $validate = $this->makeValidate($input,
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
            ]);
        if (!is_array($validate)) 
        {
            if($request['password'] != null  && $request['password_confirmation'] != null )
            {
                $input['password'] = bcrypt(request('password'));
                $user = User::create($input);
                $user->api_token = Str::random(60);
                $api_token = $user->api_token;
                $user->save();
                return $this->sendResponse(200, trans('admin.new_user_added'), $user);
            }
        } else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function update_user_data(Request $request){
        $input = $request->all();
        $api_token = $request->input('api_token');
        $auth_user = User::where('api_token', $api_token)->first();
        $id =$auth_user->id;
        $validate = $this->makeValidate($input,
            [
                'api_token' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'required|numeric|unique:users,phone,' . $id,
                'gender' => '',
                'name' => 'required',
                'address' => 'required'
            ]);
        if (!is_array($validate)) {
            if (empty($auth_user)) {
                return $this->sendResponse(404, trans('admin.LoginWarning'), null);
            }
            $user_data = User::find(intval($id))->update($input);
            $user = User::where('id',$id)->first();

            return $this->sendResponse(200, trans('admin.data_updated'), $user);
        } else {
            return $this->sendResponse(403, $validate[0], null);
        }

    }
    public function changePass(Request $request)
    {
        $data_final['status']=false;
        $input = $request->all();
        $validate = $this->makeValidate($input,
        [
            'api_token' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);
        if (!is_array($validate)){
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                if($request->input('old_password') != null  && $request->input('confirm_password')!= null ){
                    try{
                        if ((Hash::check(request('old_password'), $user->password)) == false){
                            return $this->sendResponse(403, 'The old password is wrong', $data_final);
                        }else if ((Hash::check(request('new_password'),  $user->password)) == true){
                            return $this->sendResponse(403, trans('admin.enter_pass_not_already_exixt'), $data_final);
                        }else{
                            User::where('id', $user->id)->update(['password' => Hash::make($input['new_password'])]);
                            $user_data = User::where('id', $user->id)->first();
                            $data_final['status']=true;
                            return $this->sendResponse(200, trans('admin.pass_changed'), $data_final);
                        }
                    }catch (\Exception $ex){
                        if (isset($ex->errorInfo[2])){
                            $msg = $ex->errorInfo[2];
                        }else{
                            $msg = $ex->getMessage();
                        }
                        $arr = array("status" => 400, "message" => $msg, "data" => array());
                    }
                }else{
                    return $this->sendResponse(403, trans('admin.fields_m_filled'), $data_final);
                }
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),$data_final);
            }
        }else {
            return $this->sendResponse(403, $validate[0], $data_final);
        }
    }
    public function select_user_data(Request $request){
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',    
        ]);
        if (!is_array($validate)) 
        {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null)
            {
                $user_data = User::select('name','email','gender','points','address','phone')
                            ->where('id', $user->id)
                            ->get();
                $user_squads =Squad::select('user_id','squad_name','squad_type','points')
                            ->where('user_id', $user->id)
                            ->get();
                foreach ($user_squads as $key => $squad) {
                    if($key == 0){
                        if($squad['squad_type']== '1st'){
                            $squad_one = $squad['squad_name'];
                            $squad_one_points = $squad['points'];

                            $user_data[0]['squad_one'] = $squad_one;
                            $user_data[0]['squad_one_points'] = $squad_one_points;
                        }else{
                            $squad_two = $squad['squad_name'];
                            $squad_two_points = $squad['points'];
                            $user_data[0]['squad_two'] = $squad_two;
                            $user_data[0]['squad_two_points'] = $squad_two_points;
                        }
                    }
                    if($key == 1){
                        if($squad['squad_type']== '1st'){
                            $squad_one = $squad['squad_name'];
                            $squad_one_points = $squad['points'];
                            $user_data[0]['squad_one'] = $squad_one;
                            $user_data[0]['squad_one_points'] = $squad_one_points;
                        }else{
                            $squad_two = $squad['squad_name'];
                            $squad_two_points = $squad['points'];
                            $user_data[0]['squad_two'] = $squad_two;
                            $user_data[0]['squad_two_points'] = $squad_two_points;
                        }
                    }
                }
                return $this->sendResponse(200, trans('admin.user_data_shown'),$user_data[0]);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
                return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function select_top_ten(Request $request){
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',        
        ]);
        if (!is_array($validate)) 
        {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null)
            {
                //top ten users by points ...
                $top_ten_users =User::select('id','name','points')
                    ->where('type', 'user' )
                    ->orderBy('points','desc')
                    ->limit(10)
                    ->get();
                return $this->sendResponse(200, trans('admin.first_ten_users_shown'), $top_ten_users);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
                return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function rank_user(Request $request) {
        $user_Rank = null;
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',        
        ]);
        if (!is_array($validate)){
            $api_token = $request->input('api_token');
            $my_user = User::where('api_token',$api_token)->select('id','name','email','points','api_token')->first();
            $user_selected = User::where('id',$my_user->id)->select('id','name','points')->first();
            if($my_user != null){
                //to get user rank by points
                $all_users =User::select('id','name','points','image')
                ->where('type', 'user' )
                ->orderBy('points','desc')
                ->get();
                foreach ($all_users as $key => $user) {
                    if($user->id == $my_user->id){
                        $user_Rank[0]['position'] = $key+1;
                        $user_Rank[0]['id'] = $user->id;
                        $user_Rank[0]['name'] = $user->name;
                        $user_Rank[0]['points'] = $user->points;
                    }
                }
                //top ten users by points ...
                $top_ten_users =User::select(DB::raw(' ROW_NUMBER() OVER(ORDER BY points DESC) AS position,id,name,points '))
                    ->where('type', 'user' )
                    ->groupBy('id','name','points')
                    ->orderBy('points','desc')
                    ->limit(10)
                    ->get()->toArray();
                $new_rank = array_merge($top_ten_users,$user_Rank);
                $result = array();
                foreach ($new_rank as $key => $value){
                  if(!in_array($value, $result))
                    $result[$key]=$value;
                }
                foreach ($result as $key => $value) {
                    if ($value['id'] == $user_selected->id) {
                        $result[$key]['flag'] = 1;
                    }else{
                        $result[$key]['flag'] = 0;
                    }
                }
                return $this->sendResponse(200, trans('admin.rank_shown'),$result);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
                return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function logout(Request $request){
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token'=>'required',
            ]);
        if (!is_array($validate)) 
        {
            $api_token =$request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if(empty($user))
            {
                return $this->sendResponse(404,  trans('admin.LoginWarning'),null);
            }
            $user->api_token = null;
            if($user->save())
            {
                Auth::logout();
                return $this->sendResponse(200, trans('admin.logout_success'),null);
            }else{
                return $this->sendResponse(404, trans('admin.LoginWarning'),null);
            }
        }else {
        return $this->sendResponse(403, $validate, null);
        }
    }
    public function sponsers(){
        if (Sponser_image::count() != 0) {
            $sposer_image =Sponser_image::all()->random(1); // The amount of items you wish to receive
            return $this->sendResponse(200, trans('admin.all_ads_shown'), $sposer_image);
        }else{
            return $this->sendResponse(403, trans('admin.no_ads'), null);
        }
    }
}