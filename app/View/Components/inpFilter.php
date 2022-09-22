<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inpFilter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $kode;
    public $nama;
    public $option;
    public $selected;
    public $default;
    public $datepicker;

    public function __construct($kode, $nama, $option, $selected, $datepicker = NULL)
    {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->option = $option;
        $this->selected = $selected;
        $this->datepicker = $datepicker;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.inp-filter');
    }
}
