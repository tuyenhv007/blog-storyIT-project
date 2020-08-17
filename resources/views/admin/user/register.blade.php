<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    @toastr_css
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('form-login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('form-login/css/style.css')}}">
</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Đăng Ký</h2>
                    <form method="POST" class="register-form" id="register-form">
                        @csrf
                        @if($errors->all())
                            <div class="alert alert-danger" role="alert">
                                <strong>Lỗi khi tạo tài khoản!</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name" class="{{ $errors->first('name') ? 'text-danger' : '' }}"><i
                                    class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class="{{ $errors->first('name') ? 'is-invalid' : '' }}" name="name"
                                   id="name" placeholder="Tên" required value="{{ old('name') }}"/>
                            @if($errors->first('name'))
                                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email {{ $errors->first('email') ? 'text-danger' : '' }}"></i></label>
                            <input type="email" class="{{ $errors->first('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Email" required value="{{ old('email') }}"/>
                            @if($errors->first('email'))
                                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock {{ $errors->first('pass') ? 'text-danger' : '' }}"></i></label>
                            <input type="password" class="{{ $errors->first('pass') ? 'is-invalid' : '' }}" name="pass" id="pass" placeholder="Mật khẩu" required />
                            @if($errors->first('pass'))
                                <p class="alert alert-danger">{{ $errors->first('pass') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline {{ $errors->first('re_pass') ? 'text-danger' : '' }}"></i></label>
                            <input type="password" class="{{ $errors->first('re_pass') ? 'is-invalid' : '' }}" name="re_pass" id="re_pass" placeholder="Nhập lại mật khẩu"
                                   required />
                            @if($errors->first('re_pass'))
                                <p class="alert alert-danger">{{ $errors->first('re_pass') }}</p>
                            @endif
                        </div>
                        <div class="form-group form-button">
                            <button class="btn btn-info" type="submit">Đăng ký</button>
                            <a class="btn btn-secondary" href="">Hủy bỏ</a>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="{{ route('login.index') }}" class="signup-image-link">Đăng nhập tại đây</a>
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{ asset('form-login/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('form-login/js/main.js') }}"></script>
@jquery
@toastr_js
@toastr_render
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
