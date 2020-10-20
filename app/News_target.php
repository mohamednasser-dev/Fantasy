<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_target extends Model
{
    protected $fillable = [
        'type','news_id','target_id'
     ];
}
