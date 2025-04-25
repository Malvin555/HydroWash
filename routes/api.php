<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ItemTypeController;

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
});