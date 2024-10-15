@extends('admin.layouts.master')
@section('title', __('Categories'))
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
                            {{ __('Home') }}
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
                    <x-admin.form-lang-switch/>
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="tab-content">
                            @foreach($languages as $language)
                                <div @class(['tab-pane', 'active' => $loop->first]) id="{{ $language }}"
                                     role="tabpanel">
                                    <div class="form-floating my-3">
                                        <input class="form-control" name="title_{{ $language }}" id="title"
                                               placeholder="{{ __('Title')}}" type="text"/>
                                        <label class="form-label text-white-50" for="title">
                                            {{ __('Title')}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            {{  __('Create')}}
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
                            {{ __('Title') }}
                        </th>
                        <th>
                            {{ __('Status')}}
                        </th>
                        <th>
                            {{ __('Actions') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody id="sortable-tbody" data-route="{{ route('admin.categories.sort') }}">
                    @foreach($categories as $category)
                        <tr id="{{ $category->id }}" data-id="{{ $category->id }}" data-order="{{ $category->order }}">
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" @checked($category->status) class="form-check-input"/>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.categories.edit_' . session('locale'), $category->id) }}"
                                   class="btn
                                btn-outline-warning">
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
    <script src="{{asset("back/node_modules/datatables.net/js/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("back/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js")}}"></script>
    <script>
        $('#myTable').DataTable({
            ordering: false
        });
        deletePrompt('{{ route('admin.categories.delete', ':id') }}')
        statusAlert('{{ route('admin.categories.status') }}')
    </script>
@endsection
