<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponser_image extends Model
{
    protected $fillable = [
      'image'
    ];

    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/sponser_images') . '/' . $img;
        else
            return "";
    }
}
