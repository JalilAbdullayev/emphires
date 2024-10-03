@extends('admin.layouts.master')
@section('title', __('Contact'))
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
            <form action="{{ route('admin.contact') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="en" role="tabpanel">
                        <div class="form-floating my-3">
                            <input class="form-control" name="title_en" id="title" placeholder="{{ __('Title')}}"
                                   type="text" value="{{ $contact->getTranslation('title', 'en') }}"/>
                            <label class="form-label text-white-50" for="title">
                                {{ __('Title')}}
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="address">
                                {{ __('Address')}}
                            </label>
                            <textarea class="form-control ckeditor" name="address_en" placeholder="{{ __('Address')}}"
                                      id="address">{{ $contact->getTranslation('address', 'en') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_title">
                                {{ __('Form Title')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Title')}}" id="form_title"
                                      name="form_title_en">{{ $contact->getTranslation('form_title', 'en') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_subtitle">
                                {{ __('Form Subtitle')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Subtitle')}}"
                                      id="form_subtitle"
                                      name="form_subtitle_en">{{ $contact->getTranslation('form_subtitle', 'en')
                                      }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_description">
                                {{ __('Form Description')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Description')}}"
                                      id="form_description"
                                      name="form_description_en">{{ $contact->getTranslation('form_description', 'en')
                                      }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="banner_text">
                                {{ __('Banner Text')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Banner Text')}}"
                                      id="banner_text"
                                      name="banner_text_en">{{ $contact->getTranslation('banner_text', 'en')
                                      }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="az" role="tabpanel">
                        <div class="form-floating my-3">
                            <input class="form-control" name="title_az" id="title" placeholder="{{ __('Title')}}"
                                   type="text" value="{{ $contact->getTranslation('title', 'az') }}"/>
                            <label class="form-label text-white-50" for="title">
                                {{ __('Title')}}
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="address">
                                {{ __('Address')}}
                            </label>
                            <textarea class="form-control ckeditor" name="address_az" placeholder="{{ __('Address')}}"
                                      id="address">{{ $contact->getTranslation('address', 'az') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_title">
                                {{ __('Form Title')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Title')}}" id="form_title"
                                      name="form_title_az">{{ $contact->getTranslation('form_title', 'az') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_subtitle">
                                {{ __('Form Subtitle')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Subtitle')}}"
                                      id="form_subtitle"
                                      name="form_subtitle_az">{{ $contact->getTranslation('form_subtitle', 'az')
                                      }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_description">
                                {{ __('Form Description')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Description')}}"
                                      id="form_description"
                                      name="form_description_az">{{ $contact->getTranslation('form_description', 'az')
                                      }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="banner_text">
                                {{ __('Banner Text')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Banner Text')}}"
                                      id="banner_text"
                                      name="banner_text_az">{{ $contact->getTranslation('banner_text', 'az')
                                      }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="ru" role="tabpanel">
                        <div class="form-floating my-3">
                            <input class="form-control" name="title_ru" id="title" placeholder="{{ __('Title')}}"
                                   type="text" value="{{ $contact->getTranslation('title', 'ru') }}"/>
                            <label class="form-label text-white-50" for="title">
                                {{ __('Title')}}
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="address">
                                {{ __('Address')}}
                            </label>
                            <textarea class="form-control ckeditor" name="address_ru" placeholder="{{ __('Address')}}"
                                      id="address">{{ $contact->getTranslation('address', 'ru') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_title">
                                {{ __('Form Title')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Title')}}" id="form_title"
                                      name="form_title_ru">{{ $contact->getTranslation('form_title', 'ru') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_subtitle">
                                {{ __('Form Subtitle')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Subtitle')}}"
                                      id="form_subtitle"
                                      name="form_subtitle_ru">{{ $contact->getTranslation('form_subtitle', 'ru') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="form_description">
                                {{ __('Form Description')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Form Description')}}"
                                      id="form_description"
                                      name="form_description_ru">{{ $contact->getTranslation('form_description', 'ru') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="banner_text">
                                {{ __('Banner Text')}}
                            </label>
                            <textarea class="form-control ckeditor" placeholder="{{ __('Banner Text')}}"
                                      id="banner_text"
                                      name="banner_text_ru">{{ $contact->getTranslation('banner_text', 'ru') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-floating my-3">
                    <input class="form-control" name="email" id="email" placeholder="{{ __('Email')}}" type="email"
                           value="{{ $contact->email }}"/>
                    <label class="form-label text-white-50" for="email">
                        {{ __('Email')}}
                    </label>
                </div>
                <div class="form-floating my-3">
                    <input class="form-control" name="phone" id="phone" placeholder="{{ __('Phone')}}" type="tel"
                           value="{{ $contact->phone }}"/>
                    <label class="form-label text-white-50" for="phone">
                        {{ __('Phone')}}
                    </label>
                </div>
                <div class="mb-3">
                    <label class="form-label text-white-50" for="map">
                        {{ __('Map')}}
                    </label>
                    <textarea class="form-control" placeholder="{{ __('Map')}}" id="map"
                              name="map">{{ $contact->map }}</textarea>
                </div>
                <div class="d-flex justify-content-around">
                    <div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="status" id="status"
                                @checked($contact->status) value="1"/>
                            <label class="form-check-label text-white-50" for="status">
                                {{  __('Page Status')}}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="form_status" id="form_status"
                                @checked($contact->form_status) value="1"/>
                            <label class="form-check-label text-white-50" for="form_status">
                                {{  __('Form Status')}}
                            </label>
                        </div>
                    </div>
                    <div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="banner_status" id="banner_status"
                                @checked($contact->banner_status) value="1"/>
                            <label class="form-check-label text-white-50" for="banner_status">
                                {{  __('Banner Status')}}
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="bg_status" id="bg_status"
                                @checked($contact->bg_status) value="1"/>
                            <label class="form-check-label text-white-50" for="bg_status">
                                {{  __('Background Image Status')}}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label text-white-50">
                        {{ __('Background Image')}}
                    </label>
                    <input type="file" name="background" id="logo" class="dropify" data-show-remove="false"
                           accept="image/*" data-default-file="{{ asset(Storage::url($contact->background)) }}"/>
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
