<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactusRequest;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    //
    public function index(){
        return view('front.contactus');
    }
    public function store(ContactusRequest $request){
        $conatctus=Contactus::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'message' => $request->post('message'),
            'subject' => $request->post('subject'),
        ]);
        alert()->success(' طلب تواصل', 'تم ارسال ملاحظه بنجاح');
        return redirect()->route('front.contact_us')->withInput();
    }
}
