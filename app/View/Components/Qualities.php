<?php

namespace App\View\Components;

use App\Models\HomeSection;
use App\Models\Quality;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Qualities extends Component
{
    public $title;
    public $subtitle;

    public $text;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $subtitle, $text)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $qualities = Quality::whereStatus(1)->orderBy('order')->get();
        $home = HomeSection::first();
        return view('components.qualities', compact('qualities', 'home'));
    }
}
