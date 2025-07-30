<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dulichvivu - Đăng nhập vào hệ thống </title>

    @include('layout.partials.css')

</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('checkLogin') }}" method="post">
                        @csrf
                        <h1>Đăng nhập hệ thống</h1>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required=""
                                value="{{ old('email') }}" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu"
                                required="" value="{{ old('password') }}" />
                        </div>
                        <div>
                            <button class="btn btn-info submit" type="submit">Đăng nhập</button>
                            <a class="reset_pass" href="#">Quên mật khẩu?</a>
                        </div>
                        <div class="separator mt-5">
                            <br />
                            <div>
                                <h1><i class="fa fa-paw"></i> Dulichvivu</h1>
                                <p>©2016 All Rights Reserved. Dulichvivu!</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

</body>

</html>
