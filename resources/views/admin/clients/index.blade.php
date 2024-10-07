@extends('admin.layouts.master')
@section('title', __('Clients'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/node_modules/dropify/dist/css/dropify.min.css') }}" />
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
                    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating my-3">
                            <input class="form-control" name="url" id="url" placeholder="@lang('Link')"
                                type="url" />
                            <label class="form-label text-white-50" for="url">
                                @lang('Link')
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label text-white-50">
                                @lang('Image')
                            </label>
                            <input type="file" name="image" id="image" class="dropify" data-show-remove="false"
                                accept="image/*" required />
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
                                @lang('Image')
                            </th>
                            <th>
                                @lang('Status')
                            </th>
                            <th>
                                @lang('Actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody id="sortable-tbody" data-route="{{ route('admin.clients.sort') }}">
                        @foreach ($clients as $client)
                            <tr id="{{ $client->id }}" data-id="{{ $client->id }}" data-order="{{ $client->order }}">
                                <td>
                                    <a href="{{ $client->url }}" class="text-success">
                                        {{ $client->url }}
                                    </a>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/clients/' . $client->image) }}" alt=""
                                        class="w-25" />
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" @checked($client->status) class="form-check-input" />
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.clients.edit_' . session('locale'), $client->id) }}"
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
    <script src="{{ asset('back/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        $(document).ready(function() {
            $('.dropify').dropify();
        });
        deletePrompt('{{ route('admin.clients.delete', ':id') }}')
        statusAlert('{{ route('admin.clients.status') }}')
    </script>
@endsection
