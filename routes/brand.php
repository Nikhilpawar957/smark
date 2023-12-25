<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::prefix('brand')->name('brand.')->group(function () {
    Route::middleware(['guest:brand', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'brand.pages.login')->name('login');
        Route::view('/register', 'brand.pages.register')->name('register');
        Route::post('/login_handler', [BrandController::class, 'login_handler'])->name('login_handler');
    });

    Route::middleware(['auth:brand', 'PreventBackHistory'])->group(function () {
        Route::view('/dashboard', 'brand.pages.dashboard')->name('dashboard');
    });
});


