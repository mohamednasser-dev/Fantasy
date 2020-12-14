<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MatchEvent;
use App\Tournament;
use Carbon\Carbon;
use App\Gwalat;
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
        $lang = $request->header('lang');
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
                    return $this->sendResponse(200, trans('admin.today_matches_shown'),  $matches);
                }else{
                    return $this->sendResponse(403, trans('admin.no_match_today'),null);
                }
            }else{
                return $this->sendResponse(403, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    } 
    public function match_by_date(Request $request){
        $lang = $request->header('lang');
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',
            'duration' => 'required',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $duration = $request->input('duration');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                //this for yesterday/now/tomorrow matches
                if($duration == 'Y'){
                    $yesterday = Carbon::yesterday();
                    $yesterday =  Carbon::parse($yesterday->toDateTimeString())->format('Y-m-d');
              
                    $matches = Match::where('date', $yesterday)
                    ->with('getHomeclub')
                    ->with('getAwayclub')
                    ->get()->map(function($matche) {
                            $matche->time = date("g:i a", strtotime("$matche->time"));
                            return $matche;
                        })->map(function($matche) use ($lang) {
                            if($lang == 'en'){
                                $matche->getHomeclub->club_name = $matche->getHomeclub->club_name_en;
                            }
                            return $matche;
                        })->map(function($matche) use ($lang) {
                            if($lang == 'en'){
                                $matche->getAwayclub->club_name = $matche->getAwayclub->club_name_en;
                            }
                            return $matche;
                        });
                }else if($duration == 'N'){
                    $now = Carbon::now();
                    $now =  Carbon::parse($now->toDateTimeString())->format('Y-m-d');
              
                    $matches = Match::where('date', $now)
                    ->with('getHomeclub')
                    ->with('getAwayclub')
                    ->get()->map(function($matche) {
                            $matche->time = date("g:i a", strtotime("$matche->time"));
                            return $matche;
                        })->map(function($matche) use ($lang) {
                            if($lang == 'en'){
                                $matche->getHomeclub->club_name = $matche->getHomeclub->club_name_en;
                            }
                            return $matche;
                        })->map(function($matche) use ($lang) {
                            if($lang == 'en'){
                                $matche->getAwayclub->club_name = $matche->getAwayclub->club_name_en;
                            }
                            return $matche;
                        });
                }else if($duration == 'T'){
                    $tomorrow = Carbon::tomorrow();
                    $tomorrow =  Carbon::parse($tomorrow->toDateTimeString())->format('Y-m-d');
                    $matches = Match::where('date', $tomorrow)
                    ->with('getHomeclub')
                    ->with('getAwayclub')
                    ->get()->map(function($matche) {
                            $matche->time = date("g:i a", strtotime("$matche->time"));
                            return $matche;
                        })->map(function($matche) use ($lang) {
                            if($lang == 'en'){
                                $matche->getHomeclub->club_name = $matche->getHomeclub->club_name_en;
                            }
                            return $matche;
                        })->map(function($matche) use ($lang) {
                            if($lang == 'en'){
                                $matche->getAwayclub->club_name = $matche->getAwayclub->club_name_en;
                            }
                            return $matche;
                        });
                }
                // this line for check numbers of matches if exists
                if(count($matches)>0){
                    return $this->sendResponse(200, trans('admin.match_shown'),  $matches);
                }else{
                    return $this->sendResponse(403, trans('admin.no_match'),null);
                }
            }else{
                return $this->sendResponse(403, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function results_by_match_id(Request $request){
        $lang = $request->header('lang');
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
                ->first()->map(function($matche) use ($lang) {
                            if($lang == 'en'){
                                $matche->getHomeclub->club_name = $matche->getHomeclub->club_name_en;
                            }
                            return $matche;
                        })->map(function($matche) use ($lang) {
                            if($lang == 'en'){
                                $matche->getAwayclub->club_name = $matche->getAwayclub->club_name_en;
                            }
                            return $matche;
                        });
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
                return $this->sendResponse(403, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function last_results(Request $request){
        $lang = $request->header('lang');
        $input = $request->all();
        $validate = $this->makeValidate($input,[
            'api_token' => 'required',
            ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to get  matches by selected date
                $matches = Match::where('status','ended')
                            ->with('getHomeclub')
                            ->with('getAwayclub')
                            ->orderBy('date','desc')
                            ->limit(5)
                            ->get()->map(function($matche) {
                                        $matche->time = date("g:i a", strtotime("$matche->time"));
                                        return $matche;
                                    })->map(function($matche) use ($lang) {
                                        if($lang == 'en'){
                                            $matche->getHomeclub->club_name = $matche->getHomeclub->club_name_en;
                                        }
                                        return $matche;
                                    })->map(function($matche) use ($lang) {
                                        if($lang == 'en'){
                                            $matche->getAwayclub->club_name = $matche->getAwayclub->club_name_en;
                                        }
                                        return $matche;
                                    });
                // this line for check numbers of matches if exists
                if(count($matches)>0){
                    return $this->sendResponse(200, trans('admin.last_five_shown'),  $matches);
                }else{
                    return $this->sendResponse(403, trans('admin.no_match'),null);
                }
            }else{
                return $this->sendResponse(403, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function get_tour_open(Request $request){
        $lang = $request->header('lang');
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'classification' => 'required'
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to get the only started gwla in the tournament ..
                $classification = $request->input('classification');
                $tour =Tournament::where('classification',  $classification)->where('status','started')->first();
                if($tour != null){
                    $gwlat =Gwalat::select('id','name','tour_id')
                            ->where('tour_id',$tour->id)
                            ->get()->map(function($gwla) use ($lang) {
                                    if($lang == 'en'){
                                        $gwla->name = $gwla->name_en;
                                    }
                                    return $gwla;
                                });
                    return $this->sendResponse(200, trans('admin.tour_gwla_selected'),$gwlat);
                }else{
                    return $this->sendResponse(403, trans('admin.no_open_tour_class'),null);
                }
            }else{
                return $this->sendResponse(403, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
    public function get_gwla_matches(Request $request){
        $lang = $request->header('lang');
        $input = $request->all();
        $validate = $this->makeValidate($input,[
                'api_token' => 'required',
                'gwla_id' => 'required'
                ]);
        if (!is_array($validate)) {
            $api_token = $request->input('api_token');
            $user = User::where('api_token',$api_token)->first();
            if($user != null){
                // to get the only started gwla in the tournament ..
                $matches = Match::where('gwla_id', $request->input('gwla_id'))
                        ->with('getHomeclub')
                        ->with('getAwayclub')
                        ->get()->map(function($matche) {
                                $matche->time = date("g:i a", strtotime("$matche->time"));
                                return $matche;
                            })->map(function($matche) use ($lang) {
                                if($lang == 'en'){
                                    $matche->getHomeclub->club_name = $matche->getHomeclub->club_name_en;
                                }
                                return $matche;
                            })->map(function($matche) use ($lang) {
                                if($lang == 'en'){
                                    $matche->getAwayclub->club_name = $matche->getAwayclub->club_name_en;
                                }
                                return $matche;
                            });
                if( count($matches) > 0 ){
                    return $this->sendResponse(200,  trans('admin.match_shown'),  $matches);
                }else{
                    return $this->sendResponse(403, trans('admin.no_match'),null);
                }
            }else{
                return $this->sendResponse(403, trans('admin.LoginWarning'),null);
            }
        }else {
            return $this->sendResponse(403, $validate[0], null);
        }
    }
}

