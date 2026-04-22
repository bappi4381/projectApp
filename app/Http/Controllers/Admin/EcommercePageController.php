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
        $existingWorkflows = $page->workflow_sections ?? [];
        
        foreach ($workflows as $i => $wf) {
            // Handle Before Image
            if ($request->hasFile("workflow_sections.{$i}.before_image")) {
                $old = $existingWorkflows[$i]['before_image'] ?? '';
                if ($old) Storage::disk('public')->delete($old);
                $workflows[$i]['before_image'] = $request->file("workflow_sections.{$i}.before_image")->store('ecommerce', 'public');
            } else {
                $workflows[$i]['before_image'] = $existingWorkflows[$i]['before_image'] ?? '';
            }

            // Handle After Image
            if ($request->hasFile("workflow_sections.{$i}.after_image")) {
                $old = $existingWorkflows[$i]['after_image'] ?? '';
                if ($old) Storage::disk('public')->delete($old);
                $workflows[$i]['after_image'] = $request->file("workflow_sections.{$i}.after_image")->store('ecommerce', 'public');
            } else {
                $workflows[$i]['after_image'] = $existingWorkflows[$i]['after_image'] ?? '';
            }

            // Handle Highlight Words (convert from comma-separated string to array)
            if (isset($wf['highlight_words']) && is_string($wf['highlight_words'])) {
                $workflows[$i]['highlight_words'] = array_filter(array_map('trim', explode(',', $wf['highlight_words'])));
            } else {
                $workflows[$i]['highlight_words'] = $wf['highlight_words'] ?? [];
            }

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
                $cats[$i]['image_path'] = $existingCats[$i]['image_path'] ?? ($cat['image_path'] ?? '');
            }
            // Ensure other fields are kept
            $cats[$i]['title'] = $cat['title'] ?? '';
            $cats[$i]['description'] = $cat['description'] ?? '';
            $cats[$i]['image_url'] = $cat['image_url'] ?? ($existingCats[$i]['image_url'] ?? '');
        }
        $page->categories = $cats;

        // ── Service Links ─────────────────────────────────────
        $page->service_links = $request->input('service_links', []);


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

        return redirect()->route('admin.graphics.ecommerce-page.edit')
            ->with('success', 'Ecommerce page updated successfully!');
    }

}
