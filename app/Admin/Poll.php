<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    //
    protected $fillable = ['question', 'options'];

    public function responses(){
        return  $this->hasMany('App\PollResponse');
    }

    public function creator(){
        return $this->belongsTo('App\Admin\Admin');
    }
}
