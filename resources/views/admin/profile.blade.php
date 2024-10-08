@php use Illuminate\Support\Facades\Auth;@endphp
@extends('admin.layouts.master')
@section('title', __('Profile'))
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">
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
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30">
                        <h4 class="card-title m-t-10">
                            {{ Auth::user()->name }}
                        </h4>
                    </center>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body"><small class="text-muted">@lang('Email address') </small>
                    <h6>
                        {{ Auth::user()->email }}
                    </h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.profile_update') }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name" class="col-md-12">
                                Ad
                            </label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe" name="name" required autofocus
                                    autocomplete="name" value="{{ Auth::user()->name }}" id="name"
                                    class="form-control form-control-line" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12">
                                E-mail
                            </label>
                            <div class="col-md-12">
                                <input type="email" placeholder="johnathan@admin.com"
                                    class="form-control form-control-line" name="email" value="{{ Auth::user()->email }}"
                                    id="email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success text-white">
                                    @lang('Save changes')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-danger w-100" href="{{ route('admin.profile.delete') }}">
                        @lang('Delete Account')
                    </a>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
@endsection
