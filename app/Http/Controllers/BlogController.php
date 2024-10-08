<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Traits\SetData;
use App\Models\Category;
use App\Traits\UploadImage;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    use SetData, UploadImage;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/blog'],
            ['code' => 'az', 'url' => '/az/admin/bloq'],
            ['code' => 'ru', 'url' => '/ru/admin/stati']
        ];
        $blog = Blog::orderBy('order')->get();
        return view("admin.blog.index", compact('blog', 'langs'));
    }

    public function create(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/blog/create'],
            ['code' => 'az', 'url' => '/az/admin/bloq/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/stati/sozdat']
        ];
        $categories = Category::orderBy('order')->get();
        return view('admin.blog.create', compact('langs', 'categories'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $article = new Blog;
        $article->author_id = Auth::user()->id;
        $article->order = Blog::count() > 0 ? Blog::latest('order')->first()->order + 1 : 1;
        return $this->data($article, $request);
    }

    public function edit(int $id, Request $request): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/blog/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/bloq/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/stati/izmenit/' . $id],
        ];
        $categories = Category::orderBy('order')->get();
        $article = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('article', 'langs', 'categories'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $article = Blog::findOrFail($id);
        return $this->data($article, $request);
    }

    public function delete(int $id): JsonResponse
    {
        $article = Blog::findOrFail($id);
        $article->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->changeStatus($request, Blog::class);
    }

    public function sort(Request $request): JsonResponse
    {
        return $this->changeOrder($request, Blog::class);
    }

    private function data($article, $request): RedirectResponse
    {
        $this->setTranslated($article, 'title');
        $this->setSlug($article);
        $this->setTranslated($article, 'description');
        $this->setTranslated($article, 'text');
        $this->setTranslated($article, 'keywords');
        $this->singleImg($request, 'image', 'blog', $article);
        $this->singleImg($request, 'background', 'blog', $article);
        $article->date = $request->date;
        $article->status = $request->status ? 1 : 0;
        $article->category_id = $request->category_id;
        $article->save();
        return redirect()->route('admin.blog.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
