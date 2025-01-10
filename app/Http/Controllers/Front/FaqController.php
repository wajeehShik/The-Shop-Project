<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    //
    public function show(){
        $faqs=Faq::OrderBy('id')->paginate(10);
       
        return view("front.faqs",compact('faqs'));
    }
}
