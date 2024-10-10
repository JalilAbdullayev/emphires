<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Contact;
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
        $blog = Blog::whereStatus(1)->orderBy('order')->get();
        view()->share('settings', $settings);
        view()->share('contact', $contact);
        view()->share('socials', $socials);
        view()->share('allServices', $allServices);
        view()->share('blog', $blog);
    }
}
