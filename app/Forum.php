<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
    public function creator(){
        return $this->morphTo();
    }
}
