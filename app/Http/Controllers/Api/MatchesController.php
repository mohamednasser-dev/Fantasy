<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MatchEvent;
use Carbon\Carbon;
use Validator;
use App\Match;
use App\User;
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
    public function today_matches(Request $request){
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
          
                $matches = Match::where('date', $today)
                ->with('getHomeclub')
                ->with('getAwayclub')
                ->get();
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
    public function match_by_date(Request $request){
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',
            'date' => 'required|date',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to get  matches by selected date
                $matches = Match::where('date', $request->input('date'))
                ->with('getHomeclub')
                ->with('getAwayclub')
                ->get();
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
    public function results_by_match_id(Request $request){
        $yellow_card_count;
        $red_card_count;
        $score_goal_count;
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',
            'match_id' => 'required|exists:matches,id',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to get  matches by selected date
                $selected_match = Match::where('id', $request->input('match_id'))
                ->with('getHomeclub')
                ->with('getAwayclub')
                ->first();
                $home_events = MatchEvent::where('match_id', $selected_match->id)
                ->whereHas('Player',function($e) use ($selected_match){
                    $e->where('club_id',$selected_match->home_club_id);
                })
                ->with('Event')
                ->with('Player')
                ->get();
                $away_events = MatchEvent::where('match_id', $selected_match->id)
                ->whereHas('Player',function($e) use ($selected_match){
                    $e->where('club_id',$selected_match->away_club_id);
                })
                ->with('Event')
                ->with('Player')
                ->get();
                return $this->sendResponse(200,'',array('selected_match' => $selected_match,
                        'home_events' => $home_events,'away_events' => $away_events));
            }else{
                return $this->sendResponse(403, 'يرجى تسجيل الدخول ',null);
            }
        }else {
            return $this->sendResponse(403, $validate, null);
        }
    }
    public function last_results(Request $request){
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to get  matches by selected date
                $matches = Match::with('getHomeclub')
                ->with('getAwayclub')
                ->orderBy('id','desc')
                ->limit(5)
                ->get();
                // this line for check numbers of matches if exists
                if(count($matches)>0){
                    return $this->sendResponse(200, 'تم اظهار اخر 5 مباريات !!!',  $matches);
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

