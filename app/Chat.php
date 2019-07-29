<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    public function user(){
        return $this->belongsTo("App\User");
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
