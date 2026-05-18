<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ITSolutionsController extends Controller
{
    public function index()
    {
        $sliders = \App\Models\HeroSlider::byCategory('it')->active()->orderBy('sort_order')->get();
        $metrics = \App\Models\SuccessMetric::byCategory('it')->active()->orderBy('sort_order')->get();
        $services = \App\Models\Service::byCategory('it')->whereNull('parent_id')->active()->get();
        $softwareList = \App\Models\Software::where('is_active', true)->get();
        
        return view('it.index', compact('sliders', 'metrics', 'services', 'softwareList'));
    }

    public function about()
    {
        return view('it.about');
    }

    public function contact()
    {
        return view('it.contact');
    }

    public function serviceDetail($slug)
    {
        $viewMap = [
            'custom-software-development' => 'it.services.custom-software',
            'web-application-development' => 'it.services.web-development',
            'mobile-application-development' => 'it.services.mobile-app',
            'quality-assurance-testing' => 'it.services.qa-testing',
        ];

        if (isset($viewMap[$slug])) {
            return view($viewMap[$slug]);
        }

        // Fallback for dynamic services from DB
        $service = Service::byCategory('it')->where('slug', $slug)->first();
        if (!$service) {
            abort(404);
        }

        return view('it.service-detail', compact('service'));
    }

    public function softwareDetail($slug)
    {
        $software = \App\Models\Software::where('slug', $slug)->firstOrFail();
        
        // Ensure only active software is shown
        if (!$software->is_active) {
            abort(404);
        }

        return view('it.software-detail', compact('software'));
    }
}
