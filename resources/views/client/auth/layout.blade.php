<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>

    @include('client.layout.partials.css')

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="{{ asset('client/login/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('client/login/css/style.css')}}">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="custom-loader"></div>
    </div>
    
    @include('client.layout.partials.header')

    <div class="login-template">
        <div class="main">
            @yield('content')
        </div>
    </div>
    @include('client.layout.partials.footer')
    @include('client.layout.partials.js')
</body>

</html>