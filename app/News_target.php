<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_target extends Model
{
    protected $fillable = [
        'model','news_id','target_id'
     ];

     public function getNews()
     {
         return $this->hasOne('App\News', 'id', 'news_id');
     }
}
