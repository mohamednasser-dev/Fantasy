<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'key_words', 'description','type','club_id','player_id','coach_id','tour_id','news_category_id','image'
    ];
    public function getImageAttribute($img)
    {
        if ($img)
            return asset('/uploads/news') . '/' . $img;
        else
            return "";
    }
    public function getClub()
    {
        return $this->hasOne('App\Club', 'id', 'club_id');
    }
    public function getCategory()
    {
        return $this->hasOne('App\News_category', 'id', 'news_category_id');
    }
}
