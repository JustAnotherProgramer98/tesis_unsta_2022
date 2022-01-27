<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateSaleForm extends Component
{
    public $users;
    public $experiences;

    public function __construct($users,$experiences)
    {
        $this->users=$users;
        $this->experiences=$experiences;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.create-sale-form');
    }
}
