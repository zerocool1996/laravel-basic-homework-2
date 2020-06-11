<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['number', 'user_id'];

    public function phoneUser(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
