<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
    $orders=Order::where("user_id",auth()->id())->with('products')->get();
        return view('front.orders',compact('orders'));
    }
}
