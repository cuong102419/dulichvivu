<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lỗi</title>

    @include('layout.partials.css')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="col-md-12">
                <div class="col-middle">
                    <div class="text-center text-center">
                        <h1 class="error-number">404</h1>
                        <h2>Xin lỗi chúng tôi không thể tìm thấy trang này</h2>
                        <p>Trang này bạn đang tìm kiếm không tồn tại?
                        </p>
                        <a href="{{ route('dashboard') }}" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>  Trở về trang chính</a>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    @include('layout.partials.js')
</body>

</html>