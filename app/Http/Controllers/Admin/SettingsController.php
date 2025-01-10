<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UploadImage;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
   $setting=Setting::first();
   return view('admin.settings',compact('setting'));
    }
    public function update(SettingRequest $request){
        $setting=Setting::firstOrFail();
       $data['name']=$request->post('name');
       $data['description']=$request->post('description');
       $data['phone_number']=$request->post('phone_number');
       $data['facebook']=$request->post('facebook');
       $data['twiter']=$request->post('twiter');
       $data['instagram']=$request->post('instagram');
       $data['skyp']=$request->post('skyp');
       $data['gmail']=$request->post('gmail');
       $data['whatsapp']=$request->post('whatsapp');
    //    'logo'
    if($request->logo){
        $data['logo']=UploadImage::update($request->logo,$setting->logo,'');
    }
    $setting->update($data);
    alert()->success('اعدادات ','تم تعديل بنجاح')   ;
    return redirect()->route("admin.settings.index");
    }
}
