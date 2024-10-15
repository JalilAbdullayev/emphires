@extends('admin.layouts.master')
@section('title', __('New advantage'))
@section('css')
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
                        <a href="{{ route('admin.whyus.index_' . session('locale')) }}">
                            @lang('Who are we')
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
            <form action="{{ route('admin.whyus.store') }}" method="POST">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="form-floating my-3">
                                <input class="form-control" name="title_{{ $language }}" id="title" placeholder="@lang('Title')"
                                    type="text" required />
                                <label class="form-label text-white-50" for="title">
                                    @lang('Title')
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-white-50" for="description">
                                    @lang('Description')
                                </label>
                                <textarea class="form-control ckeditor" placeholder="@lang('Description')" id="description"
                                    name="description_{{ $language }}"></textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-floating my-3">
                    <input class="form-control" name="icon" id="icon" placeholder="@lang('Icon')"
                        type="text" maxlength="255" />
                    <label class="form-label text-white-50" for="icon">
                        @lang('Icon')
                    </label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" />
                    <label class="form-check-label text-white-50" for="status">
                        @lang('Status')
                    </label>
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    @lang('Create')
                </button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('back/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('back/ckeditor/samples/js/sample.js') }}"></script>
    <script>
        function createCKEditor(id) {
            CKEDITOR.replace(id, {
                extraAllowedContent: 'div',
                height: 150,
            });
        }

        const ckeditor1 = createCKEditor('ckeditor');
    </script>
@endsection
