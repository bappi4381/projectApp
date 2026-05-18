@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories ?? [], 'theme' => 'dark'])
@endsection

@section('title', $service->name . ' | Video Production | Graphics Studio')

@section('content')
<div class="bg-[#f8fafc] min-h-screen text-slate-800 font-sans selection:bg-blue-500 selection:text-white overflow-x-hidden">

    {{-- ── 1. HERO SECTION ── --}}
    <section class="relative pt-40 pb-24 lg:pt-48 lg:pb-32 overflow-hidden bg-white">
        <!-- Abstract Background Shapes -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[500px] h-[500px] bg-blue-50 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[400px] h-[400px] bg-green-50 rounded-full blur-3xl opacity-50 pointer-events-none"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                
                {{-- Left Side: Content --}}
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-600 font-bold text-xs uppercase tracking-widest mb-6 border border-blue-100">
                        <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                        Premium Post-Production
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight mb-6">
                        @php
                            $words = explode(' ', $service->name);
                            $lastWord = array_pop($words);
                            $firstPart = implode(' ', $words);
                        @endphp
                        {{ $firstPart }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-green-500">{{ $lastWord }}</span>
                    </h1>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                         {{ $service->description ?? 'We are a video editing company that specializes in eCommerce videos. We understand the importance of a strong e-commerce video and work diligently to create videos that sell.' }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('graphics.video-quote') }}" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-lg shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 hover:-translate-y-1 transition-all duration-300">
                            Get A Quote
                        </a>
                    </div>
                    
                    <div class="mt-10 flex items-center justify-center lg:justify-start gap-6 text-sm font-medium text-slate-500">
                        <div class="flex items-center gap-2"><i class="ri-check-line text-green-500 text-lg"></i> Quick Turnaround</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-green-500 text-lg"></i> Top Quality</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-green-500 text-lg"></i> Affordable</div>
                    </div>
                </div>

                {{-- Right Side: Video/Image Showcase --}}
                <div class="w-full lg:w-1/2 relative group">
                    <div class="absolute -inset-4 bg-gradient-to-tr from-blue-500 to-green-400 rounded-3xl blur-2xl opacity-20 group-hover:opacity-40 transition duration-700"></div>
                    <div class="relative bg-white p-2 rounded-2xl shadow-2xl border border-slate-100 overflow-hidden z-10">
                        <div class="aspect-video rounded-xl overflow-hidden bg-slate-900 relative">
                            @if($service->video_url)
                                @php
                                    $vidUrl = $service->video_url;
                                    if (str_contains($vidUrl, 'watch?v=')) $vidUrl = str_replace('watch?v=', 'embed/', $vidUrl);
                                @endphp
                                <iframe src="{{ $vidUrl }}?autoplay=0&controls=1&rel=0" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                            @elseif($service->image_after)
                                <img src="{{ asset('storage/' . $service->image_after) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-2xl cursor-pointer hover:scale-110 transition-transform">
                                        <i class="ri-play-fill text-2xl text-blue-600 ml-1"></i>
                                    </div>
                                </div>
                            @else
                                <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=800" class="w-full h-full object-cover opacity-90">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-2xl cursor-pointer hover:scale-110 transition-transform">
                                        <i class="ri-play-fill text-2xl text-blue-600 ml-1"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    {{-- Floating Badge --}}
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-xl border border-slate-100 z-20 flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xl">
                            <i class="ri-star-fill"></i>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-400 uppercase">Rated 5 Stars</div>
                            <div class="text-sm font-extrabold text-slate-800">10k+ Happy Clients</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ── 2. PROCESS SECTION ── --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-black text-[#082f49] uppercase tracking-tight mb-4">Video Editing Process</h2>
                <p class="text-slate-500 font-medium text-lg">We always prefer the simpliest way for our clients.<br>No hassle!</p>
                
                {{-- Colored Dots Separator --}}
                <div class="flex justify-center gap-2 mt-8">
                    <span class="w-3 h-3 bg-[#1ebba3] rounded-sm"></span>
                    <span class="w-3 h-3 bg-[#facc15] rounded-sm"></span>
                    <span class="w-3 h-3 bg-[#3ab1d8] rounded-sm"></span>
                    <span class="w-3 h-3 bg-[#0b1f3a] rounded-sm"></span>
                </div>
            </div>
            
            {{-- Process Flow --}}
            <div class="relative">
                {{-- Row 1: Steps 1-3 --}}
                <div class="flex flex-col md:flex-row items-center justify-center gap-12 lg:gap-20 mb-20">
                    {{-- Step 1 --}}
                    <div class="flex flex-col items-center group">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full bg-white shadow-[0_0_50px_rgba(58,177,216,0.15)] flex items-center justify-center border border-blue-50 group-hover:shadow-[0_0_60px_rgba(58,177,216,0.3)] transition-all duration-500">
                                <div class="w-24 h-24 rounded-full bg-gradient-to-b from-white to-blue-50 flex items-center justify-center text-[#082f49]">
                                    <i class="ri-folder-upload-fill text-5xl"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-6 text-xl font-black text-[#082f49] uppercase tracking-tighter text-center leading-tight">Upload<br>Videos</h3>
                    </div>

                    {{-- Arrow --}}
                    <div class="hidden md:block text-blue-200">
                        <i class="ri-arrow-right-wide-line text-5xl"></i>
                    </div>

                    {{-- Step 2 --}}
                    <div class="flex flex-col items-center group">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full bg-white shadow-[0_0_50px_rgba(58,177,216,0.15)] flex items-center justify-center border border-blue-50 group-hover:shadow-[0_0_60px_rgba(58,177,216,0.3)] transition-all duration-500">
                                <div class="w-24 h-24 rounded-full bg-gradient-to-b from-white to-blue-50 flex items-center justify-center text-[#082f49]">
                                    <i class="ri-macbook-fill text-5xl"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-6 text-xl font-black text-[#082f49] uppercase tracking-tighter text-center leading-tight">Video<br>Editing</h3>
                    </div>

                    {{-- Arrow --}}
                    <div class="hidden md:block text-blue-200">
                        <i class="ri-arrow-right-wide-line text-5xl"></i>
                    </div>

                    {{-- Step 3 --}}
                    <div class="flex flex-col items-center group">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full bg-white shadow-[0_0_50px_rgba(58,177,216,0.15)] flex items-center justify-center border border-blue-50 group-hover:shadow-[0_0_60px_rgba(58,177,216,0.3)] transition-all duration-500">
                                <div class="w-24 h-24 rounded-full bg-gradient-to-b from-white to-blue-50 flex items-center justify-center text-[#082f49]">
                                    <i class="ri-loop-right-fill text-5xl"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-6 text-xl font-black text-[#082f49] uppercase tracking-tighter text-center leading-tight">Review</h3>
                    </div>
                </div>

                {{-- Row 2: Steps 4-5 --}}
                <div class="flex flex-col md:flex-row items-center justify-center gap-12 lg:gap-20">
                    {{-- Step 4 --}}
                    <div class="flex flex-col items-center group">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full bg-white shadow-[0_0_50px_rgba(58,177,216,0.15)] flex items-center justify-center border border-blue-50 group-hover:shadow-[0_0_60px_rgba(58,177,216,0.3)] transition-all duration-500">
                                <div class="w-24 h-24 rounded-full bg-gradient-to-b from-white to-blue-50 flex items-center justify-center text-[#082f49]">
                                    <i class="ri-bank-card-2-fill text-5xl"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-6 text-xl font-black text-[#082f49] uppercase tracking-tighter text-center leading-tight">Payment</h3>
                    </div>

                    {{-- Arrow --}}
                    <div class="hidden md:block text-blue-200">
                        <i class="ri-arrow-right-wide-line text-5xl"></i>
                    </div>

                    {{-- Step 5 --}}
                    <div class="flex flex-col items-center group">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full bg-white shadow-[0_0_50px_rgba(58,177,216,0.15)] flex items-center justify-center border border-blue-50 group-hover:shadow-[0_0_60px_rgba(58,177,216,0.3)] transition-all duration-500">
                                <div class="w-24 h-24 rounded-full bg-gradient-to-b from-white to-blue-50 flex items-center justify-center text-[#082f49]">
                                    <i class="ri-folder-download-fill text-5xl"></i>
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-6 text-xl font-black text-[#082f49] uppercase tracking-tighter text-center leading-tight">Download</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 3. PORTFOLIO/SHOWCASE ── --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex flex-col md:flex-row items-end justify-between mb-12">
                <div class="max-w-2xl">
                    <div class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-2">Our Work</div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">Result Driven Outcome</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @if($service->variants && $service->variants->count() > 0)
                    @foreach($service->variants as $variant)
                    <div class="group relative rounded-2xl overflow-hidden bg-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 cursor-pointer">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ $variant->image_after ? asset('storage/' . $variant->image_after) : 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=600' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <h4 class="text-white font-bold text-lg">{{ $variant->name }}</h4>
                            <p class="text-slate-300 text-sm">${{ number_format($variant->starting_price ?? 0, 2) }} {{ $variant->price_unit }}</p>
                        </div>
                        @if($variant->video_url)
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                             <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-blue-600 text-2xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                 <i class="ri-play-fill ml-1"></i>
                             </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                @else
                    @for($i=1; $i<=3; $i++)
                    <div class="group relative rounded-2xl overflow-hidden bg-slate-100 shadow-sm hover:shadow-2xl transition-all duration-500 cursor-pointer">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=600' }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                            <h4 class="text-white font-bold text-lg">E-Commerce Product Reel</h4>
                            <p class="text-slate-300 text-sm">Color Grading & Animation</p>
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                             <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-blue-600 text-2xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                 <i class="ri-play-fill ml-1"></i>
                             </div>
                        </div>
                    </div>
                    @endfor
                @endif
            </div>
        </div>
    </section>

    {{-- ── 4. PRICING SECTION ── --}}
    <section class="py-20 bg-white border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-2xl text-center">

            {{-- Header --}}
            <span class="text-xs font-black text-[#3ab1d8] uppercase tracking-[0.3em] mb-3 block">Pricing</span>
            <h2 class="text-3xl md:text-4xl font-black uppercase text-[#0b1f3a] mb-4">How We Quote</h2>
            <div class="flex justify-center gap-2 mb-10">
                <span class="w-4 h-1.5 bg-green-400 rounded-full"></span>
                <span class="w-4 h-1.5 bg-yellow-400 rounded-full"></span>
                <span class="w-4 h-1.5 bg-[#3ab1d8] rounded-full"></span>
                <span class="w-4 h-1.5 bg-[#0b1f3a] rounded-full"></span>
            </div>

            {{-- Column Headers --}}
            <div class="flex items-center mb-2 px-1">
                <div class="w-[44%]"></div>
                <div class="flex-1 flex">
                    <span class="flex-1 text-[10px] font-black uppercase tracking-widest text-slate-500 text-center">Basic</span>
                    <span class="flex-1 text-[10px] font-black uppercase tracking-widest text-slate-500 text-center">Medium</span>
                    <span class="flex-1 text-[10px] font-black uppercase tracking-widest text-slate-500 text-center">Advanced</span>
                </div>
            </div>

            {{-- Pricing Rows --}}
            <div class="space-y-2.5">
                @php
                    $pricingRows = [];
                    if(isset($videoPricings) && $videoPricings->count() > 0) {
                        $pricingRows = $videoPricings;
                    }
                @endphp
                @forelse($pricingRows as $pricing)
                    @php $tiers = $pricing->pricing_tiers ?? []; @endphp
                    <div class="flex items-center gap-2">
                        {{-- Service Name Pill --}}
                        <div class="w-[44%] shrink-0">
                            <div class="bg-[#0b1f3a] text-white text-[11px] font-black uppercase tracking-wider rounded-full py-3.5 px-6 text-left leading-none">
                                {{ $pricing->service_name }}
                            </div>
                        </div>
                        {{-- Prices with | separator --}}
                        <div class="flex-1 bg-[#ebebeb] rounded-full py-3.5 flex items-center justify-center">
                            <span class="flex-1 text-center text-[13px] font-black text-slate-600">${{ $tiers[0]['price'] ?? '—' }}/h</span>
                            <span class="text-slate-400 text-sm px-1">|</span>
                            <span class="flex-1 text-center text-[13px] font-black text-slate-600">${{ $tiers[1]['price'] ?? '—' }}/h</span>
                            <span class="text-slate-400 text-sm px-1">|</span>
                            <span class="flex-1 text-center text-[13px] font-black text-slate-600">${{ $tiers[2]['price'] ?? '—' }}/h</span>
                        </div>
                    </div>
                @empty
                    <div class="py-10 text-slate-400 italic text-sm">No pricing defined yet.</div>
                @endforelse
            </div>

            {{-- View All Pricing --}}
            <div class="mt-8">
                <a href="{{ route('graphics.video-pricing') }}" class="text-[#3ab1d8] text-sm font-black hover:underline">View All Pricing</a>
            </div>

            {{-- Offer Text --}}
            <p class="mt-4 text-sm">
                <span class="text-orange-500 font-black">20% Off</span>
                <span class="text-[#3ab1d8] font-semibold italic"> on Bulk Video Editing Services.</span>
            </p>

            {{-- GET A QUOTE Button --}}
            <div class="mt-6">
                <a href="{{ route('graphics.video-quote') }}"
                   class="inline-block px-10 py-3.5 bg-[#1ebba3] hover:bg-[#18a08d] text-white font-black uppercase tracking-widest text-xs rounded-md shadow-lg transition-all active:scale-95">
                    Get A Quote
                </a>
            </div>

            {{-- Need Accurate Pricing Section --}}
            <div class="mt-16 text-center">
                <h3 class="text-xl md:text-2xl font-black text-[#0b1f3a] mb-1">Need Accurate Pricing? Send Us a Quote Request</h3>
                <p class="text-[#3ab1d8] font-bold italic text-sm mb-8">We Usually Reply Within 10 Minutes</p>

                <div class="border-2 border-dashed border-slate-300 rounded-xl p-8 mb-6">
                    <p class="text-[#3ab1d8] font-semibold text-sm mb-4">Upload Your Files (max 600mb/file, 6 files only)</p>
                    <a href="{{ route('graphics.upload') }}"
                       class="inline-flex items-center gap-2 px-8 py-3 bg-[#1ebba3] hover:bg-[#18a08d] text-white font-black uppercase tracking-widest text-xs rounded-md transition-all">
                        <i class="ri-upload-cloud-2-line text-base"></i> Upload Files
                    </a>
                </div>

                <p class="text-xs text-slate-400 leading-relaxed max-w-lg mx-auto">
                    Note: If you have raw footage and sample video files, send us a download link in the Instruction box or you can upload them
                    through our Upload Page. Please mention Quote Details in the message.
                </p>

                <div class="flex gap-0 mt-8 border border-slate-200 rounded overflow-hidden text-xs font-black uppercase tracking-widest">
                    <a href="{{ route('graphics.video-pricing') }}"
                       class="flex-1 py-3 text-slate-500 hover:bg-slate-50 border-r border-slate-200 transition-colors">
                        &laquo; Previous
                    </a>
                    <a href="{{ route('graphics.video-quote') }}"
                       class="flex-1 py-3 text-slate-500 hover:bg-slate-50 transition-colors">
                        Next &raquo;
                    </a>
                </div>

                <p class="text-[11px] text-slate-400 mt-6">
                    By submitting Quote you are automatically agreeing with our
                    <a href="#" class="text-[#3ab1d8] hover:underline">Terms and Conditions</a> and
                    <a href="#" class="text-[#3ab1d8] hover:underline">Privacy Policy</a>
                </p>
            </div>

        </div>
    </section>

    {{-- ── 6. TESTIMONIALS ── --}}
    <section class="py-24 bg-slate-900 text-white">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Client Feedback</h2>
                <p class="text-slate-400 text-lg">See what our clients say about our eCommerce video editing.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Testimonial 1 --}}
                <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700">
                    <div class="flex gap-1 text-yellow-400 text-sm mb-4">
                        @for($i=0; $i<5; $i++) <i class="ri-star-fill"></i> @endfor
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed mb-6">"Working with Color Experts for our product animations was a game-changer. They captured features with incredible precision. Exceptional results!"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-700 rounded-full flex items-center justify-center font-bold text-xl">S</div>
                        <div>
                            <h4 class="font-bold text-white text-sm">Sarah Johnson</h4>
                            <p class="text-slate-400 text-xs">Marketing Manager</p>
                        </div>
                    </div>
                </div>
                {{-- Testimonial 2 --}}
                <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700">
                    <div class="flex gap-1 text-yellow-400 text-sm mb-4">
                        @for($i=0; $i<5; $i++) <i class="ri-star-fill"></i> @endfor
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed mb-6">"I recently hired Color Experts to edit my video for my small business. They did edits efficiently and quickly. I will definitely hire them again."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-700 rounded-full flex items-center justify-center font-bold text-xl">J</div>
                        <div>
                            <h4 class="font-bold text-white text-sm">JONN</h4>
                            <p class="text-slate-400 text-xs">JONN.CO</p>
                        </div>
                    </div>
                </div>
                {{-- Testimonial 3 --}}
                <div class="bg-slate-800 p-8 rounded-2xl border border-slate-700">
                    <div class="flex gap-1 text-yellow-400 text-sm mb-4">
                        @for($i=0; $i<5; $i++) <i class="ri-star-fill"></i> @endfor
                    </div>
                    <p class="text-slate-300 text-sm leading-relaxed mb-6">"Over the past few years, the one company that always backed me up is Color Experts. Professional, timely, and high quality footage."</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-slate-700 rounded-full flex items-center justify-center font-bold text-xl">B</div>
                        <div>
                            <h4 class="font-bold text-white text-sm">BIDENN</h4>
                            <p class="text-slate-400 text-xs">BIDENN.CO</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 7. LATEST BLOG ── --}}
    <section class="py-24 bg-white border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex flex-col md:flex-row items-end justify-between mb-12">
                <div>
                    <h2 class="text-blue-600 font-bold uppercase tracking-widest text-sm mb-2">Knowledge Base</h2>
                    <h3 class="text-3xl md:text-4xl font-extrabold text-slate-900">Latest Articles</h3>
                </div>
                <div class="mt-6 md:mt-0">
                     <a href="{{ route('graphics.blog') }}" class="px-6 py-2 rounded-full border border-slate-200 text-slate-600 font-medium hover:bg-slate-50 transition-colors">View Blog</a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php $blogPosts = \App\Models\BlogPost::latest()->limit(4)->get(); @endphp
                @foreach($blogPosts as $post)
                <a href="{{ route('graphics.blog.single', $post->slug) }}" class="group block bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-video bg-slate-100 relative overflow-hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-3 right-3 px-3 py-1 bg-white/90 backdrop-blur rounded text-xs font-bold text-blue-600 shadow-sm">
                            Article
                        </div>
                    </div>
                    <div class="p-5">
                        <h4 class="text-sm font-bold text-slate-800 leading-snug group-hover:text-blue-600 transition-colors line-clamp-2">{{ $post->title }}</h4>
                        <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">
                            <i class="ri-calendar-line"></i> {{ $post->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
    .font-sans { font-family: 'Inter', sans-serif; }
</style>
@endsection
