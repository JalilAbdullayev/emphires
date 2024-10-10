<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainHeader extends Component
{
    public $about;
    public $title;
    public $bg;
    /**
     * Create a new component instance.
     */
    public function __construct($about, $title, $bg)
    {
        $this->about = $about;
        $this->title = $title;
        $this->bg = $bg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main-header');
    }
}
