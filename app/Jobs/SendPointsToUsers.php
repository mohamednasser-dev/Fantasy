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
        $clubs  = [$this->match->home_club_id,$this->match->away_club_id];
        $players= Player::whereIn('club_id',$clubs)->get();
        dd($players);
        foreach ($events as $event) {
            $points = Event::find($event->event_id);
            dd($points);
        }
        return dd($events);
    }
}
