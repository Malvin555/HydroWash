<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ItemTyperController;

Route::middleware('api')->group(function () {
    Route::get('/user', function() {
        return response()->json([
            'data' => Auth::user()
        ]);
    });

    Route::get('/user/history', [HistoryController::class, 'index']);
    Route::get('/user/history/{id}/{serviceType}', [HistoryController::class, 'show']);

    Route::get('/admin/item-types', [ItemTyperController::class, 'index']);
    Route::get('/admin/item-types/{id}/{serviceType}', [ItemTyperController::class, 'show']);
});