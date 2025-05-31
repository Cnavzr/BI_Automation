<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['role:administrator']], function () {
    Route::get('/users', [UserController::class, 'showUsersList'])->name('userList');
    Route::get('/users/add', [UserController::class, 'addUserPage'])->name('addUserPage');
    Route::post('/users/add', [UserController::class, 'addUser'])->name('addUserSubmit');
    Route::get('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/users/{id}/edit', [UserController::class, 'editUserPage'])->name('editUserPage');
    Route::post('/users/{id}/edit', [UserController::class, 'editUserSubmit'])->name('editUserSubmit');
});
