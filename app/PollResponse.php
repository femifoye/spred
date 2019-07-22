<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollResponse extends Model
{
    //
    public function responder(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function poll(){
        return $this->belongsTo('App\Admin\Poll');
    }


}
