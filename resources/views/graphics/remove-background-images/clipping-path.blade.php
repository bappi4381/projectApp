@extends('layouts.app')
@section('title', 'Professional Clipping Path Service | Graphics Studio')
@section('meta_description', 'Hand-drawn vector clipping paths for precise product cutouts. High-quality Photoshop Pen Tool paths used by photographers and agencies.')

@section('content')
<div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-[#0ea5e9] selection:text-white pb-20">

    {{-- ── HERO SECTION ────────────────────────────────── --}}
    @include('graphics.partials.service-hero', [
        'title' => 'CLIPPING PATH <br>SERVICE',
        'description' => 'Precise hand-drawn vector paths for pixel-perfect image cutouts and high-quality product photography.',
        'hero_image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80',
        'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
    ])

    {{-- ── INTRO TEXT ──────────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-4xl py-20 text-center">
        <h2 class="text-[28px] md:text-[34px] font-black text-[#074b7c] mb-6 uppercase tracking-tight">
            THE FOUNDATION OF MODERN PHOTO EDITING
        </h2>
        <p class="text-slate-500 text-[16px] md:text-[18px] leading-relaxed max-w-3xl mx-auto mb-12">
            A clipping path is not just a cutout; it is a master vector path that allows for non-destructive editing, background replacement, and crisp, sharp edges that define professional photography.
        </p>

        <div class="flex justify-center gap-2 mb-12">
            <div class="w-10 h-1 bg-[#4ade80] rounded-full"></div>
            <div class="w-10 h-1 bg-[#0ea5e9] rounded-full"></div>
            <div class="w-10 h-1 bg-[#f97316] rounded-full"></div>
        </div>
    </div>

    {{-- ── BEFORE/AFTER SLIDER ────────────────────────── --}}
    <div class="bg-[#f8fafc] py-24">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                {{-- Left: Slider --}}
                <div class="relative overflow-hidden rounded-xl shadow-2xl before-after-service-container group" style="height: 500px; cursor: ew-resize;">
                    {{-- AFTER image (Clipped) --}}
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80" alt="Clipped Path" class="absolute inset-0 w-full h-full object-cover">
                    
                    {{-- BEFORE image (with Vector Path overlay mockup) --}}
                    <div class="absolute inset-0 before-after-service-clip z-10" style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80&sepia=100" alt="Pen Path Mockup" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-sky-500/10 pointer-events-none"></div>
                    </div>

                    {{-- Labels --}}
                    <div class="absolute bottom-6 left-6 z-20 bg-slate-900/80 text-white text-[10px] font-bold px-4 py-2 uppercase tracking-widest rounded backdrop-blur-md">VECTOR PATH</div>
                    <div class="absolute bottom-6 right-6 z-20 bg-sky-500/80 text-white text-[10px] font-bold px-4 py-2 uppercase tracking-widest rounded backdrop-blur-md">RESULT</div>

                    {{-- Handle --}}
                    <div class="absolute top-0 bottom-0 z-30 before-after-service-handle" style="left: 50%; transform: translateX(-50%);">
                        <div class="absolute top-0 bottom-0 w-[2px] bg-white/80" style="left: 50%; transform: translateX(-50%);"></div>
                        <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-10 h-10 rounded-full border-2 border-white bg-slate-900 shadow-xl flex items-center justify-center transition-transform hover:scale-110" style="left: 50%;">
                            <i class="ri-arrow-left-right-line text-white text-lg"></i>
                        </div>
                    </div>
                </div>

                {{-- Right: Content --}}
                <div class="text-left space-y-8">
                    <h2 class="text-[32px] md:text-[40px] font-black text-slate-900 leading-[1.1]">
                        100% HAND-DRAWN<br><span class="text-[#0ea5e9]">PEN TOOL</span> PATHS
                    </h2>
                    <p class="text-slate-600 text-[16px] md:text-[18px] leading-relaxed">
                        Say goodbye to automated selection errors. We provide hand-traced vector paths that perfectly follow the object silhouette, including multi-clipping paths for separate object components.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            Simple to Super-Complex Paths
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            Multi-Clipping Paths for Color Changing
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            Non-Destructive Photoshop Paths
                        </li>
                    </ul>
                    <div class="pt-6">
                        <a href="{{ route('graphics.get-quote') }}" class="inline-flex items-center justify-center px-10 py-3.5 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-sm tracking-widest shadow-lg hover:brightness-105 transition-all">
                            GET A QUOTE
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ── VALUE PROPOSITION ──────────────────────────── --}}
    <div class="bg-white py-24">
        <div class="container mx-auto px-6 max-w-6xl text-center">
            <h2 class="text-[28px] md:text-[36px] font-black text-slate-900 mb-16 uppercase tracking-tight">
                ELITE <span class="text-[#0ea5e9]">PEN TOOL</span> EXPERTISE
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-sky-50 flex items-center justify-center mb-8 group-hover:bg-sky-500 transition-colors">
                        <i class="ri-pen-nib-line text-3xl text-sky-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">Vector Precision</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Sharp, smooth edges that look natural even at 400% zoom levels."</p>
                </div>

                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center mb-8 group-hover:bg-emerald-500 transition-colors">
                        <i class="ri-dashboard-3-line text-3xl text-emerald-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">Multi-Path Options</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Separate clothing, skin, and backgrounds for granular post-production control."</p>
                </div>

                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-amber-50 flex items-center justify-center mb-8 group-hover:bg-amber-500 transition-colors">
                        <i class="ri-award-line text-3xl text-amber-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">ISO Quality</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Strict QA processes ensuring every path is closed and correctly named."</p>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const containers = document.querySelectorAll('.before-after-service-container');
        containers.forEach(container => {
            const clip = container.querySelector('.before-after-service-clip');
            const handle = container.querySelector('.before-after-service-handle');
            let isDragging = false;
            const updatePos = (clientX) => {
                const rect = container.getBoundingClientRect();
                let x = clientX - rect.left;
                let percent = (x / rect.width) * 100;
                percent = Math.max(0, Math.min(100, percent));
                clip.style.clipPath = `polygon(0 0, ${percent}% 0, ${percent}% 100%, 0 100%)`;
                handle.style.left = `${percent}%`;
            };
            const onStart = (e) => { isDragging = true; updatePos(e.type.includes('touch') ? e.touches[0].clientX : e.clientX); };
            const onMove = (e) => { if (isDragging) updatePos(e.type.includes('touch') ? e.touches[0].clientX : e.clientX); };
            const onEnd = () => { isDragging = false; };
            container.addEventListener('mousedown', onStart);
            window.addEventListener('mousemove', onMove);
            window.addEventListener('mouseup', onEnd);
            container.addEventListener('touchstart', onStart, { passive: true });
            window.addEventListener('touchmove', onMove, { passive: true });
            window.addEventListener('touchend', onEnd);
        });
    });
</script>
@endsection
