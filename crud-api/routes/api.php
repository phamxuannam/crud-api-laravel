<?php

use App\Http\Controllers\AuthenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::apiResource('user', UserController::class)->except('create', 'store');
    Route::apiResource('product', ProductController::class);
});
Route::middleware('guest')->group(function () {
    Route::post('login', [AuthenController::class, 'login']);
});