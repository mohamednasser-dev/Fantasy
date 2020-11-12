<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gwalat extends Model
{
    protected $fillable = [
        'name', 'tour_id', 'start', 'end','status','start_time','end_time'
    ];
    public function getTournament()
    {
        return $this->hasOne('App\Tournament', 'id', 'home_club_id');
    }
    public function Tournament()
    {
        return $this->belongsTo(Tournament::class, 'tour_id')->select('id','tour_name','classification');
    }
}
