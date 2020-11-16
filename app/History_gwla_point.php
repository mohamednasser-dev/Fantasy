<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_gwla_point extends Model
{
    protected $fillable = [
        'points', 'gwla_id', 'user_id'
    ];
    public function Gwla()
    {
        return $this->hasOne('App\Gwalat', 'id', 'gwla_id');
    }
    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
