<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $productsLeft=Product::whereStatus('1')->take(2)->get();
        $productsRight=Product::whereStatus('1')->first();
        $categories=Category::whereStatus('1')->with('parent')->get();
        $topsratted=Product::whereStatus('1')->take(3)->get();  //لي له تقييم
        $newsProducts=Product::whereStatus('1')->orderBy("id",'DESC')->take(3)->get();
        $bestsSellers=Product::whereStatus('1')->take(3)->get();
        $brands=Brand::wherehas('products')->whereStatus('1')->take(11)->get();
        // trend يجيب عليها طلب وشراء كثير
        $trendsProduct=Product::whereStatus('1')->take(8)->orderBy("id",'DESC')->get();
        return view('welcome',compact('productsLeft','productsRight','categories','trendsProduct',
        'topsratted',
        'newsProducts',
        'bestsSellers',
        'brands',
    ));
    }
    public function about_us(){
       
        return view('front.about_us');
    }
}
