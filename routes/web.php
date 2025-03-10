<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Dashboard (Protected)
Route::get('/dashboard', function () {
    return view('auth.dashboard'); // Include "auth." prefix
})->name('dashboard')->middleware('auth');

