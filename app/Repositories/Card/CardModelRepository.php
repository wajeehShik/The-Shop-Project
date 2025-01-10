<?php

namespace App\Repositories\Card;

use App\Models\Card;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
class CardModelRepository implements CardRepository{
    protected $items;
    public function __construct()
    {
        $this->items = collect([]);
    }
    public function get() : Collection
    {
        if(auth()->check()){
            $this->items=Card::where('user_id',auth()->id())->with('products')->get();
        }else{
            $this->items=Card::whereNull('user_id')->with('products')->get();

        }
        return $this->items;
    }
    public function add(Product $product, $qunatity = 1)
    {
        $item =  Card::where('product_id', '=', $product->id)
            ->first();
        if (!$item) {
            $cart = Card::create([
                'user_id' => Auth::id()??null,
                'product_id' => $product->id,
                'qunatity' => $qunatity,
                'price'=>$product->price,
            ]);
            //عشان يحدث item اول باول
            $this->get()->push($cart);
            return $cart;
        }
        return $item->increment('qunatity', $qunatity);
    }
    
    public function update($id, $qunatity)
    {
        Card::where('id', '=', $id)
            ->update([
                'qunatity' => $qunatity,
            ]);
            return $this->getSingleProduct($id);
    }

    public function getSingleProduct($id){
        $cart=Card::whereId($id)->first();
        $price=$cart->qunatity*$cart->price;
        return $price;
    }

    public function delete($id)
    {
        Card::where('id', '=', $id)
            ->delete();
    }
    public function empty()
    {
        Card::query()->delete();
    }
    
    public function total() : float
    {
        /*return (float) Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('SUM(products.price * carts.qunatity) as total')
            ->value('total');*/

        return $this->get()->sum(function($item) {
            return $item->qunatity * $item->products->price;
        });
    }

}