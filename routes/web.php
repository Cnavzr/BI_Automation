<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect(route('dashboard'));
    } else {
        return redirect(route('login'));
    }
});

Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])->name('dashboard');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'sendCode'])->name('sendCode');
Route::get('/verify', [AuthController::class, 'verifyPage'])->name('verify');
Route::post('/verify', [AuthController::class, 'verifyCode'])->name('verifyCode');