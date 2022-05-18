<?php

namespace App\View\Components;

use Illuminate\View\Component;

class JobComponent extends Component
{
    public $applied;
    public $connect;
    public $job;
    public $idx;
    public $remove;
    public $recruiter;
    public $proposals;
    public $totalApplied;


    /**
     * Create a new component instance.
     *
     * @param applied $applied Boolean
     * @return void
     */
    public function __construct($applied, $job, $idx, $connect = 0, $remove = false, $recruiter = false, $proposals = 0, $totalApplied = 0)
    {
        $this->applied = $applied;
        $this->connect = $connect;
        $this->job = $job;
        $this->idx = $idx; 
        $this->remove = $remove;
        $this->recruiter = $recruiter;
        $this->proposals = $proposals;
        $this->totalApplied = $totalApplied;
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
