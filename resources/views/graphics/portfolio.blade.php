{{-- resources/views/graphics/portfolio.blade.php --}}
@extends('layouts.app')
@section('title', 'Our Portfolio | Graphics Studio')

@section('content')
<div class="bg-slate-950 min-h-screen pt-32 md:pt-40 lg:pt-44 pb-24 font-sans text-white selection:bg-[#6366f1] selection:text-white">
    <div class="container mx-auto px-6 max-w-7xl">
        {{-- Header Section --}}
        <div class="text-center mb-20 reveal">
            <span class="inline-block px-4 py-1.5 rounded-full bg-[#6366f1]/10 text-[#818cf8] text-sm font-semibold tracking-wide border border-[#6366f1]/20 mb-6 uppercase">
                Our Work
            </span>
            <h1 class="text-5xl md:text-7xl font-black mb-6 tracking-tight text-white drop-shadow-lg">
                Visuals that <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#6366f1] to-[#22d3ee]">Speak Louder.</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Explore our digital playground where imagination meets pixel-perfect execution. We transform concepts into captivating visual journeys.
            </p>
        </div>

        <div x-data="{ activeFilter: 'All Work' }">
            {{-- Filters (Interactive) --}}
            <div class="flex flex-wrap justify-center gap-2 md:gap-3 mb-16 reveal" style="animation-delay: 0.1s">
                @php
                    $filters = ['All Work', 'Photo Retouching', 'Ghost Mannequin', 'Product Editing', 'Background Removal', 'Image Manipulation', 'Color Correction'];
                @endphp
                @foreach($filters as $filter)
                    <button 
                        @click="activeFilter = '{{ $filter }}'"
                        :class="activeFilter === '{{ $filter }}' ? 'bg-[#6366f1] text-white shadow-lg shadow-[#6366f1]/25 border-[#6366f1]' : 'bg-white/5 border border-white/5 text-slate-300 hover:bg-white/10 hover:text-white'"
                        class="px-5 py-2 text-sm md:px-6 rounded-full font-medium transition-all duration-300 cursor-pointer">
                        {{ $filter }}
                    </button>
                @endforeach
            </div>

            {{-- Portfolio Before/After Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 xl:gap-14">
            @php
            $showcaseItems = [
                [
                    'title' => 'Product Enhancement',
                    'category' => 'Photo Retouching',
                    'desc' => 'Polishing imperfections and correcting colors for a flawless commercial look that elevates brand perception.',
                    'before' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80', 
                ],
                [
                    'title' => 'Digital Apparel',
                    'category' => 'Ghost Mannequin',
                    'desc' => 'Removing mannequins and adding neck joints to create a premium ghost mannequin effect for eCommerce.',
                    'before' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=800&q=80',
                ],
                [
                    'title' => 'Cosmetic Perfection',
                    'category' => 'Product Editing',
                    'desc' => 'Enhancing lighting, reflections, and sharpness to meet the high standards of global cosmetic brands.',
                    'before' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=800&q=80',
                ],
                [
                    'title' => 'Real Estate Magic',
                    'category' => 'Background Removal',
                    'desc' => 'Replacing dull skies and balancing interior lighting to make architectural photography irresistible.',
                    'before' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=800&q=80',
                ],
                [
                    'title' => 'Creative Compositing',
                    'category' => 'Image Manipulation',
                    'desc' => 'Blending multiple elements into one cohesive, surreal environment for advertising campaigns.',
                    'before' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=800&q=80',
                ],
                [
                    'title' => 'Cinematic Grading',
                    'category' => 'Color Correction',
                    'desc' => 'Fixing white balances and applying cinematic color grades to set the perfect mood for editorials.',
                    'before' => 'https://images.unsplash.com/photo-1618761714954-0b8cd0026356?w=800&q=80',
                    'after' => 'https://images.unsplash.com/photo-1618761714954-0b8cd0026356?w=800&q=80',
                ]
            ];
            @endphp

            @foreach($showcaseItems as $i => $item)
            <div class="group flex flex-col reveal" 
                 x-show="activeFilter === 'All Work' || activeFilter === '{{ $item['category'] }}'"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 style="animation-delay: {{ ($i % 3) * 0.15 }}s">
                {{-- Comparison Slider --}}
                <div class="relative w-full aspect-[4/5] overflow-hidden rounded-3xl shadow-[0_20px_40px_-10px_rgba(0,0,0,0.5)] mb-8 bg-slate-900 border border-slate-800"
                    x-data="{ 
                        position: 50, 
                        isDragging: false,
                        updatePosition(e) {
                            if (!this.isDragging && e.type !== 'mousemove' && e.type !== 'click') return;
                            const rect = $el.getBoundingClientRect();
                            const x = (e.clientX || (e.touches ? e.touches[0].clientX : 0)) - rect.left;
                            this.position = Math.max(0, Math.min(100, (x / rect.width) * 100));
                        }
                    }"
                    @mousedown="isDragging = true; updatePosition($event)"
                    @touchstart.passive="isDragging = true"
                    @mouseup="isDragging = false"
                    @touchend="isDragging = false"
                    @mousemove="updatePosition($event)"
                    @touchmove.passive="updatePosition($event)"
                    @click="updatePosition($event)"
                    @mouseleave="isDragging = false"
                >
                    {{-- After Image (Full background) --}}
                    <div class="absolute inset-0 z-0">
                        <img src="{{ $item['after'] }}" alt="After" class="w-full h-full object-cover">
                        <div class="absolute bottom-6 right-6 px-4 py-1.5 bg-[#6366f1]/90 backdrop-blur-md rounded-lg text-[10px] font-black text-white uppercase tracking-widest z-10 border border-[#6366f1]/30">AFTER</div>
                    </div>

                    {{-- Before Image (Clipped) --}}
                    <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" 
                         :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $item['before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-[0.4] contrast-125 sepia-[0.2]">
                        <div class="absolute bottom-6 left-6 px-4 py-1.5 bg-slate-900/90 backdrop-blur-md rounded-lg text-[10px] font-black text-white uppercase tracking-widest z-10 border border-slate-700/50">BEFORE</div>
                    </div>

                    {{-- Slider Handle --}}
                    <div class="absolute inset-y-0 z-20 w-[2px] bg-white/80 shadow-[0_0_15px_rgba(255,255,255,0.8)] cursor-ew-resize pointer-events-none slider-smooth" 
                         :style="'left: ' + position + '%'">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-10 h-10 bg-slate-950 rounded-full shadow-[0_5px_15px_rgba(0,0,0,0.5)] flex items-center justify-center border-2 border-white">
                            <i class="ri-arrow-left-right-line text-[#22d3ee] text-base"></i>
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div class="text-left">
                    <span class="inline-block px-3 py-1 bg-[#22d3ee]/10 text-[#22d3ee] text-[10px] font-bold uppercase tracking-widest rounded-md mb-4 border border-[#22d3ee]/20">
                        {{ $item['category'] }}
                    </span>
                    <h4 class="text-2xl font-bold text-white mb-3 group-hover:text-[#22d3ee] transition-colors leading-tight">{{ $item['title'] }}</h4>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        {{ $item['desc'] }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        </div>

        {{-- Call To Action bottom block --}}
        <div class="mt-32 relative bg-gradient-to-br from-[#6366f1]/10 overflow-hidden flex flex-col md:flex-row items-center justify-between rounded-[2rem] p-10 md:p-16 border border-[#6366f1]/20 reveal">
            {{-- Glowing blobs --}}
            <div class="absolute top-0 right-0 w-full md:w-1/2 h-full bg-gradient-to-l from-[#22d3ee]/10 to-transparent pointer-events-none"></div>
            
            <div class="relative z-10 md:w-2/3 mb-8 md:mb-0 text-center md:text-left">
                <h2 class="text-3xl md:text-5xl font-black text-white mb-4">Start Your Next Big Project</h2>
                <p class="text-slate-400 text-lg max-w-lg">Let's collaborate and build something extraordinary together. Our team is ready to bring your vision to life.</p>
            </div>
            <div class="relative z-10 md:w-1/3 flex justify-center md:justify-end">
                <a href="#" class="inline-flex items-center gap-3 px-8 py-4 rounded-full bg-white text-slate-900 font-bold hover:bg-[#22d3ee] hover:text-white transition-all shadow-[0_0_40px_rgba(255,255,255,0.1)] hover:shadow-[#22d3ee]/30 group">
                    Contact Us Now
                    <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection

@push('styles')
<style>
    /* Prevent image stretching and selection for sliders */
    [x-data] img {
        pointer-events: none;
        user-select: none;
    }

    /* Smoothing the slider movement */
    .slider-smooth {
        transition: clip-path 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67), 
                    left 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67);
    }
</style>
@endpush
