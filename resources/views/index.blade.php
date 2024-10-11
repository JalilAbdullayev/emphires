@extends('layouts.master')
@section('content')
    @if ($home->slider)
        <x-home.hero />
    @endif
    @if ($home->second_section)
        <x-home.second-section />
    @endif
    @if ($home->who_us)
        <x-home.who-us />
    @endif
    @if ($home->services)
        <x-home.services />
    @endif
    @if ($home->video)
        <x-home.video />
    @endif
    @if ($home->contact_form || $home->skills)
        <section class="max-xl:container">
            <div class="flex max-xl:flex-col">
                @if ($home->contact_form)
                    <x-home.contact-form />
                @endif
                @if ($home->skills)
                    <x-home.skills />
                @endif
            </div>
        </section>
    @endif
    <x-qualities />
    @if ($home->testimonials)
        <x-home.testimonials />
    @endif
    @if ($home->clients)
        <x-home.clients />
    @endif
    @if ($home->courses)
        <x-home.courses />
    @endif
    @if ($home->contact_banner)
        <x-contact-banner />
    @endif
@endsection
