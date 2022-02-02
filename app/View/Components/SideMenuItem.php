<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideMenuItem extends Component
{
    public string $url;
    public string $name;
    public ?string $icon;

    /**
     * @param string $url
     * @param string $name
     * @param string|null $icon
     */
    public function __construct(string $url , string $name, string $icon = null )
    {

        $this->url = $url;
        $this->name = $name;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-menu-item');
    }
}
