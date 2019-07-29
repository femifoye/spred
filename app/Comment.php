<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User', 'commentable_id');
    }

    public function commentable(){
        return $this->morphTo();
    }
}
