<?php

namespace App\View\Components\Home;

use App\Models\Service;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Services extends Component
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
        $services = Service::whereStatus(1)->orderBy('order')->take(3)->get();
        return view('components.home.services', compact('services'));
    }
}
