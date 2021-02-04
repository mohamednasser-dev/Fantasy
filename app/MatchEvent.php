<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchEvent extends Model
{
    protected $fillable = [
        'player_id', 'coach_id' ,'match_id','event_id','person'
    ];
    public function Event()
    {
    	return $this->belongsTo('App\Event','event_id');
    }
    public function Player()
    {
    	return $this->belongsTo('App\Player','player_id');
    }

    public function Coach()
    {
        return $this->belongsTo('App\Coach','coach_id');
    }
    public function Match()
    {
    	return $this->belongsTo('App\Match','match_id');
    }
}
