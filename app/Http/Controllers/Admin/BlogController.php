<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request)
    {
        $query = BlogPost::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%");
            });
        }

        $posts = $query->orderBy('sort_order', 'asc')->latest()->paginate(10)->appends($request->query());
        return view('admin.graphics.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.graphics.blog.create', compact('services'));
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'sort_order' => 'nullable|integer',
            'category' => 'nullable',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'excerpt' => 'nullable',
            'content' => 'required',
        ]);

        $post = new BlogPost();
        $this->savePost($post, $request, $validated);

        return redirect()->route('admin.graphics.blog.index')->with('success', 'Post published successfully!');
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(BlogPost $blog)
    {
        $services = Service::all();
        return view('admin.graphics.blog.edit', ['post' => $blog, 'services' => $services]);
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'sort_order' => 'nullable|integer',
            'category' => 'nullable',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'excerpt' => 'nullable',
            'content' => 'required',
        ]);

        $this->savePost($blog, $request, $validated);

        return redirect()->route('admin.graphics.blog.index')->with('info', 'Post updated successfully.');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(BlogPost $blog)
    {
        if ($blog->featured_image && !Str::startsWith($blog->featured_image, 'http')) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        $blog->delete();
        return back()->with('success', 'Post removed permanently.');
    }

    /**
     * Internal helper to handle the common mapping logic.
     */
    private function savePost(BlogPost $post, Request $request, array $validated)
    {
        $post->title = $validated['title'];
        $post->sort_order = $validated['sort_order'] ?? 0;
        
        if (!$post->exists) {
            $post->slug = Str::slug($validated['title']);
        }
        
        $post->category = $validated['category'] ?? 'General';
        
        // Handle image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($post->featured_image && !Str::startsWith($post->featured_image, 'http')) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $path = $request->file('featured_image')->store('blog', 'public');
            $post->featured_image = $path;
        }

        $post->excerpt = $validated['excerpt'];
        $post->content = $request->input('content');
        
        $post->is_published = $request->has('is_published');
        if ($post->is_published && !$post->published_at) {
            $post->published_at = now();
        }

        // Set author if new post
        if (!$post->exists) {
            $post->author_name = auth()->user()->name;
            $post->author_avatar = "https://ui-avatars.com/api/?name=" . urlencode(auth()->user()->name);
        }

        $post->save();
    }
}
