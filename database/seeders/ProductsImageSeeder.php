<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image='default.png';
        $products = Product::all();
        foreach($products as $product){
            for($i=0;$i<mt_rand(1,3);$i++){
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image'=>$image,
                ]);
    }}
    }
}
