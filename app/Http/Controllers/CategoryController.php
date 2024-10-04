<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller {
    public function index(): View {
        $langs = [['code' => 'en', 'url' => '/admin/categories'],
            ['code' => 'az', 'url' => '/az/admin/kateqoriyalar'],
            ['code' => 'ru', 'url' => '/ru/admin/kateqori']];
        $categories = Category::orderBy('order')->get();
        $languages = ['en', 'az', 'ru'];
        return view('admin.categories.index', compact('categories', 'languages', 'langs'));
    }

    public function store(Request $request): RedirectResponse {
        $category = new Category;
        $last = Category::orderBy('order', 'desc')->first()->order;
        if($last) {
            $category->order = $last + 1;
        }
        return $this->data($request, $category);
    }

    public function edit(int $id): View {
        $langs = [['code' => 'en', 'url' => '/admin/categories/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/kateqoriyalar/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/kateqori/izmenit/' . $id]];
        $category = Category::findOrFail($id);
        $languages = ['en', 'az', 'ru'];
        return view('admin.categories.edit', compact('category', 'languages', 'langs'));
    }

    public function update(int $id, Request $request): RedirectResponse {
        $category = Category::findOrFail($id);
        return $this->data($request, $category);
    }

    public function delete(int $id): JsonResponse {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse {
        $category = Category::findOrFail($request->id);
        $status = $category->status;
        $category->status = $status ? 0 : 1;
        $category->save();
        return response()->json(['success' => true]);
    }

    public function sort(Request $request): JsonResponse {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();
            foreach($order_data as $data) {
                Category::whereId($data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();
            return response()->json('sort_success');
        } catch(Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    private function data(Request $request, $category): RedirectResponse {
        $category->title = [
            'en' => $request->title_en,
            'az' => $request->title_az,
            'ru' => $request->title_ru
        ];
        $category->slug = [
            'en' => Str::slug($request->title_en),
            'az' => Str::slug($request->title_az),
            'ru' => Str::slug($request->title_ru)
        ];
        $category->status = $request->status ? 0 : 1;
        $category->save();
        return redirect()->route('admin.categories.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
