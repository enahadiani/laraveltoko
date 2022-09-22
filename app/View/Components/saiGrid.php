<?php

namespace App\View\Components;

use Illuminate\View\Component;

class saiGrid extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $thead;
    public $thwidth;
    public $class;

    public function __construct($id,$class=NULL,$thead,$thwidth)
    {
        $this->id = $id;
        $this->class = $class;
        $this->thead = $thead;
        $this->thwidth = $thwidth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sai-grid');
    }
}
