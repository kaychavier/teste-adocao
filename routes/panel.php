<?php

use App\Http\Controllers\Panel\AdoptionController;
use App\Http\Controllers\Panel\AnimalController;
use App\Http\Controllers\Panel\Auth\LoginController;
use App\Http\Controllers\Panel\Auth\LogoutController;
use App\Http\Controllers\Panel\Auth\PasswordResetController;
use App\Http\Controllers\Panel\Auth\ProfileController;
use App\Http\Controllers\Panel\IndexController;
use App\Http\Controllers\Panel\SpecieController;
use App\Http\Controllers\Panel\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::resource('/login', LoginController::class)->only(['index', 'store']);
    Route::resource('/password-reset', PasswordResetController::class)->except(['create', 'edit', 'delete']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/', IndexController::class)->name('index');
    Route::resource('/user', UserController::class)->middleware('superadmin');
    Route::resource('/specie', SpecieController::class);
    Route::resource('/animal', AnimalController::class);
    Route::get('/adoption', AdoptionController::class)->name('adoption.index');
    Route::singleton('/profile', ProfileController::class)->except('edit');
});
