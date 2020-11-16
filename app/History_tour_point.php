<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_tour_point extends Model
{
	protected $fillable = [
        'points', 'tour_id', 'user_id'
    ];
    public function Tour()
    {
        return $this->hasOne('App\Tournament', 'id', 'tour_id');
    }
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
