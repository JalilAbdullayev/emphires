<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Traits\SetData;
use App\Traits\UploadImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    use UploadImage, SetData;

    public function index(): View
    {
        $langs = [
            ['code' => 'en', 'url' => '/admin/contact'],
            ['code' => 'az', 'url' => '/az/admin/elaqe'],
            ['code' => 'ru', 'url' => '/ru/admin/svyaz']
        ];
        return view('admin.contact', compact('langs'), [
            'languages' => $this->languages
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $contact = Contact::firstOrFail();
        $this->setTranslated($contact, 'title');
        $this->setTranslated($contact, 'form_title');
        $this->setTranslated($contact, 'form_subtitle');
        $this->setTranslated($contact, 'form_description');
        $this->setTranslated($contact, 'banner_text');
        $this->setTranslated($contact, 'banner_button');
        $this->setTranslated($contact, 'address');
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->map = $request->map;
        $contact->status = $request->status ? 1 : 0;
        $contact->form_status = $request->form_status ? 1 : 0;
        $contact->banner_status = $request->banner_status ? 1 : 0;
        $contact->bg_status = $request->bg_status ? 1 : 0;
        $this->singleImg($request, 'background', 'contact', $contact);
        $contact->save();
        return redirect()->back()->withSuccess(__('Operation successful.'));
    }
}
