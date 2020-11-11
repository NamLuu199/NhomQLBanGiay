<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\OrderStatus;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class AdminGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $newOrders = Order::WhereIn('order_status_id',[1,2])->count();
        $orderStatus  = OrderStatus::all();
        view()->share([
            'newOrders' => $newOrders,
            'orderStatus' =>  $orderStatus
        ]);
    }

}
