<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with('category')->withCount('services')->latest()->paginate(10);
        return view('admin.graphics.subcategories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.graphics.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'icon' => 'nullable|string',
            'image_before' => 'nullable|image|max:10240',
            'image_after' => 'nullable|image|max:10240',
            'features' => 'nullable|array',
            'faqs' => 'nullable|array',
            'methods' => 'nullable|array',
            'starting_price' => 'nullable|numeric',
            'price_unit' => 'nullable|string',
            'is_active' => 'boolean',
            'has_details' => 'boolean'
        ]);

        if ($request->hasFile('image_before')) {
            $validated['image_before'] = $request->file('image_before')->store('subcategories', 'public');
        }
        if ($request->hasFile('image_after')) {
            $validated['image_after'] = $request->file('image_after')->store('subcategories', 'public');
        }

        $validated['slug'] = Str::slug($request->name);
        $validated['is_active'] = $request->has('is_active');
        $validated['has_details'] = $request->has('has_details');

        SubCategory::create($validated);

        return redirect()->route('admin.graphics.subcategories.index')->with('success', 'Sub-Category created with rich content.');
    }

    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('admin.graphics.subcategories.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|max:255',
            'description' => 'nullable',
            'icon' => 'nullable|string',
            'image_before' => 'nullable|image|max:10240',
            'image_after' => 'nullable|image|max:10240',
            'features' => 'nullable|array',
            'faqs' => 'nullable|array',
            'methods' => 'nullable|array',
            'starting_price' => 'nullable|numeric',
            'price_unit' => 'nullable|string',
            'is_active' => 'boolean',
            'has_details' => 'boolean'
        ]);

        if ($request->hasFile('image_before')) {
            if ($subCategory->image_before) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($subCategory->image_before);
            }
            $validated['image_before'] = $request->file('image_before')->store('subcategories', 'public');
        }
        if ($request->hasFile('image_after')) {
            if ($subCategory->image_after) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($subCategory->image_after);
            }
            $validated['image_after'] = $request->file('image_after')->store('subcategories', 'public');
        }

        if ($request->name !== $subCategory->name) {
            $validated['slug'] = Str::slug($request->name);
        }
        
        $validated['is_active'] = $request->has('is_active');
        $validated['has_details'] = $request->has('has_details');

        $subCategory->update($validated);

        return redirect()->route('admin.graphics.subcategories.index')->with('success', 'Sub-Category updated successfully.');
    }

    public function destroy(SubCategory $subCategory)
    {
        // Delete images
        if ($subCategory->image_before) \Illuminate\Support\Facades\Storage::disk('public')->delete($subCategory->image_before);
        if ($subCategory->image_after) \Illuminate\Support\Facades\Storage::disk('public')->delete($subCategory->image_after);
        
        $subCategory->delete();
        return redirect()->route('admin.graphics.subcategories.index')->with('success', 'Sub-Category deleted successfully.');
    }
}
