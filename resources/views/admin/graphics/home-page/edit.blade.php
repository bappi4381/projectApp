@extends('layouts.admin')
@section('title', 'Home Page Settings | Graphics Studio')

@section('content')
<div class="p-8">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 reveal">
        <div>
            <h1 class="text-3xl font-bold text-white mb-2 tracking-tight">Home Page / Hero Slider</h1>
            <p class="text-slate-400 font-medium text-sm">Manage dynamic content for the main banner slider.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-6 py-4 rounded-2xl mb-8 flex items-center gap-3">
            <i class="ri-checkbox-circle-line text-xl"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.graphics.home-page.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8 reveal reveal-delay-1">
        @csrf
        @method('PUT')

        {{-- ── HERO SLIDERS ──────────────────────────── --}}
        <div class="glass-card rounded-[24px] border-white/5 p-8 relative overflow-hidden">
            <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                <i class="ri-slideshow-line text-indigo-400"></i> Hero Slides
            </h3>
            
            <div id="slides-container" class="space-y-6">
                @foreach($page->hero_slides ?? [] as $i => $item)
                <div class="p-6 bg-slate-800/40 border border-white/5 rounded-xl relative hero-slide-item" data-index="{{ $i }}">
                    <button type="button" class="absolute top-4 right-4 text-red-400 hover:text-red-300 transition-colors bg-red-400/10 p-2 rounded-lg" onclick="this.closest('.hero-slide-item').remove()">
                        <i class="ri-delete-bin-line text-xl"></i> Remove Slide
                    </button>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pr-8 mt-6">
                        <div>
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Badge Text (Optional)</label>
                            <input type="text" name="hero_slides[{{$i}}][badge]" value="{{ $item['badge'] ?? '' }}" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">

                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Title (HTML allowed block)</label>
                            <input type="text" name="hero_slides[{{$i}}][title]" value="{{ $item['title'] }}" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4" placeholder="e.g. TITLE <span class='text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-pink-400'>HIGHLIGHT</span> TEXT">
                            
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Accent Color Keyword</label>
                            <select name="hero_slides[{{$i}}][accent]" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">
                                <option value="indigo" {{ ($item['accent'] ?? '') == 'indigo' ? 'selected' : '' }}>Indigo</option>
                                <option value="purple" {{ ($item['accent'] ?? '') == 'purple' ? 'selected' : '' }}>Purple</option>
                                <option value="cyan" {{ ($item['accent'] ?? '') == 'cyan' ? 'selected' : '' }}>Cyan</option>
                                <option value="rose" {{ ($item['accent'] ?? '') == 'rose' ? 'selected' : '' }}>Rose</option>
                                <option value="emerald" {{ ($item['accent'] ?? '') == 'emerald' ? 'selected' : '' }}>Emerald</option>
                            </select>

                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Description</label>
                            <textarea name="hero_slides[{{$i}}][desc]" rows="2" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm">{{ $item['desc'] }}</textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Slide Image (GIF / PNG / JPG)</label>
                            @if(!empty($item['image']))
                                <img src="{{ asset('storage/'.$item['image']) }}" class="h-40 w-full object-cover rounded mb-2 border border-slate-700">
                            @else
                                <img src="{{ $item['fallback_image'] ?? 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=1920&q=80&auto=format&fit=crop' }}" class="h-40 w-full object-cover rounded mb-2 border border-slate-700 opacity-50">
                            @endif
                            <input type="file" name="hero_slides[{{$i}}][image_upload]" accept="image/*" class="w-full text-xs text-slate-400 mt-2">
                            <input type="hidden" name="hero_slides[{{$i}}][old_image]" value="{{ $item['image'] ?? '' }}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <button type="button" onclick="addSlide()" class="mt-6 px-6 py-3 bg-indigo-500/10 hover:bg-indigo-500/20 border border-indigo-500/30 border-dashed text-indigo-400 rounded-xl text-sm font-bold w-full transition-all flex items-center justify-center gap-2">
                <i class="ri-add-line"></i> Add New Slide
            </button>
        </div>

        <script>
            let slideIndex = {{ count($page->hero_slides ?? []) }};
            
            function addSlide() {
                const html = `
                <div class="p-6 bg-slate-800/40 border border-white/5 rounded-xl relative hero-slide-item" data-index="${slideIndex}">
                    <button type="button" class="absolute top-4 right-4 text-red-400 hover:text-red-300 transition-colors bg-red-400/10 p-2 rounded-lg" onclick="this.closest('.hero-slide-item').remove()">
                        <i class="ri-delete-bin-line text-xl"></i> Remove Slide
                    </button>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pr-8 mt-6">
                        <div>
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Badge Text</label>
                            <input type="text" name="hero_slides[${slideIndex}][badge]" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">
                            
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Title (HTML allowed)</label>
                            <input type="text" name="hero_slides[${slideIndex}][title]" value="NEW <span class='text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-pink-400'>SLIDE</span> TITLE" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">

                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Accent Color Keyword</label>
                            <select name="hero_slides[${slideIndex}][accent]" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm mb-4">
                                <option value="indigo">Indigo</option>
                                <option value="purple">Purple</option>
                                <option value="cyan">Cyan</option>
                                <option value="rose">Rose</option>
                                <option value="emerald">Emerald</option>
                            </select>

                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Description</label>
                            <textarea name="hero_slides[${slideIndex}][desc]" rows="2" class="w-full bg-slate-900 border border-white/5 rounded-xl px-4 py-2 text-white text-sm"></textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-2">Slide Image</label>
                            <input type="file" name="hero_slides[${slideIndex}][image_upload]" accept="image/*" class="w-full text-xs text-slate-400 mt-2">
                        </div>
                    </div>
                </div>`;
                
                document.getElementById('slides-container').insertAdjacentHTML('beforeend', html);
                slideIndex++;
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
