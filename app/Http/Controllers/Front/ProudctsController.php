<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProudctsController extends Controller
{
    public function index(){
        //ابحث ليش في مشكله
//   $products=Product::select(['title','image','price','category:name'])->with('category')->paginate(20);
$products=Product::with('category')->whereStatus('1')->paginate(12);

        return view('front.products',compact('products'));
    }
    public function show($slug){
   $product=Product::where('slug',$slug)->with(['images','tags'])->whereStatus('1')->firstOrFail();
        return view("front.proudct",compact('product'));
    }
    public function category($category){
        $products=Product::whereStatus('1')->where('category_id',$category)->with('category')->paginate(30);
        $cats=Category::where('status','1')->orderBy('id','desc')->get();
$brands=Brand::where('status','1')->orderBy('id','desc')->get();
        return view('front.products', compact('products','cats','brands'));
    }
    public function  tags($tag){
        $products=Product::whereHas('tags',function($q) use($tag){
            dd($q); 
$q->where('slug',$tag);
        })->get();
        dd($products);
        dd();
    }
}
