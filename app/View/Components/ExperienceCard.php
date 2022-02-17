<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ExperienceCard extends Component
{
    public $experiencie;
    
    public function __construct($experiencie)
    {
        $this->experiencie=$experiencie;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.experience-card');
    }
}
