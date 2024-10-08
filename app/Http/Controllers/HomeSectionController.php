<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeSectionController extends Controller
{
    use SetData, UploadImage;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/home-sections'],
            ['code' => 'az', 'url' => '/admin/ana-sehife-bolmeleri'],
            ['code' => 'ru', 'url' => '/admin/razdely-domashney-stranitsy'],
        ];
        $home = HomeSection::firstOrFail();

        return view('admin.home-sections', compact('home', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $home = HomeSection::firstOrFail();
        $home->slider = $request->slider ? 1 : 0;
        $this->setTranslated($home, 'quote');
        $this->setTranslated($home, 'quote_author');
        $home->second_section = $request->second_section ? 1 : 0;
        $this->setTranslated($home, 'second_section_text');
        $this->setTranslated($home, 'who_us_title');
        $this->setTranslated($home, 'who_us_subtitle');
        $this->setTranslated($home, 'who_us_text');
        $home->who_us_percent = $request->who_us_percent;
        $this->setTranslated($home, 'who_us_percent_title');
        $this->setTranslated($home, 'who_us_foot');
        $this->setTranslated($home, 'who_us_link_title');
        $home->who_us = $request->who_us ? 1 : 0;
        $this->singleImg($request, 'who_us_img', 'home', $home);
        $this->setTranslated($home, 'services_title');
        $this->setTranslated($home, 'services_subtitle');
        $this->setTranslated($home, 'services_text');
        $this->setTranslated($home, 'services_link_text');
        $this->setTranslated($home, 'services_foot_text');
        $this->setTranslated($home, 'services_foot_link_text');
        $home->services = $request->services ? 1 : 0;
        $this->setTranslated($home, 'video_text');
        $home->video_link = $request->video_link;
        $this->singleImg($request, 'video_bg', 'home', $home);
        $home->video = $request->video ? 1 : 0;
        $this->singleImg($request, 'skills_img', 'home', $home);
        $this->setTranslated($home, 'skills_text');
        $home->skills = $request->skills ? 1 : 0;
        $home->contact_form = $request->contact_form ? 1 : 0;
        $this->setTranslated($home, 'qualities_title');
        $this->setTranslated($home, 'qualities_subtitle');
        $this->setTranslated($home, 'qualities_text');
        $home->service_slider = $request->service_slider ? 1 : 0;
        $this->setTranslated($home, 'testimonials_title');
        $this->setTranslated($home, 'testimonials_subtitle');
        $this->setTranslated($home, 'testimonials_text');
        $this->setTranslated($home, 'testimonials_link_text');
        $home->testimonials = $request->testimonials ? 1 : 0;
        $home->clients = $request->clients ? 1 : 0;
        $this->setTranslated($home, 'courses_title');
        $this->setTranslated($home, 'courses_subtitle');
        $home->courses = $request->courses ? 1 : 0;
        $home->contact_banner = $request->contact_banner ? 1 : 0;
        $home->save();
        return redirect()->back();
    }
}
