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

Route::get('/user', function () {
    return view('auth.user'); // Ensure this file exists in views/auth/user.blade.php
})->name('user.page')->middleware('auth');

// Dashboard (Protected)
Route::get('/dashboard', function () {
    return view('user.dashboard'); // Using 'user.dashboard' to integrate sidebar
})->name('dashboard')->middleware('auth');

Route::get('/profile', function () {
    return view('user.profile');
})->name('profile')->middleware('auth');

Route::get('/settings', function () {
    return view('user.settings');
})->name('settings')->middleware('auth');

Route::get('/orders', function () {
    return view('user.orders'); // Make sure this view exists
})->name('orders')->middleware('auth');

Route::get('/subscriptions', function () {
    return view('user.subscriptions'); // Make sure this view exists
})->name('subscriptions')->middleware('auth');

Route::get('/workout_plans', function () {
    return view('user.workout_plans'); // Make sure this view exists
})->name('workout_plans')->middleware('auth');

Route::get('/nutrition_guides', function () {
    return view('user.nutrition_guides'); // Make sure this view exists
})->name('nutrition_guides')->middleware('auth');

Route::get('/support', function () {
    return view('user.support'); // Make sure this view exists
})->name('support')->middleware('auth');


Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
})->name('logout');

