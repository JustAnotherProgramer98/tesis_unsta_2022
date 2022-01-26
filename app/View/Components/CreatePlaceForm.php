<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreatePlaceForm extends Component
{
    public $provinces;
    
    public function __construct($provinces)
    {
        $this->provinces=$provinces;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.create-place-form');
    }
}
