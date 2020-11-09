<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $primaryKey = 'home_club_id';

    protected $fillable = [
        'home_club_id', 'away_club_id', 'time', 'date', 'home_score','away_score','status',
        'stadium_id','tour_id','gwla_id','id','home_formation','away_formation'
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
    public function getGwla()
    {
        return $this->hasOne('App\Gwalat', 'id', 'gwla_id');
    }
        public function MatchEvents()
    {
        return $this->hasMany('App\MatchEvent','match_id', 'id');
    }
}
