<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Message;
use App\Models\Service;
use Illuminate\View\View;

class AdminController extends Controller {
    public function index(): View {
        $langs = [['code' => 'en', 'url' => '/en/admin'],
            ['code' => 'az', 'url' => '/admin'],
            ['code' => 'ru', 'url' => '/ru/admin']];
        $blog = Blog::count();
        $services = Service::count();
        $courses = Course::count();
        $messages = Message::count();
        return view('admin.index', compact('langs', 'blog', 'services', 'courses', 'messages'));
    }
}
