<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //已遵守复数规范
    public function comment(){
        return $this->hasMany('App\Comment','post_id','id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
