<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioPageController extends Controller
{
    /** Show the editor */
    public function edit()
    {
        $page = PortfolioPage::settings();
        return view('admin.graphics.portfolio-page.edit', compact('page'));
    }

    /** Save all settings */
    public function update(Request $request)
    {
        $page = PortfolioPage::settings();

        // ── General Text ──────────────────────────────────────────────
        $page->hero_badge             = $request->input('hero_badge');
        $page->hero_title_regular     = $request->input('hero_title_regular');
        $page->hero_title_highlight   = $request->input('hero_title_highlight');
        $page->hero_subtitle          = $request->input('hero_subtitle');
        $page->cta_title              = $request->input('cta_title');
        $page->cta_desc               = $request->input('cta_desc');
        $page->cta_btn_label          = $request->input('cta_btn_label');
        $page->cta_btn_link           = $request->input('cta_btn_link');

        // ── Showcase Items ─────────────────────────────────
        $showcase = $request->input('showcase_items', []);
        $itemsToSave = [];

        // We receive the showcase_items array from the form.
        // It should contain 'title', 'category', 'desc' and optionally 'old_before', 'old_after' 
        // We will match these with files uploaded to 'showcase_before_upload' and 'showcase_after_upload' 
        // Note: because files in arrays can be tricky if indexes shuffle, we assume the frontend uses explicit indexes

        foreach ($showcase as $i => $item) {
            // Keep existing fallbacks if present
            $item['fallback_before'] = $item['old_before'] ?? 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80';
            $item['fallback_after']  = $item['old_after'] ?? 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80';

            $beforePath = $item['old_before'] ?? '';
            $afterPath  = $item['old_after'] ?? '';

            if ($request->hasFile("showcase_items.{$i}.before_upload")) {
                if ($beforePath) Storage::disk('public')->delete($beforePath);
                $beforePath = $request->file("showcase_items.{$i}.before_upload")->store('portfolio', 'public');
            }

            if ($request->hasFile("showcase_items.{$i}.after_upload")) {
                if ($afterPath) Storage::disk('public')->delete($afterPath);
                $afterPath = $request->file("showcase_items.{$i}.after_upload")->store('portfolio', 'public');
            }

            $itemsToSave[] = [
                'title'           => $item['title'],
                'category'        => $item['category'],
                'desc'            => $item['desc'],
                'before'          => $beforePath,
                'after'           => $afterPath,
                'fallback_before' => $item['fallback_before'],
                'fallback_after'  => $item['fallback_after'],
            ];
        }

        // Deal with intentionally removed items' images from storage?
        // Note: For simplicity, if an item is not in the array, it gets dropped from JSON.
        // Unlinking old files not in $itemsToSave could be added, but relying on object replacement is safer.

        $page->showcase_items = $itemsToSave;

        $page->save();

        return redirect()->route('admin.graphics.portfolio-page.edit')
            ->with('success', 'Portfolio page updated successfully!');
    }
}
