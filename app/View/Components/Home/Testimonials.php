<?php

namespace App\View\Components\Home;

use App\Models\Testimonial;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Testimonials extends Component
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
        $testimonials = Testimonial::whereStatus(1)->orderBy('order')->get();
        return view('components.home.testimonials', compact('testimonials'));
    }
}
