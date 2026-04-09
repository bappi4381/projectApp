<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GraphicsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BlogController;

/*
|--------------------------------------------------------------------------
| Admin Routes — PixelForge Group
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes (Authenticated)
    Route::middleware(['admin'])->group(function () {
        // Service Selection Portal
        Route::get('/service-selection', [DashboardController::class, 'serviceSelection'])->name('service-selection');

        // Graphics Studio Domain
        Route::prefix('graphics')->name('graphics.')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'graphicsIndex'])->name('dashboard');

            // Graphics Services CRUD
            Route::prefix('services')->name('services.')->group(function () {
                Route::get('/', [GraphicsController::class, 'servicesIndex'])->name('index');
                Route::get('/create', [GraphicsController::class, 'servicesCreate'])->name('create');
                Route::post('/', [GraphicsController::class, 'servicesStore'])->name('store');
                Route::get('/{service}', [GraphicsController::class, 'show'])->name('show');
                Route::get('/{service}/edit', [GraphicsController::class, 'servicesEdit'])->name('edit');
                Route::put('/{service}', [GraphicsController::class, 'servicesUpdate'])->name('update');
                Route::delete('/{service}', [GraphicsController::class, 'servicesDestroy'])->name('destroy');
            });

            // Dedicated Detail-Page Variants Management (Level 4)
            Route::prefix('variant-details')->name('variants.')->group(function () {
                Route::get('/', [GraphicsController::class, 'variantsIndex'])->name('index');
                Route::get('/create', [GraphicsController::class, 'variantsCreate'])->name('create');
                Route::post('/', [GraphicsController::class, 'variantsStore'])->name('store');
            });

            // Graphics Categories & Sub-Categories
            Route::resource('categories', CategoryController::class);
            Route::resource('subcategories', SubCategoryController::class)->parameters(['subcategories' => 'subCategory']);

            // Graphics Blog Resource (Full CRUD)
            Route::resource('blog', BlogController::class);

            // Graphics Testimonials Resource
            Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
        });

        // IT Solutions Domain
        Route::prefix('it')->name('it.')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'itIndex'])->name('dashboard');
        });
    });
});
