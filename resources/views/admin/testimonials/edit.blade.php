@extends('admin.layouts.master')
@section('title', __('Edit testimonial'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/css/samples.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" />
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
                        <a href="{{ route('admin.testimonials.index_' . session('locale')) }}">
                            @lang('Testimonials')
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
            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="form-floating my-3">
                                <input class="form-control" name="name_{{ $language }}" id="name"
                                    placeholder="@lang('Name')" type="text"
                                    value="{{ $testimonial->getTranslation('name', $language) }}" />
                                <label class="form-label text-white-50" for="name">
                                    @lang('Name')
                                </label>
                            </div>
                            <div class="form-floating my-3">
                                <input class="form-control" name="position_{{ $language }}" id="position"
                                    placeholder="@lang('Position')" type="text"
                                    value="{{ $testimonial->getTranslation('position', $language) }}" />
                                <label class="form-label text-white-50" for="position">
                                    @lang('Position')
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="text">
                                    @lang('Text')
                                </label>
                                <textarea class="form-control ckeditor" placeholder="@lang('Text')" id="text" name="text_{{ $language }}">{!! $testimonial->getTranslation('text', $language) !!}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1"
                        @checked($testimonial->status) />
                    <label class="form-check-label text-white-50" for="status">
                        @lang('Status')
                    </label>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-white-50">
                        @lang('Image')
                    </label>
                    <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/testimonials/' . $testimonial->image) }}" />
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
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('back/ckeditor/samples/js/sample.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
        CKEDITOR.replace('ckeditor', {
            extraAllowedContent: 'div',
            height: 150,
        });
    </script>
@endsection
