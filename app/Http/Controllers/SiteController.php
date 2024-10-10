<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\HomeSection;
use App\Models\Whyus;
use Illuminate\Http\Request;

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
}
