<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Front\RattingRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ratting;
use Illuminate\Http\Request;

class RattingController extends Controller
{
    public function store(RattingRequest $request){
        try {
            DB::beginTransaction();
        $order_id=$request->order_id;
        $product_id=$request->product_id;
        $order=Order::where(['user_id'=>auth()->id(),'id'=>$order_id])->firstOrFail();
           $orderItems=OrderItem::where(['order_id'=>$order_id,'product_id'=>$product_id,'is_ratting'=>'0'])
       ->firstOrFail();
    $ratting=Ratting::create([
        'product_id'=>$product_id,
        'ratting'=>$request->post('ratting'),
        'note'=>$request->post('note'),
        'user_id'=>auth()->id(),
    ]);

    $orderItems->update(['is_ratting'=>"1"]);
    $orderItems=OrderItem::where(['order_id'=>$order_id,'product_id'=>$product_id,'is_ratting'=>'0'])
    ->first();
    if(is_null($orderItems)){
$order->update(['status'=>'finish']);
    }
    DB::commit();
    alert()->success('تقييم','تمت عملية التقييم بنجاح');
    return redirect()->route('front.orders');
} catch (Throwable $e) {
    DB::rollBack();
    return $e;
}
    }
}
