<?php

namespace App\View\Components;

use Illuminate\View\Component;

class QuestionFooter extends Component
{
    public $percentage;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($percentage)
    {
        $this->percentage = $percentage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.question-footer');
    }
}
