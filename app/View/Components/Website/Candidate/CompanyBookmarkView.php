<?php

namespace App\View\Components\Website\Candidate;

use Illuminate\View\Component;

class CompanyBookmarkView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $companies;

    public function __construct($companies)
    {
        $this->companies = $companies;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website.candidate.company-bookmark-view');
    }
}
