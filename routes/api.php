<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/user', function() {
        return response()->json([
            'data' => Auth::user()
        ]);
    });

    Route::get('/user/history', [HistoryController::class, 'index']);
    Route::get('/user/history/{id}/{serviceType}', [HistoryController::class, 'show']);
});