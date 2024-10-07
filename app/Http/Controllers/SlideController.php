<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Slide;
use App\Traits\SetData;
use Illuminate\View\View;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class SlideController extends Controller
{
    use UploadImage, SetData;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/slider'],
            ['code' => 'az', 'url' => '/az/admin/slaydlar'],
            ['code' => 'ru', 'url' => '/ru/admin/slayder']
        ];
        $slides = Slide::orderBy('order')->get();
        return view('admin.slider.index', compact('langs', 'slides'));
    }

    public function create(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/slider/create'],
            ['code' => 'az', 'url' => '/az/admin/slaydlar/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/slayder/sozdat']
        ];
        return view('admin.slider.create', compact('langs'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $slide = new Slide;
        $slide->order = Slide::count() > 0 ? Slide::latest('order')->first()->order + 1 : 1;
        return $this->data($slide, $request);
    }

    public function edit(int $id): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/slider/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/slaydlar/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/slayder/izmenit/' . $id]
        ];
        $slide = Slide::findOrFail($id);
        return view('admin.slider.edit', compact('langs', 'slide'), [
            'languages' => $this->languages
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $slide = Slide::findOrFail($id);
        return $this->data($slide, $request);
    }

    public function delete(int $id): JsonResponse
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse
    {
        $slide = Slide::findOrFail($request->id);
        $status = $slide->status;
        $slide->status = $status ? 0 : 1;
        $slide->save();
        return response()->json(['success' => true]);
    }

    public function sort(): JsonResponse
    {
        $order_data = request('data');
        try {
            DB::beginTransaction();
            foreach ($order_data as $data) {
                Slide::where('id', $data['id'])->update(['order' => $data['order']]);
            }
            DB::commit();
            return response()->json('sort_success');
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    private function data($slide, $request): RedirectResponse
    {
        $this->setTranslated($slide, 'title');
        $this->setTranslated($slide, 'subtitle');
        $this->setTranslated($slide, 'button_text');
        $this->singleImg($request, 'image', 'slider', $slide);
        $slide->status = $request->status ? 1 : 0;
        $slide->save();
        return redirect()->route('admin.slider.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
