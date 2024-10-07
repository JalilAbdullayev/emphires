<?php

namespace App\Http\Controllers;

use App\Traits\SetData;
use Exception;
use App\Models\Quality;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class QualityController extends Controller
{
    use SetData;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/qualities'],
            ['code' => 'az', 'url' => '/az/admin/keyfiyyetler'],
            ['code' => 'ru', 'url' => '/ru/admin/kachestva']
        ];
        $qualities = Quality::orderBy('order')->get();
        return view('admin.qualities.index', compact('qualities', 'langs'));
    }

    public function create(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/qualities/create'],
            ['code' => 'az', 'url' => '/az/admin/keyfiyyetler/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/kachestva/sozdat']
        ];
        return view('admin.qualities.create', compact('langs'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $quality = new Quality;
        $quality->order = Quality::count() > 0 ? Quality::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $quality);
    }

    public function edit(int $id, Request $request): View
    {
        $quality = Quality::findOrFail($id);
        $langs = [
            ['code' => 'en', 'url' => '/admin/qualities/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/keyfiyyetler/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/kachestva/izmenit/' . $id]
        ];
        $languages = ['en', 'az', 'ru'];
        return view('admin.qualities.edit', compact('quality', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $quality = Quality::findOrFail($id);
        return $this->data($request, $quality);
    }

    public function delete(int $id): JsonResponse
    {
        $quality = Quality::findOrFail($id);
        $quality->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse
    {
        $quality = Quality::findOrFail($request->id);
        $status = $quality->status;
        $quality->status = $status ? 0 : 1;
        $quality->save();
        return response()->json(['success' => true]);
    }

    public function sort(Request $request): JsonResponse
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();
            foreach ($order_data as $data) {
                Quality::whereId($data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();
            return response()->json('sort_success');
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    private function data($request, $quality): RedirectResponse
    {
        $this->setTranslated($quality, 'title');
        $this->setTranslated($quality, 'description');
        $quality->icon = $request->icon;
        $quality->status = $request->status ? 1 : 0;
        $quality->save();
        return redirect()->route('admin.qualities.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
