<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GraphicsController extends Controller
{
    public function servicesIndex(Request $request)
    {
        $query = Service::with(['category', 'subCategory'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhereHas('category', function ($qc) use ($search) {
                      $qc->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('subCategory', function ($qs) use ($search) {
                      $qs->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $services = $query->paginate(10)->appends($request->query());
        return view('admin.graphics.services.index', compact('services'));
    }

    public function servicesCreate()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.graphics.services.create', compact('categories', 'subCategories'));
    }

    public function servicesStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'icon' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'starting_price' => 'nullable|numeric',
            'price_unit' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'delivery_capacity' => 'nullable|integer',
            'delivery_unit' => 'nullable|string|max:255',
            'discount_upto' => 'nullable|integer',
            'discount_tag' => 'nullable|string|max:255',
            'image_before' => 'nullable|image|max:2048',
            'image_after' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_before')) {
            $validated['image_before'] = $request->file('image_before')->store('services', 'public');
        }
        if ($request->hasFile('image_after')) {
            $validated['image_after'] = $request->file('image_after')->store('services', 'public');
        }

        $validated['slug'] = Str::slug($validated['name']);

        Service::create($validated);

        return redirect()->route('admin.graphics.services.index')->with('success', 'Service created successfully.');
    }

    public function servicesEdit(Service $service)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.graphics.services.edit', compact('service', 'categories', 'subCategories'));
    }

    public function servicesUpdate(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'icon' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'starting_price' => 'nullable|numeric',
            'price_unit' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'delivery_capacity' => 'nullable|integer',
            'delivery_unit' => 'nullable|string|max:255',
            'discount_upto' => 'nullable|integer',
            'discount_tag' => 'nullable|string|max:255',
            'image_before' => 'nullable|image|max:2048',
            'image_after' => 'nullable|image|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image_before')) {
            if ($service->image_before) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($service->image_before);
            }
            $validated['image_before'] = $request->file('image_before')->store('services', 'public');
        }
        if ($request->hasFile('image_after')) {
            if ($service->image_after) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($service->image_after);
            }
            $validated['image_after'] = $request->file('image_after')->store('services', 'public');
        }

        if ($request->name !== $service->name) {
            $validated['slug'] = Str::slug($validated['name']);
        }
        
        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('admin.graphics.services.index')->with('success', 'Service updated successfully.');
    }

    public function servicesDestroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.graphics.services.index')->with('success', 'Service deleted successfully.');
    }
}
