<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ config('app.name', 'Laravel') }} - Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <!--end::Fonts-->

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css">
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/adminlte.css') }}">
    <!--end::Required Plugin(AdminLTE)-->


    <style>
        a {
            text-decoration: none;
            color: inherit;

        }
    </style>
</head>

<!--begin::Body-->

<body class="register-page bg-body-secondary">
    <div class="register-box" style="overflow: hidden">

        <div class="card rounded-3 border-0" style="overflow: hidden">

            <div class="card-header">
                <div class="sidebar-brand" style="border: none">
                    <a class="brand-link">
                        <span class="brand-text fw-light">LOGIN YOUR ACCOUNT</span>
                    </a>
                </div>
            </div>

            <div class="card-body register-card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">

                            <label class='{{ $errors->has('email') ? 'text-danger' : '' }}'>
                                Email*
                            </label>
                        </div>
                    </div>


                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

                            <label class='{{ $errors->has('password') ? 'text-danger' : '' }}'>
                                Password*
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2 mt-3">Sign In</button>
                </form>

                <a href="{{ route('register') }}" class="link-success text-center">
                    Don't Have a Account
                </a>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>

    <script src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js">
    </script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->

    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <!--end::Required Plugin(Bootstrap 5)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)-->

    @include('layouts.toast')

</body>

</html>
