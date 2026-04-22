<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the Graphics Studio Home Page with latest blog posts and dynamic pricing.
     */
    public function graphicsHome()
    {
        $posts = BlogPost::published()->latest()->take(3)->get();
        
        // Fetch active brands for client logo marquee
        $brands = Brand::active()->orderBy('sort_order', 'asc')->get();
        
        // Fetch Level 3 Services under the "Image Editing" Category
        $pricingServices = Service::whereHas('serviceCategory', function($q) {
                $q->where('slug', 'image-editing');
            })
            ->whereNull('parent_id') // Level 3 services don't have a parent service
            ->where('is_active', true)
            ->with(['variants' => function($q) {
                $q->where('is_active', true)->orderBy('id');
            }])
            ->orderBy('id')
            ->get();

        return view('graphics.index', compact('posts', 'pricingServices', 'brands'));
    }

    /**
     * Display a listing of all published blog posts.
     */
    public function index()
    {
        $posts = BlogPost::published()->latest()->paginate(9);
        return view('graphics.blog', compact('posts'));
    }

    /**
     * Display a specific blog post.
     */
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->published()->firstOrFail();
        
        // Fetch only Level 3 services (those without a parent)
        $services = Service::whereNull('parent_id')
            ->where('is_active', true)
            ->get();
            
        // Get related posts (excluding current one)
        $otherPosts = BlogPost::where('id', '!=', $post->id)
            ->published()
            ->limit(2)
            ->get();

        return view('graphics.blog-single', [
            'post' => $post,
            'otherPosts' => $otherPosts,
            'services' => $services
        ]);
    }
}
