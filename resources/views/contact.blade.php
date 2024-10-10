@extends('layouts.master')
@section('title', $contact->title)
@section('css')
    <style>
        iframe {
            width: 100%;
        }
    </style>
@endsection
@section('content')
    @if ($contact->bg_status)
        <x-main-header :title="$contact->title" :bg="asset('storage/contact/' . $contact->background)" />
    @endif
    <x-contact.cards />
    @if ($contact->form_status)
        <x-contact.form />
    @endif
    {!! $contact->map !!}
    @if ($contact->banner_status)
        <x-contact-banner />
    @endif
@endsection
