<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function show_shop_grid(){
        return view('front.shops');
    }
    public function show_shop_list(){
        return view('front.shops');
    }
}
