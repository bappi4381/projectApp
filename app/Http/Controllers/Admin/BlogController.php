<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index()
    {
        $posts = BlogPost::orderBy('sort_order', 'asc')->latest()->paginate(10);
        return view('admin.graphics.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('admin.graphics.blog.create');
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
            'featured_image' => 'required|url',
            'excerpt' => 'nullable',
            'content_json' => 'required',
            'read_time' => 'required|integer',
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
        // $blog is automatically resolved via Route Model Binding
        return view('admin.graphics.blog.edit', ['post' => $blog]);
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
            'featured_image' => 'required|url',
            'excerpt' => 'nullable',
            'content_json' => 'required',
            'read_time' => 'required|integer',
        ]);

        $this->savePost($blog, $request, $validated);

        return redirect()->route('admin.graphics.blog.index')->with('info', 'Post updated successfully.');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(BlogPost $blog)
    {
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
        
        // Only update slug on create or if title changed significantly (optional logic)
        if (!$post->exists) {
            $post->slug = Str::slug($validated['title']);
        }
        
        $post->category = $validated['category'] ?? 'General';
        $post->featured_image = $validated['featured_image'];
        $post->excerpt = $validated['excerpt'];
        $post->content = json_decode($validated['content_json'], true);
        $post->read_time = $validated['read_time'];
        
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
