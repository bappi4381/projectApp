<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

echo "Navbar Data Logic:\n";
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

print_r($navbarData);

