<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditExperienceForm extends Component
{
    public $experience;
    public $places;
    public $hosts;
    public $languajes;
    
    public function __construct($experience,$places,$hosts,$languajes)
    {
        $this->experience=$experience;
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
        return view('components.edit-experience-form');
    }
}
