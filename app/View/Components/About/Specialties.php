<?php

namespace App\View\Components\About;

use App\Models\Stat;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Specialties extends Component {
    /**
     * Create a new component instance.
     */
    public function __construct() {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        $stats = Stat::active()->get();
        return view('components.about.specialties', compact('stats'));
    }
}
