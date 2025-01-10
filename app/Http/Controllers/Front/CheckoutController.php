<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\Card\CardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception\InvalidOrderException;

class CheckoutController extends Controller
{

    public function create(CardRepository $cart)
    {

        if ($cart->get()->count() == 0) {
            throw new InvalidOrderException('Cart is empty');
        }
        $user=auth()->user();
        return view('front.checkout', [
            'cart' => $cart,
            'user' => $user,
        ]);
    }
    public function store(CheckoutRequest $request, CardRepository $cart)
    {
        $items = $cart->get()->groupBy('product.store_id')->all();

        DB::beginTransaction();
        try {
            $type_pament=$request->type;
            foreach ($items as  $cart_items) {
                $data['user_id' ]=auth()->id();
                $data['payment_method' ]= $type_pament;
                // if($type_pament=='visa'){
                    $data['status']='completed';
                    $data['payment_status']='paid';
                // }
                $order = Order::create($data);
                foreach ($cart_items as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $item->product_id,
                        'product_name' => $item->products->title,
                        'price' => $item->products->price,
                        'quantity' => $item->qunatity,
                    ]);
                }
                if($type_pament=='delivry'){
                    $order->addresses()->create([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone_number'=>$request->phone_number,
                        'street_address'=>$request->street_address,
                        'city'=>$request->city,
                        'postal_code'=>$request->postal_code,
                        'state'=>$request->state,
                        'country'=>"pl",
                    ]);
                }
            }
            $cart->empty();
            DB::commit();

            //event('order.created', $order, Auth::user());
            // event(new OrderCreated($order));

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
alert()->success('test','test');
        return redirect()->route('front.orders');
    }
}
