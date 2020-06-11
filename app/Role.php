<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];

    public function roleUser(){
        return $this->belongsToMany('App\User', 'role_user', 'user_id', 'role_id', 'id')->withDefault(['firstname' => '']);
    }
}
