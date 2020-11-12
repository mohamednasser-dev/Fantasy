<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = [
        'coach_name', 'age', 'image', 'desc', 'club_id'
    ];
    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/coaches_images') . '/' . $img;
        else
            return "";
    }

    public function getClub()
    {
        return $this->belongsTo(Club::class, 'club_id')->select('id','club_name','classification');
    }
}
