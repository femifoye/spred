<?php

namespace App;

use App\Category;
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
}
