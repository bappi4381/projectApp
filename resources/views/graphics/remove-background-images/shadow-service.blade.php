@extends('layouts.app')
@section('title', 'Photoshop Shadow Creation Service | Graphics Studio')
@section('meta_description', 'High-quality Photoshop shadow service for product images. Price starts from $0.25 per image.')

@section('content')
<div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-[#0ea5e9] selection:text-white pb-20">

    {{-- ── HERO SECTION ────────────────────────────────── --}}
    @include('graphics.partials.service-hero', [
        'title' => 'PHOTOSHOP SHADOW <br>CREATION',
        'description' => 'Photoshop shadow service is one of the most important photo editing services for product display.',
        'hero_image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80',
        'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
    ])

    {{-- ── INTRO TEXT ──────────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-4xl py-20 text-center">
        <h2 class="text-[28px] md:text-[34px] font-black text-[#074b7c] mb-6 uppercase tracking-tight">
            ELEVATE YOUR PRODUCT PRESENTATION
        </h2>
        <p class="text-slate-500 text-[16px] md:text-[18px] leading-relaxed max-w-3xl mx-auto mb-12">
            Adding depth, dimension, and realism to flat images by introducing natural, reflection, or drop shadows enhances the visual appeal and credibility of product presentations.
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
                    {{-- AFTER image (with shadow) --}}
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80" alt="After Shadow" class="absolute inset-0 w-full h-full object-cover">
                    
                    {{-- BEFORE image (no shadow) --}}
                    <div class="absolute inset-0 before-after-service-clip z-10" style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80&sat=-100" alt="Before Original" class="absolute inset-0 w-full h-full object-cover">
                    </div>

                    {{-- Labels --}}
                    <div class="absolute bottom-6 left-6 z-20 bg-slate-900/80 text-white text-[10px] font-bold px-4 py-2 uppercase tracking-widest rounded backdrop-blur-md">BEFORE</div>
                    <div class="absolute bottom-6 right-6 z-20 bg-sky-500/80 text-white text-[10px] font-bold px-4 py-2 uppercase tracking-widest rounded backdrop-blur-md">AFTER</div>

                    {{-- Handle --}}
                    <div class="absolute top-0 bottom-0 z-30 before-after-service-handle" style="left: 50%; transform: translateX(-50%);">
                        <div class="absolute top-0 bottom-0 w-[2px] bg-white/80 shadow-[0_0_10px_rgba(255,255,255,0.5)]" style="left: 50%; transform: translateX(-50%);"></div>
                        <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-10 h-10 rounded-full border-2 border-white bg-slate-900 shadow-xl flex items-center justify-center transition-transform hover:scale-110" style="left: 50%;">
                            <i class="ri-arrow-left-right-line text-white text-lg"></i>
                        </div>
                    </div>
                </div>

                {{-- Right: Content --}}
                <div class="text-left space-y-8">
                    <h2 class="text-[32px] md:text-[40px] font-black text-slate-900 leading-[1.1]">
                        NATURAL <span class="text-[#0ea5e9]">SHADOWS</span><br>FOR REALISM
                    </h2>
                    <p class="text-slate-600 text-[16px] md:text-[18px] leading-relaxed">
                        Raw product shots often look flat and unappealing. Our expert Photoshop artists create custom shadows that ground your products, adding texture and a high-end feel that drives buyer confidence.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            Natural Drop Shadows
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            Mirror Reflection Effects
                        </li>
                        <li class="flex items-center gap-3 text-slate-700 font-bold">
                            <i class="ri-checkbox-circle-fill text-[#22c55e] text-xl"></i>
                            3D Casting Shadows
                        </li>
                    </ul>
                    <div class="pt-6">
                        <a href="{{ route('graphics.get-quote') }}" class="inline-flex items-center justify-center px-10 py-3.5 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-sm tracking-widest shadow-lg hover:brightness-105 transition-all">
                            START FREE TRIAL
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
                WHY CHOOSE OUR <span class="text-[#0ea5e9]">SHADOW</span> SERVICE?
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                {{-- Quick Turnaround --}}
                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-sky-50 flex items-center justify-center mb-8 group-hover:bg-sky-500 transition-colors">
                        <i class="ri-time-line text-3xl text-sky-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">24HR Turnaround</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Get your edited images back in less than 24 hours without sacrificing quality."</p>
                </div>

                {{-- Bulk Capacity --}}
                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-emerald-50 flex items-center justify-center mb-8 group-hover:bg-emerald-500 transition-colors">
                        <i class="ri-stack-line text-3xl text-emerald-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">Bulk Editing</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Our production capacity of 5000+ images per day allows us to handle any project size."</p>
                </div>

                {{-- Premium Quality --}}
                <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm hover:shadow-xl transition-shadow group">
                    <div class="w-16 h-16 rounded-2xl bg-amber-50 flex items-center justify-center mb-8 group-hover:bg-amber-500 transition-colors">
                        <i class="ri-medal-2-line text-3xl text-amber-500 group-hover:text-white transition-colors"></i>
                    </div>
                    <h3 class="text-xl font-black mb-4 text-slate-900 uppercase">Top Tier Quality</h3>
                    <p class="text-slate-500 leading-relaxed italic">"Precision hand-drawn paths and pixel-perfect masking for truly pro results."</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ── FAQ SECTION ──────────────────────────── --}}
    <div class="bg-[#0b141a] py-24 pb-32">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-white font-bold text-[32px] md:text-[38px] mb-12">
                Frequently Asked Questions (FAQ)
            </h2>

            <div class="flex gap-2 mb-16">
                <div class="w-2.5 h-2.5 bg-[#84cc16]"></div>
                <div class="w-2.5 h-2.5 bg-[#eab308]"></div>
                <div class="w-2.5 h-2.5 bg-[#0284c7]"></div>
                <div class="w-2.5 h-2.5 bg-[#0d9488]"></div>
            </div>
            
            <div class="space-y-4">
                @php
                    $faqs = [
                        [
                            'q' => 'What is Photoshop Shadow Creation?',
                            'a' => 'Photoshop shadow creation involves adding digital shadows to product images to make them look realistic and grounded on a surface, rather than "floating" in white space.',
                        ],
                        [
                            'q' => 'What are the types of shadows you offer?',
                            'a' => 'We offer Drop Shadows, Natural Shadows, Reflection/Mirror Shadows, and Cast Shadows to suit different product photography styles.',
                        ],
                        [
                            'q' => 'How long does it take to process my images?',
                            'a' => 'Most orders are completed within 12 to 24 hours. Bulk orders may take slightly longer depending on the volume.',
                        ],
                        [
                            'q' => 'Can I request a sample before placing a bulk order?',
                            'a' => 'Yes! We offer a free trial for up to 3 images so you can assess our quality before committing to a larger order.',
                        ],
                    ];
                @endphp

                @foreach ($faqs as $index => $faq)
                    <div class="faq-item border-b border-slate-700/60 pb-6 pt-4">
                        <button class="w-full flex items-center justify-between text-left text-white group outline-none" onclick="toggleFaq(this)">
                            <div class="flex items-center gap-10">
                                <span class="font-normal text-[15px] md:text-[16px] text-slate-500 w-6 shrink-0">{{ $index + 1 }}</span>
                                <span class="font-bold text-[15px] md:text-[16px] group-hover:text-slate-300 transition-colors">{{ $faq['q'] }}</span>
                            </div>
                            <span class="text-[20px] font-bold text-white group-hover:text-slate-300 leading-none transition-transform duration-300 faq-icon">+</span>
                        </button>
                        <div class="faq-content hidden mt-6 pl-16 pr-12">
                            <p class="text-slate-400 text-[14.5px] leading-relaxed">
                                {{ $faq['a'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

<style>
    .faq-item.active .faq-icon { transform: rotate(45deg); }
</style>

<script>
    function toggleFaq(btn) {
        const item = btn.closest('.faq-item');
        const content = item.querySelector('.faq-content');
        const isActive = item.classList.contains('active');

        document.querySelectorAll('.faq-item').forEach(el => {
            el.classList.remove('active');
            el.querySelector('.faq-content').classList.add('hidden');
        });

        if (!isActive) {
            item.classList.add('active');
            content.classList.remove('hidden');
        }
    }

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

                if (percent < 0) percent = 0;
                if (percent > 100) percent = 100;

                clip.style.clipPath = `polygon(0 0, ${percent}% 0, ${percent}% 100%, 0 100%)`;
                handle.style.left = `${percent}%`;
            };

            const onStart = (e) => {
                isDragging = true;
                const x = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                updatePos(x);
            };

            const onMove = (e) => {
                if (!isDragging) return;
                const x = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
                updatePos(x);
            };

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
