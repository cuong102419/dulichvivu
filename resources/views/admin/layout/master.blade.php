<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('administrator/images/favicon.ico') }}" type="image/ico" />

    <title>Dulichvivu - @yield('title')</title>

    {{-- Css --}}
    @include('admin.layout.partials.css')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            {{-- Sidebar --}}
            @include('admin.layout.partials.sidebar')

            {{-- Nav top--}}
            @include('admin.layout.partials.nav')

            <!-- page content -->
            @yield('content')
            <!-- /page content -->

            @include('admin.layout.partials.footer')
        </div>
    </div>

    {{-- Js --}}
    @include('admin.layout.partials.js')

</body>

</html>