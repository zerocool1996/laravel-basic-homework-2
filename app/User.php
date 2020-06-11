<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'class'
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

    public function userPhone(){
        return $this->hasOne('App\Phone', 'user_id', 'id')->withDefault(['number' => '']);
    }

    public function userPost(){
        return $this->hasMany('App\Post', 'user_id', 'id');
    }

    public function userRole(){
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id', 'id');
    }

}
