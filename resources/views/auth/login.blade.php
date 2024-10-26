<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config("APP_NAME", "OSS Clinic") }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <img src="{{ asset('images/small_logo.png') }}" alt="OSS Clinic" class="img-fluid" style="height: 200px; width: 400px">
    <form method="POST" action="{{ route('login') }}" class="w-100" style="max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
    </form>
{{--    <div class="mt-3">--}}
{{--        <a href="{{ route('password.request') }}">Quên mật khẩu?</a>--}}
{{--    </div>--}}
    <div class="mt-3">
        <a href="{{ route('register') }}">Đăng ký tài khoản mới</a>
    </div>
</div>
@include('shared.error_modal');
</body>
</html>
