<?php

namespace App\View\Components;

use Illuminate\View\Component;

class reportResult extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $judul;
    public $padding;
    public function __construct($judul,$padding)
    {
        $this->judul = $judul;
        $this->padding = $padding;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.report-result');
    }
}
