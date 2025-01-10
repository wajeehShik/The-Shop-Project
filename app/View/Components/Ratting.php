<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Ratting extends Component
{
    public $ratting;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function __construct($ratting=0)
    {
        $this->ratting=$ratting;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ratting');
    }
}
