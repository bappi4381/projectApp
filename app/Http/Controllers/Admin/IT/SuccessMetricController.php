<?php

namespace App\Http\Controllers\Admin\IT;

use App\Http\Controllers\Controller;
use App\Models\SuccessMetric;
use Illuminate\Http\Request;

class SuccessMetricController extends Controller
{
    public function index()
    {
        $metrics = SuccessMetric::byCategory('it')->orderBy('sort_order')->get();
        return view('admin.it.metrics.index', compact('metrics'));
    }

    public function create()
    {
        return view('admin.it.metrics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'count'      => 'required|string|max:255',
            'suffix'     => 'nullable|string|max:10',
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'integer',
            'is_active'  => 'boolean',
        ]);

        $validated['category'] = 'it';
        $validated['is_active'] = $request->has('is_active');

        SuccessMetric::create($validated);

        return redirect()->route('admin.it.metrics.index')->with('success', 'Metric created successfully.');
    }

    public function edit(SuccessMetric $metric)
    {
        return view('admin.it.metrics.edit', compact('metric'));
    }

    public function update(Request $request, SuccessMetric $metric)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'count'      => 'required|string|max:255',
            'suffix'     => 'nullable|string|max:10',
            'icon'       => 'nullable|string|max:255',
            'sort_order' => 'integer',
            'is_active'  => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $metric->update($validated);

        return redirect()->route('admin.it.metrics.index')->with('success', 'Metric updated successfully.');
    }

    public function destroy(SuccessMetric $metric)
    {
        $metric->delete();
        return redirect()->route('admin.it.metrics.index')->with('success', 'Metric deleted successfully.');
    }
}
