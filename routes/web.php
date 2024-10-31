<?php

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DoctorController;
    use App\Http\Controllers\PatientController;
    use App\Http\Controllers\ServiceController;
    use App\Http\Middleware\JwtMiddleware;
    use Illuminate\Support\Facades\Route;

    Route::middleware([JwtMiddleware::class])->group(function () {
        Route::get('/', function () {
            return view('home.index');
        })->name('home');
        Route::get('/service', [ServiceController::class, 'index'])->name('service');
        Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
        Route::post('add_qualification', [DoctorController::class, 'addQualification'])->name('add_qualification');
        Route::get('/patient', [PatientController::class,'index'])->name('patient');
    });
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
