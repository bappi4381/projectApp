@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')
@section('title', $service->name . ' | Variant Details')
@section('meta_description', Str::limit(strip_tags($service->description ?? ''), 160))

@section('content')
    <div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-[#0ea5e9] selection:text-white pb-20">

        {{-- ── HERO SECTION ────────────────────────────────── --}}
        @include('graphics.partials.service-hero', [
            'title' => strtoupper($service->name),
            'description' => $service->description ?? 'Professional ' . $service->name . ' services with pixel-perfect precision and fast turnaround.',
            'hero_image' => $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ])

        {{-- ── STATS STRIP ────────────────────────────────── --}}
        <div class="bg-black text-white py-10">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <i class="ri-price-tag-3-line text-2xl mb-3 block text-emerald-400"></i>
                        <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mb-1">Variant Price</div>
                        <div class="text-2xl font-black text-white">${{ number_format($service->starting_price ?? 0.49, 2) }}</div>
                        <div class="text-[10px] text-slate-500 mt-1">{{ $service->price_unit ?? 'Per Image' }}</div>
                    </div>
                    {{-- Add other stats if needed --}}
                </div>
            </div>
        </div>

        {{-- ── VARIANT CONTENT ───────────────────────────── --}}
        <div class="container mx-auto px-6 max-w-4xl py-20 text-center">
            <h2 class="text-[28px] md:text-[34px] font-black text-[#082f49] mb-6 uppercase tracking-tight leading-tight">
                {{ strtoupper($service->name) }} DETAILS
            </h2>
            <div class="text-slate-600 text-sm leading-relaxed text-justify space-y-6">
                {!! nl2br(e($service->description)) !!}
            </div>
        </div>

        {{-- Before/After Comparison --}}
        <div class="container mx-auto px-6 max-w-4xl mb-20">
            <div class="bg-white rounded-xl overflow-hidden shadow-2xl border border-slate-100 flex flex-col group h-full transition-all">
                <div class="relative overflow-hidden bg-slate-100 before-after-container aspect-[16/9] cursor-ew-resize">
                    <img src="{{ $service->image_before ? asset('storage/' . $service->image_before) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1200&q=80' }}" alt="Before" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 before-after-clip overflow-hidden" style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                        <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1200&q=80&sat=-100' }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div class="absolute top-0 bottom-0 z-20 before-after-handle" style="left: 50%; transform: translateX(-50%);">
                        <div class="absolute top-0 bottom-0 w-[2px] bg-white/80" style="left: 50%; transform: translateX(-50%);"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.before-after-container').forEach(function (container) {
                const clip = container.querySelector('.before-after-clip');
                const handle = container.querySelector('.before-after-handle');
                let isDragging = false;

                function updatePosition(x) {
                    const rect = container.getBoundingClientRect();
                    let pos = ((x - rect.left) / rect.width) * 100;
                    pos = Math.max(0, Math.min(100, pos));
                    clip.style.clipPath = `polygon(0 0, ${pos}% 0, ${pos}% 100%, 0 100%)`;
                    handle.style.left = pos + '%';
                }

                container.addEventListener('mousedown', (e) => { isDragging = true; updatePosition(e.clientX); });
                document.addEventListener('mousemove', (e) => { if (isDragging) updatePosition(e.clientX); });
                document.addEventListener('mouseup', () => { isDragging = false; });
            });
        });
    </script>
@endsection
