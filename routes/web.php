<?php

use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes — PixelForge Group |-------------------------------------------------------------------------- */

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

// Service Detail Page (dynamic slug)
Route::get('/graphics-studio/services/{slug}', function ($slug) {
    return view('graphics.service-detail', ['slug' => $slug]);
})->name('graphics.service-detail');

// Portfolio Page (Our Work)
Route::get('/graphics-studio/portfolio', function () {
    return view('graphics.portfolio');
})->name('graphics.portfolio');

// Blog Page
Route::get('/graphics-studio/blog', function () {
    return view('graphics.blog');
})->name('graphics.blog');

// Blog Single Post (Read Story)
Route::get('/graphics-studio/blog/{slug}', function ($slug) {
    return view('graphics.blog-single', ['slug' => $slug]);
})->name('graphics.blog.single');

// Pricing Plan Page
Route::get('/graphics-studio/pricing', function () {
    return view('graphics.pricing');
})->name('graphics.pricing');

// Offers Page
Route::get('/graphics-studio/offers', function () {
    return view('graphics.offers');
})->name('graphics.offers');

// Payment Page
Route::get('/graphics-studio/payment', function () {
    return view('graphics.payment');
})->name('graphics.payment');

// Get Quote Page
Route::get('/graphics-studio/get-quote', function () {
    return view('graphics.get-quote');
})->name('graphics.get-quote');

// Upload Page
Route::get('/graphics-studio/upload', function () {
    return view('graphics.upload');
})->name('graphics.upload');

// First Order Free Page
Route::get('/graphics-studio/offer/first-order-free', function () {
    return view('graphics.first-order-free');
})->name('graphics.first-order-free');

// Comeback Campaign Page
Route::get('/graphics-studio/offer/comeback-campaign', function () {
    return view('graphics.comeback-campaign');
})->name('graphics.comeback-campaign');

// Ecommerce Page
Route::get('/graphics-studio/ecommerce', function () {
    return view('graphics.ecommerce');
})->name('graphics.ecommerce');

Route::post('/graphics-studio/get-quote', function () {
    // Handle form submission (email / save to DB)
    return back()->with('success', 'Thank you! We will get back to you within 30 minutes.');
})->name('graphics.get-quote.post');

// IT Solutions Page
Route::get('/it-solutions', function () {
    return view('it.index');
})->name('it.index');
