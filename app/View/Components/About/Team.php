<?php

namespace App\View\Components\About;

use Closure;
use App\Models\Team as Members;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Team extends Component
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
        $team = Members::whereStatus(1)->orderBy('order')->get();
        return view('components.about.team', compact('team'));
    }
}
