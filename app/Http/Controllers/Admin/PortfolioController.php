<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('order', 'asc')->get();
        return view('admin.graphics.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.graphics.portfolios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'after_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('before_image')) {
            $data['before_image'] = $request->file('before_image')->store('portfolios', 'public');
        }

        if ($request->hasFile('after_image')) {
            $data['after_image'] = $request->file('after_image')->store('portfolios', 'public');
        }

        Portfolio::create($data);

        return redirect()->route('admin.graphics.portfolios.index')->with('success', 'Portfolio item created successfully.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.graphics.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'before_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'after_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('before_image')) {
            if ($portfolio->before_image) {
                Storage::disk('public')->delete($portfolio->before_image);
            }
            $data['before_image'] = $request->file('before_image')->store('portfolios', 'public');
        }

        if ($request->hasFile('after_image')) {
            if ($portfolio->after_image) {
                Storage::disk('public')->delete($portfolio->after_image);
            }
            $data['after_image'] = $request->file('after_image')->store('portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()->route('admin.graphics.portfolios.index')->with('success', 'Portfolio item updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->before_image) {
            Storage::disk('public')->delete($portfolio->before_image);
        }
        if ($portfolio->after_image) {
            Storage::disk('public')->delete($portfolio->after_image);
        }
        $portfolio->delete();

        return redirect()->route('admin.graphics.portfolios.index')->with('success', 'Portfolio item deleted successfully.');
    }
}
