<?php

namespace App\View\Components\Home;

use App\Models\Slide;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $slider = Slide::whereStatus(1)->orderBy('order')->get();
        return view('components.home.hero', compact('slider'));
    }
}
