<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    // relationship one to many
    public function details()
    {
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }
}