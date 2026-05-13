<?php

namespace App\Http\Controllers\Admin\IT;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::byCategory('it')->orderBy('sort_order')->get();
        return view('admin.it.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.it.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'btn_text'   => 'nullable|string|max:255',
            'btn_url'    => 'nullable|string|max:255',
            'sort_order' => 'integer',
            'is_active'  => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('it/sliders', 'public');
            $validated['image'] = $path;
        }

        $validated['category'] = 'it';
        $validated['is_active'] = $request->has('is_active');

        HeroSlider::create($validated);

        return redirect()->route('admin.it.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function edit(HeroSlider $slider)
    {
        return view('admin.it.sliders.edit', compact('slider'));
    }

    public function update(Request $request, HeroSlider $slider)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'subtitle'   => 'nullable|string|max:255',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'btn_text'   => 'nullable|string|max:255',
            'btn_url'    => 'nullable|string|max:255',
            'sort_order' => 'integer',
            'is_active'  => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            $path = $request->file('image')->store('it/sliders', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $slider->update($validated);

        return redirect()->route('admin.it.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(HeroSlider $slider)
    {
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }
        $slider->delete();
        return redirect()->route('admin.it.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
