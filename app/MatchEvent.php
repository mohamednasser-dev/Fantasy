<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchEvent extends Model
{
    protected $fillable = [
        'player_id', 'match_id','event_id'
    ];
}
