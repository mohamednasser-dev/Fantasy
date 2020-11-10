<?php
namespace App\Http\Controllers\Editor;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Club_formation;
use App\User_club;
use App\Player;
use App\coach;
use App\Match;
use App\Club;
use App\User;
class ClubFormationsController extends Controller
{
    public $objectName;
    public $folderView;
    public function __construct(Club_formation $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.matches.match_events.';
    }
    // this function to  select all Coaches
    public function index($match_id,$home_id,$away_id)
    {
        $editor_clubArray=null;
        $match_data = Match::where('id', $match_id)->first();
        $home_coach = coach::where('club_id', $home_id)->first();
        $away_coach = coach::where('club_id', $away_id)->first();
        $home_players_in_match = $this->objectName::where('club_id',$home_id)->get();
        $away_players_in_match = $this->objectName::where('club_id',$away_id)->get();
                if(count($home_players_in_match)!=0){
                        $home_player_Array;
                        $i=0;
                        foreach ($home_players_in_match as $Hplayers) 
                        {
                           $home_player_Array[$i]= $Hplayers->player_id;
                           $i++;
                        }
                        $home_players = Player::where('club_id',$home_id)
                        ->whereNotIn('id',$home_player_Array)->pluck('player_name','id');
                }else{
                   $home_players =Player::where('club_id',$home_id)->pluck('player_name','id');
                }
                // ------------------------------------
                if(count($away_players_in_match)!=0){
                        $away_player_Array;
                        $i=0;
                        foreach ($away_players_in_match as $Aplayers) 
                        {
                           $away_player_Array[$i]= $Aplayers->player_id;
                           $i++;
                        }
                        $away_players = Player::where('club_id',$away_id)
                        ->whereNotIn('id',$away_player_Array)->pluck('player_name','id');
                }else{
                   $away_players =Player::where('club_id',$away_id)->pluck('player_name','id');
                }
                // to filter user lubs to view his club formation
                if(auth()->user()->type == 'monitor')
                {
                    $editor_clubs = User_club::where('user_id',auth()->user()->id)->get();
                    $i=0;
                        foreach ($editor_clubs as $user_club) 
                        {
                           $editor_clubArray[$i]= $user_club->club_id;
                           $i++;
                        }
                }
              // Home players in formation
         $GK_Players = $this->objectName::where('club_id',$home_id)
        ->where('position','GK')
        ->get();
         $RB_Players = $this->objectName::where('club_id',$home_id)
        ->where('position','RB')
        ->get();
         $LB_Players = $this->objectName::where('club_id',$home_id)
        ->where('position','LB')
        ->get();
         $RF_Players = $this->objectName::where('club_id',$home_id)
        ->where('position','RF')
        ->get();
         $LF_Players = $this->objectName::where('club_id',$home_id)
        ->where('position','LF')
        ->get();
       
        $home_players_in_match['GK_Players']=$GK_Players;
        $home_players_in_match['RB_Players']=$RB_Players;
        $home_players_in_match['LB_Players']=$LB_Players;
        $home_players_in_match['RF_Players']=$RF_Players;
        $home_players_in_match['LF_Players']=$LF_Players;

          // Away players in formation
         $GK_Players_away = $this->objectName::where('club_id',$away_id)
        ->where('position','GK')
        ->get();
         $RB_Players_away = $this->objectName::where('club_id',$away_id)
        ->where('position','RB')
        ->get();
         $LB_Players_away = $this->objectName::where('club_id',$away_id)
        ->where('position','LB')
        ->get();
         $RF_Players_away = $this->objectName::where('club_id',$away_id)
        ->where('position','RF')
        ->get();
         $LF_Players_away = $this->objectName::where('club_id',$away_id)
        ->where('position','LF')
        ->get();
    
        $away_players_in_match['GK_Players_away']=$GK_Players_away;
        $away_players_in_match['RB_Players_away']=$RB_Players_away;
        $away_players_in_match['LB_Players_away']=$LB_Players_away;
        $away_players_in_match['RF_Players_away']=$RF_Players_away;
        $away_players_in_match['LF_Players_away']=$LF_Players_away;

        return view($this->folderView.'match_formation', \compact('match_data','home_players','away_players',
            'home_players_in_match','away_players_in_match','home_coach','away_coach','editor_clubArray'));
    }
    // this to Get Player Info 
    public function getPlayerInfo(Request $request)
    {
            $array1 = explode('&', $request->inputs);
            $inputs = [];
        foreach ($array1 as $value) {
            $input = explode('=', $value);
            $inputs [$input[0]] = $input[1];
        }
            $player = Player::find($inputs['player_id']);
            $order = $inputs['order'];
            $position = $inputs['position'];

        if($position== 'GK'){
            return view($this->folderView.'playerBlock',compact('player','order','position')); 
        }else{
            return view($this->folderView.'playerBlockDuo',compact('player','order','position')); 
        }
    }
    public function getPlayerInfo_away(Request $request)
    {
            $array1 = explode('&', $request->inputs);
            $inputs = [];
        foreach ($array1 as $value) {
            $input = explode('=', $value);
            $inputs [$input[0]] = $input[1];
        }
            $player = Player::find($inputs['player_id']);
            $order = $inputs['order'];
            $position = $inputs['position'];

        if($position== 'GK'){
            return view($this->folderView.'playerBlock_away',compact('player','order','position')); 
        }else{
            return view($this->folderView.'playerBlockDuo_away',compact('player','order','position')); 
        }
    }
    // this to add new recourd of club_formations in database
    public function store(Request $request)
    {
            parse_str($request->inputs, $data);
       
            $club_id = $data['club_id'];
            $match_data = $data['match_data'];
            $match_data =json_decode($match_data);
            $newPosition = $data['newPosition'];
            foreach ($data['squad'] as $key => $player_id) 
            {
                  $data_formation['player_id'] = $player_id;
                  $data_formation['club_id'] = $club_id;
                  $data_formation['position'] = $newPosition[$key];
                  try{
                       $club_formation = $this->objectName::create($data_formation);
                       $club_formation->save();
                     }catch(QueryException $ex){
                    return response(['status' => false, 'msg' => trans('admin.samePlayer_name')]);                   
                     }
            }
            if($club_id == $match_data->home_club_id){
                $done_home_data['home_formation'] = '1';
                $club = Match::where('id', $match_data->id)->update($done_home_data);
            }
            $new_match_data = Match::where('id', $match_data->id)->first();
            if($new_match_data->home_formation == '1' && $new_match_data->away_formation == '1'){
                    $match_ststus['status'] = 'started';
                    $club = Match::where('id', $match_data->id)->update($match_ststus);
                    session()->flash('success',trans('admin.formationAdded'));
                    return 'done';
            }
            return response(['status' => true, 'msg' => trans('admin.formationAdded')]);
    }

    public function store_away(Request $request)
    {
            parse_str($request->inputs, $data);
       
            $club_id = $data['club_id_away'];
            $match_data = $data['match_data'];
            $match_data =json_decode($match_data);
            $newPosition = $data['newPosition_away'];
            foreach ($data['squad_away'] as $key => $player_id) 
            {
                $data_formation['player_id'] = $player_id;
                $data_formation['club_id'] = $club_id;
                $data_formation['position'] = $newPosition[$key];
                try{
                   $club_formation = $this->objectName::create($data_formation);
                   $club_formation->save();
                }catch(QueryException $ex){
                    return response(['status' => false, 'msg' => trans('admin.samePlayer_name')]);             
                }
            }
            if($club_id == $match_data->away_club_id){
                $done_away_data['away_formation'] = '1';
                $club = Match::where('id', $match_data->id)->update($done_away_data);
            }
            $new_match_data = Match::where('id', $match_data->id)->first();
            if($new_match_data->home_formation == '1' && $new_match_data->away_formation == '1'){
                    $match_ststus['status'] = 'started';
                    $club = Match::where('id', $match_data->id)->update($match_ststus);
                    session()->flash('success',trans('admin.formationAdded'));
                    return 'done';
            }
            return response(['status' => true, 'msg' => trans('admin.formationAdded')]);
    }

    public function destroy($id)
    {
        $player = $this->objectName::where('player_id', $id)->first();
        $player->delete();
        session()->flash('success',trans('admin.deleteSuccess'));
        return back();
    }
}
