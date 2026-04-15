<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of brands/clients.
     */
    public function index()
    {
        $brands = Brand::orderBy('sort_order', 'asc')->latest()->paginate(12);
        return view('admin.graphics.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new brand.
     */
    public function create()
    {
        return view('admin.graphics.brands.create');
    }

    /**
     * Store a newly created brand in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'url' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $brand = new Brand();
        $this->saveBrand($brand, $request, $validated);

        return redirect()->route('admin.graphics.brands.index')->with('success', 'Brand/Client logo added successfully.');
    }

    /**
     * Show the form for editing the specified brand.
     */
    public function edit(Brand $brand)
    {
        return view('admin.graphics.brands.edit', compact('brand'));
    }

    /**
     * Update the specified brand in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'url' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $this->saveBrand($brand, $request, $validated);

        return redirect()->route('admin.graphics.brands.index')->with('info', 'Brand/Client logo updated successfully.');
    }

    /**
     * Remove the specified brand from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand->logo) {
            Storage::disk('public')->delete($brand->logo);
        }
        $brand->delete();
        return back()->with('success', 'Brand/Client logo deleted successfully.');
    }

    /**
     * Internal helper to save brand data.
     */
    private function saveBrand(Brand $brand, Request $request, array $validated)
    {
        $brand->name = $validated['name'];
        $brand->url = $validated['url'];
        $brand->sort_order = $validated['sort_order'] ?? 0;
        $brand->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                Storage::disk('public')->delete($brand->logo);
            }
            $brand->logo = $request->file('logo')->store('brands', 'public');
        }

        $brand->save();
    }
}
