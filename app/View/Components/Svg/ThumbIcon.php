<?php

namespace App\View\Components\Svg;

use Illuminate\View\Component;

class ThumbIcon extends Component
{
    public $height;

    public $width;

    public $stroke;

    public $fill;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($height = 32, $width = 32, $stroke = 'white', $fill = 'none')
    {
        $this->height = $height;
        $this->width = $width;
        $this->stroke = $stroke;
        $this->fill = $fill;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.svg.thumb-icon');
    }
}
