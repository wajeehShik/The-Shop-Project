<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboradLayout extends Component
{
    public $title;
    public $url;
    public $head;
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
  
     public function __construct($title=null,$head=null)
     {
         $this->title=$title;
         $this->head=$head;
         $this->url=request()->route()->uri??"";
        $this->user=auth()->guard('admin')->user();
     }
 

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.dashborad.app');
    }
}
