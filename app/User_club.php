<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_club extends Model
{
	  protected $fillable = [
        'user_id', 'club_id','type'
    ];
    
     public function getClub()
    {
        return $this->hasOne('App\Club', 'id', 'club_id');
    }

      public function getUser()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
