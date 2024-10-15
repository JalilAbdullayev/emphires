<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller {
    public function index(): View {
        $langs = [['code' => 'en', 'url' => '/en/admin'],
            ['code' => 'az', 'url' => '/admin'],
            ['code' => 'ru', 'url' => '/ru/admin']];
        return view('admin.index', compact('langs'));
    }
}
