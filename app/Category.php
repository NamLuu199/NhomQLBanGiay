<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $table = 'categories';

	public function parent(){
        return $this->belongsTo("App\Category","parent_id");
    }
    public function subcategory()
    {
        return $this->hasMany("App\Category","parent_id");
    }
    // định nghĩa relationships 1 nhiều
    // relationship one to many
    public function products()
    {
        return $this->hasMany('App\Product',"product_id");
    }


}
