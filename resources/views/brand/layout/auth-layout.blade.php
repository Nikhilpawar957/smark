<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>@yield('pageTitle')</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/front/img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/front/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/front/img/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/front/img/favicon.ico') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,700;1,900&family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/font-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/theme-vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/front/css/responsive.css') }}" />
</head>

<body data-mobile-nav-style="classic">
    <section class="p-0 full-hight">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-sm-12 order-2 order-lg-1 order-md-1">
                    <div class="form-content text-center">
                        <img src="{{ asset('assets/front/img/logo.png') }}" class="form-logo">
                        @yield('content')
                    </div>
                </div>
                <div class="col-12 col-md-6 col-sm-12  p-0 order-1 order-lg-2 order-md-2">
                    <img src="{{ asset('assets/front/img/login-bg.png') }}" class="img-fluid side-image" alt="">
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/theme-vendors.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/js/main.js') }}"></script>
</body>

</html>
