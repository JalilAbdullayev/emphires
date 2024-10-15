@extends('admin.layouts.master')
@section('title', __('Stats'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}"/>
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
                    <ul class="nav nav-tabs customtab2" role="tablist">
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
                    <form action="{{ route('admin.stats.store') }}" method="POST">
                        @csrf
                        <div class="tab-content">
                            @foreach ($languages as $language)
                                <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}"
                                     role="tabpanel">
                                    <div class="form-floating my-3">
                                        <input class="form-control" name="name_{{ $language }}" id="name"
                                               placeholder="@lang('Name')" type="text"/>
                                        <label class="form-label text-white-50" for="name">
                                            @lang('Name')
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-floating my-3">
                                <input class="form-control" name="count" id="count" placeholder="@lang('Count')"
                                       type="number" required min="1"/>
                                <label class="form-label text-white-50" for="count">
                                    @lang('Count')
                                </label>
                            </div>
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
                            @lang('Name')
                        </th>
                        <th>
                            @lang('Count')
                        </th>
                        <th>
                            @lang('Status')
                        </th>
                        <th>
                            @lang('Actions')
                        </th>
                    </tr>
                    </thead>
                    <tbody id="sortable-tbody" data-route="{{ route('admin.stats.sort') }}">
                    @foreach ($stats as $stat)
                        <tr id="{{ $stat->id }}" data-id="{{ $stat->id }}" data-order="{{ $stat->order }}">
                            <td>
                                {{ $stat->name }}
                            </td>
                            <td>
                                {{ $stat->count }}
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" @checked($stat->status) class="form-check-input"/>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.stats.edit_' . session('locale'), $stat->id) }}"
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
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        deletePrompt('{{ route('admin.stats.delete', ':id') }}')
        statusAlert('{{ route('admin.stats.status') }}')
    </script>
@endsection
