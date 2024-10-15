@extends('admin.layouts.master')
@section('title', __('Home'))
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
                    <li class="breadcrumb-item active">
                        @yield('title')
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Bread crumb -->
    <div class="row g-0">
        <div class="col-lg-3 col-md-6">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-envelope"></i></h3>
                                    <p class="text-muted text-uppercase">
                                        @lang('Messages')
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <h2 class="counter text-primary">
                                        {{ $messages }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="mdi mdi-school"></i></h3>
                                    <p class="text-muted text-uppercase">
                                        @lang('Courses')
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <h2 class="counter text-cyan">
                                        {{ $courses }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-doc"></i></h3>
                                    <p class="text-muted text-uppercase">
                                        @lang('ARTICLES')
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <h2 class="counter text-purple">
                                        {{ $blog }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-briefcase"></i></h3>
                                    <p class="text-muted text-uppercase">
                                        @lang('Services')
                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <h2 class="counter text-success">
                                        {{ $services }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
