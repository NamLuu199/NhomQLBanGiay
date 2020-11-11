<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function blog()
    {
    	return $this->belongsTo('App\Blog');
    }
}