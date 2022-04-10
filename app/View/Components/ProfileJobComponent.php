<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileJobComponent extends Component
{

    public $contract;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($contract)
    {
        $this->contract = $contract;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile-job-component');
    }
}
