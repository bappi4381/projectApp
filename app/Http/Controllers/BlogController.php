<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Service;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the Graphics Studio Home Page with latest blog posts.
     */
    public function graphicsHome()
    {
        $posts = BlogPost::published()->latest()->take(3)->get();
        return view('graphics.index', compact('posts'));
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
        $services = Service::all();
        
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
