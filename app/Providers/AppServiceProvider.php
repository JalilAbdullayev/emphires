<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\HomeSection;
use App\Models\Service;
use App\Models\Settings;
use App\Models\Social;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $settings = Settings::first();
        $contact = Contact::first();
        $socials = Social::whereStatus(1)->orderBy('order')->get();
        $allServices = Service::whereStatus(1)->orderBy('order')->get();
        $allBlog = Blog::whereStatus(1)->orderBy('order')->take(3)->get();
        $about = About::first();
        $home = HomeSection::first();
        view()->share('settings', $settings);
        view()->share('contact', $contact);
        view()->share('socials', $socials);
        view()->share('allServices', $allServices);
        view()->share('allBlog', $allBlog);
        view()->share('about', $about);
        view()->share('home', $home);
    }
}
