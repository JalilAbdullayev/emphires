@extends('admin.layouts.master')
@section('title', __('New slide'))
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
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.slider.index_' . session('locale')) }}">
                            @lang('Slider')
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
            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="title">
                                    @lang('Title')
                                </label>
                                <textarea class="form-control ckeditor" placeholder="@lang('Title')" id="title" name="title_{{ $language }}"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="subtitle">
                                    @lang('Subtitle')
                                </label>
                                <textarea class="form-control ckeditor" placeholder="@lang('Subtitle')" id="subtitle"
                                    name="subtitle_{{ $language }}"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="button_text">
                                    @lang('Button text')
                                </label>
                                <textarea class="form-control ckeditor" placeholder="@lang('Button text')" id="button_text"
                                    name="button_text_{{ $language }}"></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label text-white-50" for="video_link">
                        @lang('Video link')
                    </label>
                    <input type="url" class="form-control" placeholder="@lang('Video link')" id="video_link"
                        name="video_link" />
                </div> --}}
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" />
                    <label class="form-check-label text-white-50" for="status">
                        @lang('Status')
                    </label>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-white-50">
                        @lang('Image')
                    </label>
                    <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                        accept="image/*" />
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    @lang('Create')
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
