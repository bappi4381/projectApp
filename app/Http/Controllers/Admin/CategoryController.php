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
        ]);

        $validated['slug'] = Str::slug($request->name);

        Category::create($validated);

        return redirect()->route('admin.graphics.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.graphics.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ]);

        $validated['slug'] = Str::slug($request->name);

        $category->update($validated);

        return redirect()->route('admin.graphics.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.graphics.categories.index')->with('success', 'Category deleted successfully.');
    }
}
