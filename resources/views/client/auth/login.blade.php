@extends('client.auth.layout')

@section('content')
    <!-- Sing in  Form -->
    <section class="sign-in show">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{ asset('client/login/images/signin-image.jpg') }}" alt="sing up image">
                    </figure>
                    <a href="{{ route('signup') }}" class="signup-image-link">Tạo tài khoản</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Đăng nhập</h2>
                    <form action="{{ route('login.check') }}" method="POST" class="login-form" id="login-form" style="margin-top: 15px">
                        <div class="form-group">
                            <label for="email_login"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email_login" id="email_login" placeholder="Email"
                                required />
                        </div>
                        <div class="invalid-feedback" style="margin-top:-15px" id="validate_email"></div>
                        @csrf
                        <div class="form-group">
                            <label for="password_login"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password_login" id="password_login" placeholder="Mật khẩu"
                                required />
                        </div>
                        <div class="invalid-feedback" style="margin-top:-15px" id="validate_password"></div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Đăng nhập" />
                        </div>
                    </form>
                    <div class="social-login">
                        <p class="social-label">Hoặc đăng nhập bằng</p>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href=""><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection