<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Squad_player extends Model
{
    protected $fillable = [
        'position', 'squad_id', 'player_id', 'club_id','points', 'is_captain'
    ];
 

    public function getPlayer()
    {
        return $this->hasOne('App\Player', 'id', 'player_id');
    }

    public function getSquad()
    {
        return $this->hasOne('App\Squad', 'id', 'squad_id');
    }
}
