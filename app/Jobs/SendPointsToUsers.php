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
        if($match->home_score >$match->away_score)
        {
            $win_club  = $this->match->home_club_id;
        }else  if($match->home_score <$match->away_score)
        {
            $win_club  = $this->match->away_club_id;
        }
        $clubs  = [$this->match->home_club_id,$this->match->away_club_id];
        $players= Player::where('club_id',$win_club)->get();
        $win_event = Event::find(5);
        foreach ($players as $player) 
        {
            $selected_player =  Player::find($player->id);
            $final_point = $selected_player->points + $win_event->value;
            $data['points'] = $final_point;
            $Player_win = Player::where('id',$player->id)->update($data);
        }
        // foreach ($events as $event) 
        // {
        //     $points = Event::find($event->event_id);
        //     dd($points);
        // }
        // return dd($events);
    }
}
