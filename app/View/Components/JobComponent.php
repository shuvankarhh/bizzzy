<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobComponent extends Component
{
    public $applied;
    public $connect;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($applied, $connect = 0)
    {
        $this->applied = $applied;
        $this->connect = $connect;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.job-component');
    }
}
