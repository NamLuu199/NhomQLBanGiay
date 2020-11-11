<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $primaryKey = 'id';

    //images
    public function images()
    {
        return $this->hasMany('App\ImageUpLoad');
    }

    // comment
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function category()
    {
        return $this->belongsTo('App\Category',"category_id");
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand',"brand_id");
    }
}
