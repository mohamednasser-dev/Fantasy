<?php

namespace App\Listeners;

use App\Events\MatchEnded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MatchEventListner
{
    /**
     * Handle the event.
     *
     * @param  MatchEnded  $event
     * @return void
     */
    public function handle(MatchEnded $event)
    {
        //
        dd($event);
    }
}
