@extends('admin.layouts.master')
@section('title', __('Contact'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}"/>
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
                    <a class="nav-link active" data-bs-toggle="tab" href="#az" role="tab">
                        <span class="hidden-xs-down">
                            @lang('az')
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#en" role="tab">
                        <span class="hidden-xs-down">
                            @lang('en')
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
            <form action="{{ route('admin.contact') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="title">
                                            @lang('Title')
                                        </label>
                                        <input class="form-control" name="title_{{ $language }}" id="title"
                                               placeholder="@lang('Title')" type="text"
                                               value="{{ $contact->getTranslation('title', $language) }}"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="address">
                                            @lang('Address')
                                        </label>
                                        <textarea class="form-control" name="address_{{ $language }}"
                                                  placeholder="@lang('Address')"
                                                  id="address">{{ $contact->getTranslation('address', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="banner_text">
                                            @lang('Banner text')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Banner text')"
                                                  id="banner_text"
                                                  name="banner_text_{{ $language }}">{{ $contact->getTranslation('banner_text', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="work_hours">
                                            @lang('Work hours')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Work hours')" id="work_hours"
                                                  name="work_hours_{{ $language }}">{!! $contact->getTranslation('work_hours', $language) !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="form_title">
                                            @lang('Form title')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Form title')" id="form_title"
                                                  name="form_title_{{ $language }}">{{ $contact->getTranslation('form_title', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="form_subtitle">
                                            @lang('Form subtitle')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Form subtitle')"
                                                  id="form_subtitle"
                                                  name="form_subtitle_{{ $language }}">{{ $contact->getTranslation('form_subtitle', $language) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="form_description">
                                            @lang('Form description')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Form description')"
                                                  id="form_description"
                                                  name="form_description_{{ $language }}">{!! $contact->getTranslation('form_description', $language) !!}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label text-white-50" for="banner_text">
                                            @lang('Banner button')
                                        </label>
                                        <textarea class="form-control" placeholder="@lang('Banner button')"
                                                  id="banner_button"
                                                  name="banner_button_{{ $language }}">{{ $contact->getTranslation('banner_button', $language) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-floating my-3">
                    <input class="form-control" name="email" id="email" placeholder="@lang('Email')"
                           type="email" value="{{ $contact->email }}"/>
                    <label class="form-label text-white-50" for="email">
                        @lang('Email')
                    </label>
                </div>
                <div class="form-floating my-3">
                    <input class="form-control" name="phone" id="phone" placeholder="@lang('Phone')"
                           type="tel" value="{{ $contact->phone }}"/>
                    <label class="form-label text-white-50" for="phone">
                        @lang('Phone')
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label text-white-50" for="map">
                        @lang('Map')
                    </label>
                    <textarea class="form-control" placeholder="@lang('Map')" id="map"
                              name="map">{{ $contact->map }}</textarea>
                </div>
                <div class="d-flex justify-content-around">
                    <div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="status" id="status"
                                   @checked($contact->status) value="1"/>
                            <label class="form-check-label text-white-50" for="status">
                                @lang('Page status')
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="form_status" id="form_status"
                                   @checked($contact->form_status) value="1"/>
                            <label class="form-check-label text-white-50" for="form_status">
                                @lang('Form status')
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="banner_status" id="banner_status"
                                   @checked($contact->banner_status) value="1"/>
                            <label class="form-check-label text-white-50" for="banner_status">
                                @lang('Banner status')
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="bg_status" id="bg_status"
                                   @checked($contact->bg_status) value="1"/>
                            <label class="form-check-label text-white-50" for="bg_status">
                                @lang('Background image status')
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="background" class="form-label text-white-50">
                        @lang('Background image')
                    </label>
                    <input type="file" name="background" id="background" class="dropify" data-show-remove="false"
                           accept="image/*" data-default-file="{{ asset('storage/contact/' . $contact->background) }}"/>
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    @lang('Update')
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
