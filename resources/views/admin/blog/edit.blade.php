@extends('admin.layouts.master')
@section('title', __('Edit article'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/css/samples.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/node_modules/select2/dist/css/select2.min.css') }}" />
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
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.blog.index_' . session('locale')) }}">
                            {{ __('Blog') }}
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
            <form action="{{ route('admin.blog.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="form-floating my-3">
                                <input class="form-control" name="title_{{ $language }}" id="title"
                                    placeholder="{{ __('Title') }}" type="text"
                                    value="{{ $article->getTranslation('title', $language) }}" required />
                                <label class="form-label text-white-50" for="title">
                                    {{ __('Title') }}
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="description">
                                    {{ __('Description') }}
                                </label>
                                <textarea class="form-control" placeholder="{{ __('Description') }}" id="description"
                                    name="description_{{ $language }}">{{ $article->getTranslation('description', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="keywords">
                                    {{ __('Keywords') }}
                                </label>
                                <textarea class="form-control" placeholder="{{ __('Keywords') }}" id="keywords" name="keywords_{{ $language }}">{{ $article->getTranslation('keywords', $language) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="text">
                                    {{ __('Text') }}
                                </label>
                                <textarea class="form-control ckeditor" placeholder="{{ __('Text') }}" id="text"
                                    name="text_{{ $language }}">{!! $article->getTranslation('text', $language) !!}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label text-white-50" for="date">
                                @lang('Date')
                            </label>
                            <input type="date" class="form-control" placeholder="@lang('Date')" id="date"
                                name="date" value="{{ $article->date }}" />
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="status" id="status" value="1"
                                @checked($article->status) />
                            <label class="form-check-label text-white-50" for="status">
                                {{ __('Status') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="category_id" class="form-label text-white-50">
                                {{ __('Category') }}
                            </label>
                            <select name="category_id" id="category_id" class="w-100">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($category->id === $article->category_id)>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="bg_status" id="bg_status"
                                value="1" @checked($article->bg_status) />
                            <label class="form-check-label text-white-50" for="bg_status">
                                {{ __('Background Image Status') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-white-50">
                        {{ __('Image') }}
                    </label>
                    <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/blog/' . $article->image) }}" />
                </div>
                <div class="mb-3">
                    <label for="background" class="form-label text-white-50">
                        {{ __('Background Image') }}
                    </label>
                    <input type="file" name="background" id="background" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/blog/' . $article->background) }}" />
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
    <script src="{{ asset('back/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
        $("#category_id").select2();

        function createCKEditor(id) {
            CKEDITOR.replace(id, {
                extraAllowedContent: 'div',
                height: 150,
            });
        }

        const ckeditor1 = createCKEditor('ckeditor');
    </script>
@endsection
