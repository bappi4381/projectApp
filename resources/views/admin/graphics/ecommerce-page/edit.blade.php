@extends('layouts.admin')
@section('title', 'Ecommerce Page Settings | Graphics Studio')

@section('content')
<div class="p-8">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Ecommerce Page Settings</h1>
            <p class="text-slate-400 font-medium text-sm">Manage dynamic content for the Ecommerce Services page</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
            <i class="ri-checkbox-circle-line text-xl"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.graphics.ecommerce-page.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8 reveal reveal-delay-1">
        @csrf
        @method('PUT')

        {{-- ── HERO SECTION ──────────────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2"><i class="ri-layout-top-line text-indigo-400"></i> Hero Section</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Title</label>
                    <textarea name="hero_title" rows="2" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">{{ old('hero_title', $page->hero_title) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">GIF Image</label>
                    @if($page->hero_gif)
                        <div class="mb-3">
                            <img src="{{ asset('storage/'.$page->hero_gif) }}" class="h-20 rounded bg-slate-200">
                        </div>
                    @endif
                    <input type="file" name="hero_gif" accept="image/gif,image/jpeg,image/png" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-2.5 text-slate-400 text-sm focus:outline-none file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-[11px] file:font-black file:uppercase file:tracking-wider file:bg-indigo-500/20 file:text-indigo-400 hover:file:bg-indigo-500/30 transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Price Starts From</label>
                    <input type="number" step="0.01" name="hero_price_from" value="{{ old('hero_price_from', $page->hero_price_from) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Price Unit</label>
                    <input type="text" name="hero_price_unit" value="{{ old('hero_price_unit', $page->hero_price_unit) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Delivery Capacity</label>
                    <input type="text" name="hero_delivery_capacity" value="{{ old('hero_delivery_capacity', $page->hero_delivery_capacity) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Delivery Subtitle</label>
                    <input type="text" name="hero_delivery_subtitle" value="{{ old('hero_delivery_subtitle', $page->hero_delivery_subtitle) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
            </div>
        </div>

        {{-- ── TOUR SECTION ──────────────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2"><i class="ri-play-circle-line text-indigo-400"></i> Quick Tour</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Tour Title</label>
                    <input type="text" name="tour_title" value="{{ old('tour_title', $page->tour_title) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none flex-1 mb-4">
                    
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Tour Subtitle</label>
                    <textarea name="tour_subtitle" rows="3" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none">{{ old('tour_subtitle', $page->tour_subtitle) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Video URL</label>
                    <input type="url" name="tour_video_url" value="{{ old('tour_video_url', $page->tour_video_url) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none flex-1 mb-4">
                    
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Video Thumbnail</label>
                    @if($page->tour_video_thumbnail)
                        <img src="{{ asset('storage/'.$page->tour_video_thumbnail) }}" class="h-20 rounded mb-2">
                    @endif
                    <input type="file" name="tour_video_thumbnail" accept="image/*" class="w-full bg-slate-800/50 text-slate-400 text-sm">
                </div>
            </div>
        </div>

        {{-- ── VALUE PROPOSITION ──────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2"><i class="ri-chat-quote-line text-indigo-400"></i> Value Proposition (Quote)</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Quote Text</label>
                    <textarea name="value_quote" rows="4" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none mb-4">{{ old('value_quote', $page->value_quote) }}</textarea>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Author</label>
                            <input type="text" name="value_quote_author" value="{{ old('value_quote_author', $page->value_quote_author) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Role</label>
                            <input type="text" name="value_quote_role" value="{{ old('value_quote_role', $page->value_quote_role) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Product Image (Hero)</label>
                    @if($page->value_image)
                        <img src="{{ asset('storage/'.$page->value_image) }}" class="h-24 rounded bg-white mb-2">
                    @endif
                    <input type="file" name="value_image" accept="image/*" class="w-full bg-slate-800/50 text-slate-400 text-sm">
                </div>
            </div>
        </div>

        {{-- ── PORTFOLIO IMAGES ──────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2"><i class="ri-image-2-line text-indigo-400"></i> Portfolio Images</h3>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 mb-6">
                @foreach($page->portfolio_images ?? [] as $idx => $img)
                    <div class="relative bg-slate-800 rounded p-2 border border-white/10 group">
                        <img src="{{ !empty($img['image_path']) ? asset('storage/'.$img['image_path']) : $img['image_url'] }}" class="w-full h-24 object-cover rounded">
                        <input type="hidden" name="portfolio_keep[]" value="{{ $idx }}">
                        <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center -mt-2 -mr-2 opacity-0 group-hover:opacity-100 transition-opacity" onclick="this.parentElement.remove()"><i class="ri-close-line"></i></button>
                    </div>
                @endforeach
            </div>

            <div>
                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Add New Images</label>
                <input type="file" name="portfolio_images_upload[]" multiple accept="image/*" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-slate-400 text-sm focus:outline-none">
            </div>
        </div>

        {{-- ── FAQs ──────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2"><i class="ri-question-answer-line text-indigo-400"></i> FAQs</h3>
            
            <div id="faqs-container" class="space-y-4">
                @foreach($page->faqs ?? [] as $i => $faq)
                    <div class="flex gap-4 items-start faq-item bg-white/5 p-4 rounded-xl">
                        <div class="flex-1 space-y-2">
                            <input type="text" name="faq_q[]" value="{{ $faq['q'] }}" placeholder="Question..." class="w-full bg-slate-800 border border-white/10 rounded px-4 py-2 text-white text-sm">
                            <textarea name="faq_a[]" placeholder="Answer..." rows="2" class="w-full bg-slate-800 border border-white/10 rounded px-4 py-2 text-white text-sm">{{ $faq['a'] }}</textarea>
                        </div>
                        <button type="button" onclick="this.closest('.faq-item').remove()" class="text-red-400 hover:text-red-300 p-2"><i class="ri-delete-bin-line"></i></button>
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addFaq()" class="mt-4 px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded text-sm"><i class="ri-add-line"></i> Add FAQ</button>
        </div>

        <script>
            function addFaq() {
                const html = `
                    <div class="flex gap-4 items-start faq-item bg-white/5 p-4 rounded-xl">
                        <div class="flex-1 space-y-2">
                            <input type="text" name="faq_q[]" placeholder="Question..." class="w-full bg-slate-800 border border-white/10 rounded px-4 py-2 text-white text-sm">
                            <textarea name="faq_a[]" placeholder="Answer..." rows="2" class="w-full bg-slate-800 border border-white/10 rounded px-4 py-2 text-white text-sm"></textarea>
                        </div>
                        <button type="button" onclick="this.closest('.faq-item').remove()" class="text-red-400 hover:text-red-300 p-2"><i class="ri-delete-bin-line"></i></button>
                    </div>
                `;
                document.getElementById('faqs-container').insertAdjacentHTML('beforeend', html);
            }
        </script>

        <div class="flex justify-end pt-6 border-t border-white/10">
            <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-all shadow-lg flex items-center gap-2">
                <i class="ri-save-line"></i> Save Settings
            </button>
        </div>

    </form>
</div>
@endsection
