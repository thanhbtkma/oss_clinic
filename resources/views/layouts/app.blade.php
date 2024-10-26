<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name', 'OSS Clinic') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('inline-scripts')
</head>
<body class="d-flex flex-column vh-100">
<div class="container-fluid flex-grow-1 d-flex">
    @include('shared/navigation')
    <div class="content flex-grow-1 p-3">
        @include('shared/alerts')
        <main class="my-4">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
