<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;
class ProductsTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        foreach($products as $product){
            $tags = Tag::inRandomOrder()->limit(mt_rand(1,3))->get();
            $product->tags()->attach($tags);
    }
    }
}
