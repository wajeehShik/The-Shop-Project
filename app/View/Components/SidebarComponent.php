<?php

namespace App\View\Components;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\View\Component;

class SidebarComponent extends Component
{
    public $cats;
    public $brands;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
$this->cats=Category::withCount(['products'=>function($q){
    $q->whereStatus('1');
  }])->has('products')->where('status','1')->orderBy('id','desc')->orderBy('products_count','desc')->limit(20)->get();


$this->brands=Brand::withCount(['products'=>function($q){
    $q->whereStatus('1');
  }])->has('products')->where('status','1')->orderBy('id','desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-component');
    }
}
