<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use UploadImage, SetData;
    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/clients'],
            ['code' => 'en', 'url' => '/admin/clients'],
            ['code' => 'az', 'url' => '/az/admin/mushteriler'],
            ['code' => 'ru', 'url' => '/ru/admin/kliyenti']
        ];
        $clients = Client::orderBy('order')->get();
        return view('admin.clients.index', compact('clients', 'langs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $client = new Client;
        $client->order = Client::count() > 0 ? Client::latest('order')->first()->order + 1 : 1;
        return $this->data($request, $client);
    }

    public function edit(int $id): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/clients/edit/' . $id],
            ['code' => 'az', 'url' => '/az/admin/mushteriler/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/kliyenti/izmenit/' . $id]
        ];
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client', 'langs'));
    }

    public function update(int $id, Request $request): RedirectResponse
    {
        $client = Client::findOrFail($id);
        return $this->data($request, $client);
    }

    public function delete(int $id): JsonResponse
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return response()->json(['success' => true]);
    }

    public function status(Request $request): JsonResponse
    {
        return $this->changeStatus($request, Client::class);
    }

    public function sort(Request $request): JsonResponse
    {
        return $this->changeOrder($request, Client::class);
    }

    private function data($request, $client): RedirectResponse
    {
        $client->url = $request->url;
        $this->singleImg($request, 'image', 'clients', $client);
        $client->status = $request->status ? 1 : 0;
        $client->save();
        return redirect()->route('admin.clients.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }
}
