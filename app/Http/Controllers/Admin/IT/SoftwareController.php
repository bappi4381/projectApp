<?php

namespace App\Http\Controllers\Admin\IT;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SoftwareController extends Controller
{
    public function index(Request $request)
    {
        $query = Software::latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $softwareList = $query->paginate(15)->appends($request->query());
        return view('admin.it.software.index', compact('softwareList'));
    }

    public function create()
    {
        return view('admin.it.software.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|max:255',
            'category'    => 'nullable|max:255',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link_url'    => 'nullable|url',
            'short_desc'  => 'required|max:255',
            'long_desc'   => 'required',
            'is_active'   => 'boolean',
            'solutions'   => 'nullable|array',
        ]);

        try {
            $slug = Str::slug($validated['name']);
            $count = Software::where('slug', 'like', $slug . '%')->count();
            $validated['slug'] = $count ? "{$slug}-{$count}" : $slug;
            $validated['is_active'] = $request->has('is_active');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('it/software', 'public');
                $validated['image_url'] = $path;
            }

            if ($request->has('solutions')) {
                $solutions = $request->input('solutions');
                foreach ($solutions as $index => $sol) {
                    if ($request->hasFile("solutions.{$index}.image_file")) {
                        $path = $request->file("solutions.{$index}.image_file")->store('it/software/solutions', 'public');
                        $solutions[$index]['image'] = $path;
                    } else {
                        $solutions[$index]['image'] = $sol['image'] ?? null;
                    }
                    unset($solutions[$index]['image_file']);
                }
                $validated['solutions'] = $solutions;
            }

            Software::create($validated);
            return redirect()->route('admin.it.software.index')->with('success', 'Software registered successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to register software: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $software = Software::findOrFail($id);
        return view('admin.it.software.edit', compact('software'));
    }

    public function update(Request $request, $id)
    {
        $software = Software::findOrFail($id);
        
        $validated = $request->validate([
            'name'        => 'required|max:255',
            'category'    => 'nullable|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link_url'    => 'nullable|url',
            'short_desc'  => 'required|max:255',
            'long_desc'   => 'required',
            'is_active'   => 'boolean',
            'solutions'   => 'nullable|array',
        ]);

        try {
            if ($request->name !== $software->name) {
                $slug = Str::slug($request->name);
                $count = Software::where('slug', 'like', $slug . '%')->where('id', '!=', $software->id)->count();
                $validated['slug'] = $count ? "{$slug}-{$count}" : $slug;
            }

            $validated['is_active'] = $request->has('is_active');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('it/software', 'public');
                $validated['image_url'] = $path;
            }

            if ($request->has('solutions')) {
                $solutions = $request->input('solutions');
                foreach ($solutions as $index => $sol) {
                    if ($request->hasFile("solutions.{$index}.image_file")) {
                        $path = $request->file("solutions.{$index}.image_file")->store('it/software/solutions', 'public');
                        $solutions[$index]['image'] = $path;
                    } else {
                        $solutions[$index]['image'] = $sol['image'] ?? null;
                    }
                    unset($solutions[$index]['image_file']);
                }
                $validated['solutions'] = $solutions;
            }

            $software->update($validated);
            return redirect()->route('admin.it.software.index')->with('success', 'Software updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update software: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $software = Software::findOrFail($id);
        return view('admin.it.software.show', compact('software'));
    }
}
