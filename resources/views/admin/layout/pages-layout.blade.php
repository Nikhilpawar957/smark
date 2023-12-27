<html lang="en">

<head>
    <!-- Page Title -->
    <title>@yield('pageTitle')</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('assets/src/img/favicon.ico') }} />
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('assets/src/img/favicon.ico') }} />
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('assets/src/img/favicon.ico') }} />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/styles/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/src/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('styles')    <link rel="stylesheet" href="{{ asset('assets/vendors/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/styles/custom.css') }}" />

    <style>
        .error-text {
            color: red !important;
        }
    </style>


</head>

<body>
    {{-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="{{ asset('assets/vendors/images/deskapp-logo.svg') }}" alt="Smarkerz" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div> --}}

    @include('admin.layout.inc.sidebar')

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#filter").click(function() {
                $(".filter-box").slideToggle("slow");
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
