@extends('layouts.master')
@section('title', __('About'))
@section('content')
    @if ($about->bg_status)
        <x-main-header :title="$about->title" :bg="asset('storage/about/' . $about->background)" />
    @endif
    @if ($about->services_status)
        <x-qualities />
    @endif
    @if ($about->specialties_status)
        <x-about.specialties />
        <x-about.card />
    @endif
    @if ($about->team_status)
        <x-about.team />
    @endif
    @if ($about->banner_status)
        <x-about.banner />
    @endif
    @if ($about->testimonials_status)
        <x-about.testimonial />
    @endif
    @if ($about->contact_banner_status)
        <x-contact-banner />
    @endif
@endsection
