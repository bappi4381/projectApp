<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GraphicsController extends Controller
{
    /**
     * Display a listing of Graphics Services.
     */
    public function servicesIndex()
    {
        $services = Service::byCategory('graphics')->latest()->get();
        return view('admin.graphics.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function servicesCreate()
    {
        return view('admin.graphics.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function servicesStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'icon' => 'nullable',
            'starting_price' => 'nullable|numeric',
        ]);

        $validated['category'] = 'graphics';
        $validated['slug'] = Str::slug($validated['name']);

        Service::create($validated);

        return redirect()->route('admin.graphics.services.index')->with('success', 'Service created successfully.');
    }
}
