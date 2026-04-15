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
                                   ->orderBy('id');
                            }
                        ]);
                    },
                    'services' => function ($q) {
                        // Services directly under category (no subcategory)
                        $q->where('is_active', true)
                            ->whereNull('sub_category_id')
                            ->whereNull('parent_id')
                            ->orderBy('id');
                        }
                    ])->get();

            // Build structured hierarchy for nav rendering
            $navbarData = $categories->map(function ($cat) {
                // Map subcategories as groups
                $groups = $cat->subcategories->map(function ($sub) {
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
                            ];
                        })->values()->all(),
                    ];
                });

                // Convert to collection for pushing orphaned services
                $groupsCollection = collect($groups);

                // If there are direct services, add them as a 'General' group
                if ($cat->services->isNotEmpty()) {
                    $groupsCollection->push([
                        'id'          => 0,
                        'name'        => 'More Services',
                        'slug'        => $cat->slug,
                        'has_details' => false,
                        'services'    => $cat->services->map(function ($svc) {
                            return [
                                'id'          => $svc->id,
                                'name'        => $svc->name,
                                'slug'        => $svc->slug,
                                'has_details' => (bool) $svc->has_details,
                            ];
                        })->values()->all(),
                    ]);
                }

                return [
                    'id'          => $cat->id,
                    'name'        => $cat->name,
                    'slug'        => $cat->slug,
                    'has_details' => (bool) $cat->has_details,
                    'groups'      => $groupsCollection->all(),
                ];
            })->values()->all();

            $view->with('navbarData', $navbarData);
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
