@extends('client.auth.layout')

@section('content')
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Đăng ký</h2>
                    <form method="POST" class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="username_register"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name_register" id="name_register" required  placeholder="Họ tên" />
                        </div>
                        <div class="invalid-feedback" style="margin-top:-15px" id="validate_name"></div>
                        <div class="form-group">
                            <label for="email_register"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email_register" id="email_register" required placeholder="Email" />
                        </div>
                        <div class="invalid-feedback" style="margin-top:-15px" id="validate_email"></div>
                        <div class="form-group">
                            <label for="password_register"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="pass_register" id="pass_register" required placeholder="Mật khẩu" />
                        </div>
                        <div class="invalid-feedback" style="margin-top:-15px" id="validate_pass"></div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" required placeholder="Nhập lại mật khẩu" />
                        </div>
                        <div class="invalid-feedback" style="margin-top:-15px" id="validate_repass"></div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký" />
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{ asset('client/login/images/signup-image.jpg') }}" alt="sing up image"></figure>
                    <a href="{{ route('login') }}" class="signup-image-link">Tôi đã có tài khoản</a>
                </div>
            </div>
        </div>
    </section>
@endsection