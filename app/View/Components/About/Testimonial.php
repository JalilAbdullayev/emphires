<?php

namespace App\View\Components\About;

use Closure;
use App\Models\Testimonial as Testimonials;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Testimonial extends Component
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
        $testimonials = Testimonials::whereStatus(1)->orderBy('order')->get();
        return view('components.about.testimonial', compact('testimonials'));
    }
}
