<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public function creator(){
        return $this->morphTo();
    }
}
