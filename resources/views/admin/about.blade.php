@extends('admin.layouts.master')
@section('title', __('About'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}" />
    <style>
        textarea {
            display: block;
            height: 5rem;
        }
    </style>
@endsection
@section('content')
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-white-50">
                @yield('title')
            </h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        @yield('title')
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Bread crumb -->
    <div class="card">
        <div class="card-body">
            <!-- Nav tabs -->
            <x-admin.form-lang-switch/>
            <!-- Tab panes -->
            <form action="{{ route('admin.about') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="title">
                                            {{ __('Title') }}
                                        </label>
                                        <input class="form-control" name="title_{{ $language }}" id="title"
                                            placeholder="{{ __('Title') }}" type="text"
                                            value="{{ $about->getTranslation('title', $language) }}" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="specialties_subtitle">
                                            {{ __('Specialties subtitle') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Specialties subtitle') }}" id="specialties_subtitle"
                                            name="specialties_subtitle_{{ $language }}">{!! $about->getTranslation('specialties_subtitle', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="specialties_button">
                                            {{ __('Specialties button') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Specialties Button') }}" id="specialties_button"
                                            name="specialties_button_{{ $language }}">{!! $about->getTranslation('specialties_button', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="team_subtitle">
                                            {{ __('Team subtitle') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Team subtitle') }}" id="team_subtitle"
                                            name="team_subtitle_{{ $language }}">{!! $about->getTranslation('team_subtitle', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="banner_text">
                                            {{ __('Banner text') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Banner Text') }}" id="banner_text"
                                            name="banner_text_{{ $language }}">{!! $about->getTranslation('banner_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="testimonials_subtitle">
                                            {{ __('Testimonials subtitle') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Testimonials Subtitle') }}" id="testimonials_subtitle"
                                            name="testimonials_subtitle_{{ $language }}">{!! $about->getTranslation('testimonials_subtitle', $language) !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="specialties_title">
                                            {{ __('Specialties title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Specialties title') }}" id="specialties_title"
                                            name="specialties_title_{{ $language }}">{!! $about->getTranslation('specialties_title', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="specialties_card">
                                            {{ __('Specialties card') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Specialties card') }}" id="specialties_card"
                                            name="specialties_card_{{ $language }}">{!! $about->getTranslation('specialties_card', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="team_title">
                                            {{ __('Team title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Team title') }}" id="team_title"
                                            name="team_title_{{ $language }}">{!! $about->getTranslation('team_title', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="banner_button">
                                            {{ __('Banner button') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Banner button') }}" id="banner_button"
                                            name="banner_button_{{ $language }}">{!! $about->getTranslation('banner_button', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="testimonials_title">
                                            {{ __('Testimonials title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Testimonials Title') }}" id="testimonials_title"
                                            name="testimonials_title_{{ $language }}">{!! $about->getTranslation('testimonials_title', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="testimonials_img_title">
                                            {{ __('Testimonials image title') }}
                                        </label>
                                        <textarea class="form-control" id="testimonials_img_title" placeholder="{{ __('Testimonials image title') }}"
                                            name="testimonials_img_title_{{ $language }}">{!! $about->getTranslation('testimonials_img_title', $language) !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating my-3">
                            <input class="form-control" name="testimonials_number" id="testimonials_number"
                                placeholder="{{ __('Testimonial number') }}" type="number"
                                value="{{ $about->testimonials_number }}" />
                            <label class="form-label text-white-50" for="testimonials_number">
                                {{ __('Testimonial number') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating my-3">
                            <input class="form-control" name="year" id="year" placeholder="{{ __('Year') }}"
                                type="number" value="{{ $about->year }}" />
                            <label class="form-label text-white-50" for="year">
                                {{ __('Year') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around">
                    <div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="status" id="status"
                                @checked($about->status) value="1" />
                            <label class="form-check-label text-white-50" for="status">
                                {{ __('Page status') }}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="services_status" id="services_status"
                                @checked($about->services_status) value="1" />
                            <label class="form-check-label text-white-50" for="services_status">
                                {{ __('Qualities status') }}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="specialties_status"
                                id="specialties_status" @checked($about->specialties_status) value="1" />
                            <label class="form-check-label text-white-50" for="specialties_status">
                                {{ __('Specialties status') }}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="testimonials_status"
                                id="testimonials_status" @checked($about->testimonials_status) value="1" />
                            <label class="form-check-label text-white-50" for="testimonials_status">
                                {{ __('Testimonials status') }}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="testimonials_img_card_status"
                                id="testimonials_img_card_status" @checked($about->testimonials_img_card_status) value="1" />
                            <label class="form-check-label text-white-50" for="testimonials_img_card_status">
                                {{ __('Testimonials image card status') }}
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="banner_status" id="banner_status"
                                @checked($about->banner_status) value="1" />
                            <label class="form-check-label text-white-50" for="banner_status">
                                {{ __('Banner status') }}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="contact_banner_status"
                                id="contact_banner_status" @checked($about->contact_banner_status) value="1" />
                            <label class="form-check-label text-white-50" for="contact_banner_status">
                                {{ __('Contact banner status') }}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="bg_status" id="bg_status"
                                @checked($about->bg_status) value="1" />
                            <label class="form-check-label text-white-50" for="bg_status">
                                {{ __('Background image status') }}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="team_status" id="team_status"
                                @checked($about->team_status) value="1" />
                            <label class="form-check-label text-white-50" for="team_status">
                                {{ __('Team status') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="background" class="form-label text-white-50">
                        {{ __('Background image') }}
                    </label>
                    <input type="file" name="background" id="background" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/about/' . $about->background) }}" />
                </div>
                <div class="mb-3">
                    <label for="specialties_bg" class="form-label text-white-50">
                        {{ __('Specialties background') }}
                    </label>
                    <input type="file" name="specialties_bg" id="specialties_bg" class="dropify"
                        data-show-remove="false" accept="image/*"
                        data-default-file="{{ asset('storage/about/' . $about->specialties_bg) }}" />
                </div>
                <div class="mb-3">
                    <label for="banner_bg" class="form-label text-white-50">
                        {{ __('Banner background') }}
                    </label>
                    <input type="file" name="banner_bg" id="banner_bg" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/about/' . $about->banner_bg) }}" />
                </div>
                <div class="mb-3">
                    <label for="testimonials_img" class="form-label text-white-50">
                        {{ __('Testimonials image') }}
                    </label>
                    <input type="file" name="testimonials_img" id="testimonials_img" class="dropify"
                        data-show-remove="false" accept="image/*"
                        data-default-file="{{ asset('storage/about/' . $about->testimonials_img) }}" />
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    {{ __('Update') }}
                </button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('back/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
