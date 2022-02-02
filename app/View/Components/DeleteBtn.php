<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteBtn extends Component
{
    public $route;
    /**
     * @var false
     */
    public bool $name;
    public string $class;
    public bool $showIcon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route , $name = false, $showIcon = true ,$class ='' )
    {
        $this->route = $route;
        $this->name = $name;
        $this->class = $class;
        $this->showIcon = $showIcon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.delete-btn');
    }
}
