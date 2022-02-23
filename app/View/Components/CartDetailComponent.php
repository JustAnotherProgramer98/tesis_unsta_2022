<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CartDetailComponent extends Component
{
   public $experiences;
    public function __construct($experiences)
    {
        $this->experiences=$experiences;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart-detail-component');
    }
}
