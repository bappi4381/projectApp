<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

echo "Activating all categories...\n";
$cats = App\Models\Category::query()->update(['is_active' => 1]);
echo "Updated $cats categories.\n";

echo "Activating all subcategories...\n";
$subs = App\Models\SubCategory::query()->update(['is_active' => 1]);
echo "Updated $subs subcategories.\n";

echo "Activating all services...\n";
$svcs = App\Models\Service::query()->update(['is_active' => 1]);
echo "Updated $svcs services.\n";
