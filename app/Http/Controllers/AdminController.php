<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller {
    public function index(): View {
        $langs = [['code' => 'en', 'url' => '/admin'],
            ['code' => 'az', 'url' => '/az/admin'],
            ['code' => 'ru', 'url' => '/ru/admin']];
        return view('admin.index', compact('langs'));
    }
}
