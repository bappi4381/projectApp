<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EcommercePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EcommercePageController extends Controller
{
    /** Show the editor */
    public function edit()
    {
        $page = EcommercePage::settings();
        return view('admin.graphics.ecommerce-page.edit', compact('page'));
    }

    /** Save all settings */
    public function update(Request $request)
    {
        $page = EcommercePage::settings();

        // ── Hero ──────────────────────────────────────────────
        $page->hero_title             = $request->input('hero_title');
        $page->hero_price_from        = $request->input('hero_price_from');
        $page->hero_price_unit        = $request->input('hero_price_unit');
        $page->hero_delivery_capacity = $request->input('hero_delivery_capacity');
        $page->hero_delivery_subtitle = $request->input('hero_delivery_subtitle');

        if ($request->hasFile('hero_gif')) {
            if ($page->hero_gif) Storage::disk('public')->delete($page->hero_gif);
            $page->hero_gif = $request->file('hero_gif')->store('ecommerce', 'public');
        }

        // ── Value Proposition ─────────────────────────────────
        $page->value_quote        = $request->input('value_quote');
        $page->value_quote_author = $request->input('value_quote_author');
        $page->value_quote_role   = $request->input('value_quote_role');

        if ($request->hasFile('value_image')) {
            if ($page->value_image) Storage::disk('public')->delete($page->value_image);
            $page->value_image = $request->file('value_image')->store('ecommerce', 'public');
        }

        // ── Tour Section ──────────────────────────────────────
        $page->tour_title    = $request->input('tour_title');
        $page->tour_subtitle = $request->input('tour_subtitle');
        $page->tour_video_url = $request->input('tour_video_url');

        if ($request->hasFile('tour_video_thumbnail')) {
            if ($page->tour_video_thumbnail) Storage::disk('public')->delete($page->tour_video_thumbnail);
            $page->tour_video_thumbnail = $request->file('tour_video_thumbnail')->store('ecommerce', 'public');
        }

        // ── Workflow Sections ─────────────────────────────────
        $workflows = $request->input('workflow_sections', []);
        foreach ($workflows as $i => $wf) {
            if ($request->hasFile("workflow_sections.{$i}.before_image")) {
                $old = $page->workflow_sections[$i]['before_image'] ?? '';
                if ($old) Storage::disk('public')->delete($old);
                $workflows[$i]['before_image'] = $request->file("workflow_sections.{$i}.before_image")->store('ecommerce', 'public');
            } else {
                $workflows[$i]['before_image'] = $request->input("workflow_sections.{$i}.old_before_image", $page->workflow_sections[$i]['before_image'] ?? '');
            }
            if ($request->hasFile("workflow_sections.{$i}.after_image")) {
                $old = $page->workflow_sections[$i]['after_image'] ?? '';
                if ($old) Storage::disk('public')->delete($old);
                $workflows[$i]['after_image'] = $request->file("workflow_sections.{$i}.after_image")->store('ecommerce', 'public');
            } else {
                $workflows[$i]['after_image'] = $request->input("workflow_sections.{$i}.old_after_image", $page->workflow_sections[$i]['after_image'] ?? '');
            }
            // Clean helper keys
            unset($workflows[$i]['old_before_image'], $workflows[$i]['old_after_image']);
            $workflows[$i]['reverse_layout'] = isset($wf['reverse_layout']) ? (bool)$wf['reverse_layout'] : false;
        }
        $page->workflow_sections = $workflows;

        // ── Categories ────────────────────────────────────────
        $cats = $request->input('categories', []);
        $existingCats = $page->categories ?? [];
        foreach ($cats as $i => $cat) {
            if ($request->hasFile("categories.{$i}.image_path")) {
                $old = $existingCats[$i]['image_path'] ?? '';
                if ($old) Storage::disk('public')->delete($old);
                $cats[$i]['image_path'] = $request->file("categories.{$i}.image_path")->store('ecommerce', 'public');
            } else {
                $cats[$i]['image_path'] = $existingCats[$i]['image_path'] ?? '';
            }
            // Keep image_url fallback untouched
            $cats[$i]['image_url'] = $existingCats[$i]['image_url'] ?? ($cat['image_url'] ?? '');
        }
        $page->categories = $cats;

        // ── Service Links ─────────────────────────────────────
        $page->service_links = $request->input('service_links', []);

        // ── Portfolio Images ──────────────────────────────────
        $portfolioImages = $page->portfolio_images ?? [];
        if ($request->hasFile('portfolio_images_upload')) {
            foreach ($request->file('portfolio_images_upload') as $file) {
                $portfolioImages[] = [
                    'image_path' => $file->store('ecommerce/portfolio', 'public'),
                    'image_url'  => '',
                ];
            }
        }
        // Handle removals
        $keepIndexes = $request->input('portfolio_keep', []);
        if (!empty($keepIndexes) || $request->has('portfolio_keep')) {
            $newPortfolio = [];
            foreach ($portfolioImages as $idx => $img) {
                if (in_array((string)$idx, $keepIndexes) || isset($img['_new'])) {
                    $newPortfolio[] = $img;
                } else {
                    // only delete uploaded ones
                    if (!empty($img['image_path'])) Storage::disk('public')->delete($img['image_path']);
                }
            }
            $portfolioImages = $newPortfolio;
        }
        $page->portfolio_images = $portfolioImages;

        // ── FAQs ──────────────────────────────────────────────
        $faqs = [];
        $questions = $request->input('faq_q', []);
        $answers   = $request->input('faq_a', []);
        foreach ($questions as $i => $q) {
            if (trim($q)) {
                $faqs[] = ['q' => $q, 'a' => $answers[$i] ?? ''];
            }
        }
        $page->faqs = $faqs;

        $page->save();

        return redirect()->route('admin.ecommerce-page.edit')
            ->with('success', 'Ecommerce page updated successfully!');
    }

    /** Delete a specific portfolio image */
    public function deletePortfolioImage(Request $request)
    {
        $page  = EcommercePage::settings();
        $index = (int) $request->input('index');
        $images = $page->portfolio_images ?? [];

        if (isset($images[$index])) {
            if (!empty($images[$index]['image_path'])) {
                Storage::disk('public')->delete($images[$index]['image_path']);
            }
            array_splice($images, $index, 1);
            $page->portfolio_images = $images;
            $page->save();
        }

        return response()->json(['success' => true]);
    }
}
