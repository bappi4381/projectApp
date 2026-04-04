{{-- resources/views/graphics/first-order-free.blade.php --}}
@extends('layouts.app')
@section('title', 'First Order Free | Graphics Studio')

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
        <h1 class="text-3xl md:text-5xl font-black text-white uppercase tracking-widest mb-6 drop-shadow-lg">First Order Free</h1>
        <div class="flex justify-center gap-1.5">
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
            <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
        </div>
    </div>
</div>

{{-- ── MAIN CONTENT AREA ────────────────────────────── --}}
<div class="bg-white pt-16">
    <div class="max-w-[1000px] mx-auto px-4 sm:px-6 lg:px-8 text-center pt-4 pb-14 relative z-10">
        
        {{-- Badge Image --}}
        <div class="flex justify-center mb-8">
            {{-- Using an img tag with a clever CSS fallback just in case the real image is missing --}}
            <img src="{{ asset('images/ecommerce/first-order-free-popup-logo.png') }}" 
                 alt="First Order Free Badge" 
                 class="h-40 md:h-44 object-contain drop-shadow-md"
                 >
        </div>

        {{-- Main Heading --}}
        <h2 class="text-[#055781] text-2xl md:text-[28px] font-bold uppercase tracking-wide text-center leading-tight mb-5">
            FIRST ORDER FREE FOR E-COMMERCE PRODUCT<br class="hidden md:block">PHOTOS
        </h2>

        {{-- Description Paragraph --}}
        <p class="text-[#666] text-[15px] md:text-base text-center max-w-4xl mx-auto leading-relaxed mb-6 font-light">
            Our <strong>first order free and bulk discount offers</strong> under this campaign are applicable only for the <strong>product photos</strong>. You can<br class="hidden md:block">
            get free service up to 5 files on the first order. Some samples of our e-commerce product photo retouching<br class="hidden md:block">
            accomplishments are displayed below.
        </p>

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

{{-- ── WHO ARE ELIGIBLE ─────────────────────────────── --}}
<div class="bg-white py-10 border-t border-[#eaeaea]">
    <div class="max-w-[800px] mx-auto px-4 text-center">
        <h3 class="text-[#333] text-[24px] font-bold mb-5 tracking-wide">Who Are Eligible?</h3>
        <p class="text-[#666] text-[14px] md:text-[15px] leading-relaxed">
            If you are involved with an e-commerce company, retail business, photography studio,<br class="hidden md:block">
            or an online shop who requires image editing services on bulk order, this exciting First<br class="hidden md:block">
            Order Free offer is for you.
        </p>
    </div>
</div>

{{-- ── DISCOUNT SECTION ─────────────────────────────── --}}
<div class="bg-[#f2f2f2] py-[60px]">
    <div class="max-w-[900px] mx-auto px-4 text-center">
        <h3 class="text-[#333] text-[24px] md:text-[28px] font-bold mb-4 tracking-wide">Claim Up To <span class="font-bold">40% Discount</span> On Bulk Order</h3>
        <p class="text-[#1a1a1a] text-[15px] md:text-[17px] font-bold leading-snug max-w-[800px] mx-auto mb-8">
            Good news for all customers! Send bulk product photos requiring touch-up and take advantage of a<br class="hidden md:block"> voluminous discount reaching up to 40%
        </p>
        <div class="flex justify-center gap-4">
            <a href="#" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Upload File</a>
            <a href="#" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Get A Quote</a>
        </div>
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
<div id="pricing" class="relative py-10 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Pricing Cards --}}
        @php
        $pricingPlans = [
            [
                'title' => 'Clipping Path Services',
                'headerColor' => 'bg-[#6ab04c]',
                'btnColor' => 'bg-[#6ab04c] hover:bg-[#5a9e3e]',
                'btnBorder' => 'border-[#6ab04c] text-[#6ab04c] hover:bg-[#6ab04c] hover:text-white',
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
                'headerColor' => 'bg-[#0984e3]',
                'btnColor' => 'bg-[#0984e3] hover:bg-[#0873c7]',
                'btnBorder' => 'border-[#0984e3] text-[#0984e3] hover:bg-[#0984e3] hover:text-white',
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
                'headerColor' => 'bg-[#1a1a1a]',
                'btnColor' => 'bg-[#1ebba3] hover:bg-[#17a08c]',
                'btnBorder' => 'border-[#1ebba3] text-[#1ebba3] hover:bg-[#1ebba3] hover:text-white',
                'price' => '1.49',
                'before' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
                'services' => [
                    ['Neck Joint', '1.49'],
                    ['Remove Mannequin', '1.49'],
                    ['3D Ghost Mannequin', '1.75'],
                    ['Bottom or Sleeves Joint', '2.49'],
                ]
            ]
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 xl:gap-8">
            @foreach($pricingPlans as $i => $plan)
            <div class="bg-white rounded-sm border border-slate-200 flex flex-col overflow-hidden hover:shadow-xl transition-shadow duration-300">
                
                {{-- Card Title Header --}}
                <div class="{{ $plan['headerColor'] }} py-3 px-6 text-center">
                    <h3 class="text-white font-bold text-sm tracking-wide">{{ $plan['title'] }}</h3>
                </div>

                {{-- Before/After Slider --}}
                <div class="relative w-full aspect-[4/3] overflow-hidden border-b border-slate-100"
                    x-data="{ 
                        position: 50, 
                        isDragging: false,
                        updatePosition(e) {
                            if (!this.isDragging && e.type !== 'click') return;
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
                    {{-- After Image --}}
                    <img src="{{ $plan['after'] }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                    
                    {{-- Before Image (clipped) --}}
                    <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $plan['before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-90">
                    </div>

                    {{-- Slider Handle --}}
                    <div class="absolute inset-y-0 z-20 w-0.5 bg-white cursor-ew-resize slider-smooth shadow-md" :style="'left: ' + position + '%'">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-7 h-7 bg-white rounded-full shadow-lg flex items-center justify-center border border-slate-200">
                            <i class="ri-arrow-left-right-fill text-[10px] text-slate-500"></i>
                        </div>
                    </div>

                    {{-- Before / After Labels --}}
                    <div class="absolute bottom-3 left-3 z-30">
                        <span class="bg-[#1a1a1a]/80 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1">Before</span>
                    </div>
                    <div class="absolute bottom-3 right-3 z-30">
                        <span class="bg-[#1a1a1a]/80 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1">After</span>
                    </div>
                </div>

                {{-- Price & Services --}}
                <div class="p-6 flex flex-col flex-grow">
                    {{-- Price Display --}}
                    <div class="text-center mb-5 pb-5 border-b border-slate-100">
                        <span class="text-slate-400 text-xs italic">Starts From</span>
                        <div class="flex items-start justify-center gap-0.5 mt-1">
                            <span class="text-[#1a1a1a] text-lg font-bold mt-2">$</span>
                            <span class="text-[#1a1a1a] text-5xl font-black tracking-tighter">{{ explode('.', $plan['price'])[0] }}</span>
                            <span class="text-[#1a1a1a] text-lg font-bold mt-2">.{{ explode('.', $plan['price'])[1] }}</span>
                        </div>
                        <span class="text-slate-400 text-xs italic">per image</span>
                    </div>

                    {{-- Service Items --}}
                    <div class="space-y-3.5 mb-8 flex-grow">
                        @foreach($plan['services'] as [$name, $val])
                        <div class="flex justify-between items-center">
                            <span class="text-[13px] text-slate-600 italic">{{ $name }}</span>
                            <span class="text-[13px] font-bold text-[#1a1a1a]">${{ $val }}</span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-3">
                        <a href="{{ route('graphics.get-quote') }}" 
                           class="flex-1 text-center py-2.5 rounded-sm border-2 {{ $plan['btnBorder'] }} font-bold text-[11px] uppercase tracking-widest transition-all duration-300">
                            Free Trial
                        </a>
                        <a href="{{ route('graphics.get-quote') }}" 
                           class="flex-1 text-center py-2.5 rounded-sm {{ $plan['btnColor'] }} text-white font-bold text-[11px] uppercase tracking-widest transition-all duration-300">
                            Get a Quote
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination Dots --}}
        <div class="flex justify-center gap-2 mt-10">
            <span class="w-3 h-3 rounded-full border-2 border-[#1ebba3] bg-transparent"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 mt-[1px]"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 mt-[1px]"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 mt-[1px]"></span>
        </div>
    </div>
</div>

{{-- ── WHY CHOOSE US? ───────────────────────────────── --}}
<div class="bg-[#fafafa] py-24 border-t border-[#eaeaea]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-[#222] text-[28px] md:text-[32px] font-bold mb-5 uppercase tracking-wide">Why Choose Us?</h2>
            <p class="text-[#666] text-[15px] leading-[1.8] max-w-4xl mx-auto font-light">
                We have been providing professional image manipulation, photo retouching, and photo editing services for the last 30<br class="hidden md:block"> years. Here are the key features of choosing us.
            </p>
        </div>

        @php
        $features = [
            [
                'title' => 'Rush Service',
                'icon' => 'ri-timer-flash-line',
                'text' => 'If you need a quick ecommerce product photo editing services for bulk images, you can take our same day image editing services (12-24 hours turnaround time).'
            ],
            [
                'title' => '6 Steps QA',
                'icon' => 'ri-checkbox-multiple-line',
                'text' => 'We pride for providing 100% quality image editing and we are ensuring it by efficient 6 steps quality assuring process.'
            ],
            [
                'title' => 'Most Competitive Price',
                'icon' => 'ri-hand-coin-line',
                'text' => 'If you compare our image editing prices to other service providers keeping in mind the quality factor, you will see that we are offering the most reasonable prices.'
            ],
            [
                'title' => 'Easy Payment System',
                'icon' => 'ri-wallet-3-line',
                'text' => 'You can pay us by a lot of means. We offer PayPal, Master Card, VISA, Bank account (for USA) opportunity that will make payment issue easy and secure.'
            ],
            [
                'title' => 'Secured File Transfer',
                'icon' => 'ri-shield-keyhole-line',
                'text' => 'We use secure FTP such as Hightail, we-transfer, Dropbox which enable you to send files up to 500 GB. It is a quick and hassle-free system.'
            ],
            [
                'title' => 'On Time Delivery',
                'icon' => 'ri-time-line',
                'text' => 'Time is very much important for your project. For timely delivery, our experienced and skilled graphic designers work with full dedication.'
            ],
            [
                'title' => 'Bulk Order Processing',
                'icon' => 'ri-shopping-cart-2-line',
                'text' => 'We are capable of handling bulk order of images which may contain more than 5000 images. Get all the images within the required time.'
            ],
            [
                'title' => 'High Volume Discount',
                'icon' => 'ri-refund-2-line',
                'text' => 'We offer amazing discount offer for a large volume of images. You can send sample images for free trial to judge our service & quality.'
            ]
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-10 gap-y-14">
            @foreach($features as $feature)
            <div class="flex flex-col items-center group cursor-default">
                {{-- Icon Wrapper --}}
                <div class="mb-5 text-[#12719c] transition-transform duration-300 group-hover:-translate-y-2">
                    <i class="{{ $feature['icon'] }} text-[60px] leading-none drop-shadow-sm font-light"></i>
                </div>
                {{-- Title --}}
                <h4 class="text-[#333] font-bold text-[14px] mb-3 tracking-wide">{{ $feature['title'] }}</h4>
                {{-- Text --}}
                <p class="text-[#555] text-[13.5px] leading-[1.8] text-justify w-full">
                    {{ $feature['text'] }}
                </p>
            </div>
            @endforeach
        </div>

    </div>
</div>

{{-- ── FAQ SECTION ──────────────────────────────────── --}}
<div class="bg-white py-20 pb-28 border-t border-[#eaeaea]">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-[#333] text-[28px] md:text-[32px] font-bold tracking-wide">Frequently Asked Questions(FAQ)</h2>
        </div>

        @php
        $faqRow1Left = [
            ['num' => '1', 'q' => 'What do you mean by 1st Order Free Campaign/Offer Details?'],
            ['num' => '2', 'q' => 'How many images will be counted as Bulk Order?'],
        ];
        $faqRow1Right = [
            ['num' => '1', 'q' => 'What do you mean by 1st Order Free Campaign/Offer Details?'],
            ['num' => '2', 'q' => 'What is your turnaround time?'],
        ];
        $faqRow2Full = [
            ['num' => '1', 'q' => 'What is your NDA policy?'],
        ];
        $faqRow3Left = [
            ['num' => '1', 'q' => 'How many orders you can process on daily basis?'],
            ['num' => '2', 'q' => 'How do you charge to turn a transparent background to white?'],
            ['num' => '3', 'q' => 'How about the Quality Assurance Process?'],
            ['num' => '4', 'q' => 'Can I use monthly/weekly subscription?'],
        ];
        $faqRow3Right = [
            ['num' => '1', 'q' => 'How do you charge for product photo image editing for future order?'],
            ['num' => '2', 'q' => 'How do you charge to turn white background into transparent background?'],
            ['num' => '3', 'q' => 'Which software you are using?'],
            ['num' => '4', 'q' => 'Who are taking your photo editing services?'],
        ];
        @endphp

        {{-- First Row: 2 Columns --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[15px] mb-[15px]">
            {{-- Left --}}
            <div class="flex flex-col gap-[15px]">
                @foreach($faqRow1Left as $faq)
                <div x-data="{ open: false }" class="bg-[#fafafa] flex flex-col group cursor-pointer transition-colors" @click="open = !open">
                    <div class="flex items-stretch min-h-[60px] group-hover:bg-[#f6f6f6]">
                        <div class="bg-[#f0f0f0] w-[60px] flex-shrink-0 flex items-center justify-center font-bold text-[#333] text-[14px]">
                            {{ $faq['num'] }}
                        </div>
                        <div class="flex-1 px-5 py-3 flex items-center justify-between border-l-[3px] border-white">
                            <span class="text-[#555] text-[13.5px] leading-snug">{{ $faq['q'] }}</span>
                            <span class="text-[#aaa] text-[22px] font-light leading-none select-none transition-transform duration-300" :class="{'rotate-45': open}">+</span>
                        </div>
                    </div>
                    <div x-show="open" style="display: none;" class="px-5 py-4 pl-[80px] text-[#666] text-[13px] border-t border-[#f0f0f0]" x-collapse>
                        Content regarding this specific question goes here.
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Right --}}
            <div class="flex flex-col gap-[15px]">
                @foreach($faqRow1Right as $faq)
                <div x-data="{ open: false }" class="bg-[#fafafa] flex flex-col group cursor-pointer transition-colors" @click="open = !open">
                    <div class="flex items-stretch min-h-[60px] group-hover:bg-[#f6f6f6]">
                        <div class="bg-[#f0f0f0] w-[60px] flex-shrink-0 flex items-center justify-center font-bold text-[#333] text-[14px]">
                            {{ $faq['num'] }}
                        </div>
                        <div class="flex-1 px-5 py-3 flex items-center justify-between border-l-[3px] border-white">
                            <span class="text-[#555] text-[13.5px] leading-snug">{{ $faq['q'] }}</span>
                            <span class="text-[#aaa] text-[22px] font-light leading-none select-none transition-transform duration-300" :class="{'rotate-45': open}">+</span>
                        </div>
                    </div>
                    <div x-show="open" style="display: none;" class="px-5 py-4 pl-[80px] text-[#666] text-[13px] border-t border-[#f0f0f0]" x-collapse>
                        Content regarding this specific question goes here.
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Second Row: Full Width item --}}
        <div class="mb-[15px]">
            @foreach($faqRow2Full as $faq)
            <div x-data="{ open: false }" class="bg-[#fafafa] flex flex-col group cursor-pointer transition-colors" @click="open = !open">
                <div class="flex items-stretch min-h-[60px] group-hover:bg-[#f6f6f6]">
                    <div class="bg-[#f0f0f0] w-[60px] flex-shrink-0 flex items-center justify-center font-bold text-[#333] text-[14px]">
                        {{ $faq['num'] }}
                    </div>
                    <div class="flex-1 px-5 py-3 flex items-center justify-between border-l-[3px] border-white">
                        <span class="text-[#555] text-[13.5px] leading-snug">{{ $faq['q'] }}</span>
                        <span class="text-[#aaa] text-[22px] font-light leading-none select-none transition-transform duration-300" :class="{'rotate-45': open}">+</span>
                    </div>
                </div>
                <div x-show="open" style="display: none;" class="px-5 py-4 pl-[80px] text-[#666] text-[13px] border-t border-[#f0f0f0]" x-collapse>
                    Content regarding this specific question goes here.
                </div>
            </div>
            @endforeach
        </div>

        {{-- Third Row: 2 Columns again --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[15px] mb-16">
            {{-- Left --}}
            <div class="flex flex-col gap-[15px]">
                @foreach($faqRow3Left as $faq)
                <div x-data="{ open: false }" class="bg-[#fafafa] flex flex-col group cursor-pointer transition-colors" @click="open = !open">
                    <div class="flex items-stretch min-h-[60px] group-hover:bg-[#f6f6f6]">
                        <div class="bg-[#f0f0f0] w-[60px] flex-shrink-0 flex items-center justify-center font-bold text-[#333] text-[14px]">
                            {{ $faq['num'] }}
                        </div>
                        <div class="flex-1 px-5 py-3 flex items-center justify-between border-l-[3px] border-white">
                            <span class="text-[#555] text-[13.5px] leading-snug">{{ $faq['q'] }}</span>
                            <span class="text-[#aaa] text-[22px] font-light leading-none select-none transition-transform duration-300" :class="{'rotate-45': open}">+</span>
                        </div>
                    </div>
                    <div x-show="open" style="display: none;" class="px-5 py-4 pl-[80px] text-[#666] text-[13px] border-t border-[#f0f0f0]" x-collapse>
                        Content regarding this specific question goes here.
                    </div>
                </div>
                @endforeach
            </div>
            {{-- Right --}}
            <div class="flex flex-col gap-[15px]">
                @foreach($faqRow3Right as $faq)
                <div x-data="{ open: false }" class="bg-[#fafafa] flex flex-col group cursor-pointer transition-colors" @click="open = !open">
                    <div class="flex items-stretch min-h-[60px] group-hover:bg-[#f6f6f6]">
                        <div class="bg-[#f0f0f0] w-[60px] flex-shrink-0 flex items-center justify-center font-bold text-[#333] text-[14px]">
                            {{ $faq['num'] }}
                        </div>
                        <div class="flex-1 px-5 py-3 flex items-center justify-between border-l-[3px] border-white">
                            <span class="text-[#555] text-[13.5px] leading-snug">{{ $faq['q'] }}</span>
                            <span class="text-[#aaa] text-[22px] font-light leading-none select-none transition-transform duration-300" :class="{'rotate-45': open}">+</span>
                        </div>
                    </div>
                    <div x-show="open" style="display: none;" class="px-5 py-4 pl-[80px] text-[#666] text-[13px] border-t border-[#f0f0f0]" x-collapse>
                        Content regarding this specific question goes here.
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Bottom Global Action Buttons --}}
        <div class="flex justify-center gap-4 mt-4">
            <a href="#" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Order Now</a>
            <a href="#" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Contact Us</a>
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
