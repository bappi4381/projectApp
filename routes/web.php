<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

/* |-------------------------------------------------------------------------- | Web Routes — PixelForge Group |-------------------------------------------------------------------------- */

// Home Page
Route::get('/', function () {
    return view('home');
})->name('home');

// Graphics Studio Page (Home) — Now using controller for dynamic blog data
Route::get('/graphics-studio', [BlogController::class, 'graphicsHome'])->name('graphics.index');

// Services Page
Route::get('/graphics-studio/services', function () {
    return view('graphics.services');
})->name('graphics.services');

// Portfolio Page (Our Work)
Route::get('/graphics-studio/portfolio', function () {
    return view('graphics.portfolio');
})->name('graphics.portfolio');

// Dynamic Blog Routes — Managed by BlogController
Route::get('/graphics-studio/blog', [BlogController::class, 'index'])->name('graphics.blog');
Route::get('/graphics-studio/blog/{slug}', [BlogController::class, 'show'])->name('graphics.blog.single');

// Pricing Plan Page
Route::get('/graphics-studio/pricing', function () {
    $services = \App\Models\Service::where('is_active', true)
        ->whereHas('category', function($q) {
            $q->where('name', 'like', '%IMAGE%');
        })
        ->with('category')
        ->get();
    return view('graphics.pricing', compact('services'));
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

// Specific Service Pages
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

// ── SERVICE DETAIL PAGE ─────────────────────────────────────────────────────
// This single wildcard route handles ALL 4 levels of the service hierarchy.
// Resolution order: Category → SubCategory → Service/Variant (by slug)
Route::get('/graphics-studio/services/{slug}', function ($slug) {

    // LEVEL 1: Is it a Category (Primary Vertical) with a landing page?
    $category = \App\Models\Category::where('slug', $slug)
        ->where('has_details', true)
        ->first();
    if ($category) {
        // Load its subcategories and services for the group grid
        $category->load(['subcategories.services' => function ($q) {
            $q->where('is_active', true)->whereNull('parent_id');
        }]);
        return view('graphics.service-detail', [
            'service'   => $category,
            'isGroup'   => true,
            'level'     => 'category',
        ]);
    }

    // LEVEL 2: Is it a SubCategory (Service Group) with a landing page?
    $subCategory = \App\Models\SubCategory::where('slug', $slug)
        ->where('has_details', true)
        ->first();
    if ($subCategory) {
        $subCategory->load(['services' => function ($q) {
            $q->where('is_active', true)->whereNull('parent_id')->with('variants');
        }]);
        return view('graphics.service-detail', [
            'service'   => $subCategory,
            'isGroup'   => true,
            'level'     => 'subgroup',
        ]);
    }

    // LEVEL 3 & 4: It's a Service or Variant (both are Service models)
    // Any Service (primary or variant) with has_details = true gets its own page.
    $service = \App\Models\Service::where('slug', $slug)
        ->where('is_active', true)
        ->with(['variants' => function ($q) {
            $q->where('is_active', true)->orderBy('id');
        }, 'parent', 'subCategory'])
        ->firstOrFail();

    $level = $service->parent_id ? 'variant' : 'service';

    return view('graphics.service-detail', compact('service', 'level'));

})->name('graphics.service-detail');


Route::post('/graphics-studio/get-quote', function () {
    return back()->with('success', 'Thank you! We will get back to you within 30 minutes.');
})->name('graphics.get-quote.post');

// IT Solutions Page
Route::get('/it-solutions', function () {
    return view('it.index');
})->name('it.index');

// Admin Panel Routes
require __DIR__ . '/admin.php';
