<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use Illuminate\View\View;
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
        return view('index', compact('langs'));
    }

    public function about(): View|RedirectResponse
    {
        $langs = [
            ['code' => 'en', 'url' => '/about'],
            ['code' => 'az', 'url' => '/az/haqqimizda'],
            ['code' => 'ru', 'url' => '/ru/o-nas']
        ];
        if (About::first()->status) {
            return view('about', compact('langs'));
        } else {
            return redirect()->back();
        }
    }

    public function contact(): View|RedirectResponse
    {
        $langs = [
            ['code' => 'en', 'url' => '/contact'],
            ['code' => 'az', 'url' => '/az/elaqe'],
            ['code' => 'ru', 'url' => '/ru/svyaz']
        ];
        if (Contact::first()->status) {
            return view('contact', compact('langs'));
        } else {
            return redirect()->back();
        }
    }
}
