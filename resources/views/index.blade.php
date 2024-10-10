@extends('layouts.master')
@section('content')
    @if ($home->slider)
        <x-home.hero />
    @endif
    @if ($home->second_section)
        <x-home.second-section :home="$home" />
    @endif
    @if ($home->who_us)
        <x-home.who-us :home="$home" />
    @endif
    @if ($home->services)
        <x-home.services :home="$home" />
    @endif
    @if ($home->video)
        <x-home.video :home="$home" />
    @endif
    <section class="max-xl:container">
        <div class="flex max-xl:flex-col">
            @if ($home->contact_form)
                <x-home.contact-form :home="$home" />
            @endif
            @if ($home->skills)
                <x-home.skills :home="$home" />
            @endif
        </div>
    </section>
    <x-home.qualities :home="$home" />
    @if ($home->testimonials)
        <x-home.testimonials :home="$home" />
    @endif
    @if ($home->clients)
        <x-home.clients />
    @endif
    @if ($home->courses)
        <x-home.courses :home="$home" />
    @endif
    @if ($home->contact_banner)
        <x-contact-banner />
    @endif
@endsection
