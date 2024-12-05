<!DOCTYPE html>
<html lang="en" data-bs-theme="dark"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> {{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">

    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <!--end::Fonts-->

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">


    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css">
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('backend/css/adminlte.css') }}">
    <!--end::Required Plugin(AdminLTE)-->

    <style>
        a {
            text-decoration: none;
            color: inherit;

        }

        .dropdown-menu a {
            border-bottom: 1px solid #c4c4c4;
            padding: 2px
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @yield('css')

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <!--begin::App Wrapper-->
    <div class="app-wrapper">

        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body">
            <!--begin::Container-->
            <div class="container-fluid">

                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>
                <!--end::Start Navbar Links-->

                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">

                    <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                        </a>
                    </li>
                    <!--end::Fullscreen Toggle-->

                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu d-flex align-items-center">
                        <form action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                            <a href="javascript:void(0)" class="logout" style="cursor: pointer; font-size: 20px;">
                                <i class="bi bi-box-arrow-right"></i>
                            </a>
                        </form>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->


        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">

            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">

                <a href="{{ route('dashboard.profile') }}" class="brand-link">
                    <img src="{{ !empty(Auth::user()->image) ? asset('images/' . Auth::user()->image) : Avatar::create('Anik')->toBase64() }}"
                        alt="Auth::user()->image" class="brand-image opacity-75 shadow rounded-5">

                    <span class="brand-text fw-light">{{ Auth::user()->name ?? 'Alexander Pierce' }}</span>
                </a>

            </div>
            <!--end::Sidebar Brand-->


            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">

                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                                class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>DASHBOARD</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.service.index') }}"
                                class="nav-link {{ Route::is('dashboard.service.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>SERVICES</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.project.index') }}"
                                class="nav-link {{ Route::is('dashboard.project.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>PROJECT</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.skill.index') }}"
                                class="nav-link {{ Route::is('dashboard.skill.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>SKILL</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.education.index') }}"
                                class="nav-link {{ Route::is('dashboard.education.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>EDUCATION</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.experiance.index') }}"
                                class="nav-link {{ Route::is('dashboard.experiance.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>EXPERIANCE</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.banner.index') }}"
                                class="nav-link {{ Route::is('dashboard.banner.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>Banner</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('dashboard.footer.index') }}"
                                class="nav-link {{ Route::is('dashboard.footer.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle text-info"></i>
                                <p>Footer</p>
                            </a>
                        </li>

                    </ul>
                    <!--end::Sidebar Menu-->

                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->


        <!--begin::App Main-->
        <main class="app-main">

            <!--begin::breadcrumb-->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('breadcrumb')</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::breadcrumb-->

            <!--begin::App Content-->
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
        <!--begin::Footer-->

        <footer class="app-footer">
            <strong>DEVELOPED BY ANIK</strong>
        </footer>

    </div>
    <!--end::App Wrapper-->


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

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
    <script src="{{ asset('backend/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)-->

    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->

    <script>
        $(document).ready(function() {
            // Sidebar toggle
            $(".logout").on("click", function() {
                Swal.fire({
                    title: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest("form").submit();
                    }
                });
            })
        })
    </script>

    @yield('script')

    @include('layouts.toast')
</body>

</html>
