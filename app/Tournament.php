<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'tour_name', 'tour_name_en','classification','status'
    ];
}
