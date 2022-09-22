<?php

namespace App\View\Components;

use Illuminate\View\Component;

class saiText extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $label;
    public $name;
    public $icon;
    public $class;
    public $attr;
    public $value;

    public function __construct($label,$id,$name,$class,$icon=NULL,$attr, $value=NULL)
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->class = $class;
        $this->icon = $icon;
        $this->attr = $attr;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sai-text');
    }
}
