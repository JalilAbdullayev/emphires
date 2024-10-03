<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SettingsController extends Controller {
    public function index(): View {
        $langs = [['code' => 'en', 'url' => '/admin/settings'],
            ['code' => 'az', 'url' => '/az/admin/parametrler'],
            ['code' => 'ru', 'url' => '/ru/admin/parametry']];
        return view('admin.settings', compact('langs'));
    }

    public function update(Request $request): RedirectResponse {
        $settings = Settings::firstOrFail();
        $settings->title = [
            'en' => $request->title_en,
            'az' => $request->title_az,
            'ru' => $request->title_ru
        ];
        $settings->author = [
            'en' => $request->author_en,
            'az' => $request->author_az,
            'ru' => $request->author_ru
        ];
        $settings->description = [
            'en' => $request->description_en,
            'az' => $request->description_az,
            'ru' => $request->description_ru
        ];
        $settings->keywords = [
            'en' => $request->keywords_en,
            'az' => $request->keywords_az,
            'ru' => $request->keywords_ru
        ];
        if($request->file('logo')) {
            if($settings->logo && Storage::exists('public/' . $settings->logo)) {
                Storage::delete('public/' . $settings->logo);
            }
            $name = explode('.', $request->logo->getClientOriginalName());
            $date = date('Y_m_d_H_i_s');
            $img = Str::slug($name[0]) . '_' . $date . '.' . $request->logo->extension();
            $request->logo->move('storage/', $img);
            $settings->logo = $img;
        }
        if($request->file('favicon')) {
            if($settings->favicon && Storage::exists('public/' . $settings->favicon)) {
                Storage::delete('public/' . $settings->favicon);
            }
            $name = explode('.', $request->favicon->getClientOriginalName());
            $date = date('Y_m_d_H_i_s');
            $img = Str::slug($name[0]) . '_' . $date . '.' . $request->favicon->extension();
            $request->favicon->move('storage/', $img);
            $settings->favicon = $img;
        }
        $settings->save();
        return redirect()->back();
    }
}
