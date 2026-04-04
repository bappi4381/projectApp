{{-- resources/views/graphics/first-order-free.blade.php --}}
@extends('layouts.app')
@section('title', 'Comeback Campaign | Graphics Studio')

@section('content')

{{-- ── PREMIUM PAGE HEADER ──────────────────────────── --}}
<div class="relative pt-36 pb-28 md:pt-44 md:pb-36 overflow-hidden">
    {{-- Dark Corporate Gradient Background --}}
    <div class="absolute inset-0 bg-gradient-to-br from-[#0e1726] via-[#112a46] to-[#0a4a82]"></div>
    {{-- Subtle overlay image for texture --}}
    <div class="absolute inset-0 opacity-10 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80')] bg-cover bg-center mix-blend-overlay"></div>
    {{-- Dot Grid overlay --}}
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-5xl font-black text-white uppercase tracking-widest mb-6 drop-shadow-lg">Comeback Campaign</h1>
        <div class="flex justify-center gap-1.5">
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
            <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
        </div>
    </div>
</div>

{{-- ── MAIN CONTENT AREA ────────────────────────────── --}}
<div class="bg-white pt-16">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 text-center pt-4 pb-8 relative z-10">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 pt-4 pb-14 relative z-10">
            
            {{-- TOP GRAPHIC SECTION --}}
            <div class="flex flex-col xl:flex-row items-center justify-center gap-8 xl:gap-12 mb-24 pt-12">
                
                {{-- Left Pair --}}
                <div class="flex flex-row gap-6 md:gap-8 items-center justify-center">
                    {{-- Faster Delivery --}}
                    <div class="bg-white border-l border-t border-slate-100 p-4 w-40 md:w-44 shadow-[6px_6px_0px_#f1f5f9,10px_10px_15px_rgba(0,0,0,0.05)] relative shrink-0">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-4 h-4 bg-red-700 rounded-full shadow-[0_2px_4px_rgba(0,0,0,0.3)]">
                            <div class="absolute top-0.5 left-1 w-1 h-1 bg-white/40 rounded-full"></div>
                        </div>
                        <div class="text-center font-sans">
                            <p class="text-[#333] text-[20px] font-light leading-none">Faster</p>
                            <p class="text-[#333] text-[20px] font-bold leading-tight">Delivery</p>
                            <p class="text-[#333] text-[20px] font-black leading-none">12 Hrs.</p>
                        </div>
                    </div>
                    {{-- 24/7 Support --}}
                    <div class="bg-white border-l border-t border-slate-100 p-4 w-40 md:w-44 shadow-[6px_6px_0px_#f1f5f9,10px_10px_15px_rgba(0,0,0,0.05)] relative shrink-0">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-4 h-4 bg-red-700 rounded-full shadow-[0_2px_4px_rgba(0,0,0,0.3)]">
                            <div class="absolute top-0.5 left-1 w-1 h-1 bg-white/40 rounded-full"></div>
                        </div>
                        <div class="text-center py-1 font-sans">
                            <p class="text-[#333] text-[32px] font-black leading-none mb-1">24/7</p>
                            <p class="text-[#333] text-[20px] font-bold tracking-tight">Support</p>
                        </div>
                    </div>
                </div>

                {{-- Central Image --}}
                <div class="relative flex flex-col items-center shrink-0">
                    <div class="w-[180px] md:w-[220px]">
                        <img src="{{ asset('images/ecommerce/comeback-offer.svg') }}" alt="Comeback Offer" class="w-full h-auto">
                    </div>
                    <div class="w-20 h-4 bg-black/10 blur-lg rounded-full -mt-2"></div>
                </div>

                {{-- Right Pair --}}
                <div class="flex flex-row gap-6 md:gap-8 items-center justify-center">
                    {{-- Unlimited Revision --}}
                    <div class="bg-white border-l border-t border-slate-100 p-4 w-40 md:w-44 shadow-[6px_6px_0px_#f1f5f9,10px_10px_15px_rgba(0,0,0,0.05)] relative shrink-0">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-4 h-4 bg-red-700 rounded-full shadow-[0_2px_4px_rgba(0,0,0,0.3)]">
                            <div class="absolute top-0.5 left-1 w-1 h-1 bg-white/40 rounded-full"></div>
                        </div>
                        <div class="text-center py-1 font-sans">
                            <p class="text-[#333] text-[22px] font-black leading-tight tracking-tighter uppercase">Unlimited</p>
                            <p class="text-[#333] text-[20px] font-bold tracking-tight uppercase">Revision</p>
                        </div>
                    </div>
                    {{-- Increased Satisfaction --}}
                    <div class="bg-white border-l border-t border-slate-100 p-4 w-40 md:w-44 shadow-[6px_6px_0px_#f1f5f9,10px_10px_15px_rgba(0,0,0,0.05)] relative shrink-0">
                        <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-4 h-4 bg-red-700 rounded-full shadow-[0_2px_4px_rgba(0,0,0,0.3)]">
                            <div class="absolute top-0.5 left-1 w-1 h-1 bg-white/40 rounded-full"></div>
                        </div>
                        <div class="text-center py-1 font-sans">
                            <p class="text-[#333] text-[18px] font-light leading-none mb-1">Increased</p>
                            <p class="text-[#333] text-[18px] font-light leading-none mb-1">Customer</p>
                            <p class="text-[#333] text-[20px] font-black leading-tight uppercase">Satisfaction</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- TEXTUAL REDESIGN --}}
            <div class="text-center max-w-5xl mx-auto mb-16">
                <h2 class="text-[#055781] text-[32px] md:text-[50px] font-bold mb-4 tracking-tight leading-none">
                    Comeback Offer For Old Customers
                </h2>
                <h3 class="text-[#055781] text-[28px] md:text-[38px] font-bold mb-10">
                    Re-Test & Re-Quote
                </h3>
                <p class="text-[#6d6d6d] text-[15px] md:text-[18px] leading-relaxed mb-12 max-w-6xl mx-auto">
                    Under this offer, you are entitled to receive <strong class="text-slate-900 border-b border-slate-800">10-20% off</strong> on an order of at least 10 images. Avail of the opportunity without further ado.
                </p>

                {{-- ACTION BUTTONS --}}
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('graphics.get-quote') }}" class="px-12 py-3 bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[15px] font-bold rounded-sm transition-all shadow-md">
                        Get Free Trial
                    </a>
                    <a href="{{ route('graphics.get-quote') }}" class="px-12 py-3 bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[15px] font-bold rounded-sm transition-all shadow-md">
                        Get A Quote
                    </a>
                </div>
            </div>

        </div>

        {{-- ── WHO ARE ELIGIBLE ─────────────────────────────── --}}
        <div class="bg-white py-10 ">
            <div class="max-w-[1000px] mx-auto px-4 text-center">
                <h3 class="text-[#333] text-[28px] md:text-[34px] font-bold mb-6 tracking-tight">Who Are Eligible?</h3>
                <p class="text-[#666] text-[16px] md:text-[18px] leading-[1.6] max-w-4xl mx-auto font-normal">
                    Our comeback offer is applicable to all the customers who received services<br class="hidden md:block">
                    from us up until Christmas 2018. The validity of the offer will last till Christmas<br class="hidden md:block">
                    2020.
                </p>
            </div>
        </div>

        {{-- ── OUR KEY IMPROVEMENT SECTION ──────────────────── --}}
        <div class="bg-[#fafafa] py-24 border-t border-b border-[#eee]">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <h2 class="text-[#1a1a1a] text-[32px] md:text-[45px] font-black mb-4 uppercase tracking-tighter">OUR KEY IMPROVEMENT - BETTER THAN BEFORE</h2>
                <p class="text-[#777] text-[16px] md:text-[19px] mb-20 font-medium">We improved the following key areas and we are promising you a service better than before</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-20 gap-x-12 mb-24 max-w-6xl mx-auto">
                    {{-- Item 1 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-[90px] h-[90px] mb-8 text-[#007ba0]">
                            <i class="ri-speed-up-fill text-[85px] leading-none"></i>
                        </div>
                        <h4 class="text-[#333] text-[14px] font-bold uppercase tracking-tight leading-tight">Improved Turnaround Time</h4>
                    </div>
                    {{-- Item 2 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-[90px] h-[90px] mb-8 text-[#007ba0]">
                            <i class="ri-checkbox-multiple-fill text-[85px] leading-none"></i>
                        </div>
                        <h4 class="text-[#333] text-[14px] font-bold uppercase tracking-tight leading-tight">06 Steps Quality Assurance</h4>
                    </div>
                    {{-- Item 3 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-[90px] h-[90px] mb-8 text-[#007ba0]">
                            <i class="ri-hand-coin-fill text-[85px] leading-none"></i>
                        </div>
                        <h4 class="text-[#333] text-[14px] font-bold uppercase tracking-tight leading-tight">Lower Pricing than Before</h4>
                    </div>
                    {{-- Item 4 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-[90px] h-[90px] mb-8 text-[#007ba0]">
                            <i class="ri-bank-card-2-fill text-[85px] leading-none"></i>
                        </div>
                        <h4 class="text-[#333] text-[14px] font-bold uppercase tracking-tight leading-tight">Easy Payment System</h4>
                    </div>
                    {{-- Item 5 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-[90px] h-[90px] mb-8 text-[#007ba0]">
                            <i class="ri-shield-keyhole-fill text-[85px] leading-none"></i>
                        </div>
                        <h4 class="text-[#333] text-[14px] font-bold uppercase tracking-tight leading-tight">Faster File Transfer</h4>
                    </div>
                    {{-- Item 6 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-[90px] h-[90px] mb-8 text-[#007ba0]">
                            <i class="ri-timer-flash-fill text-[85px] leading-none"></i>
                        </div>
                        <h4 class="text-[#333] text-[14px] font-bold uppercase tracking-tight leading-tight">Promising On Time Delivery</h4>
                    </div>
                    {{-- Item 7 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-[90px] h-[90px] mb-8 text-[#007ba0]">
                            <i class="ri-shopping-cart-2-fill text-[85px] leading-none"></i>
                        </div>
                        <h4 class="text-[#333] text-[14px] font-bold uppercase tracking-tight leading-tight">Volume Image Discount</h4>
                    </div>
                    {{-- Item 8 --}}
                    <div class="flex flex-col items-center">
                        <div class="w-[90px] h-[90px] mb-8 text-[#007ba0]">
                            <i class="ri-customer-service-2-fill text-[85px] leading-none"></i>
                        </div>
                        <h4 class="text-[#333] text-[14px] font-bold uppercase tracking-tight leading-tight">24/7 Customer Support</h4>
                    </div>
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="flex justify-center gap-6 mt-4">
                    <a href="{{ route('graphics.get-quote') }}" class="px-12 py-3 bg-[#749bc2] hover:bg-[#5e83a9] text-white text-[16px] font-bold rounded-sm transition-all shadow-sm">
                        Retry Us Free
                    </a>
                    <a href="{{ route('graphics.get-quote') }}" class="px-12 py-3 bg-[#749bc2] hover:bg-[#5e83a9] text-white text-[16px] font-bold rounded-sm transition-all shadow-sm">
                        Get A Re-Quote
                    </a>
                </div>
            </div>
        </div>

    {{-- ── SAMPLES OF OUR ACCOMPLISHMENTS ───────────────── --}}
    {{-- ── SAMPLES OF OUR ACCOMPLISHMENTS ───────────────── --}}
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 pb-10">
        {{-- Section Title --}}
        <h3 class="text-[#055781] text-[22px] md:text-[26px] font-bold text-center mt-4 mb-10">
            Samples of Our Accomplishments
        </h3>

        @php
        $categories = [
            [
                'name' => 'Color Correction',
                'items' => [
                    ['title' => "Product Image Color Correction", 'before'=>'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400&q=80'],
                    ['title' => "T-shirt Image Color Correction", 'before'=>'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&q=80'],
                    ['title' => "Apparel Color Correction", 'before'=>'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=400&q=80'],
                ]
            ],
            [
                'name' => 'Image Masking',
                'items' => [
                    ['title' => "Product Photo Editing", 'before'=>'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=400&q=80'],
                    ['title' => "Transparent Masking", 'before'=>'https://images.unsplash.com/photo-1606760227091-3dd870d97f1d?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1606760227091-3dd870d97f1d?w=400&q=80'],
                    ['title' => "Product Photo Editing", 'before'=>'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=400&q=80'],
                ]
            ],
            [
                'name' => 'Neck Joint',
                'items' => [
                    ['title' => "Neck Joint Product", 'before'=>'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=400&q=80'],
                    ['title' => "Clothing Neck Joint", 'before'=>'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=400&q=80'],
                    ['title' => "Glasses Reflection", 'before'=>'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&q=80'],
                    ['title' => "Product Display", 'before'=>'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=400&q=80'],
                ]
            ],
            [
                'name' => 'Clipping Path Services',
                'items' => [
                    ['title' => "Product's Basic Clipping Path", 'before'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80'],
                    ['title' => "Basic Electronic Clipping Path", 'before'=>'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&q=80'],
                    ['title' => "Simple Product Clipping Path",   'before'=>'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&q=80'],
                    ['title' => "Simple Bedclothes Clipping Path", 'before'=>'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=400&q=80', 'after'=>'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=400&q=80'],
                ]
            ]
        ];
        @endphp

        @foreach($categories as $category)
        <div class="mb-14">
            {{-- Category Header --}}
            <div class="bg-[#f5f5f5] px-6 py-[18px] mb-8 shadow-sm">
                <h4 class="text-[#333] font-bold text-[15px]">{{ $category['name'] }}</h4>
            </div>

            {{-- Dynamic Grid Output --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 {{ count($category['items']) === 3 ? 'lg:grid-cols-3' : 'lg:grid-cols-4' }} gap-6">
                
                @foreach($category['items'] as $sample)
                <div class="bg-white group border border-[#ddd] flex flex-col shadow-sm">
                    <div class="relative w-full aspect-square md:aspect-[4/3] lg:aspect-square bg-[#e8e8e8] overflow-hidden flex-1 cursor-ew-resize"
                        x-data="{ position: 50, isDragging: false,
                            update(e) {
                                if (!this.isDragging && e.type !== 'click') return;
                                const r = $el.getBoundingClientRect();
                                const x = (e.clientX || (e.touches ? e.touches[0].clientX : 0)) - r.left;
                                this.position = Math.max(0, Math.min(100, (x / r.width) * 100));
                            }
                        }"
                        @mousedown="isDragging = true; update($event)"
                        @touchstart.passive="isDragging = true"
                        @mouseup="isDragging = false"
                        @touchend="isDragging = false"
                        @mousemove="update($event)"
                        @touchmove.passive="update($event)"
                        @click="update($event)"
                        @mouseleave="isDragging = false"
                    >
                        {{-- After Image --}}
                        <img src="{{ $sample['after'] }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                        
                        {{-- Before Image --}}
                        <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                            <img src="{{ $sample['before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-95">
                        </div>
                        
                        {{-- Handle --}}
                        <div class="absolute inset-y-0 z-20 w-[1.5px] bg-white pointer-events-none slider-smooth shadow-sm" :style="'left: ' + position + '%'">
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-[#444] rounded-full flex items-center justify-center border border-white shadow-[0_0_8px_rgba(0,0,0,0.5)]">
                                <i class="ri-arrow-left-right-fill text-[10px] text-white"></i>
                            </div>
                        </div>

                        {{-- Floating Top Pills --}}
                        <div class="absolute top-2 left-2 z-30 pointer-events-none">
                            <span class="bg-black/30 backdrop-blur-md text-white px-3 py-[2px] rounded-full text-[10px] tracking-wide shadow-sm">Before</span>
                        </div>
                        <div class="absolute top-2 right-2 z-30 pointer-events-none">
                            <span class="bg-black/30 backdrop-blur-md text-white px-3 py-[2px] rounded-full text-[10px] tracking-wide shadow-sm">After</span>
                        </div>

                        {{-- Dark Corner Blocks --}}
                        <div class="absolute bottom-0 left-0 z-30 pointer-events-none">
                            <span class="bg-[#444] text-white text-[10px] font-bold px-4 py-1 inline-block uppercase">BEFORE</span>
                        </div>
                        <div class="absolute bottom-0 right-0 z-30 pointer-events-none">
                            <span class="bg-[#555] text-white text-[10px] font-bold px-4 py-1 inline-block uppercase">AFTER</span>
                        </div>
                    </div>
                    
                    {{-- Caption Bottom Bar --}}
                    <div class="bg-[#e0e0e0] px-3 py-2 text-center border-t border-[#ddd]">
                        <span class="text-[12px] text-[#555] tracking-wide">{{ $sample['title'] }}</span>
                    </div>
                </div>
                @endforeach

            </div>

            {{-- Action Buttons (Per Category) --}}
            <div class="flex justify-center gap-4 mt-8">
                <a href="#" class="px-8 py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Order Now</a>
                <a href="#" class="px-8 py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Contact Us</a>
            </div>
            
        </div>
        @endforeach
    </div>
</div>

{{-- ── VIDEOS SECTION ───────────────────────────────── --}}
<div class="bg-white py-20 pb-28">
    <div class="max-w-[1100px] mx-auto px-4 relative">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-6 lg:gap-10 mb-14">
            
            @php
            $videos = [
                ['thumb' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80', 'link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1'],
                ['thumb' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600&q=80', 'link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1'],
                ['thumb' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=600&q=80', 'link' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1']
            ];
            @endphp

            @foreach($videos as $video)
            {{-- Pure CSS iMac Mockup Wrapper --}}
            <div x-data="{ playing: false }" class="flex flex-col items-center relative group">
                {{-- Monitor Top/Bezels --}}
                <div class="w-full bg-[#181818] p-[10px] md:p-[14px] rounded-t-[12px] md:rounded-t-[16px] shadow-[0_15px_30px_rgba(0,0,0,0.15)] relative z-20">
                    {{-- Display Area --}}
                    <div class="relative w-full aspect-[16/10] bg-gray-900 overflow-hidden" :class="!playing ? 'cursor-pointer group-hover:shadow-[inset_0_0_20px_rgba(0,0,0,0.8)] transition-all' : ''" @click="playing = true">
                        
                        {{-- Thumbnail and Play Button --}}
                        <template x-if="!playing">
                            <div class="absolute inset-0 w-full h-full">
                                <img src="{{ $video['thumb'] }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-[50px] h-[35px] md:w-[60px] md:h-[40px] bg-black/60 backdrop-blur-sm rounded-[10px] flex items-center justify-center shadow-lg group-hover:bg-red-600 transition-colors">
                                        <i class="ri-play-fill text-white text-2xl"></i>
                                    </div>
                                </div>
                            </div>
                        </template>

                        {{-- Playing iframe --}}
                        <template x-if="playing">
                            <iframe src="{{ $video['link'] }}" class="absolute inset-0 w-full h-full border-0 bg-black" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </template>

                    </div>
                </div>
                {{-- Monitor Chin --}}
                <div class="w-full bg-gradient-to-b from-[#f0f0f0] to-[#dcdcdc] h-[35px] md:h-[45px] rounded-b-[10px] md:rounded-b-[12px] flex items-center justify-center relative z-20 border border-t-0 border-[#ccc] shadow-sm">
                    {{-- Apple logo placeholder (small gray icon) --}}
                    <i class="ri-apple-fill text-black/10 text-lg"></i>
                </div>
                {{-- Monitor Stand Neck --}}
                <div class="w-[22%] md:w-[20%] h-[35px] md:h-[45px] bg-gradient-to-b from-[#b0b0b0] to-[#d8d8d8] relative z-10 -mt-[4px]"></div>
                {{-- Monitor Stand Base --}}
                <div class="w-[45%] md:w-[40%] h-[6px] md:h-[8px] bg-gradient-to-b from-[#e5e5e5] to-[#999] rounded-t-[100%] shadow-[0_5px_15px_rgba(0,0,0,0.3)] relative z-10"></div>
            </div>
            @endforeach

        </div>

        {{-- Bottom Global Action Buttons --}}
        <div class="flex justify-center gap-4 mt-8">
            <a href="#" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Order Now</a>
            <a href="#" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Contact Us</a>
        </div>

    </div>
</div>

{{-- ── WHO WE WORK FOR ───────────────────────────────── --}}
<div class="bg-white py-20 border-t border-[#eaeaea]">
    <div class="max-w-[1200px] mx-auto px-4 text-center">
        
        <h2 class="text-[#333] text-[28px] md:text-[32px] font-bold mb-6 tracking-wide">Who We Work For (Industry Verticals)</h2>
        
        <p class="text-[#666] text-[15px] leading-[1.8] max-w-[1000px] mx-auto mb-16 font-light">
            Among the clients we serve, e-commerce companies, photographers, photography studios, graphic design agencies, fashion &<br class="hidden lg:block"> jewelry stores, apparel stores, advertising agencies, magazine publishers, web design agencies, catalog design agencies, and<br class="hidden lg:block"> sports companies & stores are noteworthy.
        </p>

        {{-- 5 Column Icons --}}
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-6 lg:gap-8 mb-16 px-4">
            @php
            $industries = [
                ['name' => 'E-commerce', 'icon' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=200&h=200&q=80&fit=crop'],
                ['name' => 'Agency', 'icon' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=200&h=200&q=80&fit=crop'],
                ['name' => 'Sports Company', 'icon' => 'https://images.unsplash.com/photo-1461896836934-ffe607fa8211?w=200&h=200&q=80&fit=crop'],
                ['name' => 'Photography', 'icon' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?w=200&h=200&q=80&fit=crop'],
                ['name' => 'Printing Pre-press', 'icon' => 'https://images.unsplash.com/photo-1568285526019-21841364ff24?w=200&h=200&q=80&fit=crop'],
            ];
            @endphp
            
            @foreach($industries as $industry)
            <div class="flex flex-col items-center group cursor-pointer transition-transform duration-300 hover:-translate-y-2">
                <div class="w-32 h-32 md:w-36 md:h-36 flex items-center justify-center mb-6 m-auto">
                    {{-- When you have your transparent isometric vectors, swap these Unsplash links --}}
                    <img src="{{ $industry['icon'] }}" alt="{{ $industry['name'] }}" class="w-full h-full object-cover rounded-full shadow-sm group-hover:shadow-lg filter grayscale opacity-90 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300 ring-4 ring-transparent group-hover:ring-[#f0f0f0]">
                </div>
                <h4 class="text-[#333] font-bold text-[15px] group-hover:text-[#749bc2] transition-colors">{{ $industry['name'] }}</h4>
            </div>
            @endforeach
        </div>

        {{-- Bottom Global Action Buttons --}}
        <div class="flex justify-center gap-4">
            <a href="#" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Order Now</a>
            <a href="#" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Contact Us</a>
        </div>

    </div>
</div>

{{-- resources/views/graphics/partials/pricing.blade.php --}}
{{-- resources/views/graphics/partials/pricing.blade.php --}}
<div id="pricing" class="relative py-20 bg-white overflow-hidden">
    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Title --}}
        <div class="text-center mb-16">
            <h2 class="text-[#333] text-[32px] md:text-[42px] font-black uppercase tracking-tighter">Flexible Pricing</h2>
            <div class="w-20 h-1 bg-yellow-400 mx-auto mt-4"></div>
        </div>

        {{-- Pricing Cards --}}
        @php
        $pricingOptions = [
            [
                'title' => 'Clipping Path Services',
                'headerColor' => 'bg-[#78bd5d]',
                'btnColor' => 'bg-[#18beba] hover:bg-[#15a3a0]',
                'btnBorder' => 'border-[#18beba] text-[#18beba] hover:bg-[#18beba] hover:text-white',
                'price' => '0.49',
                'before' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80',
                'services' => [
                    ['Basic Paths', '0.49'],
                    ['Simple Paths', '0.99'],
                    ['Complex Paths', '6.90'],
                    ['Super Complex Path', '7.99'],
                ]
            ],
            [
                'title' => 'Photoshop Shadow Services',
                'headerColor' => 'bg-[#5dbce8]',
                'btnColor' => 'bg-[#18beba] hover:bg-[#15a3a0]',
                'btnBorder' => 'border-[#18beba] text-[#18beba] hover:bg-[#18beba] hover:text-white',
                'price' => '0.25',
                'before' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80',
                'services' => [
                    ['Drop Shadow', '0.25'],
                    ['Natural Shadow', '0.49'],
                    ['Reflection Shadow', '0.49'],
                    ['Retain original shadow', '0.49'],
                ]
            ],
            [
                'title' => 'Ghost Mannequin Effect',
                'headerColor' => 'bg-[#f7d04a]',
                'btnColor' => 'bg-[#18beba] hover:bg-[#15a3a0]',
                'btnBorder' => 'border-[#18beba] text-[#18beba] hover:bg-[#18beba] hover:text-white',
                'price' => '1.49',
                'before' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
                'services' => [
                    ['Neck Joint', '1.49'],
                    ['Remove Mannequin', '1.49'],
                    ['3D Ghost Mannequin', '1.75'],
                    ['Bottom or Sleeves Joint', '2.49'],
                ]
            ],
            [
                'title' => 'Color Correction Services',
                'headerColor' => 'bg-[#78bd5d]',
                'btnColor' => 'bg-[#18beba] hover:bg-[#15a3a0]',
                'btnBorder' => 'border-[#18beba] text-[#18beba] hover:bg-[#18beba] hover:text-white',
                'price' => '0.49',
                'before' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=600&q=80',
                'services' => [
                    ['Color Correction', '0.49'],
                    ['Exposure Correction', '0.49'],
                    ['Color Conversion', '7.50'],
                    ['Color Restoration', '19.99'],
                ]
            ],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 xl:gap-5">
            @foreach($pricingOptions as $plan)
            <div class="bg-white border border-slate-200 flex flex-col overflow-hidden hover:shadow-2xl transition-all duration-300">
                
                {{-- Card Header --}}
                <div class="{{ $plan['headerColor'] }} py-4 px-2 text-center">
                    <h3 class="text-[#1a1a1a] font-bold text-[15px] tracking-tight">{{ $plan['title'] }}</h3>
                </div>

                {{-- Before/After Area --}}
                <div class="relative w-full aspect-[4/3] overflow-hidden"
                    x-data="{ 
                        position: 50, 
                        isDragging: false,
                        update(e) {
                            if (!this.isDragging && e.type !== 'click') return;
                            const r = $el.getBoundingClientRect();
                            const x = (e.clientX || (e.touches ? e.touches[0].clientX : 0)) - r.left;
                            this.position = Math.max(0, Math.min(100, (x / r.width) * 100));
                        }
                    }"
                    @mousedown="isDragging = true; update($event)"
                    @touchstart.passive="isDragging = true"
                    @mouseup="isDragging = false"
                    @touchend="isDragging = false"
                    @mousemove="update($event)"
                    @touchmove.passive="update($event)"
                    @click="update($event)"
                    @mouseleave="isDragging = false"
                >
                    <img src="{{ $plan['after'] }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $plan['before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-90">
                    </div>

                    {{-- Handle --}}
                    <div class="absolute inset-y-0 z-20 w-[1px] bg-white cursor-ew-resize slider-smooth shadow-md" :style="'left: ' + position + '%'">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 bg-black/60 rounded-full flex items-center justify-center border border-white/50 backdrop-blur-sm">
                            <i class="ri-arrow-left-right-fill text-[11px] text-white"></i>
                        </div>
                    </div>

                    {{-- Corner Badges --}}
                    <div class="absolute top-2 left-2 z-30">
                        <span class="bg-black/30 backdrop-blur-sm text-white/90 text-[10px] px-2 py-0.5 rounded-sm">Before</span>
                    </div>

                    {{-- Bottom Labels (Same as mockup) --}}
                    <div class="absolute bottom-0 left-0 z-30 flex">
                        <span class="bg-[#4a4a4a] text-white text-[10px] font-bold px-4 py-1.5 uppercase">BEFORE</span>
                    </div>
                    <div class="absolute bottom-0 right-0 z-30 flex">
                        <span class="bg-[#5a5a5a] text-white text-[10px] font-bold px-4 py-1.5 uppercase">AFTER</span>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="p-5 flex flex-col flex-grow">
                    {{-- Price Display --}}
                    <div class="mb-5 text-center">
                        <p class="text-slate-400 text-[12px]">Starts From <span class="text-[#1a1a1a] text-[24px] font-bold tracking-tight">${{ $plan['price'] }}</span> <span class="text-slate-400">per image</span></p>
                    </div>

                    {{-- Services --}}
                    <div class="space-y-3 mb-8 flex-grow">
                        @foreach($plan['services'] as [$name, $val])
                        <div class="flex justify-between items-center text-[13px]">
                            <span class="text-slate-700">{{ $name }}</span>
                            <span class="text-[#1a1a1a] font-bold">${{ $val }}</span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Action Pills --}}
                    <div class="flex gap-2">
                        <a href="{{ route('graphics.get-quote') }}" class="flex-1 text-center py-2.5 rounded-full border border-[#18beba] text-[#18beba] font-bold text-[11px] uppercase tracking-wide hover:bg-[#18beba] hover:text-white transition-all">
                            Free Trial
                        </a>
                        <a href="{{ route('graphics.get-quote') }}" class="flex-1 text-center py-2.5 rounded-full bg-[#18beba] text-white font-bold text-[11px] uppercase tracking-wide hover:bg-[#15a3a0] transition-all">
                            Get A Quote
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="flex justify-center gap-2 mt-12">
            <span class="w-3 h-3 rounded-full border-2 border-yellow-500 bg-transparent"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 mt-[1px]"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 mt-[1px]"></span>
        </div>

        {{-- Overall Bottom Buttons --}}
        <div class="flex flex-wrap justify-center gap-6 mt-20">
            <a href="{{ route('graphics.get-quote') }}" class="px-12 py-3 bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[15px] font-bold rounded-sm transition-all shadow-md">
                Retry Us Free
            </a>
            <a href="{{ route('graphics.get-quote') }}" class="px-12 py-3 bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[15px] font-bold rounded-sm transition-all shadow-md">
                Get A Re-Quote
            </a>
        </div>
    </div>
</div>

<style>
    /* Ensure the navbar respects the dark header background before scrolling */
    #main-navbar:not(.nav-scrolled) .studio-nav-link { color: white; }
    #main-navbar:not(.nav-scrolled) .logo-text-primary { color: white; }
    #main-navbar:not(.nav-scrolled) .logo-text-secondary { color: rgba(255,255,255,0.6); }

    /* Slider transition logic */
    .slider-smooth {
        transition: clip-path 0.05s ease-out, left 0.05s ease-out;
    }

    .slider-smooth {
        transition: clip-path 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67), 
                    left 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67);
    }
    
    /* When scrolled, let the javascript toggle text colors naturally */
</style>

@endsection


