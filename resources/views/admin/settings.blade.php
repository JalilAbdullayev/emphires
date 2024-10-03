@extends('admin.layouts.master')
@section('title', __('Settings'))
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
            <form action="{{ route('admin.settings') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="en" role="tabpanel">
                        <div class="form-floating my-3">
                            <input class="form-control" name="title_en" id="title" placeholder="{{ __('Title')}}"
                                   type="text" value="{{ $settings->getTranslation('title', 'en') }}" required/>
                            <label class="form-label" for="title">
                                {{ __('Title')}}
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="author_en" placeholder="{{ __('Author')}}" type="text"
                                   id="author" value="{{ $settings->getTranslation('author', 'en') }}"/>
                            <label class="form-label" for="author">
                                {{ __('Author')}}
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">
                                {{ __('Description')}}
                            </label>
                            <textarea class="form-control" placeholder="{{ __('Description')}}" id="description"
                                      name="description_en">{{ $settings->getTranslation('description', 'en') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="keywords">
                                {{ __('Keywords')}}
                            </label>
                            <textarea class="form-control" placeholder="{{ __('Keywords')}}" id="keywords"
                                      name="keywords_en">{{ $settings->getTranslation('keywords', 'en') }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="az" role="tabpanel">
                        <div class="form-floating my-3">
                            <input class="form-control" name="title_az" id="title" placeholder="{{ __('Title')}}"
                                   type="text" value="{{ $settings->getTranslation('title', 'az') }}" required/>
                            <label class="form-label" for="title">
                                {{ __('Title')}}
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="author_az" placeholder="{{ __('Author')}}" type="text"
                                   id="author" value="{{ $settings->getTranslation('author', 'az') }}"/>
                            <label class="form-label" for="author">
                                {{ __('Author')}}
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">
                                {{ __('Description')}}
                            </label>
                            <textarea class="form-control" placeholder="{{ __('Description')}}" id="description"
                                      name="description_az">{{ $settings->getTranslation('description', 'az') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="keywords">
                                {{ __('Keywords')}}
                            </label>
                            <textarea class="form-control" placeholder="{{ __('Keywords')}}" id="keywords"
                                      name="keywords_az">{{ $settings->getTranslation('keywords', 'az') }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="ru" role="tabpanel">
                        <div class="form-floating my-3">
                            <input class="form-control" name="title_ru" id="title" placeholder="{{ __('Title')}}"
                                   type="text" value="{{ $settings->getTranslation('title', 'ru') }}" required/>
                            <label class="form-label" for="title">
                                {{ __('Title')}}
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="author_ru" placeholder="{{ __('Author')}}" type="text"
                                   id="author" value="{{ $settings->getTranslation('author', 'ru') }}"/>
                            <label class="form-label" for="author">
                                {{ __('Author')}}
                            </label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">
                                {{ __('Description')}}
                            </label>
                            <textarea class="form-control" placeholder="{{ __('Description')}}" id="description"
                                      name="description_ru">{{ $settings->getTranslation('description', 'ru') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="keywords">
                                {{ __('Keywords')}}
                            </label>
                            <textarea class="form-control" placeholder="{{ __('Keywords')}}" id="keywords"
                                      name="keywords_ru">{{ $settings->getTranslation('keywords', 'ru') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label text-white-50">
                        {{ __('Logo')}}
                    </label>
                    <input type="file" name="logo" id="logo" class="dropify" data-show-remove="false"
                           accept="image/*" data-default-file="{{ asset(Storage::url($settings->logo)) }}"/>
                </div>
                <div class="mb-3">
                    <label for="favicon" class="form-label text-white-50">
                        {{ __('Favicon')}}
                    </label>
                    <input type="file" name="favicon" id="favicon" class="dropify" data-show-remove="false"
                           accept="image/*" data-default-file="{{ asset(Storage::url($settings->favicon)) }}"/>
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
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
