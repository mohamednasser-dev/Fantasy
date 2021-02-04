<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Club extends Model
{
    protected $hidden = ['club_name_en'];
    protected $fillable = [
        'classification','club_name', 'club_name_en','tournaments', 'date_created','desc','image'
    ];
    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/clubs_images') . '/' . $img;
        else
            return "";
    }
    public function Coach()
    {
        return $this->hasOne('App\Coach', 'club_id', 'id');
    }
}
