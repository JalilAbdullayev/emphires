<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Skills extends Component
{
    public $home;
    /**
     * Create a new component instance.
     */
    public function __construct($home)
    {
        $this->home = $home;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.skills');
    }
}
