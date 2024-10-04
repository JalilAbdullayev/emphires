@php use Illuminate\Support\Facades\Route;@endphp
    <!DOCTYPE html>
<html lang="{{ Str::replace('_', '-', App::getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $settings->favicon) }}"/>
    <title>
        @yield('title', $settings->title)
    </title>
    <link rel="stylesheet" href="{{ asset('back/node_modules/morrisjs/morris.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/node_modules/toast-master/css/jquery.toast.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/css/style.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('back/css/pages/dashboard1.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet"/>
    @yield('css')
</head>
<body class="skin-green-dark fixed-layout">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">
            {{ $settings->title }}
        </p>
    </div>
</div>
<!-- Main wrapper - style you can find in pages.scss -->
<div id="main-wrapper">
    <!-- Topbar header - style you can find in pages.scss -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <!-- Logo -->
            <div class="navbar-header d-flex justify-content-center align-items-center">
                <a class="navbar-brand d-inline-block" href="{{ route('admin.index') }}" style="width: 30%">
                    <!-- Light Logo text -->
                    <img src="{{ asset('storage/' . $settings->logo) }}" class="light-logo w-100"
                         alt="{{ $settings->title }}"/>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav me-auto">
                    <!-- This is  -->
                    <li class="nav-item">
                        <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                           href="javascript:void(0)">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                           href="javascript:void(0)">
                            <i class="icon-menu"></i>
                        </a>
                    </li>
                </ul>
                <div class="dropdown pe-5 me-5">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        {{ __(session('locale')) }}
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($langs as $lang)
                            <li>
                                <a class="dropdown-item" href="{{ $lang['url'] }}">
                                    {{ __($lang['code']) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Topbar header -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    @include('admin.layouts.sidebar')
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Container fluid  -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- End Container fluid  -->
    </div>
    <!-- End Page wrapper  -->
    <!-- footer -->
    <footer class="footer">
        © {{ '2019 -' . date('Y') }}
        <a target="_blank" href="{{ route('home') }}">
            {{ $settings->title }}
        </a>
    </footer>
    <!-- End footer -->
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
<script src="{{ asset("back/node_modules/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{ asset("back/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset("back/js/perfect-scrollbar.jquery.min.js") }}"></script>
<!--Wave Effects -->
<script src="{{ asset("back/js/waves.js") }}"></script>
<!--Menu sidebar -->
<script src="{{ asset("back/js/sidebarmenu.js") }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset("back/js/custom.min.js") }}"></script>
<!-- This page plugins -->
<!--morris JavaScript -->
<script src="{{ asset("back/node_modules/raphael/raphael-min.js") }}"></script>
<script src="{{ asset("back/node_modules/morrisjs/morris.min.js") }}"></script>
<script src="{{ asset("back/node_modules/jquery-sparkline/jquery.sparkline.min.js") }}"></script>
<!-- Chart JS -->
<script src="{{ asset("back/js/dashboard1.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })

    function successAlert(message) {
        Swal.fire({
            icon: 'success',
            timer: 1500,
            background: '#303641',
            timerProgressBar: true,
            title: message,
        })
    }

    function errorAlert(message) {
        Swal.fire({
            icon: 'error',
            @unless(Route::is('admin.users.create') || Route::is('admin.users.edit')) timer: 1500, @endunless
            background: '#303641',
            timerProgressBar: true,
            title: message,
        })
    }

    function deletePrompt(route) {
        $('.btn-outline-danger').click(function() {
            let id = $(this).closest('tr').attr('id');
            Swal.fire({
                title: '{{ __('Are you sure')}}?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6F42C1',
                cancelButtonColor: '#F62D51',
                confirmButtonText: 'Bəli, Sil',
                cancelButtonText: 'Xeyr, Geri qayıt',
            }).then(result => {
                if(result.isConfirmed) {
                    $.ajax({
                        url: route.replace(':id', id),
                        type: 'POST',
                        data: {
                            _method: 'DELETE'
                        },
                        async: false,
                        success: function() {
                            successAlert(`{{__('Operation successful')}}.`)
                            $('tr#' + id + '').remove();
                        },
                        error: function() {
                            errorAlert(`{{  __('Error while deleting')}}.`)
                        }
                    });
                }
            })
        });
    }

    function statusAlert(route) {
        $('.form-check-input').change(function() {
            let id = $(this).closest('tr').attr('id');
            $.ajax({
                url: route,
                type: "POST",
                async: false,
                data: {
                    id: id
                },
                success: function() {
                    successAlert('{{ __('Status updated')}}.')
                },
                error: function() {
                    errorAlert('{{ __('Error while updating status.') }}.')
                }
            })
        })
    }

    function featured(route) {
        $(document).on('click', '.featured', function() {
            let id = $(this).closest('tr').attr('id');
            let self = $(this);
            $.ajax({
                url: route.replace(':id', id),
                type: "POST",
                async: false,
                data: {
                    _method: 'PUT'
                },
                success: function() {
                    successAlert('Şəkil önə çıxarıldı.')
                    self.removeClass('btn-danger featured').addClass('btn-success featuredImage');
                    $('.featuredImage').not(self).removeClass('btn-success featuredImage').addClass('btn-danger featured');
                    self.find('i').removeClass('mdi-star-outline').addClass('mdi-star');
                    $('.featured').not(self).find('i').removeClass('mdi-star').addClass('mdi-star-outline');
                },
                error: function() {
                    errorAlert('Şəkil önə çıxarılarkən xəta baş verdi.')
                }
            })
        })
    }

    function deleteImage(route) {
        deletePrompt('şəkli', route, 'Şəkil')
    }

    @if(session('success'))
    successAlert('{{ session('success') }}');
    @elseif(session('error'))
    errorAlert('{{ session('error') }}')
    @endif

    $(document).ready(function() {
        $('#sortable-tbody').sortable({
            group: {
                pull: true,
                put: true
            },
            animation: 200,
            ghostClass: 'ghost',
            items: '#sortable-tbody tr',
            handle: '#sortable-tbody tr',
            multiDrag: true,
            avoidImplicitDeselect: true,
            onEnd: function(evt) {
                let allRows = $('#sortable-tbody tr');
                let activeOrderData = [];
                let orderData = [];

                let dataIndexArray = [];

                $(allRows).each(function(index, element) {
                    dataIndexArray.push($(element).data('order'));
                });
                dataIndexArray = dataIndexArray.sort((a, b) => a - b);
                allRows.each(function(index, element) {
                    let newIndex = dataIndexArray[index];
                    $(element).attr('data-order', newIndex);
                });
                $(allRows).each(function(index, element) {
                    let id = $(element).data('id');
                    let order = dataIndexArray[index];
                    let obj = {
                        id: id,
                        order: order,
                    }
                    orderData.push(obj);
                });
                saveOrderFunction($('#sortable-tbody').data('route'), orderData)
            },
        });


        function saveOrderFunction(route, orderData) {
            $.ajax({
                url: route,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    data: orderData
                }),
                success: function() {
                    successAlert('Sıra uğurla dəyidirildi.')
                },
                error: function() {
                    errorAlert('Sıra dəyişdirilərkən xəta baş verdi.')
                }
            });
        }
    })
</script>
@yield('js')
</body>
</html>
