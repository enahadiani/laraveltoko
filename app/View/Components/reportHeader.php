<?php

namespace App\View\Components;

use Illuminate\View\Component;

class reportHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $judul;

    public function __construct($judul)
    {
        $this->judul = $judul;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.report-header');
    }
}
