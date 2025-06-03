<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from webtendtheme.net/html/2024/ravelo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 09:26:27 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dulichvivu - @yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('client/images/logos/favicon.png') }}" type="image/x-icon">
    {{-- <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet"> --}}

    @include('client.layout.partials.css')

</head>

<body>
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="custom-loader"></div>
        </div>

        
        <!-- Main Header -->
        @include('client.layout.partials.header')

        <!-- Banner Search -->
        @yield('banner')

        <!-- Search -->
        @yield('search')

        <!-- Content -->
        @yield('content')


        <!-- Footer Area start -->
        @include('client.layout.partials.footer')

    </div>
    <!--End pagewrapper-->

    @include('client.layout.partials.js')

</body>

<!-- Mirrored from webtendtheme.net/html/2024/ravelo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 09:27:04 GMT -->

</html>