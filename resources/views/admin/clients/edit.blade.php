@extends('admin.layouts.master')
@section('title', __('Edit client'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}" />
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
                        <a href="{{ route('admin.clients.index_' . session('locale')) }}">
                            @lang('Clients')
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
            <!-- Tab panes -->
            <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating my-3">
                    <input class="form-control" name="url" id="link" placeholder="@lang('Link')" type="url"
                        value="{{ $client->url }}" required />
                    <label class="form-label text-white-50" for="link">
                        @lang('Link')
                    </label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status"
                        @checked($client->status) value="1" />
                    <label class="form-check-label text-white-50" for="status">
                        @lang('Status')
                    </label>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-white-50">
                        @lang('Image')
                    </label>
                    <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                        accept="image/*" data-default-file="{{ asset('storage/clients/' . $client->image) }}" required />
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
