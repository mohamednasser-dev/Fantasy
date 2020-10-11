<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $fillable = [
        'stadium_name', 'image'
    ];
    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/stadiums_images') . '/' . $img;
        else
            return "";
    }
}
