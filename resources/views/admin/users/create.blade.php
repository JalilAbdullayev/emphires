@extends('admin.layouts.master')
@section('title', __('New user'))
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
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
                        <a href="{{ route('admin.users.index_' . session('locale')) }}">
                            @lang('Users')
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        @yield('title')
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <form class="card" method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="@lang('Name')"
                    maxlength="255" required />
                <label for="name" class="form-label text-white-50">
                    @lang('Name')
                </label>
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="@lang('Email')"
                    maxlength="255" required />
                <label for="email" class="form-label text-white-50">
                    @lang('Email')
                </label>
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="@lang('Password')"
                    maxlength="255" required autocomplete="new-password" />
                <label for="password" class="form-label text-white-50">
                    @lang('Password')
                </label>
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password_confirmation" id="password-confirm"
                    placeholder="@lang('Confirm Password')" required maxlength="255" autocomplete="new-password" />
                <label for="password-confirm" class="form-label text-white-50">
                    @lang('Confirm Password')
                </label>
            </div>
            @error('password_confirm')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn w-100 btn-success text-white">
                @lang('Create')
            </button>
        </div>
    </form>
@endsection
