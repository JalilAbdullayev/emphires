@extends('admin.layouts.master')
@section('title', __('About'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/css/samples.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}"/>
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#en" role="tab">
                        <span class="hidden-xs-down">
                            {{ __('en') }}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#az" role="tab">
                        <span class="hidden-xs-down">
                            {{ __('az') }}
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                        <span class="hidden-xs-down">
                            {{ __('ru') }}
                        </span>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <form action="{{ route('admin.about') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}"
                             role="tabpanel">
                            <div class="form-floating my-3">
                                <input class="form-control" name="title_{{ $language }}" id="title"
                                       placeholder="{{ __('Title')}}" type="text"
                                       value="{{ $about->getTranslation('title', $language) }}"/>
                                <label class="form-label text-white-50" for="title">
                                    {{ __('Title')}}
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="services_title">
                                    {{ __('Services Title')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Services Title')}}"
                                          id="services_title" name="services_title_{{ $language }}"
                                >{{ $about->getTranslation('services_title', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="services_subtitle">
                                    {{ __('Services Subtitle')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Services Subtitle')}}"
                                          id="services_subtitle" name="services_subtitle_{{ $language }}"
                                >{{ $about->getTranslation('services_subtitle', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="services_description">
                                    {{ __('Services Description')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Services Description')}}"
                                          id="services_description" name="services_description_{{ $language }}"
                                >{{ $about->getTranslation('services_description', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="specialties_title">
                                    {{ __('Specialties Title')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Specialties Title')}}"
                                          id="specialties_title" name="specialties_title_{{ $language }}"
                                >{{ $about->getTranslation('specialties_title', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="specialties_subtitle">
                                    {{ __('Specialties Subtitle')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Specialties Subtitle')}}"
                                          id="specialties_subtitle" name="specialties_subtitle_{{ $language }}"
                                >{{ $about->getTranslation('specialties_subtitle', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="specialties_button">
                                    {{ __('Specialties Button')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Specialties Button')}}"
                                          id="specialties_button" name="specialties_button_{{ $language }}"
                                >{{ $about->getTranslation('specialties_button', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="specialties_card">
                                    {{ __('Specialties Card')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Specialties Card')}}"
                                          id="specialties_card" name="specialties_card_{{ $language }}"
                                >{{ $about->getTranslation('specialties_card', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="team_title">
                                    {{ __('Team Title')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Team Title')}}"
                                          id="team_title" name="team_title_{{ $language }}"
                                >{{ $about->getTranslation('team_title', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="team_subtitle">
                                    {{ __('Team Subtitle')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Team Subtitle')}}"
                                          id="team_subtitle" name="team_subtitle_{{ $language }}"
                                >{{ $about->getTranslation('team_subtitle', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="banner_text">
                                    {{ __('Banner Text')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Banner Text')}}"
                                          id="banner_text" name="banner_text_{{ $language }}"
                                >{{ $about->getTranslation('banner_text', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="banner_button">
                                    {{ __('Banner button')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Banner button')}}"
                                          id="banner_button" name="banner_button_{{ $language }}"
                                >{{ $about->getTranslation('banner_button', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="testimonials_title">
                                    {{ __('Testimonials Title')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Testimonials Title')}}"
                                          id="testimonials_title" name="testimonials_title_{{ $language }}"
                                >{{ $about->getTranslation('testimonials_title', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="testimonials_subtitle">
                                    {{ __('Testimonials Subtitle')}}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Testimonials Subtitle')}}"
                                          id="testimonials_subtitle" name="testimonials_subtitle_{{ $language }}"
                                >{{ $about->getTranslation('testimonials_subtitle', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="testimonials_img_title">
                                    {{ __('Testimonials Image Title')}}
                                </label>
                                <textarea class="form-control ckeditor" id="testimonials_img_title"
                                          placeholder="{{ __('Testimonials Image Title')}}"
                                          name="testimonials_img_title_{{ $language }}"
                                >{{ $about->getTranslation('testimonials_img_title', $language) }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-floating my-3">
                    <input class="form-control" name="testimonials_number" id="testimonials_number"
                           placeholder="{{ __('Testimonial number') }}" type="number"
                           value="{{ $about->testimonials_number }}"/>
                    <label class="form-label text-white-50" for="testimonials_number">
                        {{ __('Testimonial number')}}
                    </label>
                </div>
                <div class="d-flex justify-content-around">
                    <div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="status" id="status"
                                   @checked($about->status) value="1"/>
                            <label class="form-check-label text-white-50" for="status">
                                {{  __('Page Status')}}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="services_status" id="services_status"
                                   @checked($about->services_status) value="1"/>
                            <label class="form-check-label text-white-50" for="services_status">
                                {{  __('Services Status')}}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="specialties_status"
                                   id="specialties_status" @checked($about->specialties_status) value="1"/>
                            <label class="form-check-label text-white-50" for="specialties_status">
                                {{  __('Specialties Status')}}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="testimonials_status"
                                   id="testimonials_status" @checked($about->testimonials_status) value="1"/>
                            <label class="form-check-label text-white-50" for="testimonials_status">
                                {{  __('Testimonials Status')}}
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="banner_status" id="banner_status"
                                   @checked($about->banner_status) value="1"/>
                            <label class="form-check-label text-white-50" for="banner_status">
                                {{  __('Banner Status')}}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="contact_banner_status"
                                   id="contact_banner_status" @checked($about->contact_banner_status) value="1"/>
                            <label class="form-check-label text-white-50" for="contact_banner_status">
                                {{  __('Contact Banner Status')}}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="bg_status" id="bg_status"
                                   @checked($about->bg_status) value="1"/>
                            <label class="form-check-label text-white-50" for="bg_status">
                                {{  __('Background Image Status')}}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="team_status" id="team_status"
                                   @checked($about->team_status) value="1"/>
                            <label class="form-check-label text-white-50" for="team_status">
                                {{  __('Team Status')}}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="background" class="form-label text-white-50">
                        {{ __('Background Image')}}
                    </label>
                    <input type="file" name="background" id="background" class="dropify" data-show-remove="false"
                           accept="image/*" data-default-file="{{ asset('storage/about/' . $about->background) }}"/>
                </div>
                <div class="mb-3">
                    <label for="specialties_bg" class="form-label text-white-50">
                        {{ __('Specialties Background')}}
                    </label>
                    <input type="file" name="specialties_bg" id="specialties_bg" class="dropify"
                           data-show-remove="false" accept="image/*"
                           data-default-file="{{ asset('storage/about/' . $about->specialties_bg) }}"/>
                </div>
                <div class="mb-3">
                    <label for="banner_bg" class="form-label text-white-50">
                        {{ __('Banner Background')}}
                    </label>
                    <input type="file" name="banner_bg" id="banner_bg" class="dropify" data-show-remove="false"
                           accept="image/*" data-default-file="{{ asset('storage/about/' . $about->banner_bg) }}"/>
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    {{ __('Update') }}
                </button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset("back/node_modules/dropify/dist/js/dropify.min.js") }}"></script>
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('back/ckeditor/samples/js/sample.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });

        function createCKEditor(id) {
            CKEDITOR.replace(id, {
                extraAllowedContent: 'div',
                height: 150,
            });
        }

        const ckeditor1 = createCKEditor('ckeditor');
    </script>
@endsection
