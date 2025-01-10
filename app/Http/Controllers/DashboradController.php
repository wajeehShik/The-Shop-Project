<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    //
    public function index()
    {
        $admins=Admin::count();
        $tags=Tag::count();
        $categories=Category::count();
        $products=Product::count();
        $brands=Brand::count();
        $order=Order::count();
        $faqs=Faq::count();
        $usersActive=User::whereStatus('1')->count();
        $usersNoActive=User::whereStatus('0')->count();
        $activeProducts=Product::whereStatus('1')->count();
        $noActiveProducts=Product::whereStatus('0')->count();
        return view('dashboard',compact('admins','tags','categories','products','brands','order','faqs','activeProducts','noActiveProducts'));
    }
}
