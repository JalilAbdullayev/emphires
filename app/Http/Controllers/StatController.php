<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use App\Traits\SetData;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class StatController extends Controller {
    use SetData;

    public function index(): View {
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/stats'],
            ['code' => 'az', 'url' => '/admin/gostericiler'],
            ['code' => 'ru', 'url' => '/ru/admin/statistika']
        ];
        $stats = Stat::orderBy('order')->get();
        return view('admin.stats.index', compact('stats', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse {
        $stat = new Stat;
        $stat->order = Stat::count() > 0 ? Stat::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $stat);
    }

    public function edit(int $id): View {
        $stat = Stat::findOrFail($id);
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/stats/edit/' . $id],
            ['code' => 'az', 'url' => '/admin/gostericiler/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/statistika/izmenit/' . $id]
        ];
        return view('admin.stats.edit', compact('stat', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse {
        $stat = Stat::findOrFail($id);
        return $this->data($request, $stat);
    }

    public function delete(int $id): JsonResponse {
        $stat = Stat::findOrFail($id);
        $stat->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse {
        return $this->changeStatus($request, Stat::class);
    }

    public function sort(Request $request): JsonResponse {
        return $this->changeOrder($request, Stat::class);
    }

    private function data($request, $stat): RedirectResponse {
        $this->setTranslated($stat, 'name');
        $stat->count = $request->count;
        $stat->status = $request->status ? 1 : 0;
        $stat->save();
        return redirect()->route('admin.stats.index_' . session('locale'))->withSuccess(__('Operation successful'));
    }
}
