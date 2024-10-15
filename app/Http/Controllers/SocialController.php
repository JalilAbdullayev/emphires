<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Traits\SetData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialController extends Controller {
    use SetData;

    public array $icons = [
        ['title' => 'Facebook', 'icon' => "<i class='fa-brands fa-facebook'></i>"],
        ['title' => 'Facebook F', 'icon' => "<i class='fa-brands fa-facebook-f'></i>"],
        ['title' => 'Facebook Dördbucaq', 'icon' => "<i class='fa-brands fa-square-facebook'></i>"],
        ['title' => 'LinkedIn', 'icon' => "<i class='fa-brands fa-linkedin'></i>"],
        ['title' => 'LinkedIn in', 'icon' => "<i class='fa-brands fa-linkedin-in'></i>"],
        ['title' => 'Instagram', 'icon' => "<i class='fa-brands fa-instagram'></i>"],
        ['title' => 'Instagram Dördbucaq', 'icon' => "<i class='fa-brands fa-square-instagram'></i>"],
        ['title' => 'WhatsApp', 'icon' => "<i class='fa-brands fa-whatsapp'></i>"],
        ['title' => 'WhatsApp Dördbucaq', 'icon' => "<i class='fa-brands fa-square-whatsapp'></i>"],
    ];

    public function index(): View {
        $socials = Social::orderBy('order')->get();
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/social-media'],
            ['code' => 'az', 'url' => '/admin/sosial-media'],
            ['code' => 'ru', 'url' => '/ru/admin/sotsialnyye-seti']
        ];
        return view('admin.social.index', compact('socials', 'langs'), [
            'icons' => $this->icons
        ]);
    }

    public function store(Request $request): RedirectResponse {
        $social = new Social;
        $social->order = Social::count() > 0 ? Social::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $social);
    }

    public function edit(int $id): View {
        $social = Social::findOrFail($id);
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/social-media/edit/' . $id],
            ['code' => 'az', 'url' => '/admin/sosial-media/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/sotsialnyye-seti/izmenit/' . $id]
        ];
        return view('admin.social.edit', compact('social', 'langs'), [
            'icons' => $this->icons
        ]);
    }

    public function update(int $id, Request $request): RedirectResponse {
        $social = Social::findOrFail($id);
        return $this->data($request, $social);
    }

    public function delete(int $id): JsonResponse {
        $social = Social::findOrFail($id);
        $social->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse {
        return $this->changeStatus($request, Social::class);
    }

    public function sort(Request $request): JsonResponse {
        return $this->changeOrder($request, Social::class);
    }

    private function data($request, $social): RedirectResponse {
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->status = $request->status ? 1 : 0;
        $social->save();
        return redirect()->route('admin.social.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
