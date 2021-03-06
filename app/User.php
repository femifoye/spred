<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articleCreator(){
        return $this->morphMany('App\Article', 'creator');
    }

    public function pollResponses(){
        return $this->hasMany('App\PollResponse');
    }

    public function forumCreator(){
        return $this->morphMany('App\Forum', 'creator');
    }

    public function chats(){
        return $this->hasMany('App\Chat');
    }

    public function videos(){
        return $this->hasMany('App\Video');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'commenter_id');
    }

    public function profile(){
        return $this->hasOne('App\UsersProfile');
    }

}
