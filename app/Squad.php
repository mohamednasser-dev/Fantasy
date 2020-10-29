<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    protected $fillable = [
        'squad_name', 'squad_type', 'user_id', 'points','coach_id'
    ];
 

    public function getUser()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function getCoah()
    {
        return $this->hasOne('App\Coach', 'id', 'coach_id');
    }
}
