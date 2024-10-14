<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChildHeader extends Component
{
    public $about;
    public $title;
    public $bg;
    public $route;
    public $subtitle;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $bg, $route, $subtitle)
    {
        $this->title = $title;
        $this->bg = $bg;
        $this->route = route($route);
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.child-header');
    }
}
