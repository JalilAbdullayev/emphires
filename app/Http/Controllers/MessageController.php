<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MessageController extends Controller {
    public function index(): View {
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/messages'],
            ['code' => 'az', 'url' => '/admin/mesajlar'],
            ['code' => 'ru', 'url' => '/ru/admin/soobsheniya']
        ];
        $messages = Message::all();
        return view('admin.messages.index', compact('messages', 'langs'));
    }

    public function store(MessageRequest $request): RedirectResponse {
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
        return redirect()->back()->withSuccess(__('Operation successful.'));
    }

    public function show(int $id): View {
        $message = Message::findOrFail($id);
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/messages/show/' . $id],
            ['code' => 'az', 'url' => '/admin/mesajlar/bax/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/soobsheniya/smotret/' . $id]
        ];
        return view('admin.messages.show', compact('message', 'langs'));
    }

    public function delete(int $id): JsonResponse {
        $message = Message::findOrFail($id);
        $message->delete();
        return response()->json(['success' => true]);
    }
}
