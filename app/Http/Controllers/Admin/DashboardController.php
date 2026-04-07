<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Show the Service Selection splash screen.
     */
    public function serviceSelection()
    {
        return view('admin.service-selection');
    }

    /**
     * Show the Graphics Dashboard.
     */
    public function graphicsIndex()
    {
        // Fetch Graphics Specific Data
        $services_count = Service::byCategory('graphics')->count();
        
        return view('admin.graphics.dashboard', compact('services_count'));
    }

    /**
     * Show the IT Dashboard.
     */
    public function itIndex()
    {
        // Fetch IT Specific Data
        $services_count = Service::byCategory('it')->count();
        
        return view('admin.it.dashboard', compact('services_count'));
    }
}
