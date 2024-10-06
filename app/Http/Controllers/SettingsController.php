<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    use UploadImage, SetData;

    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/settings'],
            ['code' => 'az', 'url' => '/az/admin/parametrler'],
            ['code' => 'ru', 'url' => '/ru/admin/parametry']
        ];
        $languages = ['en', 'az', 'ru'];
        return view('admin.settings', compact('langs', 'languages'));
    }

    public function update(Request $request): RedirectResponse
    {
        $settings = Settings::firstOrFail();
        $this->setTranslated($settings, 'title');
        $this->setTranslated($settings, 'description');
        $this->setTranslated($settings, 'keywords');
        $this->setTranslated($settings, 'author');
        $this->singleImg($request, 'logo', null, $settings);
        $this->singleImg($request, 'favicon', null, $settings);
        $settings->save();
        return redirect()->back()->withSuccess(__('Operation successful.'));
    }
}
