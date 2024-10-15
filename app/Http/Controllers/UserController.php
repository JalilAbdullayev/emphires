<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/users'],
            ['code' => 'az', 'url' => '/admin/istifadechiler'],
            ['code' => 'ru', 'url' => '/ru/admin/polzovateli']
        ];
        $data = User::all();
        return view('admin.users.index', compact('data', 'langs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View {
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/users/create'],
            ['code' => 'az', 'url' => '/admin/istifadeciler/yarat'],
            ['code' => 'ru', 'url' => '/ru/admin/polzovateli/sozdat']
        ];
        return view('admin.users.create', compact('langs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->password === $request->password_confirmation) {
            $user->save();
            return redirect()->route('admin.users.index_' . session('locale'))->withSuccess(__('Operation successful.'));
        }
        return redirect()->back()->withError(__('Password and password confirmation do not match.'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View {
        $langs = [
            ['code' => 'en', 'url' => '/en/admin/users/edit/' . $id],
            ['code' => 'az', 'url' => '/admin/istifadeciler/redakte/' . $id],
            ['code' => 'ru', 'url' => '/ru/admin/polzovateli/izmenit/' . $id]
        ];
        $user = User::whereId($id)->first();
        return view('admin.users.edit', compact('user', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password !== null) {
            if(!Hash::check($request->password_old, $user->password)) {
                return redirect()->back()->withError(__('Old password is incorrect.'));
            }
            if(Hash::check($request->password, $user->password)) {
                return redirect()->back()->withError(__('Old password and new password cannot be same.'));
            }
            if($request->password === $request->password_confirmation) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->withError(__('Password and password confirmation do not match.'));
            }
        }
        $user->save();
        return redirect()->route('admin.users.index_' . session('locale'))->withSuccess(__('Operation successful.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse {
        User::whereId($id)->delete();
        return response()->json(['success' => true]);
    }
}
