<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gwalat extends Model
{
    protected $fillable = [
        'name', 'tour_id', 'start', 'end'
    ];
    public function getTournament()
    {
        return $this->hasOne('App\Tournament', 'id', 'home_club_id');
    }
}
