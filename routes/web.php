<?php

    use App\Http\Controllers\AuthController;
    use App\Http\Middleware\JwtMiddleware;
    use Illuminate\Support\Facades\Route;

//    Route::get('/', function () {
//        return view('home.index');
//    })->name('home')->middleware([JwtMiddleware::class]);
    Route::get('/',function (){
        return view('home.index');
    })->name('home');
    Route::get('/login', [AuthController::class, 'showLoginForm']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm']);
    Route::post('/register', [AuthController::class, 'register']);
