<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ContactController extends Controller {
    use UploadImage;

    public function index(): View {
        $langs = [['code' => 'en', 'url' => '/admin/contact'],
            ['code' => 'az', 'url' => '/az/admin/elaqe'],
            ['code' => 'ru', 'url' => '/ru/admin/svyaz']];
        $languages = ['en', 'az', 'ru'];
        return view('admin.contact', compact('langs', 'languages'));
    }

    public function update(Request $request): RedirectResponse {
        $contact = Contact::firstOrFail();
        $contact->title = [
            'en' => $request->title_en,
            'az' => $request->title_az,
            'ru' => $request->title_ru
        ];
        $contact->form_title = [
            'en' => $request->form_title_en,
            'az' => $request->form_title_az,
            'ru' => $request->form_title_ru
        ];
        $contact->form_subtitle = [
            'en' => $request->form_subtitle_en,
            'az' => $request->form_subtitle_az,
            'ru' => $request->form_subtitle_ru
        ];
        $contact->form_description = [
            'en' => $request->form_description_en,
            'az' => $request->form_description_az,
            'ru' => $request->form_description_ru
        ];
        $contact->address = [
            'en' => $request->address_en,
            'az' => $request->address_az,
            'ru' => $request->address_ru
        ];
        $contact->banner_text = [
            'en' => $request->banner_text_en,
            'az' => $request->banner_text_az,
            'ru' => $request->banner_text_ru
        ];
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->map = $request->map;
        $contact->status = $request->status ? 1 : 0;
        $contact->form_status = $request->form_status ? 1 : 0;
        $contact->banner_status = $request->banner_status ? 1 : 0;
        $contact->bg_status = $request->bg_status ? 1 : 0;
        $this->singleImg($request, 'background', 'contact', $contact);
        $contact->save();
        return redirect()->back();
    }
}
