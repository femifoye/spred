<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
    public function creator(){
        return $this->morphTo();
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function category(){
        return $this->belongsTo('App\Admin\Category');
    }
}
