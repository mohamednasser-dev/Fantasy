<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Club_formation extends Model
{
    protected $fillable = [
        'club_id', 'player_id', 'position'
    ];
    public function getPlayer()
    {
        return $this->hasOne('App\Player', 'id', 'player_id');
    }
    public function getClub()
    {
        return $this->hasOne('App\Club', 'id', 'club_id');
    }
}
