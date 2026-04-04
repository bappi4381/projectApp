@extends('layouts.app')

@section('title', 'Christmas Photo Editing Service | Professional Holiday Image Solutions')

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
        <h1 class="text-3xl md:text-5xl font-black text-white uppercase tracking-widest mb-6 drop-shadow-lg">Christmas Photo Editing Service</h1>
        <div class="flex justify-center gap-1.5">
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
            <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></span>
            <span class="w-1.5 h-1.5 bg-white rounded-full opacity-50"></span>
        </div>
    </div>
</div>

{{-- ── CHRISTMAS MAIN CONTENT SECTION ──────────────── --}}
<section class="relative bg-white pt-24 pb-0 overflow-hidden container mx-auto rounded-sm shadow-[0_10px_40px_rgba(0,0,0,0.04)] border border-slate-100">
    
    {{-- Corner Decorations (Pine Branches) - Positioned precisely per mockup --}}
    <div class="absolute top-0 left-[-15px] md:left-[20px] w-56 md:w-72 pointer-events-none z-10 transition-transform hover:scale-105 duration-700">
        <img src="{{ asset('images/ecommerce/Cristmas-Pic-02-Copy.png') }}" class="w-full h-auto drop-shadow-lg" alt="Pine Branch">
    </div>
    <div class="absolute top-0 right-[-15px] md:right-[20px] w-56 md:w-72 pointer-events-none z-10 transform scale-x-[-1] transition-transform hover:scale-105 duration-700">
        <img src="{{ asset('images/ecommerce/Cristmas-Pic-02-Copy.png') }}" class="w-full h-auto drop-shadow-lg" alt="Pine Branch">
    </div>

    {{-- Snowflake Background Pattern (Lightly visible) --}}
    <div class="absolute inset-0 opacity-[0.06] pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/snow.png');"></div>

    <div class="max-w-[1100px] mx-auto px-4 relative z-20 text-center">
        {{-- Heading --}}
        <h2 class="text-[#055781] text-[20px] md:text-[24px] font-black mb-12 tracking-tight leading-snug uppercase">
            Christmas and Holiday Photo Editing Services
        </h2>

        {{-- Monitor/Tablet Frame Mockup (Resized to 350x250) --}}
        <div class="relative w-[350px] mx-auto mb-20 group">
            {{-- Tablet Frame --}}
            <div class="bg-[#000] p-2.5 rounded-[12px] border-[4px] border-[#0a0a0a] shadow-[0_30px_60px_rgba(0,0,0,0.2)] transition-all duration-500 group-hover:shadow-[0_45px_90px_rgba(0,0,0,0.3)]">
                <div class="relative w-full h-[250px] bg-white overflow-hidden rounded-[4px] shadow-inner">
                    <img src="{{ asset('images/ecommerce/chritsmas-photo-editing.gif') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Christmas Editing Show">
                    {{-- Screen Reflection Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-white/10 pointer-events-none"></div>
                </div>
            </div>
            {{-- Reflection/Shadow --}}
            <div class="w-[85%] h-6 bg-black/[0.08] blur-2xl rounded-full mx-auto -mt-4 transition-all duration-500 group-hover:w-[90%] group-hover:blur-3xl"></div>
        </div>

        {{-- Text Content --}}
        <div class="max-w-[950px] mx-auto mb-16">
            <p class="text-[#4b5563] text-[15px] md:text-[17px] leading-[1.8] text-center font-normal px-4 opacity-90">
                During marry Christmas festivals or happy New Year, you run a Christmas photo session in your happy moments with friends and family members, Christmas evening occasions, room outfits with Xmas tree and ball, kids and Santa Claus, and more. You try to make the time unforgettable storing the images with the best appearances adding various photo editing effects and frames. Sometimes, your Christmas images may contain unwanted image background and objects, people, imperfect lighting effects and black shadows, and many other things that can reduce the quality of your images. If you are a professional photographer, you may be anxious about your bulk Christmas photos which require professional Christmas image editing and retouching services.
            </p>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap justify-center gap-6 mb-28">
            <a href="{{ route('graphics.get-quote') }}" class="px-12 py-4 bg-[#6c91b8] hover:bg-[#5e81a5] text-white text-[15px] font-black uppercase tracking-widest rounded-sm transition-all shadow-[0_8px_25px_rgba(108,145,184,0.3)] hover:shadow-[0_12px_35px_rgba(108,145,184,0.5)] active:scale-95">
                Get A Quote
            </a>
            <a href="{{ route('graphics.get-quote') }}" class="px-12 py-4 bg-[#6c91b8] hover:bg-[#5e81a5] text-white text-[15px] font-black uppercase tracking-widest rounded-sm transition-all shadow-[0_8px_25px_rgba(108,145,184,0.3)] hover:shadow-[0_12px_35px_rgba(108,145,184,0.5)] active:scale-95">
                Get Free Trial
            </a>
        </div>
    </div>
</section>

{{-- Red Statistics Bar (FULL WIDTH) --}}
<section class="w-full bg-[#d03433] relative overflow-hidden py-16 mt-0">
    {{-- Diagonal Stripe Pattern --}}
    <div class="absolute inset-0 opacity-10" style="background: repeating-linear-gradient(-45deg, #000, #000 12px, transparent 12px, transparent 24px);"></div>
    
    <div class="max-w-7xl mx-auto px-4 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-0">
            {{-- Stat 1 --}}
            <div class="flex flex-col items-center justify-center text-white group cursor-default">
                <i class="ri-price-tag-3-fill text-[42px] mb-4 text-white/90 group-hover:scale-110 transition-transform duration-300"></i>
                <h4 class="text-[14px] md:text-[17px] font-bold uppercase mb-2 tracking-wide text-white/80">Price Starts From</h4>
                <p class="text-[32px] md:text-[42px] font-black text-yellow-300 leading-none drop-shadow-md">49<span class="text-[18px] ml-0.5">¢</span></p>
            </div>
            {{-- Stat 2 --}}
            <div class="flex flex-col items-center justify-center text-white border-l border-white/10 lg:border-l-transparent group cursor-default">
                <i class="ri-shopping-cart-2-fill text-[42px] mb-4 text-white/90 group-hover:scale-110 transition-transform duration-300"></i>
                <h4 class="text-[14px] md:text-[17px] font-bold uppercase mb-2 tracking-wide text-white/80">Get Big Discount</h4>
                <p class="text-[32px] md:text-[42px] font-black text-yellow-300 leading-none drop-shadow-md">40<span class="text-[18px] ml-0.5">%</span></p>
            </div>
            {{-- Stat 3 --}}
            <div class="flex flex-col items-center justify-center text-white border-l border-white/10 group cursor-default">
                <i class="ri-send-plane-fill text-[42px] mb-4 text-white/90 group-hover:scale-110 transition-transform duration-300"></i>
                <h4 class="text-[14px] md:text-[17px] font-bold uppercase mb-2 tracking-wide text-white/80">We Can Deliver</h4>
                <p class="text-[32px] md:text-[42px] font-black text-yellow-300 leading-none drop-shadow-md">5000<span class="text-[12px] ml-1 uppercase font-bold text-white/50">images/day</span></p>
            </div>
            {{-- Stat 4 --}}
            <div class="flex flex-col items-center justify-center text-white border-l border-white/10 group cursor-default">
                <i class="ri-thumb-up-fill text-[42px] mb-4 text-white/90 group-hover:scale-110 transition-transform duration-300"></i>
                <h4 class="text-[14px] md:text-[17px] font-bold uppercase mb-2 tracking-wide text-white/80">Comprehensive QA</h4>
                <p class="text-[32px] md:text-[42px] font-black text-yellow-300 leading-none drop-shadow-md">6<span class="text-[22px] ml-1">+</span></p>
            </div>
        </div>
    </div>
</section>




{{-- ── CHRISTMAS SERVICES GRID SECTION ──────────────── --}}
<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Section Header --}}
        <div class="text-center mb-20">
            <h2 class="text-[#055781] text-[28px] md:text-[38px] font-black mb-6 tracking-tight">
                Christmas Photo Editing
            </h2>
            <p class="max-w-4xl mx-auto text-[#555] text-[15px] md:text-[17px] leading-[1.8] font-light">
                We have been offering all types of happy Christmas photograph editing services with background removing, clipping path and image masking, image retouching and color correction, photo collage creation, damaged Christmas photo restoration, and more. If you feel requirement, you can outsource Christmas photo editing services from us at the best photo editing price packages. Before on board as our customer, you can take up to 2 images free photo editing service. Upload your files and Get a Quote from us.
            </p>
        </div>

        {{-- Services Grid (2 Columns) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-24">
            
            {{-- Service 1: Christmas Tree Editing --}}
            <div class="flex flex-col">
                {{-- Side by Side Comparison --}}
                <div class="grid grid-cols-2 gap-1 mb-8 shadow-sm border border-slate-100 p-1 bg-slate-50">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ecommerce/christmas-tree-clean.png') }}" class="w-full h-[280px] object-fit grayscale opacity-80" alt="Before">
                        <span class="absolute top-2 left-2 bg-slate-800/80 text-white text-[10px] px-2 py-0.5 rounded-sm uppercase font-bold">Before</span>
                    </div>
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ecommerce/christmas-tree-clean.png') }}" class="w-full h-[280px] object-fit" alt="After">
                        <span class="absolute top-2 left-2 bg-[#055781]/80 text-white text-[10px] px-2 py-0.5 rounded-sm uppercase font-bold">After</span>
                    </div>
                </div>
                <h3 class="text-[#055781] text-[20px] md:text-[24px] font-black mb-4 text-center md:text-left">
                    Christmas Tree Editing & Retouch
                </h3>
                <p class="text-[#555] text-[15px] leading-[1.7] mb-8 text-justify">
                    We remove distracting background from Christmas tree image and retouch image to improve photo quality applying clipping path, image masking, and photoshop editing technique. Color correction will make the image and its other components like lighting, tree ball, doll, etc. more attractive visually.
                </p>
                <div class="mt-auto flex justify-center">
                    <a href="{{ route('graphics.get-quote') }}" class="px-8 py-3 bg-[#749bc2] hover:bg-[#5e83a9] text-white text-[14px] font-bold rounded-sm transition-all shadow-md">
                        Get A Quote
                    </a>
                </div>
            </div>

            {{-- Service 2: Christmas Snowfall Editing --}}
            <div class="flex flex-col">
                {{-- Side by Side Comparison --}}
                <div class="grid grid-cols-2 gap-1 mb-8 shadow-sm border border-slate-100 p-1 bg-slate-50">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ecommerce/snowflake-clean.png') }}" class="w-full h-[280px] object-fit blur-[1px] grayscale" alt="Before">
                        <span class="absolute top-2 left-2 bg-slate-800/80 text-white text-[10px] px-2 py-0.5 rounded-sm uppercase font-bold">Before</span>
                    </div>
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ecommerce/snowflake-clean.png') }}" class="w-full h-[280px] object-fit" alt="After">
                        <span class="absolute top-2 left-2 bg-[#055781]/80 text-white text-[10px] px-2 py-0.5 rounded-sm uppercase font-bold">After</span>
                    </div>
                </div>
                <h3 class="text-[#055781] text-[20px] md:text-[24px] font-black mb-4 text-center md:text-left">
                    Christmas Snowfall Editing
                </h3>
                <p class="text-[#555] text-[15px] leading-[1.7] mb-8 text-justify">
                    Photo editing increases the quality of Christmas snowfall images. We <b>retouch snowfall photos</b> or add snowflake on the existing photos. To grow visual attraction, we do <span class="text-[#749bc2]">remove background</span>, lighting and <span class="text-[#749bc2]">exposure correction</span>, image brightening and more.
                </p>
                <div class="mt-auto flex justify-center">
                    <a href="{{ route('graphics.get-quote') }}" class="px-8 py-3 bg-[#749bc2] hover:bg-[#5e83a9] text-white text-[14px] font-bold rounded-sm transition-all shadow-md">
                        Get A Quote
                    </a>
                </div>
            </div>

            {{-- Service 3: Christmas Ball/Ornament Editing --}}
            <div class="flex flex-col">
                {{-- Side by Side Comparison --}}
                <div class="grid grid-cols-2 gap-1 mb-8 shadow-sm border border-slate-100 p-1 bg-slate-50">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ecommerce/ornaments-clean.png') }}" class="w-full h-[280px] object-fit grayscale opacity-90" alt="Before">
                        <span class="absolute top-2 left-2 bg-slate-800/80 text-white text-[10px] px-2 py-0.5 rounded-sm uppercase font-bold">Before</span>
                    </div>
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ecommerce/ornaments-clean.png') }}" class="w-full h-[280px] object-fit" alt="After">
                        <span class="absolute top-2 left-2 bg-[#055781]/80 text-white text-[10px] px-2 py-0.5 rounded-sm uppercase font-bold">After</span>
                    </div>
                </div>
                <h3 class="text-[#055781] text-[20px] md:text-[24px] font-black mb-4 text-center md:text-left">
                    Holiday Ornament Retouching
                </h3>
                <p class="text-[#555] text-[15px] leading-[1.7] mb-8 text-justify">
                    Making ornaments shine is our specialty. We clear reflections, enhance metallic glows, and correct colors so your festive products look their absolute best for eCommerce and advertising.
                </p>
                <div class="mt-auto flex justify-center">
                    <a href="{{ route('graphics.get-quote') }}" class="px-8 py-3 bg-[#749bc2] hover:bg-[#5e83a9] text-white text-[14px] font-bold rounded-sm transition-all shadow-md">
                        Get A Quote
                    </a>
                </div>
            </div>

            {{-- Service 4: Gift & Stack Editing --}}
            <div class="flex flex-col">
                {{-- Side by Side Comparison --}}
                <div class="grid grid-cols-2 gap-1 mb-8 shadow-sm border border-slate-100 p-1 bg-slate-50">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ecommerce/gifts-clean.png') }}" class="w-full h-[280px] object-fit grayscale opacity-90" alt="Before">
                        <span class="absolute top-2 left-2 bg-slate-800/80 text-white text-[10px] px-2 py-0.5 rounded-sm uppercase font-bold">Before</span>
                    </div>
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('images/ecommerce/gifts-clean.png') }}" class="w-full h-[280px] object-fit" alt="After">
                        <span class="absolute top-2 left-2 bg-[#055781]/80 text-white text-[10px] px-2 py-0.5 rounded-sm uppercase font-bold">After</span>
                    </div>
                </div>
                <h3 class="text-[#055781] text-[20px] md:text-[24px] font-black mb-4 text-center md:text-left">
                    Gift Box & Package Editing
                </h3>
                <p class="text-[#555] text-[15px] leading-[1.7] mb-8 text-justify">
                    Removing wrinkles from ribbons, correcting box colors, and adding sharp shadows. We ensure your holiday packaging looks perfect for marketing campaigns across social media and print.
                </p>
                <div class="mt-auto flex justify-center">
                    <a href="{{ route('graphics.get-quote') }}" class="px-8 py-3 bg-[#749bc2] hover:bg-[#5e83a9] text-white text-[14px] font-bold rounded-sm transition-all shadow-md">
                        Get A Quote
                    </a>
                </div>
            </div>

        </div>

        {{-- Disclaimer Box --}}
        <div class="mt-16 bg-[#fcecec] border border-[#f5d5d5] px-6 py-5 flex items-start sm:items-center gap-4 text-[#bc4343] rounded-sm">
            <i class="ri-error-warning-line text-2xl shrink-0"></i>
            <p class="text-[14px] leading-relaxed">
                <span class="font-bold italic">Disclaimer:</span> The before/after photos are used as a sample of services we offer. The actual price of displayed images might be higher than the mentioned Starting Price. For accurate prices, please <a href="{{ route('graphics.get-quote') }}" class="underline hover:text-red-800 transition-colors">Request a Quote</a>
            </p>
        </div>
    </div>
</section>

{{-- ── WHY CHOOSE US? ───────────────────────────────── --}}
<div class="bg-[#fafafa] py-20 border-t border-b border-[#eaeaea]">
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
            ],
            [
                'title' => '6 Steps QA',
                'icon' => 'ri-checkbox-multiple-line',
            ],
            [
                'title' => 'Most Competitive Price',
                'icon' => 'ri-thumb-up-line',
            ],
            [
                'title' => 'Easy Payment System',
                'icon' => 'ri-wallet-3-line',
            ],
            [
                'title' => 'Secured File Transfer',
                'icon' => 'ri-key-fill',
            ],
            [
                'title' => 'On Time Delivery',
                'icon' => 'ri-time-line',
            ],
            [
                'title' => 'Bulk Order Processing',
                'icon' => 'ri-shopping-cart-2-line',
            ],
            [
                'title' => 'High Volume Discount',
                'icon' => 'ri-gift-line',
            ]
        ];
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-10 gap-y-16 max-w-6xl mx-auto">
            @foreach($features as $feature)
            <div class="flex flex-col items-center group cursor-default text-center">
                {{-- Icon Wrapper --}}
                <div class="mb-5 text-[#12719c] transition-transform duration-300 group-hover:-translate-y-2">
                    <i class="{{ $feature['icon'] }} text-[55px] leading-none drop-shadow-sm font-light"></i>
                </div>
                {{-- Title --}}
                <h4 class="text-[#333] font-bold text-[13px] tracking-wide">{{ $feature['title'] }}</h4>
            </div>
            @endforeach
        </div>

    </div>
</div>

{{-- ── DISCOUNT SECTION ─────────────────────────────── --}}
<div class="bg-[#f0f0f0] py-[60px]">
    <div class="max-w-[900px] mx-auto px-4 text-center">
        <h3 class="text-[#333] text-[24px] md:text-[28px] font-bold mb-4 tracking-wide">Claim Up To 40% Discount On Bulk Order</h3>
        <p class="text-[#1a1a1a] text-[15px] md:text-[18px] font-bold leading-snug max-w-[800px] mx-auto mb-8">
            Send bulk product photos requiring touch-up and take advantage of a voluminous discount reaching up to 40%
        </p>
        <div class="flex justify-center">
            <a href="{{ route('graphics.get-quote') }}" class="px-[35px] py-[10px] bg-[#749bc2] hover:bg-[#5a80a8] text-white text-[13px] font-bold rounded-sm transition-colors shadow-sm">Get A Quote</a>
        </div>
    </div>
</div>

{{-- ── PRICING CARDS ────────────────────────────────── --}}
<div id="pricing" class="relative py-16 bg-white overflow-hidden">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

        @php
        $pricingPlans = [
            [
                'title' => 'Clipping Path Services',
                'headerColor' => 'bg-[#5cb85c]',
                'btnColor' => 'bg-[#18c792] hover:bg-[#12b180]',
                'btnBorder' => 'border-[1.5px] border-[#18c792] text-[#1aa37a] hover:bg-[#18c792] hover:text-white',
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
                'headerColor' => 'bg-[#3eb1e5]',
                'btnColor' => 'bg-[#18c792] hover:bg-[#12b180]',
                'btnBorder' => 'border-[1.5px] border-[#18c792] text-[#1aa37a] hover:bg-[#18c792] hover:text-white',
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
                'headerColor' => 'bg-[#f0c14b]',
                'btnColor' => 'bg-[#18c792] hover:bg-[#12b180]',
                'btnBorder' => 'border-[1.5px] border-[#18c792] text-[#1aa37a] hover:bg-[#18c792] hover:text-white',
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
                'headerColor' => 'bg-[#5cb85c]',
                'btnColor' => 'bg-[#18c792] hover:bg-[#12b180]',
                'btnBorder' => 'border-[1.5px] border-[#18c792] text-[#1aa37a] hover:bg-[#18c792] hover:text-white',
                'price' => '0.49',
                'before' => 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1534349762230-e0cadf78f5da?w=600&q=80',
                'services' => [
                    ['Color Correction', '0.49'],
                    ['Exposure Correction', '0.49'],
                    ['Color Conversion', '7.50'],
                    ['Color Restoration', '19.99'],
                ]
            ]
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($pricingPlans as $i => $plan)
            <div class="bg-white border rounded-[2px] border-slate-200 flex flex-col hover:shadow-xl transition-shadow duration-300">
                
                {{-- Card Title Header --}}
                <div class="{{ $plan['headerColor'] }} py-3.5 px-4 text-center">
                    <h3 class="text-[#1a1a1a] font-bold text-[14px] tracking-wide">{{ $plan['title'] }}</h3>
                </div>

                {{-- Before/After Slider --}}
                <div class="relative w-full aspect-[4/3] overflow-hidden bg-white cursor-ew-resize"
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
                    <div class="absolute inset-0 z-10 overflow-hidden slider-smooth pointer-events-none" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $plan['before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-90">
                    </div>

                    {{-- Slider Handle --}}
                    <div class="absolute inset-y-0 z-20 w-[1.5px] bg-white cursor-ew-resize slider-smooth shadow-md" :style="'left: ' + position + '%'">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[26px] h-[26px] bg-[#444] rounded-full shadow-lg flex items-center justify-center border-[1.5px] border-white">
                            <i class="ri-arrow-left-right-fill text-[11px] text-white"></i>
                        </div>
                    </div>

                    {{-- Floating Top Labels --}}
                    <div class="absolute top-2 left-2 z-30 pointer-events-none">
                        <span class="bg-black/40 text-white text-[9px] px-2 py-0.5 rounded-full">Before</span>
                    </div>

                    {{-- Flush Bottom Labels --}}
                    <div class="absolute bottom-0 left-0 z-30 pointer-events-none slider-smooth" :style="'opacity: ' + (position > 25 ? 1 : 0)">
                        <span class="bg-[#555] text-white text-[10px] font-bold uppercase tracking-wider px-[14px] py-[4px] inline-block">Before</span>
                    </div>
                    <div class="absolute bottom-0 right-0 z-30 pointer-events-none slider-smooth" :style="'opacity: ' + (position < 75 ? 1 : 0)">
                        <span class="bg-[#555] text-white text-[10px] font-bold uppercase tracking-wider px-[14px] py-[4px] inline-block">After</span>
                    </div>
                </div>

                {{-- Price & Services --}}
                <div class="p-5 flex flex-col flex-grow">
                    {{-- Price Display --}}
                    <div class="text-center mb-[18px] pb-4 border-b border-slate-100">
                        <span class="text-[#aaa] text-[11px] font-medium italic">Starts From</span>
                        <div class="flex items-start justify-center gap-[2px] mt-0.5">
                            <span class="text-[#1a1a1a] text-[16px] font-bold mt-[6px]">$</span>
                            <span class="text-[#000] text-[36px] font-black tracking-tighter leading-none">{{ explode('.', $plan['price'])[0] }}</span>
                            <span class="text-[#000] text-[16px] font-black mt-[6px] max-h-0 leading-none">.{{ explode('.', $plan['price'])[1] }}</span>
                            <span class="text-[#aaa] text-[11px] font-medium italic self-end ml-1 mb-1 relative top-[2px]">per image</span>
                        </div>
                    </div>

                    {{-- Service Items --}}
                    <div class="space-y-[10px] mb-7 flex-grow">
                        @foreach($plan['services'] as [$name, $val])
                        <div class="flex justify-between items-center text-[#333]">
                            <span class="text-[12.5px]">{{ $name }}</span>
                            <span class="text-[12.5px] font-bold">${{ $val }}</span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Dual Pillow Buttons --}}
                    <div class="flex gap-[10px]">
                        <a href="{{ route('graphics.get-quote') }}" 
                           class="flex-1 text-center py-[7px] bg-white rounded-full {{ $plan['btnBorder'] }} font-bold text-[10px] uppercase transition-all duration-300 px-3">
                            Free Trial
                        </a>
                        <a href="{{ route('graphics.get-quote') }}" 
                           class="flex-1 text-center py-[7px] {{ $plan['btnColor'] }} text-white font-bold text-[10px] uppercase rounded-full transition-all duration-300 px-3">
                            Get a Quote
                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination Dots --}}
        <div class="flex justify-center items-center gap-2 mt-12 mb-4">
            <span class="w-[14px] h-[14px] rounded-full border-[1.5px] border-[#e67e22] flex items-center justify-center bg-transparent">
                <span class="w-1.5 h-1.5 bg-[#e67e22] rounded-full"></span>
            </span>
            <span class="w-1.5 h-1.5 rounded-full bg-[#8c9e8f]"></span>
            <span class="w-1.5 h-1.5 rounded-full bg-[#8c9e8f]"></span>
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
</style>
@endsection
