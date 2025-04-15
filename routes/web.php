<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('landing');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');



Route::get('/admin', function () {
    return view('admin/index');
})->name('admin');



Route::get('/user', function () {
    return view('user/index');
})->name('admin');