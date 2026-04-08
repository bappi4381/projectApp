<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Pagination\Paginator::useTailwind();

        // Share Navbar Services
        \Illuminate\Support\Facades\View::composer('graphics.partials.graphics-navbar', function ($view) {
            $categories = \App\Models\Category::with([
                'subcategories.services' => function ($query) {
                    $query->where('is_active', true);
                }
            ])->get();

            $navbarServices = [];
            foreach ($categories as $category) {
                $groups = [];
                foreach ($category->subcategories as $subCategory) {
                    $groups[$subCategory->name] = $subCategory->services;
                }
                $navbarServices[$category->name] = $groups;
            }

            $view->with('navbarServices', $navbarServices);
        });

        // Share Latest Blog Posts with the common partial
        \Illuminate\Support\Facades\View::composer('graphics.partials.blog', function ($view) {
            $posts = \App\Models\BlogPost::where('is_published', true)
                ->orderBy('sort_order', 'asc')
                ->latest()
                ->take(3)
                ->get();
            $view->with('posts', $posts);
        });

        // Share Testimonials with partial
        \Illuminate\Support\Facades\View::composer('graphics.partials.testimonials', function ($view) {
            $testimonials = \App\Models\Testimonial::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->latest()
                ->get();

            // Map to match the user's template expectations (Array-based access)
            $mapped = $testimonials->map(function ($t) {
                return [
                    'name' => $t->name,
                    'role' => $t->designation ?? 'Verified Client',
                    'avatar' => $t->avatar ? asset('storage/' . $t->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($t->name) . '&background=312e81&color=fff',
                    'quote' => $t->content,
                    'color' => '#130f40'
                ];
            });

            $chunks = $mapped->chunk(2);
            $view->with('chunks', $chunks);
            $view->with('testimonials', $chunks); // Blade uses this for main slider loop
        });
    }
}
