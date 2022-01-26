<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreateExperienceForm extends Component
{
    public $places;
    public $hosts;
    public $languajes;
    public function __construct($places,$hosts,$languajes)
    {
        $this->places=$places;
        $this->hosts=$hosts;
        $this->languajes=$languajes;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.create-experience-form');
    }
}
