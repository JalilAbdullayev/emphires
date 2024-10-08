@extends('admin.layouts.master')
@section('title', __('Social media'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}" />
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
                    <li class="breadcrumb-item active">
                        @yield('title')
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- End Bread crumb -->
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.social.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating my-3">
                            <input class="form-control" name="url" id="url" placeholder="@lang('Link')"
                                type="url" />
                            <label class="form-label text-white-50" for="url">
                                @lang('Link')
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label text-white-50">
                                @lang('Icon')
                            </label>
                            <select name="icon" id="icon" class="w-100">
                                @foreach ($icons as $icon)
                                    <option value="{{ $icon['icon'] }}">
                                        {{ $icon['title'] }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="icon-preview" class="my-3"></div>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            @lang('Create')
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="table-responsive">
                <table id="myTable" class="table table-striped border">
                    <thead>
                        <tr>
                            <th>
                                @lang('Link')
                            </th>
                            <th>
                                @lang('Icon')
                            </th>
                            <th>
                                @lang('Status')
                            </th>
                            <th>
                                @lang('Actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody id="sortable-tbody" data-route="{{ route('admin.social.sort') }}">
                        @foreach ($socials as $social)
                            <tr id="{{ $social->id }}" data-id="{{ $social->id }}" data-order="{{ $social->order }}">
                                <td>
                                    <a href="{{ $social->url }}" class="text-success">
                                        {{ $social->url }}
                                    </a>
                                </td>
                                <td>
                                    {!! $social->icon !!}
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" @checked($social->status) class="form-check-input" />
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.social.edit_' . session('locale'), $social->id) }}"
                                        class="btn btn-outline-warning">
                                        <i class="ti-pencil-alt"></i>
                                    </a>
                                    <button class="btn btn-outline-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('back/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('back/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        $("#icon").select2();
        $(document).ready(function() {
            var iconClass = $('#icon').val();
            $('#icon-preview').html(iconClass).addClass('fs-1');
            $('#icon').change(function() {
                iconClass = $(this).val();
                $('#icon-preview').html(iconClass).addClass('fs-1');
            });
        });
        deletePrompt('{{ route('admin.social.delete', ':id') }}')
        statusAlert('{{ route('admin.social.status') }}')
    </script>
@endsection
