<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function username()
    {
        return $this->belongsTo('App\Admin',"admin_id");
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
}
