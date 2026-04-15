<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomePageController extends Controller
{
    public function edit()
    {
        $page = HomePage::settings();
        return view('admin.graphics.home-page.edit', compact('page'));
    }

    public function update(Request $request)
    {
        $page = HomePage::settings();

        $slidesInput = $request->input('hero_slides', []);
        $itemsToSave = [];

        foreach ($slidesInput as $i => $item) {
            $item['fallback_image'] = $item['old_image'] ?? 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=1920&q=80&auto=format&fit=crop';
            $imagePath = $item['old_image'] ?? '';

            if ($request->hasFile("hero_slides.{$i}.image_upload")) {
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file("hero_slides.{$i}.image_upload")->store('hero', 'public');
            }

            $itemsToSave[] = [
                'badge'          => $item['badge'] ?? '',
                'title'          => $item['title'] ?? '',
                'desc'           => $item['desc'] ?? '',
                'accent'         => $item['accent'] ?? 'indigo',
                'image'          => $imagePath,
                'fallback_image' => $item['fallback_image'],
            ];
        }

        $page->hero_slides = $itemsToSave;
        $page->save();

        return redirect()->route('admin.graphics.home-page.edit')
            ->with('success', 'Home Page slider updated successfully!');
    }
}
