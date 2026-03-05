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

// Graphics Studio Page (Home)
Route::get('/graphics-studio', function () {
    return view('graphics.index');
})->name('graphics.index');

// Services Page
Route::get('/graphics-studio/services', function () {
    return view('graphics.services');
})->name('graphics.services');

// Portfolio Page (Our Work)
Route::get('/graphics-studio/portfolio', function () {
    return view('graphics.portfolio');
})->name('graphics.portfolio');

// Blog Page
Route::get('/graphics-studio/blog', function () {
    return view('graphics.blog');
})->name('graphics.blog');

// IT Solutions Page
Route::get('/it-solutions', function () {
    return view('home'); // Placeholder
})->name('it.index');
