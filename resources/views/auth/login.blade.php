<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(Storage::url($settings->favicon)) }}"/>
    <title>
        Giriş
    </title>
    <link rel="stylesheet" href="{{ asset("back/css/pages/login-register-lock.css") }}"/>
    <link rel="stylesheet" href="{{ asset("back/css/style.min.css") }}"/>
</head>
<body class="skin-default card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label"></p>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<section id="wrapper">
    <div class="login-register"
         style="background-image: url({{ asset('back/images/background/login-register.jpg') }});">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h3 class="text-center m-b-20">
                        Giriş
                    </h3>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="E-mail"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                   required placeholder="Şifrə" autocomplete="current-password" name="password"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="customCheck1"
                                           name="remember" {{ old('remember') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="customCheck1">
                                        Xatırla məni
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit">
                                Giriş
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('back/node_modules/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('back/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!--Custom JavaScript -->
<script>
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
