@extends('layouts.master')
@section('title', __('About'))
@section('content')
    <x-main-header :about="$about" :title="$about->title" :bg="asset('storage/about/' . $about->background)" />
    @if ($about->services_status)
        <x-qualities :title="$about->services_title" :subtitle="$about->services_subtitle" :text="$about->services_description" />
    @endif
    @if ($about->specialties_status)
        <x-about.specialties :about="$about" />
        <x-about.card :about="$about" />
    @endif
    @if ($about->team_status)
        <x-about.team :about="$about" />
    @endif
    @if ($about->banner_status)
        <x-about.banner :about="$about" />
    @endif
    @if ($about->testimonials_status)
        <x-about.testimonial :about="$about" />
    @endif
    @if ($about->contact_banner_status)
        <x-contact-banner />
    @endif
@endsection
