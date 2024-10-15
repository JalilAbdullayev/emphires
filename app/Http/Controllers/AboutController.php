<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller {
    use UploadImage, SetData;

    public function index(): View {
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/about'],
            ['code' => 'az', 'url' => '/admin/haqqimizda'],
            ['code' => 'ru', 'url' => '/ru/admin/o-nas']
        ];
        $about = About::firstOrFail();
        return view('admin.about', compact('about', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(Request $request): RedirectResponse {
        $about = About::firstOrFail();
        $this->setTranslated($about, 'title');
        $this->setTranslated($about, 'specialties_title');
        $this->setTranslated($about, 'specialties_subtitle');
        $this->setTranslated($about, 'specialties_button');
        $this->setTranslated($about, 'specialties_card');
        $this->setTranslated($about, 'team_title');
        $this->setTranslated($about, 'team_subtitle');
        $this->setTranslated($about, 'banner_text');
        $this->setTranslated($about, 'banner_button');
        $this->setTranslated($about, 'testimonials_title');
        $this->setTranslated($about, 'testimonials_subtitle');
        $this->setTranslated($about, 'testimonials_img_title');
        $about->year = $request->year;
        $about->testimonials_number = $request->testimonials_number;
        $about->testimonials_img_card_status = $request->testimonials_img_card_status ? 1 : 0;
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
        return redirect()->back()->withSuccess(__('Operation successful.'));
    }
}
