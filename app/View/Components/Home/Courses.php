<?php

namespace App\View\Components\Home;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Courses extends Component
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
        $courses = Course::whereStatus(1)->orderBy('order')->take(3)->get();
        return view('components.home.courses', compact('courses'));
    }
}
