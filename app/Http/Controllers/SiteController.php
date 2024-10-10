<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\View\View;
use App\Models\HomeSection;
use Illuminate\Http\RedirectResponse;

class SiteController extends Controller
{
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/'],
            ['code' => 'az', 'url' => '/az'],
            ['code' => 'ru', 'url' => '/ru']
        ];
        $home = HomeSection::first();
        return view('index', compact('langs', 'home', ));
    }

    public function about(): View|RedirectResponse
    {
        $langs = [
            ['code' => 'en', 'url' => '/about'],
            ['code' => 'az', 'url' => '/az/haqqimizda'],
            ['code' => 'ru', 'url' => '/ru/o-nas']
        ];
        $about = About::first();
        if ($about->status) {
            return view('about', compact('about', 'langs'));
        } else {
            return redirect()->back();
        }
    }
}
