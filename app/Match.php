<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'home_club_id', 'away_club_id', 'time', 'date', 'result','status','stadium_id','tour_id'
    ];
    public function getHomeclub()
    {
        return $this->hasOne('App\Club', 'id', 'home_club_id');
    }

    public function getAwayclub()
    {
        return $this->hasOne('App\Club', 'id', 'away_club_id');
    }

    public function getStadium()
    {
        return $this->hasOne('App\Stadium', 'id', 'stadium_id');
    }

    public function getTournament()
    {
        return $this->hasOne('App\Tournament', 'id', 'tour_id');
    }
}
