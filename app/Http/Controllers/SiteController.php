<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/'],
            ['code' => 'az', 'url' => '/az'],
            ['code' => 'ru', 'url' => '/ru']
        ];
        return view('index', compact('langs'));
    }

    public function about(): View|RedirectResponse
    {
        $langs = [
            ['code' => 'en', 'url' => '/about'],
            ['code' => 'az', 'url' => '/az/haqqimizda'],
            ['code' => 'ru', 'url' => '/ru/o-nas']
        ];
        if (About::first()->status) {
            return view('about', compact('langs'));
        } else {
            return redirect()->back();
        }
    }

    public function contact(): View|RedirectResponse
    {
        $langs = [
            ['code' => 'en', 'url' => '/contact'],
            ['code' => 'az', 'url' => '/az/elaqe'],
            ['code' => 'ru', 'url' => '/ru/svyaz']
        ];
        if (Contact::first()->status) {
            return view('contact', compact('langs'));
        } else {
            return redirect()->back();
        }
    }

    public function services(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/services'],
            ['code' => 'az', 'url' => '/az/xidmetler'],
            ['code' => 'ru', 'url' => '/ru/uslugi']
        ];
        $services = Service::whereStatus(1)->orderBy('order')->get();
        return view('services', compact('langs', 'services'));
    }

    public function service($slug): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/service/' . $slug],
            ['code' => 'az', 'url' => '/az/xidmet/' . $slug],
            ['code' => 'ru', 'url' => '/ru/usluga/' . $slug]
        ];
        $article = Service::where('slug->' . session('locale'), $slug)->first();
        $categories = Category::whereHas('services')->get();
        $others = Service::where('id', '!=', $article->id)->get();
        return view('service', compact('article', 'langs', 'categories', 'others'), [
            'title' => $article->title,
            'author' => null,
            'description' => $article->description,
            'keywords' => $article->keywords,
            'image' => asset('storage/services/' . $article->image)
        ]);
    }

    public function services_category($slug): View
    {
        $category = Category::where('slug->' . session('locale'), $slug)->first();
        $services = $category->services()->whereStatus(1)->orderBy('order')->get();
        $langs = [
            ['code' => 'en', 'url' => '/services/' . $category->slug],
            ['code' => 'az', 'url' => '/az/xidmetler/' . $category->slug],
            ['code' => 'ru', 'url' => '/ru/uslugi/' . $category->slug]
        ];
        return view('services', compact('services', 'langs'));
    }

    public function search_service(Request $request): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/services/search?search=' . $request->search],
            ['code' => 'az', 'url' => '/az/xidmetler/axtarish?search=' . $request->search],
            ['code' => 'ru', 'url' => '/ru/uslugi/poisk?search=' . $request->search]
        ];
        $services = Service::whereStatus(1)->where('title->' . session('locale'), 'like', '%' . $request->search . '%')->orderBy('order')->get();
        return view('services', compact('services', 'langs'));
    }
}
