<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\SetData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use SetData;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/categories'],
            ['code' => 'az', 'url' => '/az/admin/kateqoriyalar'],
            ['code' => 'ru', 'url' => '/ru/admin/kateqori']
        ];
        $categories = Category::orderBy('order')->get();
        return view('admin.categories.index', compact('categories', 'langs'), [
            'languages' => $this->languages
        ]);
    }


    public function store(Request $request): RedirectResponse
    {
        $category = new Category;
        $last = Category::orderBy('order', 'desc')->first()->order;
        if ($last) {
            $category->order = $last + 1;
        }
        return $this->data($request, $category);
    }

    public function edit(int $id): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/categories/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/kateqoriyalar/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/kateqori/izmenit/' . $id]
        ];
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $category = Category::findOrFail($id);
        return $this->data($request, $category);
    }

    public function delete(int $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->changeStatus($request, Category::class);
    }

    public function sort(Request $request): JsonResponse
    {
        return $this->changeOrder($request, Category::class);
    }

    private function data(Request $request, $category): RedirectResponse
    {
        $this->setTranslated($category, 'title');
        $this->setSlug($category);
        $category->status = $request->status ? 0 : 1;
        $category->save();
        return redirect()->route('admin.categories.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
