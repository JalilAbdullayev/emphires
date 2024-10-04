<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Traits\UploadImage;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller {
    use UploadImage;

    public function index(): View {
        $langs = [['code' => 'en', 'url' => '/admin/services'],
            ['code' => 'az', 'url' => '/az/admin/xidmetler'],
            ['code' => 'ru', 'url' => '/ru/admin/uslugi']];
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services', 'langs'));
    }

    public function create(): View {
        $langs = [['code' => 'en', 'url' => '/admin/services/create'],
            ['code' => 'az', 'url' => '/az/admin/xidmetler/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/uslugi/sozdat']];
        $languages = ['en', 'az', 'ru'];
        $categories = Category::whereStatus(1)->get();
        return view('admin.services.create', compact('langs', 'languages', 'categories'));
    }

    public function store(Request $request): RedirectResponse {
        $service = new Service;
        $order = Service::latest('order')->first()->order;
        if($order > 1) {
            $last = $order + 1;
        }
        $service->order = $last ?? 1;
        return $this->data($request, $service);
    }

    public function edit(int $id): View {
        $langs = [['code' => 'en', 'url' => '/admin/services/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/xidmetler/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/uslugi/izmenit/' . $id]];
        $service = Service::findOrFail($id);
        $categories = Category::whereStatus(1)->orderBy('order')->get();
        $languages = ['en', 'az', 'ru'];
        return view('admin.services.edit', compact('service', 'categories', 'languages', 'langs'));
    }

    public function update(int $id, Request $request): RedirectResponse {
        $service = Service::findOrFail($id);
        return $this->data($request, $service);
    }

    public function delete(int $id): JsonResponse {
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse {
        $service = Service::findOrFail($request->id);
        $status = $service->status;
        $service->status = $status ? 0 : 1;
        $service->save();
        return response()->json(['success' => true]);
    }

    public function sort(Request $request): JsonResponse {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();
            foreach($order_data as $data) {
                Service::whereId($data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();
            return response()->json('sort_success');
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    private function data($request, $service): RedirectResponse {
        $service->category_id = $request->category_id;
        $service->title = [
            'en' => $request->title_en,
            'az' => $request->title_az,
            'ru' => $request->title_ru
        ];
        $service->slug = [
            'en' => Str::slug($request->title_en),
            'az' => Str::slug($request->title_az),
            'ru' => Str::slug($request->title_ru)
        ];
        $service->description = [
            'en' => $request->description_en,
            'az' => $request->description_az,
            'ru' => $request->description_ru
        ];
        $service->text = [
            'en' => $request->text_en,
            'az' => $request->text_az,
            'ru' => $request->text_ru
        ];
        $service->keywords = [
            'en' => $request->keywords_en,
            'az' => $request->keywords_az,
            'ru' => $request->keywords_ru
        ];
        $this->singleImg($request, 'image', 'services', $service);
        $this->singleImg($request, 'background', 'services', $service);
        $service->status = $request->status ? 1 : 0;
        $service->bg_status = $request->bg_status ? 1 : 0;
        $service->save();
        return redirect()->route('admin.services.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
