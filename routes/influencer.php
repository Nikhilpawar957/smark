<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfluencerController;

Route::prefix('influencer')->name('influencer.')->group(function () {
    Route::middleware(['guest:influencer', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'influencer.pages.login')->name('login');
        Route::view('/register', 'influencer.pages.login')->name('register');
        Route::post('/login_handler', [InfluencerController::class, 'login_handler'])->name('login_handler');
    });

    Route::middleware(['auth:influencer', 'PreventBackHistory'])->group(function () {
        Route::view('/dashboard', 'influencer.pages.dashboard')->name('dashboard');
    });
});
