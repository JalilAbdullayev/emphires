<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/profile'],
            ['code' => 'az', 'url' => '/admin/profil'],
            ['code' => 'ru', 'url' => '/admin/akkaunt']
        ];
        return view('admin.profile', compact('langs'));
    }

    public function update(Request $request): RedirectResponse
    {
        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->back()->withSuccess(__('Operation successful.'));
    }

    public function delete(): RedirectResponse
    {
        Auth::user()->delete();
        return redirect()->route('login');
    }
}
