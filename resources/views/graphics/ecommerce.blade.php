@extends('layouts.app')
@section('title', $page->hero_title . ' | Graphics Studio')
@section('meta_description', 'High-quality ' . $page->hero_title . '. Price starts from $' . number_format($page->hero_price_from, 2) . ' ' . $page->hero_price_unit)

@section('content')
    <div class="bg-[#f0f9ff] min-h-screen text-slate-800 font-sans selection:bg-[#7F2DF7] selection:text-white pb-20">

        {{-- ── HERO SECTION ────────────────────────────────── --}}
        <div class="flex items-center relative"
            style="background: linear-gradient(135deg, #072a44 0%, #0d4669 100%); min-height: 550px; padding-top: 150px; padding-bottom: 80px;">
            <div class="container mx-auto px-6 max-w-6xl relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

                    {{-- Left Side: Image Container --}}
                    <div class="relative mx-auto flex items-center justify-center p-4 bg-slate-200/10 backdrop-blur-sm shadow-2xl border border-white/10 rounded-2xl" style="width: 380px; height: 380px;">
                        <img src="{{ $page->hero_gif ? asset('storage/'.$page->hero_gif) : asset('images/ecommerce/Ecommerce-Product-Photo-Editing-Services-GIF.gif') }}"
                            alt="Ecommerce Product Example" class="w-full h-full object-contain drop-shadow-xl">
                    </div>

                    {{-- Right Side: Content --}}
                    <div class="text-white text-center pt-4 flex flex-col items-center">
                        <h1 class="text-[30px] md:text-[40px] font-bold tracking-tight mb-12 leading-[1.2] text-white text-center md:text-center">
                            {!! nl2br(e($page->hero_title)) !!}
                        </h1>

                        <div class="grid grid-cols-2 gap-8 mb-12 mx-auto md:max-w-md w-full">
                            {{-- Price Block --}}
                            <div class="text-center">
                                <h3 class="text-[16.5px] font-bold text-white mb-2">Price Starts From</h3>
                                <div class="text-[16px] text-[#4ade80] font-medium mb-0.5">${{ number_format($page->hero_price_from, 2) }}</div>
                                <div class="text-[14px] text-slate-300">{{ $page->hero_price_unit }}</div>
                                <a href="{{ route('graphics.get-quote') }}"
                                    class="inline-flex items-center justify-center px-7 py-3 mt-8 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-[13px] tracking-[0.15em] shadow-lg hover:shadow-cyan-500/30 transition-shadow">
                                    GET QUOTE
                                </a>
                            </div>
                            {{-- Deliver Block --}}
                            <div class="text-center">
                                <h3 class="text-[16.5px] font-bold text-white mb-2">We Can Deliver</h3>
                                <div class="text-[16px] text-[#4ade80] font-medium mb-0.5">{{ $page->hero_delivery_capacity }}</div>
                                <div class="text-[14px] text-slate-300">{{ $page->hero_delivery_subtitle }}</div>
                                <a href="{{ route('graphics.upload') }}"
                                    class="inline-flex items-center justify-center px-7 py-3 mt-8 rounded-full bg-white text-slate-900 font-bold text-[13px] tracking-[0.15em] shadow-lg hover:bg-slate-100 transition-colors">
                                    FREE TRIAL
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Subtle background pattern for visual depth --}}
            <div class="absolute inset-0 opacity-[0.02] pointer-events-none"
                style="background-image: radial-gradient(white 1.5px, transparent 1.5px); background-size: 40px 40px;">
            </div>
        </div>

        {{-- ── UPLOAD SECTION ──────────────────────────────── --}}
        <div class="bg-white py-20 relative">
            <div class="container mx-auto px-6 max-w-4xl text-center font-sans">
                {{-- Section Title --}}
                <h2 class="text-[28px] md:text-[34px] font-bold text-[#074b7c] mb-4">
                    Product Photos Edited to Perfection
                </h2>
                {{-- Section Description --}}
                <p class="text-slate-500 text-[15px] md:text-[16px] leading-relaxed max-w-2xl mx-auto mb-12">
                    With expert photo editing, you can showcase thumb-stopping visuals and convey quality<br
                        class="hidden md:block"> and trust to turn your viewers into your customers.
                </p>

                <div class="border-t border-slate-100 w-full mb-12 relative">
                    <div class="absolute inset-x-0 flex items-center justify-center -top-4">
                        <div class="bg-white px-2">
                            <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0L10 10L20 0H0Z" fill="#f1f5f9" />
                            </svg>
                        </div>
                    </div>
                </div>

                <h3 class="text-[22px] md:text-[26px] font-bold text-slate-800 mb-10">
                    Get your photos edited in less than 24 hours
                </h3>

                {{-- Upload Widget Mockup --}}
                <div class="max-w-3xl mx-auto">
                    <div class="bg-[#e9f7ef] rounded-lg p-6 border border-[#d1ebd8] relative shadow-sm">
                        {{-- Dotted Inner Box --}}
                        <div
                            class="border-2 border-dashed border-[#b3dab9] rounded-lg py-12 px-6 flex flex-col items-center justify-center">
                            <p class="text-[#51855a] font-bold text-[16px] md:text-[18px] mb-2">Upload Your Files (max
                                500mb/file, 10 files only)</p>
                            <p class="text-[#51855a] italic text-[14px] mb-8">*No credit card required.*</p>

                            <a href="{{ route('graphics.upload') }}"
                                class="bg-[#4d86b8] hover:bg-[#3d6b94] text-white px-10 py-3.5 rounded flex items-center gap-3 transition-colors shadow-md group">
                                <i class="ri-upload-cloud-2-line text-2xl group-hover:scale-110 transition-transform"></i>
                                <span class="font-bold uppercase tracking-wider text-sm">Upload Files</span>
                            </a>
                        </div>
                    </div>

                    {{-- Previous/Next Pagination Buttons --}}
                    <div class="grid grid-cols-2 mt-4 rounded-lg overflow-hidden border border-[#d1ebd8] shadow-sm">
                        <button
                            class="bg-[#e9f7ef] hover:bg-[#dff0e5] py-4 text-[12px] font-bold text-[#51855a] uppercase tracking-widest flex items-center justify-center transition-colors border-r border-[#d1ebd8]">
                            <i class="ri-arrow-left-s-line text-xl mr-2"></i> PREVIOUS
                        </button>
                        <button
                            class="bg-[#e9f7ef] hover:bg-[#dff0e5] py-4 text-[12px] font-bold text-[#51855a] uppercase tracking-widest flex items-center justify-center transition-colors">
                            NEXT <i class="ri-arrow-right-s-line text-xl ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── WORKFLOW SECTIONS (Dynamic) ────────────────────── --}}
        @foreach($page->workflow_sections ?? [] as $index => $wf)
        @php
            $highlightedTitle = e($wf['title']);
            if(!empty($wf['highlight_words'])) {
                foreach($wf['highlight_words'] as $word) {
                    $highlightedTitle = str_replace($word, '<span class="text-[#22c55e]">'.$word.'</span>', $highlightedTitle);
                }
            }
            // Add <br> before highlight manually if needed or just let it flow naturally
        @endphp
        <div class="bg-white py-24 {{ $index > 0 ? 'pt-12 pb-32' : 'pb-12' }}">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    
                    {{-- Content Side --}}
                    <div class="text-center w-full {{ $wf['reverse_layout'] ? 'order-2 lg:order-1 pr-0' : 'order-2 lg:order-2' }}">
                        <h2 class="text-[28px] md:text-[34px] font-extrabold leading-[1.05] mb-6 text-slate-900">
                            {!! $highlightedTitle !!}
                        </h2>
                        <p class="text-slate-500 text-[15px] md:text-[16px] leading-[1.6] mb-10 max-w-xl mx-auto">
                            {{ $wf['description'] }}
                        </p>
                        @if($wf['cta_label'])
                        <div class="flex flex-wrap gap-4 justify-center">
                            <a href="{{ route($wf['cta_route'] ?? 'graphics.get-quote') }}"
                                class="inline-flex items-center justify-center px-10 py-3.5 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-[12px] uppercase tracking-widest shadow-md hover:brightness-105 transition-all">
                                {{ $wf['cta_label'] }}
                            </a>
                            @if($wf['reverse_layout'])
                            <a href="{{ route('graphics.upload') }}"
                                class="inline-flex items-center justify-center px-10 py-3.5 rounded-full bg-white border-2 border-[#0ea5e9] text-slate-800 font-bold text-[12px] uppercase tracking-widest shadow-sm hover:bg-slate-50 transition-colors">
                                FREE TRIAL
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>

                    {{-- Image Slider Side --}}
                    <div class="{{ $wf['reverse_layout'] ? 'order-1 lg:order-2' : 'order-1 lg:order-1' }} relative overflow-hidden rounded-sm shadow-sm before-after-ec-container group"
                        style="height: 480px; cursor: ew-resize;">
                        {{-- AFTER image --}}
                        <img src="{{ !empty($wf['after_image']) ? asset('storage/'.$wf['after_image']) : asset('images/placeholder.jpg') }}"
                            alt="After" class="absolute inset-0 w-full h-full object-cover">

                        {{-- BEFORE image --}}
                        <div class="absolute inset-0 before-after-ec-clip z-10"
                            style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                            <img src="{{ !empty($wf['before_image']) ? asset('storage/'.$wf['before_image']) : asset('images/placeholder.jpg') }}"
                                alt="Before" class="absolute inset-0 w-full h-full object-cover {{ $wf['reverse_layout'] ? 'grayscale contrast-[1.1]' : '' }}">
                        </div>

                        {{-- Dark Corner Labels --}}
                        <div class="absolute bottom-0 left-0 z-20 bg-[#333] text-white text-[9px] font-bold px-4 py-1.5 uppercase tracking-wider">BEFORE</div>
                        <div class="absolute bottom-0 right-0 z-20 bg-[#333] text-white text-[9px] font-bold px-4 py-1.5 uppercase tracking-wider">AFTER</div>

                        {{-- Drag Handle --}}
                        <div class="absolute top-0 bottom-0 z-30 before-after-ec-handle" style="left: 50%; transform: translateX(-50%);">
                            <div class="absolute top-0 bottom-0 w-[1.5px] bg-white/60" style="left: 50%; transform: translateX(-50%);"></div>
                            <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-8 h-8 rounded-full border border-white/40 bg-slate-800 shadow-lg flex items-center justify-center transition-transform hover:scale-110" style="left: 50%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m18 8 4 4-4 4" />
                                    <path d="M2 12h20" />
                                    <path d="m6 8-4 4 4 4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforeach


        {{-- ── VALUE PROPOSITION SECTION ──────────────────── --}}
        <div class="bg-white py-12">
            <div class="container mx-auto px-6 max-w-6xl">
                {{-- Section Heading --}}
                <div class="text-center mb-8">
                    <h2 class="text-[28px] md:text-[34px] font-extrabold text-slate-900 leading-tight">
                        Save <span class="text-[#22c55e]">100+</span> hours of editing from your workflow
                    </h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    {{-- Left: Static Product Hero Image --}}
                    <div
                        class="rounded-sm overflow-hidden shadow-xl bg-[#fcfcfc] p-8 h-[280px] flex items-center justify-center">
                        <img src="{{ $page->value_image ? asset('storage/'.$page->value_image) : 'https://images.unsplash.com/photo-1556229010-6c3f2c9ca5f8?auto=format&fit=crop&w=1200&q=80' }}"
                            alt="Product Retouching Example" class="max-h-full w-auto object-contain">
                    </div>

                    {{-- Right: Testimonial & Value Text --}}
                    <div class="space-y-6 lg:pl-8">
                        <p class="text-[#555] text-[15px] md:text-[16px] leading-[1.8] max-w-[480px]">
                            We take care of the retouching, so you can spend less time in front of screen and more time
                            scaling your business or getting a good night's sleep and family time.
                        </p>

                        <blockquote
                            class="text-[#111] font-bold italic text-[15px] md:text-[16px] leading-[1.6] max-w-[420px] mt-8 mb-6">
                            "{{ $page->value_quote }}"
                        </blockquote>

                        <div>
                            <p class="text-[#111] font-extrabold text-[15px] mb-1">{{ $page->value_quote_author }} -</p>
                            <p class="text-[#555] text-[14px]">{{ $page->value_quote_role }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ── EVERYTHING YOU NEED SECTION ──────────────────── --}}
    <div class="bg-white py-12 pb-32 border-t border-slate-100 relative">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <h2 class="text-[28px] md:text-[34px] font-extrabold text-[#111] leading-tight mb-12">
                Everything you need for a picture-<br class="hidden md:block">perfect store
            </h2>

            <div class="flex flex-wrap justify-center gap-x-12 gap-y-8">
                @foreach($page->service_links ?? [] as $link)
                <a href="{{ $link['url'] }}"
                    data-image="{{ $link['image_url'] }}"
                    class="cursor-hover-link text-[#22c55e] hover:text-[#16a34a] font-bold text-[15px] md:text-[17px] border-b border-dotted border-[#22c55e] hover:border-[#16a34a] pb-0.5 transition-colors">
                    {{ $link['name'] }}
                </a>
                @endforeach
            </div>
        </div>

        {{-- Floating Hover Preview --}}
        <div id="cursor-hover-preview"
            class="fixed pointer-events-none opacity-0 transition-opacity duration-200 w-[280px] h-[280px] rounded-xl shadow-[0_20px_50px_rgba(0,0,0,0.25)] overflow-hidden z-[100] bg-white border-[6px] border-white flex items-center justify-center transform -translate-x-1/2 -translate-y-full origin-bottom"
            style="top: 0; left: 0; margin-top: -20px;">
            <img src="" alt="Service Preview" class="w-full h-full object-cover rounded-lg">
        </div>
    </div>

    {{-- ── PRODUCT PHOTO RETOUCHING CATEGORIES ─────── --}}
    <div class="bg-white py-12">
        <div class="container mx-auto px-6 max-w-[900px]">
            {{-- Section Heading --}}
            <div class="text-center md:mb-16 mb-12">
                <h2 class="text-[30px] md:text-[36px] font-bold text-[#222] leading-tight mb-4 tracking-[-0.02em]">
                    Product photo retouching categories
                </h2>
                <p class="text-[#4b829c] text-[15px] md:text-[16px] max-w-[700px] mx-auto leading-[1.6]">
                    Our on-demand product photo editing services span all major e-commerce categories. Take a look at
                    the most popular categories underneath that we usually deal with-
                </p>
            </div>

            {{-- Categories Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-16 mb-24">
                @foreach($page->categories ?? [] as $cat)
                <div>
                    <h3 class="text-center justify-center flex font-bold text-[19px] md:text-[21px] text-[#222] mb-6">
                        {{ $cat['title'] }}</h3>
                    <div
                        class="rounded-sm overflow-hidden shadow-xl bg-[#fcfcfc] p-8 h-[280px] flex items-center justify-center mb-6">
                        <img src="{{ !empty($cat['image_path']) ? asset('storage/'.$cat['image_path']) : $cat['image_url'] }}"
                            alt="{{ $cat['title'] }}" class="max-h-full w-auto object-contain">
                    </div>
                    <p class="text-[#555] text-[14px] md:text-[14.5px] leading-[1.8] text-left">
                        {{ $cat['description'] }}
                    </p>
                </div>
                @endforeach
            </div>

            {{-- Green Box "And Many More" --}}
            <div class="bg-[#41dc1c] rounded-[2.5rem] py-14 px-8 max-w-[500px] mx-auto text-center mb-10">
                <h3 class="text-[#000] font-bold text-[24px] md:text-[26px] mb-4">
                    And<br>Many More
                </h3>
                <p class="text-[#111] text-[14.5px] md:text-[15.5px] leading-[1.6]">
                    Our services go beyond apparel. We work with<br> accessories, electronics, books, pet products, and
                    more...
                </p>
            </div>

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('graphics.get-quote') }}"
                    class="inline-flex items-center justify-center px-10 py-3 rounded-full bg-gradient-to-r from-[#1ea4e6] to-[#25d3a5] text-white font-bold text-[12px] uppercase shadow-md">
                    GET QUOTE
                </a>
                <a href="{{ route('graphics.upload') }}"
                    class="inline-flex items-center justify-center px-10 py-3 rounded-full bg-white border border-[#23c3be] text-[#333] font-bold text-[12px] uppercase shadow-sm hover:bg-slate-50 transition-colors">
                    FREE TRIAL
                </a>
            </div>

        </div>
    </div>

    {{-- ── TAKE A QUICK TOUR SECTION ──────────────────────────── --}}
    <div class="bg-white py-20">
        <div class="container mx-auto px-6 max-w-[900px]">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

                {{-- Left Content --}}
                <div class="pl-0 md:pl-8">
                    <h2 class="text-[30px] md:text-[34px] font-bold text-[#111] leading-[1.2] mb-4">
                        {{ $page->tour_title }}
                    </h2>
                    <p class="text-[#3b85a0] text-[16px] md:text-[17px] leading-[1.6] mb-10 max-w-sm">
                        {!! nl2br(e($page->tour_subtitle)) !!}
                    </p>

                    {{-- Gradient Border Button --}}
                    <a href="{{ route('graphics.portfolio') }}"
                        class="inline-block rounded-full bg-gradient-to-r from-[#1ea4e6] to-[#25d3a5] p-[2px] shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-center bg-white rounded-full px-8 py-[10px]">
                            <span class="text-[#000] font-bold text-[12px] uppercase tracking-wider">Quick Tour</span>
                        </div>
                    </a>
                </div>

                {{-- Right Video Card --}}
                <div class="relative group cursor-pointer overflow-hidden rounded-lg shadow-sm">
                    <img src="{{ $page->tour_video_thumbnail ? asset('storage/'.$page->tour_video_thumbnail) : 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=1000&q=80' }}"
                        alt="Video Thumbnail"
                        class="w-full h-auto object-cover max-h-[360px] transform group-hover:scale-[1.02] transition-transform duration-500">

                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition-colors"></div>

                    {{-- Play Button --}}
                    <div class="absolute inset-0 flex items-center justify-center z-10 pointer-events-none">
                        <div
                            class="bg-[#156e8b] text-white flex items-center justify-center px-8 py-3.5 rounded shadow-lg gap-3">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                            <span class="font-normal text-[16px]">Play</span>
                        </div>
                    </div>
                    
                    @if($page->tour_video_url)
                    <a href="{{ $page->tour_video_url }}" target="_blank" class="absolute inset-0 z-20"></a>
                    @endif
                </div>

            </div>
        </div>
    </div>

    {{-- ── PORTFOLIO SECTION ──────────────────── --}}
    <div class="bg-white py-20">
        <div class="container mx-auto px-6 max-w-[1000px]">
            <h2 class="text-center font-bold text-[36px] md:text-[38px] text-[#222] mb-12">
                Portfolio
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-12">
                @foreach($page->portfolio_images ?? [] as $img)
                <div class="border border-slate-200 aspect-[4/3] overflow-hidden bg-[#f8f8f8]">
                    <img src="{{ !empty($img['image_path']) ? asset('storage/'.$img['image_path']) : $img['image_url'] }}"
                        alt="Portfolio" class="w-full h-full object-cover">
                </div>
                @endforeach
            </div>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('graphics.get-quote') }}"
                    class="inline-flex items-center justify-center px-10 py-[10px] rounded-full bg-gradient-to-r from-[#1ea4e6] to-[#25d3a5] text-white font-bold text-[13px] uppercase shadow-sm">
                    GET QUOTE
                </a>
                <a href="{{ route('graphics.portfolio') }}"
                    class="inline-flex items-center justify-center px-10 py-[10px] rounded-full bg-white border border-[#23c3be] text-[#333] font-bold text-[13px] uppercase shadow-sm hover:bg-slate-50">
                    SHOW MORE
                </a>
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
            <div class="space-y-4" id="faq-accordion">
                @foreach ($page->faqs ?? [] as $index => $faq)
                    <div class="faq-item border-b border-slate-700/60 pb-6 pt-4">
                        <button class="w-full flex items-center justify-between text-left text-white group outline-none"
                            onclick="toggleFaq(this)">
                            <div class="flex items-center gap-10">
                                <span class="font-normal text-[15px] md:text-[16px] text-slate-500 w-6 shrink-0">{{ $index + 1 }}</span>
                                <span
                                    class="font-bold text-[15px] md:text-[16px] group-hover:text-slate-300 transition-colors">{{ $faq['q'] }}</span>
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

    <style>
        .checkered-bg {
            background: repeating-conic-gradient(#e2e8f0 0% 25%, #ffffff 0% 50%) 50% / 14px 14px;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }
    </style>

    <script>
        function toggleFaq(btn) {
            const item = btn.closest('.faq-item');
            const content = item.querySelector('.faq-content');
            const isActive = item.classList.contains('active');

            // Close all others
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
            const containers = document.querySelectorAll('.before-after-ec-container');

                containers.forEach(container => {
                    const clip = container.querySelector('.before-after-ec-clip');
                    const handle = container.querySelector('.before-after-ec-handle');
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

                    const onEnd = () => {
                        isDragging = false;
                    };

                    container.addEventListener('mousedown', onStart);
                    window.addEventListener('mousemove', onMove);
                    window.addEventListener('mouseup', onEnd);

                    container.addEventListener('touchstart', onStart, { passive: true });
                    window.addEventListener('touchmove', onMove, { passive: true });
                    window.addEventListener('touchend', onEnd);
                });

                // Floating Image Preview Interaction
                const previewEl = document.getElementById('cursor-hover-preview');
                const previewImg = previewEl.querySelector('img');
                const hoverLinks = document.querySelectorAll('.cursor-hover-link');

                if (previewEl && hoverLinks.length > 0) {
                    hoverLinks.forEach(link => {
                        link.addEventListener('mouseenter', (e) => {
                            previewImg.src = link.getAttribute('data-image');
                            previewEl.classList.remove('opacity-0');
                            previewEl.classList.add('opacity-100');
                        });

                        link.addEventListener('mousemove', (e) => {
                            previewEl.style.left = e.clientX + 'px';
                            previewEl.style.top = e.clientY + 'px';
                        });

                        link.addEventListener('mouseleave', () => {
                            previewEl.classList.remove('opacity-100');
                            previewEl.classList.add('opacity-0');
                        });
                    });
                }
            });
        </script>
    </div>
@endsection