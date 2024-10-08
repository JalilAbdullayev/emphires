<?php

namespace App\Http\Controllers;

use App\Traits\SetData;
use Illuminate\View\View;
use App\Models\Testimonial;
use App\Traits\UploadImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TestimonialController extends Controller
{
    use SetData, UploadImage;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/testimonials'],
            ['code' => 'az', 'url' => '/az/admin/sherhler'],
            ['code' => 'ru', 'url' => '/ru/admin/kommentariy']
        ];
        $testimonials = Testimonial::orderBy('order')->get();
        return view('admin.testimonials.index', compact('langs', 'testimonials'));
    }

    public function create(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/testimonials/create'],
            ['code' => 'az', 'url' => '/az/admin/sherhler/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/kommentariy/sozdat']
        ];
        return view('admin.testimonials.create', compact('langs'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $testimonial = new Testimonial;
        $testimonial->order = Testimonial::count() > 0 ? Testimonial::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $testimonial);
    }

    public function edit(int $id): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/testimonials/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/sherhler/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/kommentariy/izmenit/' . $id]
        ];
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        return $this->data($request, $testimonial);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->changeStatus($request, Testimonial::class);
    }

    public function sort(Request $request): JsonResponse
    {
        return $this->changeOrder($request, Testimonial::class);
    }

    private function data($request, $testimonial): RedirectResponse
    {
        $this->setTranslated($testimonial, 'name');
        $this->setTranslated($testimonial, 'position');
        $this->setTranslated($testimonial, 'text');
        $this->singleImg($request, 'image', 'testimonials', $testimonial);
        $testimonial->status = $request->status ? 1 : 0;
        $testimonial->save();
        return redirect()->route('admin.testimonials.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
