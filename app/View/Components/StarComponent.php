<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarComponent extends Component
{
    public $rating;
    public $justifyStyle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($rating, $justifyStyle = "")
    {
        $this->rating = $rating;
        $this->justifyStyle = $justifyStyle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.star-component');
    }
}
