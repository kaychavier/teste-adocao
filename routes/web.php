<?php

use App\Http\Controllers\Public\AdoptionController;
use App\Http\Controllers\Public\AnimalController;
use App\Http\Controllers\Public\BreedController;
use App\Http\Controllers\Public\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::resource('/animal', AnimalController::class)->only(['index', 'show']);
Route::resource('/animal/{animal}/adoption', AdoptionController::class)->only(['index', 'store']);
Route::resource('/breed', BreedController::class)->only('index');