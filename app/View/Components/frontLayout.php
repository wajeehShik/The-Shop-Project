<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\View\Component;

class frontLayout extends Component
{
    public $title;
    public $cats;
    public $url;
    public $setting;
    public $userType;
    public $islogin;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null)
    {
        $this->title = $title ?? config('app.name');

        $this->setting=Setting::first();
        $this->cats=Category::with('children')->whereStatus('1')->orderBy('id','DESC')->take(20)->get();
        $this->url=request()->route()->uri??"";
        $this->isLoginUser();
        //
    }

   private function isLoginUser(){
    
    if(auth()->guard('admin')->check() ||auth()->guard('web')->check()){
        $this->islogin=true;
      $this->userType=auth()->guard('admin')->check()?"admin":"web";
    }
    return false;
   }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front-layout');
    }
}
