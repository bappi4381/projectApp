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

//graphics.christmas-photo-editing
Route::get('/graphics-studio/offer/christmas-photo-editing', function () {
    return view('graphics.christmas-photo-editing');
})->name('graphics.christmas-photo-editing');

// Ecommerce Page
Route::get('/graphics-studio/ecommerce', function () {
    return view('graphics.ecommerce');
})->name('graphics.ecommerce');

// Christmas Photo Editing Page
Route::get('/graphics-studio/services/christmas-photo-editing', function () {
    return view('graphics.christmas-photo-editing');
})->name('graphics.christmas-photo-editing');

// Service Pages - Remove Background From Images Folder
Route::get('/graphics-studio/services/remove-background', function () {
    return view('graphics.remove-background-images.remove-background');
})->name('graphics.services.remove-background');

Route::get('/graphics-studio/services/clipping-path', function () {
    return view('graphics.remove-background-images.clipping-path');
})->name('graphics.services.clipping-path');

Route::get('/graphics-studio/services/ghost-mannequin', function () {
    return view('graphics.remove-background-images.ghost-mannequin');
})->name('graphics.services.ghost-mannequin');

Route::get('/graphics-studio/services/image-masking', function () {
    return view('graphics.remove-background-images.image-masking');
})->name('graphics.services.image-masking');

Route::get('/graphics-studio/services/shadow-service', function () {
    return view('graphics.remove-background-images.shadow-service');
})->name('graphics.services.shadow-service');

Route::post('/graphics-studio/get-quote', function () {
    // Handle form submission (email / save to DB)
    return back()->with('success', 'Thank you! We will get back to you within 30 minutes.');
})->name('graphics.get-quote.post');

// IT Solutions Page
Route::get('/it-solutions', function () {
    return view('it.index');
})->name('it.index');
