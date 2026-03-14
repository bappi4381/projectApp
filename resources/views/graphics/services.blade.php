@extends('layouts.app')
@section('title', 'Services | Graphics Studio')
@section('meta_description', 'Explore our full range of professional photo editing services — from clipping path to high-end retouching and real estate editing.')

@section('content')
<div class="bg-slate-950 min-h-screen text-white font-sans selection:bg-yellow-400 selection:text-slate-900">

    {{-- ── HERO SECTION ────────────────────────────────── --}}
    <div class="pt-32 md:pt-40 lg:pt-44 pb-20 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[500px] bg-gradient-to-b from-yellow-400/10 to-transparent rounded-full blur-[120px] pointer-events-none"></div>
        <div class="container mx-auto px-6 max-w-4xl text-center relative z-10">
            <span class="inline-block px-5 py-2 rounded-full bg-yellow-400/10 text-yellow-400 text-[11px] font-bold tracking-[0.25em] uppercase border border-yellow-400/20 mb-6">
                Expertise in every pixel
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tight text-white mb-6">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-[#22d3ee]">Services</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                We provide a comprehensive suite of high-end image post-production services tailored for photographers, e-commerce, and global brands.
            </p>
        </div>
    </div>

    {{-- ── SERVICES GRID ───────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-7xl pb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $services = [
                ['name'=>'Clipping Path',       'slug'=>'clipping-path',       'icon'=>'ri-scissors-cut-line',    'img'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80',  'desc'=>'Hand-drawn vector paths for pixel-perfect product isolation from any background.'],
                ['name'=>'Background Removal',  'slug'=>'background-removal',  'icon'=>'ri-eraser-line',           'img'=>'https://images.unsplash.com/photo-1584771145729-0bd5095b9d41?w=600&q=80', 'desc'=>'Replace or remove backgrounds to create clean, high-impact product imagery.'],
                ['name'=>'Photo Retouching',    'slug'=>'photo-retouching',    'icon'=>'ri-magic-line',            'img'=>'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=600&q=80', 'desc'=>'High-end portrait and product retouching to remove imperfections and enhance beauty.'],
                ['name'=>'Ghost Mannequin',     'slug'=>'ghost-mannequin',     'icon'=>'ri-shirt-line',            'img'=>'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80', 'desc'=>'Create a 3D, hollow invisible mannequin effect for professional apparel photography.'],
                ['name'=>'Color Correction',    'slug'=>'color-correction',    'icon'=>'ri-palette-line',          'img'=>'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=600&q=80', 'desc'=>'Adjust tones, exposure, and balance to ensure brand consistency across all images.'],
                ['name'=>'Shadow Services',     'slug'=>'shadow-services',     'icon'=>'ri-contrast-2-line',       'img'=>'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80', 'desc'=>'Add depth and realism with natural shadows, drop shadows, or mirror reflections.'],
                ['name'=>'Image Masking',       'slug'=>'image-masking',       'icon'=>'ri-crop-line',             'img'=>'https://images.unsplash.com/photo-1573164713988-8665fc963095?w=600&q=80', 'desc'=>'Advanced masking for hair, fur, and complex transparent objects with fine details.'],
                ['name'=>'Real Estate Editing', 'slug'=>'real-estate-editing', 'icon'=>'ri-home-4-line',           'img'=>'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=600&q=80', 'desc'=>'Sky replacement, HDR blending, and staging for stunning real estate presentations.'],
                ['name'=>'Jewellery Editing',   'slug'=>'jewellery-editing',   'icon'=>'ri-gem-line',              'img'=>'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?w=600&q=80', 'desc'=>'Specialized high-end retouching for jewellery that sparkles and shines perfectly.'],
                ['name'=>'Video Editing',       'slug'=>'video-editing',       'icon'=>'ri-video-line',            'img'=>'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?w=600&q=80', 'desc'=>'Professional video post-production, grading, and sound design for brands.'],
            ];
            @endphp

            @foreach($services as $i => $svc)
            <div class="group relative flex flex-col rounded-[40px] overflow-hidden border border-white/[0.07] bg-white/[0.03] hover:bg-white/[0.06] transition-all duration-500 reveal" style="animation-delay: {{ $i * 0.05 }}s">
                {{-- Media --}}
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ $svc['img'] }}" alt="{{ $svc['name'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                    
                    {{-- Icon Badge --}}
                    <div class="absolute top-8 right-8 w-12 h-12 rounded-2xl bg-yellow-400 flex items-center justify-center text-slate-900 shadow-2xl transition-transform group-hover:rotate-12">
                        <i class="{{ $svc['icon'] }} text-2xl"></i>
                    </div>
                </div>

                {{-- Content --}}
                <div class="p-10 flex-1 flex flex-col">
                    <h3 class="text-2xl font-black text-white mb-4 group-hover:text-yellow-400 transition-colors">{{ $svc['name'] }}</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-8 flex-1 italic">"{{ $svc['desc'] }}"</p>
                    
                    <div class="flex items-center justify-between gap-4 pt-6 border-t border-white/10">
                        <a href="{{ route('graphics.service-detail', $svc['slug']) }}" class="flex items-center gap-2 text-sm font-black uppercase tracking-widest text-[#22d3ee] hover:text-white transition-colors">
                            Explore Service <i class="ri-arrow-right-line"></i>
                        </a>
                        <div class="text-[10px] font-black uppercase tracking-tighter text-slate-500">Starting $0.39</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── STATS STRIP ────────────────────────────────── --}}
    <div class="py-20 border-t border-b border-white/5 bg-white/[0.01]">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 text-center">
                @foreach([
                    ['30+','Years Experience'],
                    ['250+','Creative Designers'],
                    ['24/7','Customer Support'],
                    ['10M+','Images Processed'],
                ] as $stat)
                <div class="reveal">
                    <div class="text-4xl md:text-5xl font-black text-white mb-2">{{ $stat[0] }}</div>
                    <div class="text-[11px] font-black uppercase tracking-[0.3em] text-yellow-400/80">{{ $stat[1] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── BOTTOM CTA ──────────────────────────────────── --}}
    <div class="py-32 text-center">
        <div class="container mx-auto px-6 max-w-4xl reveal">
            <h2 class="text-4xl md:text-6xl font-black text-white mb-8">Ready to start?</h2>
            <p class="text-slate-400 text-lg mb-12">Join thousands of brands who trust us for their ongoing image post-production needs.</p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="{{ route('graphics.get-quote') }}" class="px-12 py-5 rounded-2xl bg-yellow-400 text-slate-900 font-black text-sm uppercase tracking-widest hover:scale-105 transition-all shadow-2xl shadow-yellow-400/20">
                    Get Free Estimate
                </a>
                <a href="{{ route('graphics.portfolio') }}" class="px-12 py-5 rounded-2xl border border-white/10 hover:border-white/30 text-white font-black text-sm uppercase tracking-widest transition-all">
                    View Portfolio
                </a>
            </div>
        </div>
    </div>

</div>

<style>
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        animation: reveal 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
    }
    @keyframes reveal {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection
