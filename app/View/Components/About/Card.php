<?php

namespace App\View\Components\About;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $about;
    /**
     * Create a new component instance.
     */
    public function __construct($about)
    {
        $this->about = $about;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about.card');
    }
}
