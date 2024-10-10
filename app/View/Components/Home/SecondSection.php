<?php

namespace App\View\Components\Home;

use App\Models\HomeSection;
use Closure;
use App\Models\Quality;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SecondSection extends Component
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
        $qualities = Quality::whereStatus(1)->orderBy('order')->take(3)->get();
        return view('components.home.second-section', compact('qualities'));
    }
}
