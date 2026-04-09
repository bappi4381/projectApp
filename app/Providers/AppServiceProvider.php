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

        // Share Navbar Services — Full 4-Level Hierarchy
        \Illuminate\Support\Facades\View::composer('graphics.partials.graphics-navbar', function ($view) {
            $categories = \App\Models\Category::where('is_active', true)
                ->with([
                    'subcategories' => function ($q) {
                        $q->where('is_active', true)->with([
                            'services' => function ($sq) {
                                $sq->where('is_active', true)
                                   ->whereNull('parent_id')
                                   ->with(['variants' => function ($vq) {
                                       $vq->where('is_active', true)->orderBy('id');
                                   }])
                                   ->orderBy('id');
                            }
                        ]);
                    }
                ])->get();

            // Build structured hierarchy for nav rendering
            $navbarData = $categories->map(function ($cat) {
                return [
                    'id'          => $cat->id,
                    'name'        => $cat->name,
                    'slug'        => $cat->slug,
                    'has_details' => (bool) $cat->has_details,
                    'groups'      => $cat->subcategories->map(function ($sub) {
                        return [
                            'id'          => $sub->id,
                            'name'        => $sub->name,
                            'slug'        => $sub->slug,
                            'has_details' => (bool) $sub->has_details,
                            'services'    => $sub->services->map(function ($svc) {
                                return [
                                    'id'          => $svc->id,
                                    'name'        => $svc->name,
                                    'slug'        => $svc->slug,
                                    'has_details' => (bool) $svc->has_details,
                                    'variants'    => $svc->variants->map(function ($variant) {
                                        return [
                                            'id'          => $variant->id,
                                            'name'        => $variant->name,
                                            'slug'        => $variant->slug,
                                            'has_details' => (bool) $variant->has_details,
                                        ];
                                    })->values()->all(),
                                ];
                            })->values()->all(),
                        ];
                    })->values()->all(),
                ];
            })->values()->all();

            $view->with('navbarData', $navbarData);
            // Keep backward compat key
            $view->with('navbarServices', $navbarData);
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
