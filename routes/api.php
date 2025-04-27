<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\IroningController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\CanceledController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\TransactionController;

Route::middleware('api')->group(function () {
    Route::get('/user', function() {
        return response()->json([
            'data' => Auth::user()
        ]);
    });

    Route::get('/user/history', [HistoryController::class, 'index']);
    Route::get('/user/history/{id}/{serviceType}', [HistoryController::class, 'show']);

    Route::get('/admin/item-types', [ItemTypeController::class, 'index']);
    Route::get('/admin/item-types/{id}/{serviceType}', [ItemTypeController::class, 'show']);

    Route::get('/admin/feedback', [FeedbackController::class, 'getFeedbacksAdmin']);
    Route::get('/admin/feedback/{id}', [FeedbackController::class, 'show']);

    Route::get('/admin/canceled', [CanceledController::class, 'index']);
    Route::get('/admin/canceled/{id}', [CanceledController::class, 'show']);

    Route::get('/admin/transaction', [TransactionController::class, 'index']);
    Route::get('/admin/transaction/{id}', [TransactionController::class, 'show']);

    Route::get('/admin/users', [ManageUserController::class, 'index']);
    Route::get('/admin/users/{id}', [ManageUserController::class, 'show']); 
    Route::get('/admin/users/edit/{id}', [ManageUserController::class, 'edit']);

    Route::get('/admin/ironing', [IroningController::class, 'index']);
    Route::get('/admin/ironing/{id}', [IroningController::class, 'show']);
    Route::get('/admin/ironing/edit/{id}', [IroningController::class, 'edit']);
    Route::get('/admin/service/transaction/{slug?}', [TransactionController::class, 'showTransactionForm']);

    Route::get('/admin/laundry',[LaundryController::class, 'index']);
    Route::get('/admin/laundry/{id}', [LaundryController::class, 'show']);
    Route::get('/admin/laundry/edit/{id}', [LaundryController::class, 'edit']);
});