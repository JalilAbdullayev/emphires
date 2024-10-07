@extends('admin.layouts.master')
@section('title', __('Qualities'))
@section('css')
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}" />
@endsection
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
                    <li class="breadcrumb-item active">
                        @yield('title')
                    </li>
                </ol>
                <a href="{{ route('admin.whyus.create_' . session('locale')) }}"
                    class="btn btn-success d-none d-lg-block m-l-15 text-white">
                    <i class="ti-plus"></i> @lang('New advantage')
                </a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="table-responsive">
        <table id="myTable" class="table table-striped border">
            <thead>
                <tr>
                    <th>
                        @lang('Title')
                    </th>
                    <th>
                        @lang('Status')
                    </th>
                    <th>
                        @lang('Icon')
                    </th>
                    <th>
                        @lang('Actions')
                    </th>
                </tr>
            </thead>
            <tbody id="sortable-tbody" data-route="{{ route('admin.whyus.sort') }}">
                @foreach ($reasons as $reason)
                    <tr id="{{ $reason->id }}" data-id="{{ $reason->id }}" data-order="{{ $reason->order }}">
                        <td>
                            {{ $reason->title }}
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" @checked($reason->status) class="form-check-input" />
                            </div>
                        </td>
                        <td>
                            {!! $reason->icon !!}
                        </td>
                        <td>
                            <a href="{{ route('admin.whyus.edit_' . session('locale'), $reason->id) }}"
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
@endsection
@section('js')
    <script src="{{ asset('back/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        deletePrompt('{{ route('admin.whyus.delete', ':id') }}')
        statusAlert('{{ route('admin.whyus.status') }}')
    </script>
@endsection
