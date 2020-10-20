<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'clasification','club_name', 'tournaments', 'date_created','desc','image'
    ];
    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/clubs_images') . '/' . $img;
        else
            return "";
    }
}
