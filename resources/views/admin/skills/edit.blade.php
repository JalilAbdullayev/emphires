@extends('admin.layouts.master')
@section('title', __('Edit skill'))
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
                        <a href="{{ route('admin.skills.index_' . session('locale')) }}">
                            @lang('Skills')
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
            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="form-floating my-3">
                                <input class="form-control" name="title_{{ $language }}" id="title"
                                    placeholder="@lang('Title')" type="text"
                                    value="{{ $skill->getTranslation('title', $language) }}" />
                                <label class="form-label text-white-50" for="title">
                                    @lang('Title')
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-floating my-3">
                        <input class="form-control" name="percent" id="percent" placeholder="@lang('Percent')"
                            type="number" value="{{ $skill->percent }}" required min="0" max="100" />
                        <label class="form-label text-white-50" for="percent">
                            @lang('Percent')
                        </label>
                    </div>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status"
                        @checked($skill->status) value="1" />
                    <label class="form-check-label text-white-50" for="status">
                        @lang('Status')
                    </label>
                </div>
                <button type="submit" class="btn btn-primary float-end">
                    @lang('Update')
                </button>
            </form>
        </div>
    </div>
@endsection
