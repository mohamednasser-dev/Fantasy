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
use App\MatchEvent;

class SendPointsToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $match;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Match $match)
    {
        //
        $this->match = $match;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $events = MatchEvent::where('match_id',$this->match->id)->get();
        $match = Match::where('id',$this->match->id)->first();
        $win_club  = null;
        if($match->home_score >$match->away_score)
        {
            $win_club  = $this->match->home_club_id;
        }elseif($match->home_score <$match->away_score)
        {
            $win_club  = $this->match->away_club_id;
        }
        if ($win_club !== null) {
            $players= Player::where('club_id',$win_club)->get();
            $win_event = Event::find(5);
            // foreach ($players as $player) 
            // {
            //     $selected_player =  Player::find($player->id);
            //     $final_point = $selected_player->points + $win_event->value;
            //     $data['points'] = $final_point;
            //     $Player_win = Player::where('id',$player->id)->update($data);
            // }
        }
        $clubs  = [$this->match->home_club_id,$this->match->away_club_id];

        foreach ($events as $event) 
        {
            $current_event  = Event::find($event->event_id);
            $current_player = Player::find($event->player_id);
            $final_point    = $current_player->points + $current_event->value;
            $data['points'] = $final_point;
            $Player_win = Player::where('id',$current_player->id)->update($data);
        }
        return dd($events);
    }
}
