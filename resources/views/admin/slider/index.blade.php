@extends('admin.layouts.master')
@section('title', __('Slider'))
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
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        @yield('title')
                    </li>
                </ol>
                <a href="{{ route('admin.slider.create_' . session('locale')) }}"
                    class="btn btn-success d-none d-lg-block m-l-15 text-white">
                    <i class="ti-plus"></i> {{ __('New slide') }}
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
                        {{ __('Title') }}
                    </th>
                    <th>
                        {{ __('Status') }}
                    </th>
                    <th>
                        {{ __('Image') }}
                    </th>
                    <th>
                        {{ __('Actions') }}
                    </th>
                </tr>
            </thead>
            <tbody id="sortable-tbody" data-route="{{ route('admin.slider.sort') }}">
                @foreach ($slides as $slide)
                    <tr id="{{ $slide->id }}" data-id="{{ $slide->id }}" data-order="{{ $slide->order }}">
                        <td>
                            {!! $slide->title !!}
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" @checked($slide->status) class="form-check-input" />
                            </div>
                        </td>
                        <td>
                            <img src="{{ asset('storage/slider/' . $slide->image) }}" alt="" class="w-25" />
                        </td>
                        <td>
                            <a href="{{ route('admin.slider.edit_' . session('locale'), $slide->id) }}"
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
        deletePrompt('{{ route('admin.slider.delete', ':id') }}')
        statusAlert('{{ route('admin.slider.status') }}')
    </script>
@endsection
