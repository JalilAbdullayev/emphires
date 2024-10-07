<?php

namespace App\Http\Controllers;

use App\Models\Whyus;
use App\Traits\SetData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WhyusController extends Controller
{
    use SetData;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/who-we-are'],
            ['code' => 'az', 'url' => '/az/admin/biz-kimik'],
            ['code' => 'ru', 'url' => '/ru/admin/kto-mi']
        ];
        $reasons = Whyus::orderBy('order')->get();
        return view('admin.whyus.index', compact('reasons', 'langs'));
    }

    public function create(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/who-we-are/create'],
            ['code' => 'az', 'url' => '/az/admin/biz-kimik/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/kto-mi/sozdat']
        ];
        return view('admin.whyus.create', compact('langs'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $reason = new Whyus;
        $reason->order = Whyus::count() > 0 ? Whyus::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $reason);
    }

    public function edit(int $id): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/who-we-are/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/biz-kimik/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/kto-mi/izmenit/' . $id]
        ];
        $reason = Whyus::findOrFail($id);
        return view('admin.whyus.edit', compact('reason', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $reason = Whyus::findOrFail($id);
        return $this->data($request, $reason);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->changeStatus($request, Whyus::class);
    }

    public function sort(Request $request): JsonResponse
    {
        return $this->changeOrder($request, Whyus::class);
    }

    private function data($request, $reason): RedirectResponse
    {
        $this->setTranslated($reason, 'title');
        $this->setTranslated($reason, 'description');
        $reason->icon = $request->icon;
        $reason->status = $request->status ? 1 : 0;
        $reason->save();
        return redirect()->route('admin.whyus.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
