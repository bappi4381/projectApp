<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoPricing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoPricingController extends Controller
{
    public function index()
    {
        $pricings = VideoPricing::orderBy('order_column')->paginate(15);
        return view('admin.graphics.video_pricing.index', compact('pricings'));
    }

    public function create()
    {
        return view('admin.graphics.video_pricing.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'pricing_tiers' => 'nullable|array',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->service_name);
        $data['is_active'] = $request->has('is_active');

        VideoPricing::create($data);

        return redirect()->route('admin.graphics.video-pricing.index')->with('success', 'Video Pricing created successfully.');
    }

    public function edit(VideoPricing $videoPricing)
    {
        return view('admin.graphics.video_pricing.edit', compact('videoPricing'));
    }

    public function update(Request $request, VideoPricing $videoPricing)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'pricing_tiers' => 'nullable|array',
            'is_active' => 'boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->service_name);
        $data['is_active'] = $request->has('is_active');

        $videoPricing->update($data);

        return redirect()->route('admin.graphics.video-pricing.index')->with('success', 'Video Pricing updated successfully.');
    }

    public function destroy(VideoPricing $videoPricing)
    {
        $videoPricing->delete();
        return redirect()->route('admin.graphics.video-pricing.index')->with('success', 'Video Pricing deleted successfully.');
    }
}
