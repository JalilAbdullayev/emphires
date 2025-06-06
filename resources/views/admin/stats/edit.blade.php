@extends('admin.layouts.master')
@section('title', __('Edit stat'))
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
                        <a href="{{ route('admin.stats.index_' . session('locale')) }}">
                            @lang('Stats')
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
            <form action="{{ route('admin.stats.update', $stat->id) }}" method="POST">
                @csrf
                <div class="tab-content tabcontent-border">
                    @foreach ($languages as $language)
                        <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}" role="tabpanel">
                            <div class="form-floating my-3">
                                <input class="form-control" name="name_{{ $language }}" id="name"
                                       placeholder="@lang('Name')" type="text"
                                       value="{{ $stat->getTranslation('name', $language) }}"/>
                                <label class="form-label text-white-50" for="title">
                                    @lang('Name')
                                </label>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-floating my-3">
                        <input class="form-control" name="count" id="count" placeholder="@lang('Count')"
                               type="number" value="{{ $stat->count }}" required min="1"/>
                        <label class="form-label text-white-50" for="count">
                            @lang('Count')
                        </label>
                    </div>
                </div>
                <div class="form-check form-switch mb-3">
                    <input type="checkbox" class="form-check-input" name="status" id="status"
                           @checked($stat->status) value="1"/>
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
