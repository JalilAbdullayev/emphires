<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TeamController extends Controller
{
    use UploadImage, SetData;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/team'],
            ['code' => 'az', 'url' => '/az/admin/komanda'],
            ['code' => 'ru', 'url' => '/ru/admin/briqada']
        ];
        $team = Team::orderBy('order')->get();
        return view('admin.team.index', compact('team', 'langs'));
    }

    public function create(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/team/create'],
            ['code' => 'az', 'url' => '/az/admin/komanda/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/briqada/sozdat']
        ];
        return view('admin.team.create', compact('langs'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $member = new Team;
        if (Team::count() > 0) {
            $order = Team::latest('order')->first()->order;
            if ($order > 1) {
                $last = $order + 1;
            }
        }
        $member->order = $last ?? 1;
        return $this->data($request, $member);
    }

    public function edit(int $id): View
    {
        $member = Team::findOrFail($id);
        $langs = [
            ['code' => 'en', 'url' => '/admin/team/create'],
            ['code' => 'az', 'url' => '/az/admin/komanda/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/briqada/sozdat']
        ];
        return view('admin.team.edit', compact('member', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $member = Team::findOrFail($id);
        return $this->data($request, $member);
    }

    public function delete(int $id): JsonResponse
    {
        $member = Team::findOrFail($id);
        $member->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse
    {
        $member = Team::findOrFail($request->id);
        $status = $member->status;
        $member->status = $status ? 0 : 1;
        $member->save();
        return response()->json(['success' => true]);
    }

    public function sort(): JsonResponse
    {
        $order_data = request('data');
        try {
            DB::beginTransaction();
            foreach ($order_data as $data) {
                Team::whereId($data['id'])->update(['order' => $data['order']]);
            }
            DB::commit();
            return response()->json('sort_success');
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }

    private function data($request, $member): RedirectResponse
    {
        $this->setTranslated($member, 'name');
        $this->setTranslated($member, 'position');
        $member->status = $request->status ? 1 : 0;
        $this->singleImg($request, 'image', 'team', $member);
        $member->save();
        return redirect()->route('admin.team.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
