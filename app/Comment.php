<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'user_id', 'post_id'
    ];

    public function commentUser(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
