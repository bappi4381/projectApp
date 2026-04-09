<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('subcategories')->latest()->get();
        $subCategories = \App\Models\SubCategory::with('category')->withCount('services')->latest()->get();
        
        return view('admin.graphics.categories.index', compact('categories', 'subCategories'));
    }

    public function create()
    {
        return view('admin.graphics.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name',
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
            $validated['image_before'] = $request->file('image_before')->store('categories', 'public');
        }
        if ($request->hasFile('image_after')) {
            $validated['image_after'] = $request->file('image_after')->store('categories', 'public');
        }

        $validated['slug'] = Str::slug($request->name);
        $validated['is_active'] = $request->has('is_active');
        $validated['has_details'] = $request->has('has_details');

        Category::create($validated);

        return redirect()->route('admin.graphics.categories.index')->with('success', 'Primary Vertical created with rich content.');
    }

    public function edit(Category $category)
    {
        return view('admin.graphics.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
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
            if ($category->image_before) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($category->image_before);
            }
            $validated['image_before'] = $request->file('image_before')->store('categories', 'public');
        }
        if ($request->hasFile('image_after')) {
            if ($category->image_after) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($category->image_after);
            }
            $validated['image_after'] = $request->file('image_after')->store('categories', 'public');
        }

        if ($request->name !== $category->name) {
            $validated['slug'] = Str::slug($request->name);
        }
        
        $validated['is_active'] = $request->has('is_active');
        $validated['has_details'] = $request->has('has_details');

        $category->update($validated);

        return redirect()->route('admin.graphics.categories.index')->with('success', 'Primary Vertical updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.graphics.categories.index')->with('success', 'Category deleted successfully.');
    }
}
