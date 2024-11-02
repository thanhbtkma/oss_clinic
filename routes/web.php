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

        //Appointment
        Route::get('/appointment', function () {
            return view('appointment.index');
        })->name('appointment');
        //Service
        Route::get('/service', [ServiceController::class, 'index'])->name('service');
        Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
        //Doctor
        Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
        Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
        Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor.show');
        Route::get('/doctor/{id}', [DoctorController::class, 'show'])->name('doctor.show');
        Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit'])->name('doctor.edit');
        Route::get('/doctor/{id}/destroy', [DoctorController::class, 'destroy'])->name('doctor.destroy');
        //Patient
        Route::get('/patient', [PatientController::class,'index'])->name('patient');
        //Logout
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    });
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
