<?php

namespace App;

use App\Admin\Category;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function creator(){
        return $this->morphTo();
    }

    public function category(){
        return $this->belongsTo('App\Admin\Category');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function forum(){
        return $this->belongsTo('App\Forum', 'forum_id');
    }
}
