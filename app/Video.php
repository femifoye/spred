<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    public function uploader(){
        return $this->BelongsTo('App\User');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function views(){
        return $this->morphMany('App\View', 'viewable');
    }
}
