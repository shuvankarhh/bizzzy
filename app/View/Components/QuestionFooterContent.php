<?php

namespace App\View\Components;

use Illuminate\View\Component;

class QuestionFooterContent extends Component
{

    public $href;
    public $onClick;
    public $buttonText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = "",  $onClick = '', $buttonText = 'hide')
    {
        $this->href = $href;
        $this->onClick = $onClick;
        $this->buttonText = $buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.question-footer-content');
    }
}
