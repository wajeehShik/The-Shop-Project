<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusOrder= ['pending', 'processing',  'completed','finish', 'cancelled'];
        $paymentStatus= ['pending', 'paid', 'failed'];
         $users=User::inRandomOrder()->whereStatus('1')->orderBy('id','DESC')->limit(1000)->get();
         for($i=0;$i<=rand(500,1000);$i++){
       $order=Order::create([
            'user_id'=>$users->first()->id,
            'payment_method'=>'delevery',
            'status'=>$statusOrder[rand(0,4)],
            'payment_status'=>$paymentStatus[rand(0,2)],
            'shipping'=>0,
            'tax'=>0,
            'discount'=>0,
            'total'=>0,
       ]);
          $products=Product::inRandomOrder()->limit(rand(3,10))->whereStatus('1')->get();
          foreach($products as $product){
          OrderItem::create([
           'order_id'=>$order->id,
           'product_id'=>$product->id,
           'product_name'=>$product->title,
           'price'=>$product->price,
           'quantity'=>rand(2,10),
           'is_ratting'=>'0',
          ]);
       }
    }
    }
}
