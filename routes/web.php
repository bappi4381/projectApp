<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GraphicsStudioController;
use App\Http\Controllers\PaymentController;

/* |-------------------------------------------------------------------------- | Web Routes — PixelForge Group |-------------------------------------------------------------------------- */

// Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/check-categories', function() {
    \App\Models\Category::query()->update(['is_active' => true]);
    \App\Models\SubCategory::query()->update(['is_active' => true]);
    return [
       'categories' => \App\Models\Category::all(['name', 'is_active']),
       'sub_categories' => \App\Models\SubCategory::with('category:id,name')->get(['name', 'is_active', 'category_id'])
    ];
});


// Graphics Studio Domain
Route::prefix('graphics-studio')->name('graphics.')->group(function () {
    // Home & Static/Simple Pages
    Route::get('/', [BlogController::class, 'graphicsHome'])->name('index');
    Route::get('/services', [GraphicsStudioController::class, 'services'])->name('services');
    Route::get('/portfolio', [GraphicsStudioController::class, 'portfolio'])->name('portfolio');
    Route::get('/pricing', [GraphicsStudioController::class, 'pricing'])->name('pricing');
    Route::get('/video-editing-cost', [GraphicsStudioController::class, 'videoPricing'])->name('video-pricing');
    Route::get('/offers', [GraphicsStudioController::class, 'offers'])->name('offers');
    Route::get('/payment', [GraphicsStudioController::class, 'payment'])->name('payment');
    Route::get('/get-quote', [GraphicsStudioController::class, 'getQuote'])->name('get-quote');
    Route::get('/get-video-quote', [GraphicsStudioController::class, 'getVideoQuote'])->name('video-quote');
    Route::get('/upload', [GraphicsStudioController::class, 'upload'])->name('upload');
    Route::get('/ecommerce', [GraphicsStudioController::class, 'ecommerce'])->name('ecommerce');

    // Blog Routes
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.single');

    // Campaign/Offer Pages
    Route::get('/offer/first-order-free', [GraphicsStudioController::class, 'firstOrderFree'])->name('first-order-free');
    Route::get('/offer/comeback-campaign', [GraphicsStudioController::class, 'comebackCampaign'])->name('comeback-campaign');
    Route::get('/offer/christmas-photo-editing', [GraphicsStudioController::class, 'christmasPhotoEditing'])->name('christmas-photo-editing');
    Route::get('/services/christmas-photo-editing', [GraphicsStudioController::class, 'christmasPhotoEditing']); // duplicate for compat

    // Dynamic Service Detail Pages (Unified Route)
    Route::get('/services/{slug}', [GraphicsStudioController::class, 'serviceDetail'])->name('service-detail');

    // Specific Variant Detail Page
    Route::get('/variant/{slug}', [GraphicsStudioController::class, 'variantDetail'])->name('service-variant');

    // Actions
    Route::post('/get-quote', [GraphicsStudioController::class, 'submitQuote'])->name('get-quote.post');

    // Payment API (PayPal)
    Route::post('/payment/create-order', [PaymentController::class, 'createPaypalOrder'])->name('payment.create-order');
    Route::post('/payment/capture-order', [PaymentController::class, 'capturePaypalOrder'])->name('payment.capture-order');
});

// IT Solutions Domain
Route::prefix('it-solutions')->name('it.')->group(function () {
    Route::get('/', [App\Http\Controllers\ITSolutionsController::class, 'index'])->name('index');
    Route::get('/about-us', [App\Http\Controllers\ITSolutionsController::class, 'about'])->name('about');
    Route::get('/contact-us', [App\Http\Controllers\ITSolutionsController::class, 'contact'])->name('contact');
    Route::get('/services/{slug}', [App\Http\Controllers\ITSolutionsController::class, 'serviceDetail'])->name('service-detail');
});

// Chat System Routes
Route::prefix('chat')->name('chat.')->group(function () {
    Route::post('/init', [App\Http\Controllers\ChatController::class, 'init'])->name('init');
    Route::post('/send', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('send');
    Route::get('/history/{token}', [App\Http\Controllers\ChatController::class, 'getHistory'])->name('history');
});

// Admin Panel Routes
require __DIR__ . '/admin.php';
