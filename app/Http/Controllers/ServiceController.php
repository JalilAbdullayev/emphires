<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    use UploadImage, SetData;

    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/services'],
            ['code' => 'az', 'url' => '/az/admin/xidmetler'],
            ['code' => 'ru', 'url' => '/ru/admin/uslugi']
        ];
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services', 'langs'));
    }

    public function create(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/services/create'],
            ['code' => 'az', 'url' => '/az/admin/xidmetler/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/uslugi/sozdat']
        ];
        $categories = Category::orderBy('order')->get();
        return view('admin.services.create', compact('langs', 'categories'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $service = new Service;
        $service->order = Service::count() > 0 ? Service::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $service);
    }

    public function edit(int $id): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/services/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/xidmetler/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/uslugi/izmenit/' . $id]
        ];
        $service = Service::findOrFail($id);
        $categories = Category::orderBy('order')->get();
        return view('admin.services.edit', compact('service', 'categories', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $service = Service::findOrFail($id);
        return $this->data($request, $service);
    }

    public function delete(int $id): JsonResponse
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->changeStatus($request, Service::class);
    }

    public function sort(Request $request): JsonResponse
    {
        return $this->changeOrder($request, Service::class);
    }

    private function data($request, $service): RedirectResponse
    {
        $service->category_id = $request->category_id;
        $this->setTranslated($service, 'title');
        $this->setTranslated($service, 'description');
        $this->setTranslated($service, 'text');
        $this->setTranslated($service, 'keywords');
        $this->setSlug($service);
        $service->icon = $request->icon;
        $this->singleImg($request, 'image', 'services', $service);
        $this->singleImg($request, 'background', 'services', $service);
        $service->status = $request->status ? 1 : 0;
        $service->bg_status = $request->bg_status ? 1 : 0;
        $service->save();
        return redirect()->route('admin.services.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
