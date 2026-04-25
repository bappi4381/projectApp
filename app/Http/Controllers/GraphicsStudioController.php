<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class GraphicsStudioController extends Controller
{
    /**
     * Display the Pricing Page.
     */
    public function pricing()
    {
        $categories = Category::whereHas('services', function ($q) {
            $q->where('is_active', true)->where('show_on_pricing', true)->whereNull('parent_id');
        })->with(['services' => function ($q) {
            $q->where('is_active', true)->where('show_on_pricing', true)->whereNull('parent_id')
              ->with(['variants' => function ($qv) {
                  $qv->where('is_active', true)->orderBy('id');
              }]);
        }])->get();

        return view('graphics.pricing', compact('categories'));
    }

    /**
     * Handle the unified Service Detail Page (Category, SubCategory, Service, Variant).
     */
    public function serviceDetail($slug)
    {
        $popularServices = Service::where('is_active', true)
            ->whereNull('parent_id')
            ->inRandomOrder()
            ->limit(16)
            ->get();

        // 1. Is it a Category (Primary Vertical) with a landing page?
        $category = Category::where('slug', $slug)
            ->where('has_details', true)
            ->first();
            
        if ($category) {
            $category->load([
                'subcategories.services' => function ($q) {
                    $q->where('is_active', true)->whereNull('parent_id');
                },
                'services' => function ($q) {
                    $q->where('is_active', true)->whereNull('parent_id');
                }
            ]);
            
            if ($category->slug === 'image-editing') {
                $categories = collect([$category]);
                return view('graphics.services', [
                    'categories' => $categories,
                    'heroTitle' => strtoupper($category->name) . ' SERVICES',
                    'heroDescription' => $category->description ?? 'Professional ' . $category->name . ' and retouching solutions tailored for photographers and e-commerce.'
                ]);
            }

            $isVedio = \Illuminate\Support\Str::contains(strtolower($category->name), 'video') || \Illuminate\Support\Str::contains(strtolower($category->name), 'production');
            
            $videoSubCategories = collect();
            $testimonials = Testimonial::where('is_active', true)
                ->where(function($q) use ($category) {
                    $q->where('category_id', $category->id)
                      ->orWhereNull('category_id');
                })
                ->orderBy('sort_order', 'asc')
                ->get();

            if ($isVedio) {
                // Fetch all subcategories from categories related to video/production
                $videoSubCategories = SubCategory::whereHas('category', function($q) {
                    $q->where('name', 'LIKE', '%Video%')
                      ->orWhere('name', 'LIKE', '%Production%');
                })->where('is_active', true)->get();
            }

            $viewName = $isVedio ? 'graphics.video-service' : 'graphics.service-detail';

            return view($viewName, [
                'service' => $category,
                'isGroup' => true,
                'level' => 'category',
                'popularServices' => $popularServices,
                'videoSubCategories' => $videoSubCategories,
                'testimonials' => $testimonials,
                'isVedio' => $isVedio
            ]);
        }

        // 2. Is it a SubCategory (Service Group) with a landing page?
        $subCategory = SubCategory::where('slug', $slug)
            ->where('has_details', true)
            ->first();
            
        if ($subCategory) {
            $subCategory->load([
                'services' => function ($q) {
                    $q->where('is_active', true)->whereNull('parent_id')->with('variants');
                }
            ]);
            $isVedio = \Illuminate\Support\Str::contains(strtolower($subCategory->category->name ?? ''), 'video') || \Illuminate\Support\Str::contains(strtolower($subCategory->name), 'video');
            
            $videoSubCategories = collect();
            $testimonials = Testimonial::where('is_active', true)
                ->where(function($q) use ($subCategory) {
                    $q->where('category_id', $subCategory->category_id)
                      ->orWhereNull('category_id');
                })
                ->orderBy('sort_order', 'asc')
                ->get();

            if ($isVedio) {
                $videoSubCategories = SubCategory::whereHas('category', function($q) {
                    $q->where('name', 'LIKE', '%Video%')
                      ->orWhere('name', 'LIKE', '%Production%');
                })->where('is_active', true)->get();
            }

            $viewName = $isVedio ? 'graphics.video-service' : 'graphics.service-detail';

            return view($viewName, [
                'service' => $subCategory,
                'isGroup' => true,
                'level' => 'subgroup',
                'popularServices' => $popularServices,
                'videoSubCategories' => $videoSubCategories,
                'testimonials' => $testimonials,
                'isVedio' => $isVedio
            ]);
        }

        // 3. It's a Service or Variant
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->with([
                'variants' => function ($q) {
                    $q->where('is_active', true)->orderBy('id');
                },
                'parent',
                'subCategory'
            ])
            ->firstOrFail();

        $level = $service->parent_id ? 'variant' : 'service';

        // Detect Video Context
        $categoryName = $service->subCategory->category->name ?? '';
        $isVedio = \Illuminate\Support\Str::contains(strtolower($categoryName), 'video') || \Illuminate\Support\Str::contains(strtolower($service->name), 'video');

        if ($isVedio) {
            $catId = $service->subCategory->category_id ?? null;
            $videoSubCategories = \App\Models\SubCategory::where('category_id', $catId)
                ->where('is_active', true)
                ->with(['services' => function($q){ $q->where('is_active', true); }])
                ->get();
            return view('graphics.video-detail', compact('service', 'level', 'popularServices', 'videoSubCategories'));
        }

        return view('graphics.service-detail', compact('service', 'level', 'popularServices'));
    }

    /**
     * Display a specific Service Variant detail page.
     */
    public function variantDetail($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->with(['subCategory.category', 'parent'])
            ->firstOrFail();

        $level = 'variant';
        $popularServices = Service::where('is_active', true)->whereNull('parent_id')->inRandomOrder()->limit(16)->get();

        // Detect Video Context for Variants
        $categoryName = $service->subCategory->category->name ?? '';
        $isVedio = \Illuminate\Support\Str::contains(strtolower($categoryName), 'video') || \Illuminate\Support\Str::contains(strtolower($service->name), 'video');

        if ($isVedio) {
            $catId = $service->subCategory->category_id ?? null;
            $videoSubCategories = \App\Models\SubCategory::where('category_id', $catId)
                ->where('is_active', true)
                ->with(['services' => function($q){ $q->where('is_active', true); }])
                ->get();
            return view('graphics.video-detail', compact('service', 'level', 'popularServices', 'videoSubCategories'));
        }

        return view('graphics.service-variant', compact('service'));
    }

    /**
     * Helper for simple static-like pages.
     */
    public function services() {
        $categories = \App\Models\Category::where('is_active', true)
            ->with([
                'subcategories' => function($q) {
                    $q->where('is_active', true)->with(['services' => function($sq) {
                        $sq->where('is_active', true)->whereNull('parent_id');
                    }]);
                },
                'services' => function($q) {
                    $q->where('is_active', true)->whereNull('parent_id');
                }
            ])
            ->orderBy('id', 'asc')
            ->get();
            
        return view('graphics.services', compact('categories'));
    }
    public function portfolio() {
        $portfolios = \App\Models\Portfolio::where('is_active', true)->orderBy('order', 'asc')->get();
        return view('graphics.portfolio', compact('portfolios'));
    }
    public function offers() { return view('graphics.offers'); }
    public function payment() { return view('graphics.payment'); }
    public function getQuote() { return view('graphics.get-quote'); }
    public function upload() { return view('graphics.upload'); }
    public function ecommerce() {
        $page = \App\Models\EcommercePage::settings();
        return view('graphics.ecommerce', compact('page'));
    }
    
    // Campaign Pages
    public function firstOrderFree() { return view('graphics.first-order-free'); }
    public function comebackCampaign() { return view('graphics.comeback-campaign'); }
    public function christmasPhotoEditing() { return view('graphics.christmas-photo-editing'); }
}
