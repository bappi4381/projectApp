@extends('layouts.admin')
@section('title', 'Portfolio Page Settings | Graphics Studio')

@section('content')
<div class="p-8">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Portfolio Page Settings</h1>
            <p class="text-slate-400 font-medium text-sm">Manage dynamic content for the "Our Work" portfolio page</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
            <i class="ri-checkbox-circle-line text-xl"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.graphics.portfolio-page.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8 reveal reveal-delay-1">
        @csrf
        @method('PUT')

        {{-- ── HERO SECTION ──────────────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2"><i class="ri-layout-top-line text-indigo-400"></i> Header Text</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Eyebrow Badge</label>
                    <input type="text" name="hero_badge" value="{{ old('hero_badge', $page->hero_badge) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Subtitle / Description</label>
                    <textarea name="hero_subtitle" rows="3" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">{{ old('hero_subtitle', $page->hero_subtitle) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Title (White text)</label>
                    <input type="text" name="hero_title_regular" value="{{ old('hero_title_regular', $page->hero_title_regular) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Title (Gradient text)</label>
                    <input type="text" name="hero_title_highlight" value="{{ old('hero_title_highlight', $page->hero_title_highlight) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition-all">
                </div>
            </div>
        </div>

        {{-- ── CTA SECTION ──────────────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2"><i class="ri-flashlight-line text-indigo-400"></i> Call to Action (Bottom)</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">CTA Title</label>
                    <input type="text" name="cta_title" value="{{ old('cta_title', $page->cta_title) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50">
                    
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 mt-4">CTA Description</label>
                    <textarea name="cta_desc" rows="3" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50">{{ old('cta_desc', $page->cta_desc) }}</textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Button Label</label>
                    <input type="text" name="cta_btn_label" value="{{ old('cta_btn_label', $page->cta_btn_label) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50">
                    
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2 mt-4">Button Link</label>
                    <input type="text" name="cta_btn_link" value="{{ old('cta_btn_link', $page->cta_btn_link) }}" class="w-full bg-slate-800/50 border border-white/5 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50">
                </div>
            </div>
        </div>

        {{-- ── SHOWCASE ITEMS ──────────────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                <i class="ri-image-edit-line text-indigo-400"></i> Showcase Items
            </h3>
            
            <div id="showcase-items-container" class="space-y-6">
                @foreach($page->showcase_items ?? [] as $i => $item)
                <div class="p-6 bg-slate-800/40 border border-white/5 rounded-xl relative showcase-item" data-index="{{ $i }}">
                    <button type="button" class="absolute top-4 right-4 text-red-400 hover:text-red-300 transition-colors" onclick="this.closest('.showcase-item').remove()">
                        <i class="ri-delete-bin-line text-xl"></i>
                    </button>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pr-8">
                        <div>
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Title</label>
                            <input type="text" name="showcase_items[{{$i}}][title]" value="{{ $item['title'] }}" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">
                            
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Category (Filter Label)</label>
                            <input type="text" name="showcase_items[{{$i}}][category]" value="{{ $item['category'] }}" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">

                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Description</label>
                            <textarea name="showcase_items[{{$i}}][desc]" rows="2" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm">{{ $item['desc'] }}</textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Before Image</label>
                                @if(!empty($item['before']))
                                    <img src="{{ asset('storage/'.$item['before']) }}" class="h-24 w-full object-cover rounded mb-2 border border-slate-700">
                                @else
                                    <img src="{{ $item['fallback_before'] ?? 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80' }}" class="h-24 w-full object-cover rounded mb-2 border border-slate-700 opacity-50">
                                @endif
                                <input type="file" name="showcase_items[{{$i}}][before_upload]" accept="image/*" class="w-full text-xs text-slate-400">
                                <input type="hidden" name="showcase_items[{{$i}}][old_before]" value="{{ $item['before'] ?? '' }}">
                            </div>
                            <div>
                                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">After Image</label>
                                @if(!empty($item['after']))
                                    <img src="{{ asset('storage/'.$item['after']) }}" class="h-24 w-full object-cover rounded mb-2 border border-slate-700">
                                @else
                                    <img src="{{ $item['fallback_after'] ?? 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80' }}" class="h-24 w-full object-cover rounded mb-2 border border-slate-700 opacity-50">
                                @endif
                                <input type="file" name="showcase_items[{{$i}}][after_upload]" accept="image/*" class="w-full text-xs text-slate-400">
                                <input type="hidden" name="showcase_items[{{$i}}][old_after]" value="{{ $item['after'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <button type="button" onclick="addShowcaseItem()" class="mt-6 px-6 py-3 bg-white/5 hover:bg-white/10 border border-white/10 border-dashed text-white rounded-xl text-sm font-bold w-full transition-all flex items-center justify-center gap-2">
                <i class="ri-add-line"></i> Add New Showcase Item
            </button>
        </div>

        <script>
            let showcaseIndex = {{ count($page->showcase_items ?? []) }};
            
            function addShowcaseItem() {
                const html = `
                <div class="p-6 bg-slate-800/40 border border-white/5 rounded-xl relative showcase-item" data-index="${showcaseIndex}">
                    <button type="button" class="absolute top-4 right-4 text-red-400 hover:text-red-300 transition-colors" onclick="this.closest('.showcase-item').remove()">
                        <i class="ri-delete-bin-line text-xl"></i>
                    </button>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pr-8">
                        <div>
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Title</label>
                            <input type="text" name="showcase_items[${showcaseIndex}][title]" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">
                            
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Category (Filter Label)</label>
                            <input type="text" name="showcase_items[${showcaseIndex}][category]" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">

                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Description</label>
                            <textarea name="showcase_items[${showcaseIndex}][desc]" rows="2" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Before Image</label>
                                <input type="file" name="showcase_items[${showcaseIndex}][before_upload]" accept="image/*" class="w-full text-xs text-slate-400 mt-2">
                            </div>
                            <div>
                                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">After Image</label>
                                <input type="file" name="showcase_items[${showcaseIndex}][after_upload]" accept="image/*" class="w-full text-xs text-slate-400 mt-2">
                            </div>
                        </div>
                    </div>
                </div>`;
                
                document.getElementById('showcase-items-container').insertAdjacentHTML('beforeend', html);
                showcaseIndex++;
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
