<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Traits\SetData;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class SkillController extends Controller
{
    use SetData;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/skills'],
            ['code' => 'az', 'url' => '/az/admin/bacariqlar'],
            ['code' => 'ru', 'url' => '/ru/admin/naviki']
        ];
        $skills = Skill::orderBy('order')->get();
        return view('admin.skills.index', compact('skills', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $skill = new Skill;
        $skill->order = Skill::count() > 0 ? Skill::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $skill);
    }

    public function edit(int $id): View
    {
        $skill = Skill::findOrFail($id);
        $langs = [
            ['code' => 'en', 'url' => '/admin/skills/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/bacariqlar/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/naviki/izmenit/' . $id]
        ];
        return view('admin.skills.edit', compact('skill', 'langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $skill = Skill::findOrFail($id);
        return $this->data($request, $skill);
    }

    public function delete(int $id): JsonResponse
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->changeStatus($request, Skill::class);
    }

    public function sort(Request $request): JsonResponse
    {
        return $this->changeOrder($request, Skill::class);
    }

    private function data($request, $skill): RedirectResponse
    {
        $this->setTranslated($skill, 'title');
        $skill->percent = $request->percent;
        $skill->status = $request->status ? 1 : 0;
        $skill->save();
        return redirect()->route('admin.skills.index_' . session('locale'))->withSuccess(__('Operation successful'));
    }
}
