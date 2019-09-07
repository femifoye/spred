<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $appends = ['model_name', 'action_name'];
    protected $hidden = ['model_name'];
    //
    public function user(){
        return $this->belongsTo('App\User', 'commenter_id');
    }

    public function commentable(){
        return $this->morphTo();
    }

    protected function getModelNameAttribute()
    {
        return str_after($this->commentable_type, 'App\\');
    }

    protected function getActionNameAttribute(){
        return $this->model_name.'Controller@single';
    }
}
