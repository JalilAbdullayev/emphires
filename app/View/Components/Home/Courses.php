<?php

namespace App\View\Components\Home;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Courses extends Component
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
        $courses = Course::whereStatus(1)->orderBy('order')->take(3)->get();
        return view('components.home.courses', compact('courses'));
    }
}
