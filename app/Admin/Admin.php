<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public function polls(){
        return $this->hasMany('App\Poll');
    }
}
