<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container flex-lg-column">
            <a class="navbar-brand mx-lg-auto mb-lg-4" href="#">
                <span class="h3 fw-bold d-block d-lg-none">
                    {{ empty($user->name) ? 'Anik' : $user->name }}
                </span>
                <img src="{{ empty($user->image) ? Avatar::create('Anik')->toBase64() : asset('images/' . $user->image) }}"
                    class="d-none d-lg-block rounded-circle" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto flex-lg-column text-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.index') }}">Home</a>
                    </li>

                    @if (!Route::is('frontend.projects') && !Route::is('frontend.blogs') && !Route::is('frontend.projects.details'))
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#work">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <!-- //NAVBAR -->


    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('frontend/js/aos.js') }}"></script>

    <script src="{{ asset('frontend/js/main.js') }}"></script>

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
</body>

</html>
