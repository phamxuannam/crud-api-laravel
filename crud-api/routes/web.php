<?php

use App\Http\Controllers\Web\PermissionController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); //gate: can:access-admin

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('products/fetch', [ProductController::class, 'fetch'])->name('products.fetch');
    Route::resource('products', ProductController::class);
    //index: /products
    //show: /products/{id}
    //edit: /products/{id}/edit
    //create: /products/create

    Route::resource('users', UserController::class); //->except('store', 'create')
    Route::get('fetch', [UserController::class, 'fetch'])->name('users.fetch');
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    // Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('permissions', PermissionController::class);
    
});

require __DIR__ . '/auth.php';