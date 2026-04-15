<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class GraphicsStudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Brands (Clients)
        $brands = [
            ['name' => 'Amazon', 'logo' => 'brands/amazon.svg', 'url' => 'https://amazon.com', 'sort_order' => 1],
            ['name' => 'Apple', 'logo' => 'brands/apple.svg', 'url' => 'https://apple.com', 'sort_order' => 2],
            ['name' => 'Samsung', 'logo' => 'brands/samsung.svg', 'url' => 'https://samsung.com', 'sort_order' => 3],
            ['name' => 'Nordstrom', 'logo' => 'brands/nordstrom.svg', 'url' => 'https://nordstrom.com', 'sort_order' => 4],
            ['name' => 'Shopify', 'logo' => 'brands/shopify.svg', 'url' => 'https://shopify.com', 'sort_order' => 5],
            ['name' => 'Adobe', 'logo' => 'brands/adobe.svg', 'url' => 'https://adobe.com', 'sort_order' => 6],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(['name' => $brand['name']], $brand);
        }
    }
}
