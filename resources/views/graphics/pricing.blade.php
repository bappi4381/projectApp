@extends('layouts.app')
@section('title', 'Pricing Plan | Graphics Studio')
@section('meta_description', 'Professional Photo Editing, Retouching Services Price/Rates — Start from 25c/image at PixelForge Graphics Studio.')

@section('content')


    {{-- ── PREMIUM PAGE HEADER ──────────────────────────── --}}
    <div class="relative pt-36 pb-24 md:pt-44 md:pb-32 overflow-hidden">
        {{-- Dark Corporate Gradient Background --}}
        <div class="absolute inset-0 bg-gradient-to-br from-[#0e1726] via-[#112a46] to-[#0a4a82]"></div>
        {{-- Subtle overlay image for texture --}}
        <div
            class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center mix-blend-overlay">
        </div>
        {{-- Dot Grid overlay --}}
        <div class="absolute inset-0 opacity-20"
            style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl md:text-5xl font-black text-white uppercase tracking-widest mb-4 drop-shadow-lg">Pricing
                Plans & Rates</h1>
            <p class="text-white/80 text-lg md:text-xl font-light mb-8 max-w-3xl mx-auto whitespace-normal">
                Professional Photo Editing & Retouching Services — Start from <span
                    class="text-yellow-400 font-bold whitespace-nowrap">25¢/image</span>
            </p>
            <div class="flex justify-center gap-1.5">
                <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
                <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></span>
                <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
            </div>
        </div>
    </div>

    <div class="bg-slate-50 min-h-screen text-[#333] font-sans pb-24 relative">

        {{-- ── PRICING TABLE ROWS (GROUPED BY CATEGORY) ───────────────────────── --}}
        <div class="container mx-auto pt-4 px-4 max-w-[1200px] space-y-20 relative z-20 -mt-16">

            @foreach($categories as $category)
                <div class="category-block reveal">
                    <div class="space-y-10">
                        @foreach($category->services as $service)
                            <div class="bg-white border border-[#e5e5e5] rounded-sm overflow-hidden shadow-sm hover:shadow-md transition-shadow">

                                {{-- Row Title Bar --}}
                                <div class="bg-[#f5f5f5] px-5 py-3 border-b border-[#e5e5e5] flex items-center justify-between">
                                    <h3 class="font-bold text-[14px] text-[#333] tracking-wide uppercase">{{ $service->name }}</h3>
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $category->name }}</span>
                                </div>

                                <div class="flex flex-col md:flex-row">

                                    {{-- Before/After Slider (Large Image) --}}
                                    <div class="relative w-full md:w-[400px] shrink-0 h-[300px] bg-[#f9f9f9] border-r border-[#e5e5e5] overflow-hidden"
                                        x-data="{ position: 50, isDragging: false,
                                            update(e) {
                                                if (!this.isDragging && e.type !== 'click') return;
                                                const r = $el.getBoundingClientRect();
                                                const x = (e.clientX || (e.touches ? e.touches[0].clientX : 0)) - r.left;
                                                this.position = Math.max(0, Math.min(100, (x / r.width) * 100));
                                            }
                                        }" @mousedown="isDragging = true; update($event)" @touchstart.passive="isDragging = true"
                                        @mouseup="isDragging = false" @touchend="isDragging = false" @mousemove="update($event)"
                                        @touchmove.passive="update($event)" @click="update($event)" @mouseleave="isDragging = false">
                                        {{-- After Image --}}
                                        <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80' }}"
                                            alt="After" class="absolute inset-0 w-full h-full object-cover">

                                        {{-- Before Image --}}
                                        <div class="absolute inset-0 z-10 overflow-hidden slider-smooth"
                                            :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                                            <img src="{{ $service->image_before ? asset('storage/' . $service->image_before) : 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80' }}"
                                                alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-90">
                                        </div>

                                        {{-- Handle --}}
                                        <div class="absolute inset-y-0 z-20 w-[2px] bg-white pointer-events-none slider-smooth shadow-sm"
                                            :style="'left: ' + position + '%'">
                                            <div
                                                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 bg-white rounded-full shadow-lg flex items-center justify-center border border-slate-200">
                                                <i class="ri-arrow-left-right-line text-[12px] text-slate-600"></i>
                                            </div>
                                        </div>

                                        {{-- Labels --}}
                                        <div class="absolute bottom-3 left-3 z-30 pointer-events-none">
                                            <span
                                                class="bg-[#555]/80 text-white text-[10px] font-bold px-3 py-1 rounded-sm shadow-sm inline-block uppercase tracking-wider backdrop-blur-sm">BEFORE</span>
                                        </div>
                                        <div class="absolute bottom-3 right-3 z-30 pointer-events-none">
                                            <span
                                                class="bg-[#555]/80 text-white text-[10px] font-bold px-3 py-1 rounded-sm shadow-sm inline-block uppercase tracking-wider backdrop-blur-sm">AFTER</span>
                                        </div>
                                    </div>

                                    {{-- Content Container --}}
                                    <div class="flex-1 p-6 flex flex-col justify-between">

                                        {{-- Top 3 Column Stats --}}
                                        <div class="grid grid-cols-3 gap-4 pb-6 border-b border-[#eee]">
                                            <div class="text-center">
                                                <div class="text-[12px] text-[#666] mb-1 italic">Price starts from</div>
                                                <div class="text-2xl font-black text-[#5cb85c] leading-none mb-1 tabular-nums">
                                                    ${{ number_format($service->starting_price ?? 0.49, 2) }}</div>
                                                <div class="text-[11px] text-[#666] italic uppercase">
                                                    {{ $service->price_unit ?? 'per image' }}
                                                </div>
                                            </div>
                                            <div class="text-center border-l border-[#eee]">
                                                <div class="text-[12px] text-[#666] mb-1 italic">We can deliver</div>
                                                <div class="text-2xl font-black text-[#5cb85c] leading-none mb-1 tabular-nums">
                                                    {{ $service->delivery_capacity ?? 5000 }}</div>
                                                <div class="text-[11px] text-[#666] italic uppercase">
                                                    {{ $service->delivery_unit ?? 'Images/day' }}
                                                </div>
                                            </div>
                                            <div class="text-center border-l border-[#eee]">
                                                <div class="text-[12px] text-[#666] mb-1 italic">Discount Upto</div>
                                                <div class="text-2xl font-black text-[#5cb85c] leading-none mb-1 tabular-nums">
                                                    {{ $service->discount_upto ?? 40 }}%</div>
                                                <div class="text-[11px] text-[#666] italic uppercase">
                                                    {{ $service->discount_tag ?? 'on bulk order' }}
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Variants/Features List (2 Columns) --}}
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-3 py-6 flex-grow">
                                            @if($service->variants->isNotEmpty())
                                                @foreach($service->variants as $variant)
                                                    <a href="{{ route('graphics.service-variant', $variant->slug) }}"
                                                        class="flex justify-between items-center text-[12px] border-b border-slate-100 pb-2 group/ptr hover:bg-slate-50 transition-all rounded px-2">
                                                        <span class="text-[#444] group-hover/ptr:text-[#0ea5e9] font-medium flex items-center gap-2">
                                                            <i class="ri-arrow-right-s-line text-[14px] text-sky-400"></i>
                                                            {{ $variant->name }}
                                                        </span>
                                                        <span class="font-black text-slate-800 group-hover/ptr:text-[#0ea5e9] tabular-nums">${{ number_format($variant->starting_price ?? 0.49, 2) }}</span>
                                                    </a>
                                                @endforeach
                                            @elseif($service->features && count($service->features) > 0)
                                                @foreach($service->features as $item)
                                                    <div
                                                        class="flex justify-between items-start text-[12px] border-b border-dotted border-slate-100 pb-1 px-2">
                                                        <span class="text-[#555] flex items-center gap-2">
                                                            <span class="w-1 h-1 rounded-full bg-[#5cb85c] inline-block shrink-0"></span>
                                                            {{ $item['name'] }}
                                                        </span>
                                                        <span class="font-bold text-[#333] tabular-nums">{{ $item['price'] }}</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>


                                        {{-- Action Buttons --}}
                                        <div class="flex flex-wrap justify-center gap-3 pt-6 border-t border-[#eee]">
                                            <a href="{{ route('graphics.get-quote') }}"
                                                class="px-6 py-2 bg-[#12537e] hover:bg-[#0c3e60] text-white text-[11px] font-bold rounded-sm transition-colors shadow-sm uppercase tracking-wider">
                                                Free Trial
                                            </a>
                                            <a href="{{ route('graphics.get-quote') }}"
                                                class="px-6 py-2 bg-[#51a8d0] hover:bg-[#3d8fb4] text-white text-[11px] font-bold rounded-sm transition-colors shadow-sm uppercase tracking-wider">
                                                Get A Quote
                                            </a>
                                            <a href="{{ route('graphics.service-detail', $service->slug) }}"
                                                class="px-6 py-2 bg-[#12537e] hover:bg-[#0c3e60] text-white text-[11px] font-bold rounded-sm transition-colors shadow-sm uppercase tracking-wider">
                                                View Details
                                            </a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <style>
        .slider-smooth {
            transition: clip-path 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67),
                left 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67);
        }

        /* Ensure the navbar respects the dark header background before scrolling */
        #main-navbar:not(.nav-scrolled) .studio-nav-link {
            color: white;
        }

        #main-navbar:not(.nav-scrolled) .logo-text-primary {
            color: white;
        }

        #main-navbar:not(.nav-scrolled) .logo-text-secondary {
            color: rgba(255, 255, 255, 0.6);
        }

        /* Force main body text color just in case */
        body {
            color: #333;
        }
    </style>

@endsection