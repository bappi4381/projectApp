<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GraphicsController extends Controller
{
    public function servicesIndex(Request $request)
    {
        $query = Service::with(['subCategory.category', 'parent'])->latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhereHas('subCategory', function ($qs) use ($search) {
                      $qs->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($request->filled('sub_category')) {
            $query->where('sub_category_id', $request->sub_category);
        }

        if ($request->filled('level')) {
            if ($request->level === 'primary') {
                $query->whereNull('parent_id');
            } elseif ($request->level === 'variant') {
                $query->whereNotNull('parent_id');
            }
        }

        $services = $query->paginate(15)->appends($request->query());
        $subCategories = SubCategory::with('category')->get();
        return view('admin.graphics.services.index', compact('services', 'subCategories'));
    }

    public function servicesCreate()
    {
        $categories = Category::all();
        $subCategories = SubCategory::with('category')->get();
        $parentServices = Service::whereNull('parent_id')->get();
        return view('admin.graphics.services.create', compact('categories', 'subCategories', 'parentServices'));
    }

    private function handleMethodImages(Request $request, $existingMethods = [])
    {
        $methods = $request->input('methods', []);
        
        if (!empty($methods)) {
            foreach ($methods as $index => $method) {
                // If a new image is uploaded for this step
                if ($request->hasFile("methods.{$index}.image")) {
                    // Delete old image if it exists
                    if (isset($existingMethods[$index]['image'])) {
                        Storage::disk('public')->delete($existingMethods[$index]['image']);
                    }
                    $methods[$index]['image'] = $request->file("methods.{$index}.image")->store('methods', 'public');
                } 
                // If no new image, keep the old one
                elseif (isset($method['old_image'])) {
                    $methods[$index]['image'] = $method['old_image'];
                    unset($methods[$index]['old_image']);
                } else {
                    $methods[$index]['image'] = null;
                }
                
                // Remove preview from the array before saving to DB
                unset($methods[$index]['preview']);
            }
        }
        return $methods;
    }

    public function servicesStore(Request $request)
    {
        $validated = $request->validate([
            'parent_id'         => 'nullable|exists:services,id',
            'name'              => 'required|max:255',
            'description'       => 'nullable',
            'icon'              => 'nullable',
            'sub_category_id'   => 'required|exists:sub_categories,id',
            'starting_price'    => 'nullable|numeric',
            'price_unit'        => 'nullable|string|max:255',
            'features'          => 'nullable|array',
            'faqs'              => 'nullable|array',
            'methods'           => 'nullable|array',
            'delivery_capacity' => 'nullable|integer',
            'delivery_unit'     => 'nullable|string|max:255',
            'discount_upto'     => 'nullable|integer',
            'discount_tag'      => 'nullable|string|max:255',
            'image_before'      => 'nullable|image|max:10240',
            'image_after'       => 'nullable|image|max:10240',
            'has_details'       => 'boolean',
        ]);

        $subCat = SubCategory::find($validated['sub_category_id']);
        if ($subCat) {
            $validated['category_id'] = $subCat->category_id;
        }

        if ($request->hasFile('image_before')) {
            $validated['image_before'] = $request->file('image_before')->store('services', 'public');
        }
        if ($request->hasFile('image_after')) {
            $validated['image_after'] = $request->file('image_after')->store('services', 'public');
        }

        // Handle Method Images
        $validated['methods'] = $this->handleMethodImages($request);

        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;
        while (Service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        $validated['slug'] = $slug;

        $validated['has_details'] = $request->has('has_details');
        $validated['is_active'] = $request->has('is_active') ?: true;

        $newService = Service::create($validated);
        return redirect()->route('admin.graphics.services.show', $newService->id)->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        $service->load(['subCategory.category', 'parent', 'variants']);
        return view('admin.graphics.services.show', compact('service'));
    }

    public function servicesEdit(Service $service)
    {
        $categories = Category::all();
        $subCategories = SubCategory::with('category')->get();
        $parentServices = Service::whereNull('parent_id')->where('id', '!=', $service->id)->get();
        return view('admin.graphics.services.edit', compact('service', 'categories', 'subCategories', 'parentServices'));
    }

    public function servicesUpdate(Request $request, Service $service)
    {
        $validated = $request->validate([
            'parent_id'         => 'nullable|exists:services,id',
            'name'              => 'required|max:255',
            'description'       => 'nullable',
            'icon'              => 'nullable',
            'sub_category_id'   => 'required|exists:sub_categories,id',
            'starting_price'    => 'nullable|numeric',
            'price_unit'        => 'nullable|string|max:255',
            'features'          => 'nullable|array',
            'faqs'              => 'nullable|array',
            'methods'           => 'nullable|array',
            'delivery_capacity' => 'nullable|integer',
            'delivery_unit'     => 'nullable|string|max:255',
            'discount_upto'     => 'nullable|integer',
            'discount_tag'      => 'nullable|string|max:255',
            'image_before'      => 'nullable|image|max:10240',
            'image_after'       => 'nullable|image|max:10240',
            'is_active'         => 'boolean',
            'has_details'       => 'boolean',
        ]);

        $subCat = SubCategory::find($validated['sub_category_id']);
        if ($subCat) {
            $validated['category_id'] = $subCat->category_id;
        }

        if ($request->hasFile('image_before')) {
            if ($service->image_before) Storage::disk('public')->delete($service->image_before);
            $validated['image_before'] = $request->file('image_before')->store('services', 'public');
        }
        if ($request->hasFile('image_after')) {
            if ($service->image_after) Storage::disk('public')->delete($service->image_after);
            $validated['image_after'] = $request->file('image_after')->store('services', 'public');
        }

        // Handle Method Images
        $validated['methods'] = $this->handleMethodImages($request, $service->methods);

        if ($request->name !== $service->name) {
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $counter = 1;
            while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $validated['slug'] = $slug;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['has_details'] = $request->has('has_details');

        $service->update($validated);
        return redirect()->route('admin.graphics.services.show', $service->id)->with('success', 'Service updated successfully.');
    }

    /* -------------------------------------------------------------------------- */
    /* DEDICATED VARIANT DETAILS MANAGEMENT (L4)                                  */
    /* -------------------------------------------------------------------------- */

    public function variantsIndex()
    {
        $variants = Service::whereNotNull('parent_id')
            ->with(['parent', 'subCategory'])
            ->latest()
            ->paginate(15);
        
        return view('admin.graphics.variants.index', compact('variants'));
    }

    public function variantsCreate()
    {
        $subCategories = SubCategory::with('category')->get();
        $parentServices = Service::whereNull('parent_id')->get();
        return view('admin.graphics.variants.create', compact('subCategories', 'parentServices'));
    }

    public function variantsEdit(Service $variant)
    {
        $subCategories = SubCategory::with('category')->get();
        $parentServices = Service::whereNull('parent_id')->get();
        return view('admin.graphics.variants.edit', compact('variant', 'subCategories', 'parentServices'));
    }

    public function variantsStore(Request $request)
    {
        return $this->servicesStore($request); 
    }

    public function variantsUpdate(Request $request, Service $variant)
    {
        return $this->servicesUpdate($request, $variant);
    }

    public function servicesDestroy(Service $service)
    {
        if ($service->image_before) Storage::disk('public')->delete($service->image_before);
        if ($service->image_after) Storage::disk('public')->delete($service->image_after);
        
        // Delete method images
        if ($service->methods) {
            foreach ($service->methods as $method) {
                if (isset($method['image'])) Storage::disk('public')->delete($method['image']);
            }
        }
        
        $service->delete();
        return redirect()->route('admin.graphics.services.index')->with('success', 'Service deleted successfully.');
    }
}
