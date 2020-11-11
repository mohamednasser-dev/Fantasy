<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Match;
use App\Event;
use App\Player;
use App\Squad;
use App\User;
use App\Squad_player;
use App\MatchEvent;
class SendPointsToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $match;
    public function __construct(Match $match)
    {
        $this->match = $match;
    }
    public function handle()
    {
        $events = MatchEvent::where('match_id',$this->match->id)->get();
        $match = Match::where('id',$this->match->id)->first();
        $win_club  = null;
        if($match->home_score > $match->away_score)
        {
            $win_club  = $this->match->home_club_id;
        }elseif($match->home_score < $match->away_score)
        {
            $win_club  = $this->match->away_club_id;
        }
        $clubs  = [$this->match->home_club_id,$this->match->away_club_id]; 
        //Giv Event Points To Players    
        foreach ($events as $event) 
        {
            $current_event  = Event::find($event->event_id);
            $current_player = Player::find($event->player_id);
            $captins        = Squad_player::where('player_id',$event->player_id)->where('is_captain',"1")->count();
            if($captins > 0){
                $final_points = $current_player->points + ($captins * $current_event->is_captain);
                $not_captain_data['points'] = $final_points;
                $Player_win = Player::where('id',$current_player->id)->update($not_captain_data);
                $squads     = Squad_player::where('player_id',$event->player_id)->where('is_captain',"1")->get();
                foreach ($squads as $squad) {
                    $squad_points = $squad->points + $current_event->is_captain;
                    $data['points'] = $squad_points;
                    $Player_win = Squad_player::where('player_id',$squad->player_id)->update($data);
                    $Player_win = Squad_player::where('player_id',$squad->player_id)->sum('points');
                }

            }
            $not_captains    = Squad_player::where('player_id',$event->player_id)->where('is_captain',"0")->count();
            if($not_captains > 0){
                $final_points = $current_player->points + ($not_captains * $current_event->value);
                $not_captain_data['points'] = $final_points;
                $Player_win = Player::where('id',$current_player->id)->update($not_captain_data);
                $squads     = Squad_player::where('player_id',$event->player_id)->where('is_captain',"0")->get();
                foreach ($squads as $squad) {
                    $squad_points = $squad->points + $current_event->value;
                    $data['points'] = $squad_points;
                    $Player_win = Squad_player::where('player_id',$squad->player_id)->update($data);
                }
                          
            }
        }
        //Get All Win Club Players & Giv Points In Squad Player
        $players = Squad_player::where('club_id',$win_club)->get();
        foreach ($players as $player) {
            $win_event = Event::find(5);
            $player_data = null;
            if ($player->is_captain == "1") {
                $player_data['points'] = $player->points + $win_event->is_captain; 
                $Player_win = Squad_player::where('player_id',$player->player_id)->update($player_data);
                $playerInWinClub = Player::where('id',$player->player_id)->first();
                $playerInWinClub_data['points'] = $playerInWinClub->points + $win_event->is_captain; 
                $Player_win = Player::where('id',$player->player_id)->update($playerInWinClub_data);

            }else{
                $player_data['points'] = $player->points + $win_event->value; 
                $Player_win = Squad_player::where('player_id',$player->player_id)->update($player_data);
                $playerInWinClub = Player::where('id',$player->player_id)->first();
                $playerInWinClub_data['points'] = $playerInWinClub->points + $win_event->value; 
                $Player_win = Player::where('id',$player->player_id)->update($playerInWinClub_data);                
            }
        }
        //Get Total Squad Points 
        $squads_players = Squad_player::whereIn('club_id',$clubs)->get();
        $Squad = [];
        foreach ($squads_players as $squad_player) {
            $Squad[$squad_player->squad_id][] = $squad_player->points;
        }
        $SquadIds = array_keys($Squad);
        foreach ($SquadIds as $key => $SquadId) {
            //update Squad Points 
            $squad = Squad::find($SquadId);
            $squad->points += array_sum($Squad[$SquadId]);
            $squad->save();
        }
        //Get Total Squad Points  And Giv To Users
        $squads_players = Squad_player::whereIn('club_id',$clubs)->get();
        $Squad = [];
        foreach ($squads_players as $squad_player) {
            $Squad[$squad_player->squad_id][] = $squad_player->points;
        }
        $SquadIds = array_keys($Squad);
        foreach ($SquadIds as $key => $SquadId) {
            //update User Points 
            $squad = Squad::find($SquadId);
            $user  = User::find($squad->user_id);
            $user->points += $squad->points;
            $user->save();
        }   
    }
}
