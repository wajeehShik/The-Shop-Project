<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\Ratting;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RattingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  
          $faker = Factory::create();
  $orderItems=OrderItem::where('is_ratting','0')->inRandomOrder()->take(3000)->get();

  foreach($orderItems as $item){
    Ratting::create([
        'product_id'=>$item->product_id,
        'ratting'=>rand(3,5),
        'note'=>$faker->paragraph(6),
        'status'=>(string)rand('1','0'),
        'user_id'=>$item->order->user_id,
    ]);
  }
    }
}
