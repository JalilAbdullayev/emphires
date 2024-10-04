<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller {
    use UploadImage;

    public function index(): View {
        $languages = ['en', 'az', 'ru'];
        $langs = [['code' => 'en', 'url' => '/admin/about'],
            ['code' => 'az', 'url' => '/az/admin/haqqimizda'],
            ['code' => 'ru', 'url' => '/ru/admin/o-nas']];
        $about = About::firstOrFail();
        return view('admin.about', compact('about', 'langs', 'languages'));
    }

    public function update(Request $request): RedirectResponse {
        $about = About::firstOrFail();
        $about->title = [
            'en' => $request->title_en,
            'az' => $request->title_az,
            'ru' => $request->title_ru
        ];
        $about->services_title = [
            'en' => $request->services_title_en,
            'az' => $request->services_title_az,
            'ru' => $request->services_title_ru
        ];
        $about->services_subtitle = [
            'en' => $request->services_subtitle_en,
            'az' => $request->services_subtitle_az,
            'ru' => $request->services_subtitle_ru
        ];
        $about->services_description = [
            'en' => $request->services_description_en,
            'az' => $request->services_description_az,
            'ru' => $request->services_description_ru
        ];
        $about->specialties_title = [
            'en' => $request->specialties_title_en,
            'az' => $request->specialties_title_az,
            'ru' => $request->specialties_title_ru
        ];
        $about->specialties_subtitle = [
            'en' => $request->specialties_subtitle_en,
            'az' => $request->specialties_subtitle_az,
            'ru' => $request->specialties_subtitle_ru
        ];
        $about->specialties_button = [
            'en' => $request->specialties_button_en,
            'az' => $request->specialties_button_az,
            'ru' => $request->specialties_button_ru
        ];
        $about->specialties_card = [
            'en' => $request->specialties_card_en,
            'az' => $request->specialties_card_az,
            'ru' => $request->specialties_card_ru
        ];
        $about->team_title = [
            'en' => $request->team_title_en,
            'az' => $request->team_title_az,
            'ru' => $request->team_title_ru
        ];
        $about->team_subtitle = [
            'en' => $request->team_subtitle_en,
            'az' => $request->team_subtitle_az,
            'ru' => $request->team_subtitle_ru
        ];
        $about->banner_text = [
            'en' => $request->banner_text_en,
            'az' => $request->banner_text_az,
            'ru' => $request->banner_text_ru
        ];
        $about->banner_button = [
            'en' => $request->banner_button_en,
            'az' => $request->banner_button_az,
            'ru' => $request->banner_button_ru
        ];
        $about->testimonials_title = [
            'en' => $request->testimonials_title_en,
            'az' => $request->testimonials_title_az,
            'ru' => $request->testimonials_title_ru
        ];
        $about->testimonials_subtitle = [
            'en' => $request->testimonials_subtitle_en,
            'az' => $request->testimonials_subtitle_az,
            'ru' => $request->testimonials_subtitle_ru
        ];
        $about->testimonials_img_title = [
            'en' => $request->testimonials_img_title_en,
            'az' => $request->testimonials_img_title_az,
            'ru' => $request->testimonials_img_title_ru
        ];
        $about->testimonials_number = $request->testimonials_number;
        $about->status = $request->status ? 1 : 0;
        $about->services_status = $request->services_status ? 1 : 0;
        $about->specialties_status = $request->specialties_status ? 1 : 0;
        $about->team_status = $request->team_status ? 1 : 0;
        $about->testimonials_status = $request->testimonials_status ? 1 : 0;
        $about->banner_status = $request->banner_status ? 1 : 0;
        $about->contact_banner_status = $request->contact_banner_status ? 1 : 0;
        $about->bg_status = $request->bg_status ? 1 : 0;
        $this->singleImg($request, 'background', 'about', $about);
        $this->singleImg($request, 'specialties_bg', 'about', $about);
        $this->singleImg($request, 'banner_bg', 'about', $about);
        $this->singleImg($request, 'testimonials_img', 'about', $about);
        $about->save();
        return redirect()->back();
    }
}
