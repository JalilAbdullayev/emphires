<?php

namespace App\View\Components\Home;

use Closure;
use App\Models\Whyus;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class WhoUs extends Component
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
        $advantages = Whyus::whereStatus(1)->orderBy('order')->get();
        return view('components.home.who-us', compact('advantages'));
    }
}
