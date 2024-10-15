<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SiteController extends Controller {
    public function index(): View {
        $langs = [
            ['code' => 'en', 'url' => '/'],
            ['code' => 'az', 'url' => '/az'],
            ['code' => 'ru', 'url' => '/ru']
        ];
        return view('index', compact('langs'));
    }

    public function about(): View|RedirectResponse {
        $langs = [
            ['code' => 'en', 'url' => '/about'],
            ['code' => 'az', 'url' => '/az/haqqimizda'],
            ['code' => 'ru', 'url' => '/ru/o-nas']
        ];
        if(About::first()->status) {
            return view('about', compact('langs'));
        } else {
            return redirect()->back();
        }
    }

    public function contact(): View|RedirectResponse {
        $langs = [
            ['code' => 'en', 'url' => '/contact'],
            ['code' => 'az', 'url' => '/az/elaqe'],
            ['code' => 'ru', 'url' => '/ru/svyaz']
        ];
        if(Contact::first()->status) {
            return view('contact', compact('langs'));
        } else {
            return redirect()->back();
        }
    }

    public function services(): View {
        $langs = [
            ['code' => 'en', 'url' => '/services'],
            ['code' => 'az', 'url' => '/az/xidmetler'],
            ['code' => 'ru', 'url' => '/ru/uslugi']
        ];
        $services = Service::whereStatus(1)->orderBy('order')->paginate(9);
        return view('services', compact('langs', 'services'));
    }

    public function service($slug): View {
        $langs = [
            ['code' => 'en', 'url' => '/service/' . $slug],
            ['code' => 'az', 'url' => '/az/xidmet/' . $slug],
            ['code' => 'ru', 'url' => '/ru/usluga/' . $slug]
        ];
        $service = Service::where('slug->' . session('locale'), $slug)->first();
        $categories = Category::whereHas('services')->get();
        $others = Service::where('id', '!=', $service->id)->get();
        return view('service', compact('service', 'langs', 'categories', 'others'));
    }

    public function services_category($slug): View {
        $category = Category::where('slug->' . session('locale'), $slug)->first();
        $services = $category->services()->whereStatus(1)->orderBy('order')->paginate(9);
        $langs = [
            ['code' => 'en', 'url' => '/services/' . $category->slug],
            ['code' => 'az', 'url' => '/az/xidmetler/' . $category->slug],
            ['code' => 'ru', 'url' => '/ru/uslugi/' . $category->slug]
        ];
        return view('services', compact('services', 'langs'));
    }

    public function search_service(Request $request): View {
        $langs = [
            ['code' => 'en', 'url' => '/services/search?search=' . $request->search],
            ['code' => 'az', 'url' => '/az/xidmetler/axtarish?search=' . $request->search],
            ['code' => 'ru', 'url' => '/ru/uslugi/poisk?search=' . $request->search]
        ];
        $services = Service::whereStatus(1)->where('title->' . session('locale'), 'like', '%' . $request->search . '%')->orderBy('order')->paginate(9);
        return view('services', compact('services', 'langs'));
    }

    public function blog(): View {
        $langs = [
            ['code' => 'en', 'url' => '/blog'],
            ['code' => 'az', 'url' => '/az/blog'],
            ['code' => 'ru', 'url' => '/ru/stati']
        ];
        $blog = Blog::whereStatus(1)->orderBy('order')->paginate(9);
        return view('blog', compact('blog', 'langs'));
    }

    public function article($slug): View {
        $langs = [
            ['code' => 'en', 'url' => 'article/' . $slug],
            ['code' => 'az', 'url' => 'az/meqale/' . $slug],
            ['code' => 'ru', 'url' => 'ru/statya/' . $slug]
        ];
        $article = Blog::where('slug->' . session('locale'), $slug)->first();
        $categories = Category::whereHas('blog')->get();
        $others = Blog::where('id', '!=', $article->id)->get();
        return view('article', compact('article', 'categories', 'others'));
    }

    public function blog_category($slug): View {
        $langs = [
            ['code' => 'en', 'url' => '/blog/' . $slug],
            ['code' => 'az', 'url' => '/az/bloq/' . $slug],
            ['code' => 'ru', 'url' => '/ru/stati/' . $slug]
        ];
        $category = Category::where('slug->' . session('locale'), $slug)->first();
        $blog = $category->blog()->whereStatus(1)->orderBy('order')->paginate(9);
        return view('blog', compact('blog', 'langs'));
    }

    public function search_blog(Request $request): View {
        $langs = [
            ['code' => 'en', 'url' => '/blog/search?search=' . $request->search],
            ['code' => 'az', 'url' => '/az/bloq/axtarish?search=' . $request->search],
            ['code' => 'ru', 'url' => '/ru/stati/poisk?search=' . $request->search]
        ];
        $blog = Blog::whereStatus(1)->where('title->' . session('locale'), 'like', '%' . $request->search . '%')->orderBy('order')->paginate(9);
        return view('blog', compact('blog', 'langs'));
    }

    public function courses(): View {
        $langs = [
            ['code' => 'en', 'url' => '/courses'],
            ['code' => 'az', 'url' => '/az/kurslar'],
            ['code' => 'ru', 'url' => '/ru/kurslar']
        ];
        $courses = Course::active()->paginate(9);
        return view('courses', compact('langs', 'courses'));
    }

    public function course($slug): View {
        $langs = [
            ['code' => 'en', 'url' => '/course/' . $slug],
            ['code' => 'az', 'url' => '/az/ders/' . $slug],
            ['code' => 'ru', 'url' => '/ru/kurs/' . $slug]
        ];
        $course = Course::where('slug->' . session('locale'), $slug)->first();
        $others = Course::active()->where('id', '!=', $course->id)->get();
        $categories = Category::whereHas('courses')->get();
        return view('course', compact('langs', 'course', 'others', 'categories'));
    }

    public function courses_category($slug): View {
        $langs = [
            ['code' => 'en', 'url' => '/courses/' . $slug],
            ['code' => 'az', 'url' => '/az/kurslar/' . $slug],
            ['code' => 'ru', 'url' => '/ru/kursi/' . $slug]
        ];
        $category = Category::where('slug->' . session('locale'), $slug)->first();
        $courses = $category->courses()->active()->paginate(9);
        return view('courses', compact('courses', 'langs'));
    }

    public function search_courses(Request $request): View {
        $langs = [
            ['code' => 'en', 'url' => '/courses/search?search=' . $request->search],
            ['code' => 'az', 'url' => '/az/kurslar/axtarish?search=' . $request->search],
            ['code' => 'ru', 'url' => '/ru/kursi/poisk?search=' . $request->search]
        ];
        $courses = Course::active()->where('title->' . session('locale'), 'like', '%' . $request->search . '%')->paginate(9);
        return view('courses', compact('courses', 'langs'));
    }

    public function global_search(Request $request): View {
        $langs = [
            ['code' => 'en', 'url' => '/search?search=' . $request->search],
            ['code' => 'az', 'url' => '/az/axtarish?search=' . $request->search],
            ['code' => 'ru', 'url' => '/ru/poisk?search=' . $request->search]
        ];
        $courses = Course::active()->where('title->' . session('locale'), 'like', '%' . $request->search . '%')
            ->select('title', 'slug', 'image', DB::raw("'course' as url"));
        $services = Service::where('title->' . session('locale'), 'like', '%' . $request->search . '%')
            ->select('title', 'slug', 'image', DB::raw("'service' as url"));
        $blog = Blog::where('title->' . session('locale'), 'like', '%' . $request->search . '%')
            ->select('title', 'slug', 'image', DB::raw("'article' as url"));
        $results = $courses->union($blog)->union($services)->paginate(9);
        return view('search', compact('results', 'langs'));
    }
}
