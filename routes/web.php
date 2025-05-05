<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\IroningController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\CanceledController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\TransactionController;

Route::get('/l', function () {
    return view('laundry');
})->name('home');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('allow.guest')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('landing');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});
// Route::get('/verify-code', [AuthController::class, 'showVerificationForm'])->name('verify-code');



Route::middleware('ensure.is.user')->group(function () {
    Route::get('/user', [DashboardController::class, 'userDashboard'])->name('home');

    Route::get('/user/iron',[IroningController::class, 'showCreateFormWithItemTypes'])->name('ironing');
    Route::post('/user/iron',[IroningController::class, 'store'])->name('ironing');

    Route::get('/user/laundry', [LaundryController::class, 'showCreateFormWithItemTypes'])->name('laundry');
    Route::post('/user/laundry', [LaundryController::class, 'store'])->name('laundry');

    Route::get('/user/feedback', [FeedbackController::class, 'getFeedbacks'])->name('feedback');
    Route::post('/user/feedback', [FeedbackController::class, 'store'])->name('feedback');

    Route::get('/user/profile', [UserController::class, 'index'])->name('profile');
    Route::put('/user/profile', [UserController::class, 'update'])->name('profile');
    Route::put('/user/profile/password-update', [UserController::class, 'passwordUpdate'])->name('profile.password.update');
    
    Route::get('/user/history', [HistoryController::class, 'index'])->name('history');

    Route::get('/user/print', [PrintController::class, 'print'])->name('user.print');
    
    Route::get('/user/complete-added/{slug?}', [TransactionController::class, 'showCompletePage'])->name('complete-added');
    Route::get('/user/transaction/{slug?}', [TransactionController::class, 'showTransactionForm'])->name('transaction');
    Route::post('/user/transaction', [TransactionController::class, 'store'])->name('transaction.add');

    Route::get('/user/complete-transaction/{slug?}', [TransactionController::class, 'showCompleteTransaction'])->name('complete-transaction');

    Route::post('/user/cancel-order', [CanceledController::class, 'cancelOrder'])->name('cancel.order');
});


Route::middleware('ensure.is.admin')->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');

    Route::get('/admin/item-types', [ItemTypeController::class, 'index'])->name('item-types');
    Route::delete('/admin/item-types/{id}', [ItemTypeController::class, 'destroy'])->name('item-types.delete');
    Route::post('/admin/item-types', [ItemTypeController::class, 'store'])->name('item-types.add');
    Route::put('/admin/item-types', [ItemTypeController::class, 'update'])->name('item-types.update');
    
    Route::get('/admin/users', [ManageUserController::class, 'index'])->name('manage-users');
    Route::post('/admin/users', [ManageUserController::class, 'store'])->name('manage-users.add');
    Route::put('/admin/users', [ManageUserController::class, 'update'])->name('manage-users.update');
    Route::delete('/admin/users/{id}', [ManageUserController::class, 'destroy'])->name('manage-users.delete');
    
    Route::get('/admin/feedback', [FeedbackController::class, 'getFeedbacksAdmin'])->name('feedback-admin');
    Route::delete('/admin/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback-admin.delete');
    
    Route::get('/admin/laundry',[LaundryController::class, 'index'])->name('laundry-admin');
    Route::post('/admin/laundry',[LaundryController::class, 'store'])->name('laundry-admin.add');
    Route::put('/admin/laundry', [LaundryController::class, 'update'])->name('laundry-admin.update');
    Route::delete('/admin/laundry/{id}', [LaundryController::class, 'destroy'])->name('laundry-admin.delete');

    Route::get('/admin/ironing', [IroningController::class, 'index'])->name('ironing-admin');
    Route::post('/admin/ironing', [IroningController::class, 'store'])->name('ironing-admin.add');
    Route::put('/admin/ironing', [IroningController::class, 'update'])->name('ironing-admin.update');
    Route::delete('/admin/ironing/{id}', [IroningController::class, 'destroy'])->name('ironing-admin.delete');
    
    Route::get('/admin/transaction', [TransactionController::class, 'index'])->name('transaction-admin');
    Route::delete('/admin/transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction-admin.delete');
    Route::post('/admin/transaction', [TransactionController::class, 'store'])->name('transaction-admin.add');

    Route::get('/admin/print', [PrintController::class, 'print'])->name('admin.print');

    Route::get('/admin/canceled', [CanceledController::class, 'index'])->name('canceled-admin');
    
    Route::get('/admin/profile', function () { return view('pages.profile-admin'); })->name('profile-admin');
    Route::put('/admin/profile', [UserController::class, 'update'])->name('profile-admin');
    Route::put('/admin/profile/password-update', [UserController::class, 'passwordUpdate'])->name('profile-admin.password.update');

});