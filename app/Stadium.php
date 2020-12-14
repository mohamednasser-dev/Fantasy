<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    protected $table = 'stadiums';

    protected $fillable = [
        'stadium_name', 'stadium_name_en','image'
    ];
    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/stadiums_images') . '/' . $img;
        else
            return "";
    }
}
