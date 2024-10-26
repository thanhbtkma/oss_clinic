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
@include('shared.error_modal');
<div class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <img src="{{ asset('images/small_logo.png') }}" alt="OSS Clinic" class="img-fluid" style="height: 200px; width: 400px">
    <form method="POST" action="{{ route('register') }}" class="w-100" style="max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
    </form>
    <div class="mt-3">
        <a href="{{ route('login') }}">Đăng nhập</a>
    </div>
</div>
</body>
</html>
