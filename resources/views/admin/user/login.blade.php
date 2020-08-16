<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <base href="{{ asset('') }}">
    @toastr_css
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
          crossorigin="anonymous"/>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="{{ route('register.index') }}" class="signup-image-link">Tạo mới tài khoản</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Đăng Nhập</h2>
                    <form method="POST" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Ghi nhớ tài
                                khoản</label>
                        </div>
                        <div class="form-group form-button">
                            <button class="btn btn-info">Đăng nhập</button>
                        </div>
                        @if(\Illuminate\Support\Facades\Session::get('message'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Sai tên đăng nhập hoặc mật khẩu !</strong>
                            </div>
                            <?php
                            \Illuminate\Support\Facades\Session::put('message', null);
                            ?>
                        @endif
                    </form>
                    <div class="social-login">
                        <span class="social-label">Hoặc đăng nhập bằng</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
@jquery
@toastr_js
@toastr_render
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
