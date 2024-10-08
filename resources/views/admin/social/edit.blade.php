@extends('admin.layouts.master')
@section('title', __('Edit social media'))
@section('css')
    <link href="{{ asset('back/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
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
                        <a href="{{ route('admin.social.index_' . session('locale')) }}">
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
            <form action="{{ route('admin.social.update', $social->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating my-3">
                    <input class="form-control" name="url" id="link" placeholder="@lang('Link')" type="url"
                        value="{{ $social->url }}" required />
                    <label class="form-label text-white-50" for="link">
                        @lang('Link')
                    </label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status"
                        @checked($social->status) value="1" />
                    <label class="form-check-label text-white-50" for="status">
                        @lang('Status')
                    </label>
                </div>
                <div class="mb-3">
                    <label for="icon" class="form-label text-white-50">
                        İkon
                    </label>
                    <select name="icon" id="icon" class="w-100">
                        @foreach ($icons as $icon)
                            <option value="{{ $icon['icon'] }}" @selected($social->icon === $icon['icon'])>
                                {{ $icon['title'] }}
                            </option>
                        @endforeach
                    </select>
                    <div id="icon-preview" class="my-3"></div>
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    @lang('Update')
                </button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('back/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $("#icon").select2();
        $(document).ready(function() {
            var iconClass = $('#icon').val();
            $('#icon-preview').html(iconClass).addClass('fs-1');
            $('#icon').change(function() {
                iconClass = $(this).val();
                $('#icon-preview').html(iconClass).addClass('fs-1');
            });
        });
    </script>
@endsection
