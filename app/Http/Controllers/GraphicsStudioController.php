<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Service;
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
                }
            ]);
            return view('graphics.service-detail', [
                'service' => $category,
                'isGroup' => true,
                'level' => 'category',
                'popularServices' => $popularServices,
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
            return view('graphics.service-detail', [
                'service' => $subCategory,
                'isGroup' => true,
                'level' => 'subgroup',
                'popularServices' => $popularServices,
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

        return view('graphics.service-detail', compact('service', 'level', 'popularServices'));
    }

    /**
     * Display a specific Service Variant detail page.
     */
    public function variantDetail($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('graphics.service-variant', compact('service'));
    }

    /**
     * Helper for simple static-like pages.
     */
    public function services() { return view('graphics.services'); }
    public function portfolio() {
        $page = \App\Models\PortfolioPage::settings();
        return view('graphics.portfolio', compact('page'));
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
