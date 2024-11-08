<?php

namespace App\View\Components\Website\Job;

use Illuminate\View\Component;

class JobCard extends Component
{
    public $job;

    public $bookmarked;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($job, $bookmarked = false)
    {
        $this->job = $job;
        $this->bookmarked = $bookmarked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website.job.job-card');
    }
}
