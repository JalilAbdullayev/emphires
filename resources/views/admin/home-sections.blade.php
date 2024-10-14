@extends('admin.layouts.master')
@section('title', __('Home sections'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/css/samples.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" />
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
                            @lang('Home')
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
                            @lang('en')
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#az" role="tab">
                        <span class="hidden-xs-down">
                            @lang('az')
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#ru" role="tab">
                        <span class="hidden-xs-down">
                            @lang('ru')
                        </span>
                    </a>
                </li>
            </ul>
            <!-- Tab panes -->
            <form action="{{ route('admin.homepage') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="row mt-3">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="phone_title">
                                            @lang('Phone Title')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Phone Title')" id="phone_title" name="phone_title_{{ $language }}">{{ $home->getTranslation('phone_title', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="services_title">
                                            @lang('Services Title')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Services Title')" id="services_title"
                                            name="services_title_{{ $language }}">{{ $home->getTranslation('services_title', $language) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="address_title">
                                            @lang('Address Title')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Address Title')" id="address_title"
                                            name="address_title_{{ $language }}">{!! $home->getTranslation('address_title', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="services_subtitle">
                                            @lang('Services Subtitle')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Services Subtitle')" id="services_subtitle"
                                            name="services_subtitle_{{ $language }}">{{ $home->getTranslation('services_subtitle', $language) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="email_title">
                                            @lang('Email Title')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Email Title')" id="email_title"
                                            name="email_title_{{ $language }}">{!! $home->getTranslation('email_title', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="services_link_text">
                                            @lang('Services link text')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Services link text')" id="services_link_text"
                                            name="services_link_text_{{ $language }}">{!! $home->getTranslation('services_link_text', $language) !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="services_text">
                                            @lang('Services text')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Services text')" id="services_text"
                                            name="services_text_{{ $language }}">{!! $home->getTranslation('services_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="services_foot_link_text">
                                            @lang('Services foot link text')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Services foot link text')" id="services_foot_link_text"
                                            name="services_foot_link_text_{{ $language }}">{!! $home->getTranslation('services_foot_link_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="who_us_subtitle">
                                            {{ __('Who us subtitle') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Who us subtitle') }}" id="who_us_subtitle"
                                            name="who_us_subtitle_{{ $language }}">{{ $home->getTranslation('who_us_subtitle', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="who_us_text">
                                            {{ __('Who us text') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Who us text') }}" id="who_us_text"
                                            name="who_us_text_{{ $language }}">{!! $home->getTranslation('who_us_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="who_us_link_title">
                                            {{ __('Who us link title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Who us link title') }}" id="who_us_link_title"
                                            name="who_us_link_title_{{ $language }}">{{ $home->getTranslation('who_us_link_title', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="quote">
                                            {{ __('Quote') }}
                                        </label>
                                        <textarea class="form-control ckeditor" id="quote" placeholder="{{ __('Quote') }}"
                                            name="quote_{{ $language }}">{!! $home->getTranslation('quote', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="courses_title">
                                            {{ __('Courses title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Courses title') }}" id="courses_title"
                                            name="courses_title_{{ $language }}">{{ $home->getTranslation('courses_title', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="courses_subtitle">
                                            {{ __('Courses subtitle') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Courses subtitle') }}" id="courses_subtitle"
                                            name="courses_subtitle_{{ $language }}">{{ $home->getTranslation('courses_subtitle', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="testimonials_subtitle">
                                            {{ __('Testimonials Subtitle') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Testimonials Subtitle') }}" id="testimonials_subtitle"
                                            name="testimonials_subtitle_{{ $language }}">{{ $home->getTranslation('testimonials_subtitle', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="testimonials_text">
                                            {{ __('Testimonials text') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Testimonials text') }}" id="testimonials_text"
                                            name="testimonials_text_{{ $language }}">{!! $home->getTranslation('testimonials_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="qualities_subtitle">
                                            {{ __('Qualities subtitle') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Qualities subtitle') }}" id="qualities_subtitle"
                                            name="qualities_subtitle_{{ $language }}">{!! $home->getTranslation('qualities_subtitle', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="footer_blog_title">
                                            {{ __('Footer blog title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Footer blog title') }}" id="footer_blog_title"
                                            name="footer_blog_title_{{ $language }}">{{ $home->getTranslation('footer_blog_title', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="footer_social_title">
                                            {{ __('Footer social title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Footer social title') }}" id="footer_social_title"
                                            name="footer_social_title_{{ $language }}">{{ $home->getTranslation('footer_social_title', $language) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="services_foot_text">
                                            @lang('Services foot text')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Services foot text')" id="services_foot_text"
                                            name="services_foot_text_{{ $language }}">{!! $home->getTranslation('services_foot_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="who_us_title">
                                            {{ __('Who us title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Who us title') }}" id="who_us_title"
                                            name="who_us_title_{{ $language }}">{{ $home->getTranslation('who_us_title', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="who_us_percent_title">
                                            {{ __('Who us percent title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Who us percent title') }}" id="who_us_percent_title"
                                            name="who_us_percent_title_{{ $language }}">{!! $home->getTranslation('who_us_percent_title', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="who_us_foot">
                                            {{ __('Who us foot') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Who us foot') }}" id="who_us_foot"
                                            name="who_us_foot_{{ $language }}">{!! $home->getTranslation('who_us_foot', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="second_section_text">
                                            {{ __('Second section text') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Second section text') }}" id="second_section_text"
                                            name="second_section_text_{{ $language }}">{!! $home->getTranslation('second_section_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="quote_author">
                                            {{ __('Quote author') }}
                                        </label>
                                        <textarea class="form-control ckeditor" id="quote_author" placeholder="{{ __('Quote author') }}"
                                            name="quote_author_{{ $language }}">{!! $home->getTranslation('quote_author', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="skills_text">
                                            {{ __('Skills text') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Skills text') }}" id="skills_text"
                                            name="skills_text_{{ $language }}">{{ $home->getTranslation('skills_text', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="testimonials_title">
                                            {{ __('Testimonials Title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Testimonials Title') }}" id="testimonials_title"
                                            name="testimonials_title_{{ $language }}">{{ $home->getTranslation('testimonials_title', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="testimonials_link_text">
                                            {{ __('Testimonials link text') }}
                                        </label>
                                        <textarea class="form-control" id="testimonials_link_text" placeholder="{{ __('Testimonials link text') }}"
                                            name="testimonials_link_text_{{ $language }}">{{ $home->getTranslation('testimonials_link_text', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="video_text">
                                            {{ __('Video text') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Video text') }}" id="video_text"
                                            name="video_text_{{ $language }}">{!! $home->getTranslation('video_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="qualities_title">
                                            {{ __('Qualities title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Qualities title') }}" id="qualities_title"
                                            name="qualities_title_{{ $language }}">{{ $home->getTranslation('qualities_title', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="qualities_text">
                                            {{ __('Qualities text') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Qualities text') }}" id="qualities_text"
                                            name="qualities_text_{{ $language }}">{!! $home->getTranslation('qualities_text', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white" for="footer_services_title">
                                            {{ __('Footer services title') }}
                                        </label>
                                        <textarea class="form-control" placeholder="{{ __('Footer services title') }}" id="footer_services_title"
                                            name="footer_services_title_{{ $language }}">{{ $home->getTranslation('footer_services_title', $language) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating my-3">
                                <input class="form-control" name="who_us_percent" id="who_us_percent"
                                    placeholder="{{ __('Who us percent') }}" type="number" min="0"
                                    max="100" value="{{ $home->who_us_percent }}" />
                                <label class="form-label text-white-50" for="who_us_percent">
                                    {{ __('Who us percent') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating my-3">
                                <input class="form-control" name="video_link" id="video_link"
                                    placeholder="{{ __('Video link') }}" type="url" maxlength="255"
                                    value="{{ $home->video_link }}" />
                                <label class="form-label text-white-50" for="video_link">
                                    {{ __('Video link') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="slider" id="slider"
                                    @checked($home->slider) value="1" />
                                <label class="form-check-label text-white-50" for="slider">
                                    {{ __('Slider status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="second_section"
                                    id="second_section" @checked($home->second_section) value="1" />
                                <label class="form-check-label text-white-50" for="second_section">
                                    {{ __('Second section status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="second_section_services"
                                    id="second_section_services" @checked($home->second_section_services) value="1" />
                                <label class="form-check-label text-white-50" for="second_section_services">
                                    {{ __('Second section services status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="who_us" id="who_us"
                                    @checked($home->who_us) value="1" />
                                <label class="form-check-label text-white-50" for="who_us">
                                    {{ __('Who us status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="services" id="services"
                                    @checked($home->services) value="1" />
                                <label class="form-check-label text-white-50" for="services">
                                    {{ __('Services status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="testimonials" id="testimonials"
                                    @checked($home->testimonials) value="1" />
                                <label class="form-check-label text-white-50" for="testimonials">
                                    {{ __('Testimonials status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="courses" id="courses"
                                    @checked($home->courses) value="1" />
                                <label class="form-check-label text-white-50" for="courses">
                                    {{ __('Courses status') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="video" id="video"
                                    @checked($home->video) value="1" />
                                <label class="form-check-label text-white-50" for="video">
                                    {{ __('Video status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="skills" id="skills"
                                    @checked($home->skills) value="1" />
                                <label class="form-check-label text-white-50" for="skills">
                                    {{ __('Skills status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="contact_form" id="contact_form"
                                    @checked($home->contact_form) value="1" />
                                <label class="form-check-label text-white-50" for="contact_form">
                                    {{ __('Contact form status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="services_slider"
                                    id="services_slider" @checked($home->services_slider) value="1" />
                                <label class="form-check-label text-white-50" for="services_slider">
                                    {{ __('Service slider status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="clients" id="clients"
                                    @checked($home->clients) value="1" />
                                <label class="form-check-label text-white-50" for="clients">
                                    {{ __('Clients status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="contact_banner"
                                    id="contact_banner" @checked($home->contact_banner) value="1" />
                                <label class="form-check-label text-white-50" for="contact_banner">
                                    {{ __('Contact banner status') }}
                                </label>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="who_us_img_card_status"
                                    id="who_us_img_card_status" @checked($home->who_us_img_card_status) value="1" />
                                <label class="form-check-label text-white-50" for="who_us_img_card_status">
                                    {{ __('Who we are image card status') }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="who_us_img" class="form-label text-white">
                        {{ __('Who us image') }}
                    </label>
                    <input type="file" name="who_us_img" id="who_us_img" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/home/' . $home->who_us_img) }}" />
                </div>
                <div class="mb-3">
                    <label for="video_bg" class="form-label text-white">
                        {{ __('Video Background') }}
                    </label>
                    <input type="file" name="video_bg" id="video_bg" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/home/' . $home->video_bg) }}" />
                </div>
                <div class="mb-3">
                    <label for="skills_img" class="form-label text-white">
                        {{ __('Skills image') }}
                    </label>
                    <input type="file" name="skills_img" id="skills_img" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/home/' . $home->skills_img) }}" />
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
