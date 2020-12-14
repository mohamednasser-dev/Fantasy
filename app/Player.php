<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'player_name', 'player_name_en','age', 'center_name','desc','image','club_id'
    ];

    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/players_images') . '/' . $img;
        else
            return "";
    }
    
    public function getClub()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
}
