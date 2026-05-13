<?php

namespace App\Http\Controllers\Admin\IT;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::byCategory('it')->whereNull('parent_id')->with(['subCategory.category', 'parent'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $services = $query->paginate(15)->appends($request->query());
        return view('admin.it.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::with('category')->get();
        $parentServices = Service::byCategory('it')->whereNull('parent_id')->get();
        return view('admin.it.services.create', compact('categories', 'subCategories', 'parentServices'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parent_id'         => 'nullable|exists:services,id',
            'name'              => 'required|max:255',
            'description'       => 'nullable',
            'icon'              => 'nullable',
            'sub_category_id'   => 'nullable|exists:sub_categories,id',
            'starting_price'    => 'nullable|numeric',
            'price_unit'        => 'nullable|string|max:255',
            'features'          => 'nullable|array',
            'pricing_tiers'     => 'nullable|array',
            'faqs'              => 'nullable|array',
            'faqs.*.question'   => 'required_with:faqs|string',
            'faqs.*.answer'     => 'required_with:faqs|string',
            'delivery_capacity' => 'nullable|integer',
            'delivery_unit'     => 'nullable|string|max:255',
            'discount_upto'     => 'nullable|integer',
            'discount_tag'      => 'nullable|string|max:255',
            'is_active'         => 'boolean',
            'has_details'       => 'boolean',
        ]);

        try {
            $validated['category'] = 'it';
            
            if ($request->filled('sub_category_id')) {
                $subCat = SubCategory::find($validated['sub_category_id']);
                if ($subCat) {
                    $validated['category_id'] = $subCat->category_id;
                }
            }

            // Slug Generation
            $slug = Str::slug($validated['name']);
            $count = Service::where('slug', 'like', $slug . '%')->count();
            $validated['slug'] = $count ? "{$slug}-{$count}" : $slug;

            $validated['is_active'] = $request->has('is_active');
            $validated['has_details'] = $request->has('has_details');

            $service = Service::create($validated);
            return redirect()->route('admin.it.services.index')->with('success', 'IT Service created successfully.');
            
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create service: ' . $e->getMessage());
        }
    }

    public function edit(Service $service)
    {
        $categories = Category::all();
        $subCategories = SubCategory::with('category')->get();
        $parentServices = Service::byCategory('it')->whereNull('parent_id')->where('id', '!=', $service->id)->get();
        return view('admin.it.services.edit', compact('service', 'categories', 'subCategories', 'parentServices'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'parent_id'         => 'nullable|exists:services,id',
            'name'              => 'required|max:255',
            'description'       => 'nullable',
            'icon'              => 'nullable',
            'sub_category_id'   => 'nullable|exists:sub_categories,id',
            'starting_price'    => 'nullable|numeric',
            'price_unit'        => 'nullable|string|max:255',
            'features'          => 'nullable|array',
            'pricing_tiers'     => 'nullable|array',
            'faqs'              => 'nullable|array',
            'faqs.*.question'   => 'required_with:faqs|string',
            'faqs.*.answer'     => 'required_with:faqs|string',
            'delivery_capacity' => 'nullable|integer',
            'delivery_unit'     => 'nullable|string|max:255',
            'discount_upto'     => 'nullable|integer',
            'discount_tag'      => 'nullable|string|max:255',
            'is_active'         => 'boolean',
            'has_details'       => 'boolean',
        ]);

        try {
            if ($request->filled('sub_category_id')) {
                $subCat = SubCategory::find($validated['sub_category_id']);
                if ($subCat) {
                    $validated['category_id'] = $subCat->category_id;
                }
            }

            if ($request->name !== $service->name) {
                $slug = Str::slug($request->name);
                $count = Service::where('slug', 'like', $slug . '%')->where('id', '!=', $service->id)->count();
                $validated['slug'] = $count ? "{$slug}-{$count}" : $slug;
            }

            $validated['is_active'] = $request->has('is_active');
            $validated['has_details'] = $request->has('has_details');

            $service->update($validated);
            return redirect()->route('admin.it.services.index')->with('success', 'IT Service updated successfully.');

        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update service: ' . $e->getMessage());
        }
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.it.services.index')->with('success', 'IT Service deleted successfully.');
    }
}
