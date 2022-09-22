<?php

namespace App\View\Components;

use Illuminate\View\Component;

class listData extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $judul;
    public $tambah;
    public $thead;
    public $thwidth;
    public $thclass;
    public $optionpage;
    public $tpwidth;

    public function __construct($judul,$tambah,$thead,$thwidth,$thclass,$optionpage=NULL,$tpwidth=NULL)
    {
        $this->judul = $judul;
        $this->tambah = $tambah;
        $this->thead = $thead;
        $this->thwidth = $thwidth;
        $this->thclass = $thclass;
        $this->optionpage = $optionpage;
        $this->tpwidth = $tpwidth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.list-data');
    }
}
