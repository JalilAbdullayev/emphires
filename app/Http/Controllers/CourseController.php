<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Traits\SetData;
use App\Models\Category;
use Illuminate\View\View;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    use UploadImage, SetData;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/courses'],
            ['code' => 'az', 'url' => '/az/admin/kurslar'],
            ['code' => 'ru', 'url' => '/ru/admin/kursi']
        ];
        $courses = Course::orderBy('order')->get();
        return view('admin.courses.index', compact('courses', 'langs'));
    }

    public function create(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/courses/create'],
            ['code' => 'az', 'url' => '/az/admin/kurslar/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/kursi/sozdat']
        ];
        $categories = Category::orderBy('order')->get();
        return view('admin.courses.create', compact('langs', 'categories'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $course = new Course;
        $course->author_id = Auth::user()->id;
        $course->order = Course::count() > 0 ? Course::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $course);
    }

    public function edit(int $id): View
    {
        $categories = Category::orderBy('order')->get();
        $course = Course::findOrFail($id);
        $langs = [
            ['code' => 'en', 'url' => '/admin/courses/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/kurslar/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/kursi/izmenit/' . $id]
        ];
        return view('admin.courses.edit', compact('course', 'langs', 'categories'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $course = Course::findOrFail($id);
        return $this->data($request, $course);
    }

    public function delete(int $id): JsonResponse
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return response()->json(['success' => true]);
    }

    public function sort(Request $request): JsonResponse
    {
        return $this->changeOrder($request, Course::class);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->changeStatus($request, Course::class);
    }

    private function data($request, $course): RedirectResponse
    {
        $this->setTranslated($course, 'title');
        $this->setSlug($course);
        $this->setTranslated($course, 'description');
        $this->setTranslated($course, 'text');
        $this->setTranslated($course, 'keywords');
        $this->singleImg($request, 'image', 'courses', $course);
        $this->singleImg($request, 'background', 'courses', $course);
        $course->video_link = $request->video_link;
        $course->status = $request->status ? 1 : 0;
        $course->bg_status = $request->bg_status ? 1 : 0;
        $course->category_id = $request->category_id;
        $course->save();
        return redirect()->route('admin.courses.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
