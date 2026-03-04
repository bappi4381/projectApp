<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — PixelForge Group
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Graphics Studio Page
Route::get('/graphics-studio', function () {
    return view('graphics.index');
})->name('graphics.index');

// IT Solutions Page
Route::get('/it-solutions', function () {
    return view('home'); // Placeholder
})->name('it.index');
