<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UserController;

Route::get('/', [FeedbackController::class, 'index'])->name('landing');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
// Route::get('/verify-code', [AuthController::class, 'showVerificationForm'])->name('verify-code');

Route::get('/admin', function () {
    return view('pages.dashboard-admin');
})->name('admin');

Route::get('/admin/item-types', function () {
    return view('pages.item-types-admin');
})->name('item-types');

Route::get('/admin/users', function () {
    return view('pages.manage-users-admin');
})->name('manage-users');

Route::get('/admin/feedback', function () {
    return view('pages.feedback-admin');
})->name('feedback-admin');

Route::get('/admin/laundry', function () {
    return view('pages.laundry-admin');
})->name('laundry-admin');

Route::get('/admin/ironing', function () {
    return view('pages.ironing-admin');
})->name('ironing-admin');

Route::get('/admin/canceled', function () {
    return view('pages.canceled-admin');
})->name('canceled-admin');

Route::get('/admin/transaction', function () {
    return view('pages.transaction-admin');
})->name('transaction-admin');

Route::get('/admin/profile', function () {
    return view('pages.profile-admin');
})->name('profile-admin');



Route::get('/user', function () {
    return view('pages.home-user');
})->name('home');

Route::get('/user/iron', function () {
    return view('pages.ironing-user');
})->name('ironing');

Route::get('/user/laundry', function () {
    return view('pages.laundry-user');
})->name('laundry');

Route::get('/user/feedback', [FeedbackController::class, 'getFeedbacks'])->name('feedback');
Route::post('/user/feedback', [FeedbackController::class, 'store'])->name('feedback');

Route::get('/user/transaction', function () {
    return view('pages.transaction-user');
})->name('transaction');

Route::get('/user/profile', [UserController::class, 'index'])->name('profile');
Route::put('/user/profile', [UserController::class, 'update'])->name('profile');
Route::put('/user/profile/password-update', [UserController::class, 'passwordUpdate'])->name('profile.password.update');

Route::get('/user/history', function () {
    return view('pages.history-user');
})->name('history');

Route::get('/user/complete-added', function () {
    return view('pages.complete-added-user');
})->name('complete-added');

Route::get('/user/complete-transaction', function () {
    return view('pages.complete-transaction-user');
})->name('complete-transaction');