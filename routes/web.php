<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::get('/', fn () => redirect()->route('animals.index'));

Route::resource('animals', AnimalController::class);
