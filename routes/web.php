<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

 // Tambahkan ini:
Route::get('/', function () {
    return redirect()->route('login');

    // Pastikan rute login Anda sudah memiliki ->name('login')
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
});
// Route untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Route untuk yang sudah Login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Dashboard atau halaman utama setelah login
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

});

