<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('landing');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
// Route::get('/verify-code', [AuthController::class, 'showVerificationForm'])->name('verify-code');

Route::get('/admin', function () {
    return view('admin/index');
})->name('admin');



Route::get('/user', function () {
    return view('pages.home-user');
})->name('home');

Route::get('/user/iron', function () {
    return view('pages.ironing-user');
})->name('ironing');

Route::get('/user/laundry', function () {
    return view('pages.laundry-user');
})->name('laundry');

Route::get('/user/feedback', function () {
    return view('pages.feedback-user');
})->name('feedback');

Route::get('/user/transaction', function () {
    return view('pages.transaction-user');
})->name('transaction');

Route::get('/user/profile', function () {
    return view('pages.profile-user');
})->name('profile');

Route::get('/user/history', function () {
    return view('pages.history-user');
})->name('history');

Route::get('/user/complete-added', function () {
    return view('pages.complete-added-user');
})->name('complete-added');

Route::get('/user/complete-transaction', function () {
    return view('pages.complete-transaction-user');
})->name('complete-transaction');