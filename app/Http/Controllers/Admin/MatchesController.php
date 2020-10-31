<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Match;
use App\Gwalat;
use App\Club;
use App\Tournament;
use Carbon\Carbon;
use App\User;
use App\Player;
use App\User_club;
use App\Club_formation;

use Illuminate\Database\QueryException;
class MatchesController extends Controller
{
    public $objectName;
    public $folderView;
    public function __construct(Match $model)
    {
        $this->middleware('auth');
        $this->objectName = $model;
        $this->folderView = 'admin.matches.';
    }
    // this function to  select all Coaches
    public function index()
    {
       $clubArray=null;
                if(auth()->user()->type == 'editor')
                {
                    $editor_clubs = User_club::where('user_id',auth()->user()->id)->get();
                    $i=0;
                    foreach ($editor_clubs as $user_club) 
                    {
                       $clubArray[$i]= $user_club->club_id;
                       $i++;
                    }
                }
        $matches = $this->objectName::paginate(10);
        return view($this->folderView.'matches',\compact('matches','clubArray'));
    }
    public function monitor_match($match_id)
    {
        $selected_match=Match::where('id',$match_id)->first();
        $home_club =Club::where('id',$selected_match->home_club_id)->first();
        $away_club =Club::where('id',$selected_match->away_club_id)->first();
        $home_players =club_formation::where('club_id',$selected_match->home_club_id)->orderBy('position','ASC')->get();
        $away_players = club_formation::where('club_id',$selected_match->away_club_id)->orderBy('position','ASC')->get();
        if(count($home_players)!=0){
             $home_Player_Array;
             $i=0;
            foreach ($home_players as $player) {
               $home_Player_Array[$i]= $player->player_id;
               $i++;
            }
            $home_replacement_players = Player::where('club_id',$selected_match->home_club_id)
            ->whereNotIn('id',$home_Player_Array)->get();
        }else{
        $home_replacement_players = Player::where('club_id',$selected_match->home_club_id)->get();     
        }
        if(count($away_players)!=0){
             $away_Player_Array;
             $i=0;
            foreach ($away_players as $player) {
               $away_Player_Array[$i]= $player->player_id;
               $i++;
            }
            $away_replacement_players = Player::where('club_id',$selected_match->away_club_id)
            ->whereNotIn('id',$away_Player_Array)->get();
        }else{
        $away_replacement_players = Player::where('club_id',$selected_match->away_club_id)->get();     
        }
        return view($this->folderView.'match_log.monitor_match',compact('selected_match','home_players','away_players','home_replacement_players',
            'away_replacement_players'));
    }   
    public function gwla_matches($id)
    {
        $matches = $this->objectName::where('gwla_id',$id)->paginate(10);
        return view($this->folderView.'matches',\compact('matches'));
    }
  // to prepar to add new club
    public function create()
    {
        return view($this->folderView.'create');
    }
// this to add new recourd of club in database
    public function store(Request $request)
    {
        //this two lines for get today date
        $mytime = Carbon::now();
        $today =  Carbon::parse($mytime->toDateTimeString())->format('Y-m-d');
        $data = $this->validate(\request(),
            [
                'home_club_id' => 'required',
                'away_club_id' => 'required|not_in:'.$request->home_club_id,
                'time' => 'required',
                'date' => 'required|after:'.$today,          
                'stadium_id' => 'required',
                'tour_id' => 'required',
                'gwla_id' => 'required',
            ]);
          $gwla_id =  $request['gwla_id'];

           //this try catch to block admin to add two same clubs to the sam gwla   
        try{
            // this line for get number of matches in selected gwla ...
            $matches_number =$this->objectName::where('gwla_id',$gwla_id)->get();
            if(count($matches_number) == 0)
            {
                //to put started and end gwla duration in selected gwla
                $data_gwla['start'] = $request['date'];                
                $data_gwla['end'] = $request['date'];
            }else
            {
                $data_gwla['end'] = $request['date'];                
            }
            $match = $this->objectName::create($data);
            $match->save();
                //to save calculated gwla duration ..
            $gwla = Gwalat::where('id',$gwla_id)->update($data_gwla);
        }catch(QueryException $ex){
            session()->flash('danger','النوادى المختارة موجوده مسبقا فى هذه الجولة');
            return back();
        }
    //end try catch
        session()->flash('success',trans('admin.addedsuccess'));
        return redirect(url('matches/create'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
public function view_match_events()
    {
        $matches = $this->objectName::paginate(10);
        return view($this->folderView.'matches',\compact('matches'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($gwla_id,$home_id,$away_id)
    {
        
        $match_data = $this->objectName::where('gwla_id', $gwla_id)
        ->where('home_club_id',$home_id)
        ->where('away_club_id',$away_id)
        ->first();
        return view($this->folderView.'edit', \compact('match_data'));
    }
    public function update(Request $request, $gwla_id,$home_id,$away_id)
    {
        $data = $this->validate(\request(),
            [
                'home_club_id' => 'required',
                'away_club_id' => 'required|not_in:'.$request->home_club_id,
                'time' => 'required',
                'date' => 'required',                               
                'stadium_id' => 'required',
                'tour_id' => 'required',
                'gwla_id' => 'required',
                'status' => 'required',
            ]);

        $club = $this->objectName::where('gwla_id', $gwla_id)
        ->where('home_club_id',$home_id)
        ->where('away_club_id',$away_id)
        ->update($data);
        session()->flash('success',  trans('admin.updatSuccess'));
        return redirect(url('matches'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gwla_id,$home_id,$away_id)
    {
        $match = $this->objectName::where('gwla_id', $gwla_id)
        ->where('home_club_id',$home_id)
        ->where('away_club_id',$away_id)
        ->first();

        $match->delete();
        session()->flash('success', trans('admin.deleteSuccess'));
        return redirect(url('matches'));
    }
     // in create Match page
     // For Get Gawalat Options
     public function GetGwalat($id)
     {
         $gawalat = Gwalat::where('tour_id',$id)->get();
         return view('admin.matches.parts.gawlatOptions',compact('gawalat'));
     }
     // For Get Classified Clubs Options
     public function GetClubs($id)
     {
         $clubs = Club::where('classification',$id)->get();
         return view('admin.matches.parts.clubsOptions',compact('clubs'));
     }
     // For Get Classified Tournaments Options
     public function GetTours($id)
     {
         $tours = Tournament::where('classification',$id)->get();
         return view('admin.matches.parts.toursOptions',compact('tours'));
     }
     
}
