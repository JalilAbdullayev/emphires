<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SettingsController extends Controller {
    use UploadImage;

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
        $this->singleImg($request, 'logo', null, $settings);
        $this->singleImg($request, 'favicon', null, $settings);
        $settings->save();
        return redirect()->back();
    }
}
