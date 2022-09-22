<?php

namespace App\View\Components;

use Illuminate\View\Component;

class reportPaging extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $option;
    public $default;

    public function __construct($option = NULL,$default = NULL)
    {
        $this->option = $option;
        $this->default = $default;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.report-paging');
    }
}
