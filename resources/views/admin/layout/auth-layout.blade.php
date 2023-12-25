<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title>@yield('pageTitle')</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('assets/src/img/favicon.ico') }} />
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('assets/src/img/favicon.ico') }} />
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('assets/src/img/favicon.ico') }} />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href={{ asset('assets/vendors/styles/core.css') }} />
    <link rel="stylesheet" href={{ asset('assets/vendors/styles/icon-font.min.css') }} />
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href={{ asset('assets/vendors/styles/style.css') }} />
    <link rel="stylesheet" href={{ asset('assets/vendors/styles/custom.css') }} />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('styles')
</head>

<body>

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src={{ asset('assets/src/img/logo-bg.svg') }} alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title text-center">
                            <img src={{ asset('assets/src/img/logo.png') }} class="login-page-logo">
                            <h2 class="text-center text-primary">Welcome back!</h2>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @stack('scripts')
</body>

</html>
