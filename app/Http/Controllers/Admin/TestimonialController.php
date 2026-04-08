<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order', 'asc')->latest()->paginate(10);
        return view('admin.graphics.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('admin.graphics.testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'sort_order' => 'nullable|integer',
        ]);

        $testimonial = new Testimonial();
        $this->saveTestimonial($testimonial, $request, $validated);

        return redirect()->route('admin.graphics.testimonials.index')->with('success', 'Testimonial added successfully.');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.graphics.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'sort_order' => 'nullable|integer',
        ]);

        $this->saveTestimonial($testimonial, $request, $validated);

        return redirect()->route('admin.graphics.testimonials.index')->with('info', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->avatar) {
            Storage::disk('public')->delete($testimonial->avatar);
        }
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * Internal helper to save testimonial data.
     */
    private function saveTestimonial(Testimonial $testimonial, Request $request, array $validated)
    {
        $testimonial->name = $validated['name'];
        $testimonial->designation = $validated['designation'];
        $testimonial->content = $validated['content'];
        $testimonial->rating = $validated['rating'];
        $testimonial->sort_order = $validated['sort_order'] ?? 0;
        $testimonial->is_active = $request->has('is_active');

        if ($request->hasFile('avatar')) {
            if ($testimonial->avatar) {
                Storage::disk('public')->delete($testimonial->avatar);
            }
            $testimonial->avatar = $request->file('avatar')->store('testimonials', 'public');
        }

        $testimonial->save();
    }
}
