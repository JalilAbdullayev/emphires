@extends('admin.layouts.master')
@section('title', __('Message'))
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
                        <a href="{{ route('admin.messages.index_' . session('locale')) }}">
                            @lang('Messages')
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
            <div class="my-3">
                <label class="form-label text-white-50" for="name">
                    @lang('Name')
                </label>
                <input class="form-control" id="name" type="text" value="{{ $message->name }}" disabled />
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50" for="email">
                    @lang('Email')
                </label>
                <input class="form-control" id="email" type="email" value="{{ $message->email }}" disabled />
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50" for="phone">
                    @lang('Phone')
                </label>
                <input class="form-control" id="phone" type="tel" value="{{ $message->phone }}" disabled />
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50" for="subject">
                    @lang('Subject')
                </label>
                <input class="form-control" id="subject" type="text" value="{{ $message->subject }}" disabled />
            </div>
            <div class="mb-3">
                <label class="form-label text-white-50" for="message">
                    @lang('Message')
                </label>
                <textarea class="form-control" rows="10" id="message" disabled>{{ $message->message }}</textarea>
            </div>
            <a href="mailto:{{ $message->message }}" class="btn btn-success float-end">
                @lang('Answer')
            </a>
        </div>
    </div>
@endsection
