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
        
        return view('it.index', compact('sliders', 'metrics', 'services'));
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
        // For now, if the service isn't in DB, we can use fallback data or check DB
        $service = Service::byCategory('it')->where('slug', $slug)->first();
        
        if (!$service) {
            // Fallback for the specific ones mentioned if not yet created in Admin
            $fallbacks = [
                'custom-software-development' => [
                    'name' => 'Custom Software Development',
                    'description' => 'Tailored software solutions designed to meet your specific business needs and technical requirements.',
                    'icon' => 'ri-code-s-slash-line'
                ],
                'web-application-development' => [
                    'name' => 'Web Application Development',
                    'description' => 'High-performance, scalable web applications built with modern technologies like React, Laravel, and Vue.',
                    'icon' => 'ri-window-line'
                ],
                'mobile-application-development' => [
                    'name' => 'Mobile Application Development',
                    'description' => 'Native and cross-platform mobile apps for iOS and Android that deliver exceptional user experiences.',
                    'icon' => 'ri-smartphone-line'
                ],
                'quality-assurance-testing' => [
                    'name' => 'Quality Assurance & Testing',
                    'description' => 'Comprehensive software testing and QA services to ensure your applications are bug-free and reliable.',
                    'icon' => 'ri-shield-check-line'
                ]
            ];

            if (isset($fallbacks[$slug])) {
                $service = (object) $fallbacks[$slug];
            } else {
                abort(404);
            }
        }

        return view('it.service-detail', compact('service'));
    }
}
