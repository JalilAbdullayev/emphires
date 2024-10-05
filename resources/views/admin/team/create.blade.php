@extends('admin.layouts.master')
@section('title', __('New member'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}"/>
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
                        <a href="{{ route('admin.team.index_' . session('locale')) }}">
                            {{ __('Team') }}
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
            <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="form-floating my-3">
                                <input class="form-control" name="name_{{ $language }}" id="name" type="text"
                                       placeholder="{{ __('Name')}}"/>
                                <label class="form-label text-white-50" for="name">
                                    {{ __('Name')}}
                                </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="position_{{ $language }}" id="position" type="text"
                                       placeholder="{{ __('Position')}}"/>
                                <label class="form-label text-white-50" for="position">
                                    {{ __('Position')}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="facebook" id="facebook" placeholder="Facebook" type="url"/>
                    <label class="form-label text-white-50" for="facebook">
                        Facebook
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="twitter" id="twitter" placeholder="Twitter / X" type="url"/>
                    <label class="form-label text-white-50" for="twitter">
                        Twitter / X
                    </label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="linkedin" id="linkedin" placeholder="LinkedIn" type="url"/>
                    <label class="form-label text-white-50" for="linkedin">
                        LinkedIn
                    </label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1"/>
                    <label class="form-check-label text-white-50" for="status">
                        {{  __('Status')}}
                    </label>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-white-50">
                        {{ __('Image')}}
                    </label>
                    <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                           accept="image/*"/>
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    {{ __('Create') }}
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
