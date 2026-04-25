@extends('layouts.app')
@section('title', 'Professional Photoshop Services | Graphics Studio')
@section('meta_description', 'Explore our full range of professional photo editing services — from clipping path to high-end retouching.')

@section('content')
    <div class="bg-[#f0f9ff] min-h-screen font-sans selection:bg-[#0ea5e9] selection:text-white">

        {{-- ── HERO SECTION ────────────────────────────────── --}}
        @include('graphics.partials.service-hero', [
            'title' => $heroTitle ?? 'POST PRODUCTION SERVICES',
            'description' => $heroDescription ?? 'Professional image editing and retouching solutions tailored for photographers, e-commerce, and creative agencies.',
            'hero_image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=1200&q=80',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ])

        {{-- ── INTRO TEXT ──────────────────────────────────── --}}
        <div class="container mx-auto px-4 md:px-8 max-w-5xl py-20">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-black text-[#082f49] uppercase tracking-wide mb-6">
                    {{ $heroTitle ?? 'PROFESSIONAL' }}<br>{{ isset($heroTitle) ? 'SOLUTIONS' : 'PHOTOSHOP SERVICE' }}
                </h2>

                <div class="flex justify-center gap-2 mb-12">
                    <div class="w-2.5 h-2.5 bg-emerald-500"></div>
                    <div class="w-2.5 h-2.5 bg-yellow-400"></div>
                    <div class="w-2.5 h-2.5 bg-orange-400"></div>
                    <div class="w-2.5 h-2.5 bg-blue-600"></div>
                </div>
            </div>

            <div class="text-slate-600 text-[15px] leading-relaxed text-justify space-y-6 mb-12 font-light">
                <p>
                    <span
                        class="float-left bg-[#082f49] text-white text-lg font-bold w-8 h-8 flex items-center justify-center mr-3 rounded-sm pt-1">P</span>lanning
                    to launch your own e-commerce website to elevate your business sales? Looking for a <span
                        class="font-bold text-slate-800">professional photo editing</span> service provider to sharpen your
                    high volume of raw photography?
                </p>
                <p>
                    Well, we are at the forefront among the photo editing companies providing the end-to-end solution for
                    all sorts of photo editing and retouching tasks. With over 10 years of experience in photo editing and
                    photography post-production services, Graphics Studio boasts 250+ skilled and professional Photoshop
                    artists and graphic designers. We provide top-notch image editing services including clipping path,
                    image masking, color correction, high-end photo retouching, and so on. We also specialize in creative
                    graphic design, web design, ad design, raster to vector (R2V) and other image conversions, CAD
                    conversion, digital pre-press work, and video editing.
                </p>
                <p>
                    Our clients include many world-class media houses, e-commerce companies, a marketplace like Amazon and
                    eBay sellers, web stores, famous photographers, fashion houses, and many more. Those glittering names
                    are the testimonials of our work and skill. If you are curious about us and itching to assess our
                    service quality, just take a <a href="#" class="text-[#0ea5e9] hover:underline">free trial</a> and will
                    get an idea about our Photo Editing and Image Retouching Services.
                </p>
                <p>
                    Details about our photo retouching and Photoshop editing services as well as few samples of our works
                    are listed below. For more, you can go to our work sample category.
                </p>
            </div>

            <div class="text-center">
                <a href="{{ route('graphics.get-quote') }}"
                    class="inline-block px-10 py-3 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-bold text-sm tracking-widest shadow-lg hover:shadow-cyan-500/30 transition-shadow">
                    GET A QUOTE
                </a>
            </div>
        </div>

        {{-- ── STATS STRIP ────────────────────────────────── --}}
        <div style="background-color: #000000;" class="text-white py-10">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    {{-- Price --}}
                    <div>
                        <i class="ri-price-tag-3-line text-3xl mb-3 block" style="color: #4ade80;"></i>
                        <div class="text-sm font-bold text-slate-300 tracking-wide mb-2">Price Starts From</div>
                        <div class="text-3xl font-black text-white">49<span class="text-lg">¢</span></div>
                        <div class="text-xs text-slate-500 mt-1">Per Image</div>
                    </div>
                    {{-- Discount --}}
                    <div>
                        <i class="ri-shopping-cart-2-line text-3xl mb-3 block" style="color: #f97316;"></i>
                        <div class="text-sm font-bold text-slate-300 tracking-wide mb-2">Get Big Discount</div>
                        <div class="text-3xl font-black text-white">25<span class="text-lg">¢</span></div>
                        <div class="text-xs text-slate-500 mt-1">Contact Us</div>
                    </div>
                    {{-- Delivery --}}
                    <div>
                        <i class="ri-send-plane-line text-3xl mb-3 block" style="color: #22c55e;"></i>
                        <div class="text-sm font-bold text-slate-300 tracking-wide mb-2">We Can Deliver</div>
                        <div class="text-3xl font-black text-white">5000<span
                                class="text-sm font-normal text-slate-400">images/day</span></div>
                        <div class="text-xs text-slate-500 mt-1">2500+ images in 12 hours</div>
                    </div>
                    {{-- QA --}}
                    <div>
                        <i class="ri-shield-check-line text-3xl mb-3 block" style="color: #818cf8;"></i>
                        <div class="text-sm font-bold text-slate-300 tracking-wide mb-2">Comprehensive QA</div>
                        <div class="text-3xl font-black text-white">6+</div>
                        <div class="text-xs text-slate-500 mt-1">Steps</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── SERVICES GRID ───────────────────────────────── --}}
        <div class="container mx-auto px-4 md:px-6 max-w-6xl py-8 bg-[#f0f9ff]">
            @foreach($categories as $category)
                @php
                    $displayServices = collect();
                    // Add services from subcategories
                    if($category->relationLoaded('subcategories')) {
                        foreach($category->subcategories as $sub) {
                            $displayServices = $displayServices->merge($sub->services->whereNull('parent_id'));
                        }
                    }
                    // Add direct services
                    $displayServices = $displayServices->merge($category->services->whereNull('parent_id'));
                    
                    // Filter active and unique
                    $displayServices = $displayServices->where('is_active', true)->unique('id');
                @endphp

                @if($displayServices->count() > 0)
                <div class="mb-20" id="{{ Str::slug($category->name) }}">
                    <div class="text-center mb-12">
                        <h2 class="text-2xl md:text-3xl font-black text-[#082f49] uppercase tracking-wide">
                            {{ $category->name }} Services
                        </h2>
                        <div class="w-16 h-1 bg-[#38bdf8] mx-auto mt-4 rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($displayServices as $i => $svc)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-200 flex flex-col">
                        @if(Str::contains(strtolower($category->name), ['video', 'animation', 'motion']))
                            {{-- Video Production Layout --}}
                            <div class="relative overflow-hidden bg-gray-100" style="height: 320px;">
                                @if($svc->video_url)
                                    <iframe class="w-full h-full" src="{{ str_replace('watch?v=', 'embed/', $svc->video_url) }}" title="{{ $svc->name }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @elseif($svc->image_after)
                                    <img src="{{ asset('storage/' . $svc->image_after) }}" alt="{{ $svc->name }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 flex items-center justify-center bg-black/20">
                                        <div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center shadow-lg cursor-pointer hover:bg-[#0ea5e9] hover:text-white transition-colors group">
                                            <i class="ri-play-fill text-3xl text-[#0f172a] group-hover:text-white"></i>
                                        </div>
                                    </div>
                                @else
                                    <img src="https://images.unsplash.com/photo-1536240478700-b869070f9279?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover opacity-40">
                                    <div class="absolute inset-0 flex items-center justify-center text-slate-500 font-bold">VIDEO PREVIEW</div>
                                @endif
                            </div>
                        @else
                            {{-- Before/After Image Slider (Image Editing Layout) --}}
                            <div class="relative overflow-hidden bg-gray-100 before-after-container" style="height: 320px;"
                                data-index="{{ $i }}">
                                @if($svc->image_before && $svc->image_after)
                                    {{-- Before Image (full) --}}
                                    <img src="{{ asset('storage/' . $svc->image_after) }}" alt="{{ $svc->name }} After"
                                        class="absolute inset-0 w-full h-full object-cover">

                                    {{-- After Image (clipped left side) --}}
                                    <div class="absolute inset-0 before-after-clip"
                                        style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                                        <img src="{{ asset('storage/' . $svc->image_before) }}" alt="{{ $svc->name }} Before"
                                            class="absolute inset-0 w-full h-full object-cover">
                                    </div>
                                @else
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80" class="w-full h-full object-cover opacity-20">
                                    <div class="absolute inset-0 flex items-center justify-center text-slate-400 font-bold">SAMPLE PREVIEW</div>
                                @endif

                                {{-- Drag Handle --}}
                                <div class="absolute top-0 bottom-0 z-20 before-after-handle"
                                    style="left: 50%; transform: translateX(-50%);">
                                    <div class="absolute top-0 bottom-0 w-0.5 bg-white/80"
                                        style="left: 50%; transform: translateX(-50%);"></div>
                                    <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-8 h-8 rounded-full border-2 border-white shadow-lg flex items-center justify-center cursor-ew-resize"
                                        style="background: rgba(0,0,0,0.5); left: 50%;">
                                        <i class="ri-arrow-left-right-line text-white text-sm"></i>
                                    </div>
                                </div>

                                {{-- BEFORE / AFTER Labels --}}
                                <div class="absolute bottom-3 left-3 z-20 text-white text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded"
                                    style="background: #e67e22;">BEFORE</div>
                                <div class="absolute bottom-3 right-3 z-20 text-white text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded"
                                    style="background: #7f8c8d;">AFTER</div>
                            </div>
                        @endif

                        {{-- Content --}}
                        <div class="p-8 flex-1 flex flex-col">
                            <h3 class="text-[22px] font-black text-center mb-4 transition-colors hover:text-[#0ea5e9]" style="color: #0f172a;">
                                <a href="{{ route('graphics.service-detail', $svc->slug) }}">{{ $svc->name }}</a>
                            </h3>
                            
                            <p class="text-slate-500 text-[15px] leading-relaxed mb-8 flex-1 text-center line-clamp-4 font-light">
                                {{ $svc->description ?? (Str::contains(strtolower($category->name), ['video', 'animation', 'motion']) ? 'Professional video production services with guaranteed quality and fast turnaround.' : 'Professional image editing services with guaranteed quality and fast turnaround.') }}
                            </p>

                            {{-- CEBD Style Stats Row --}}
                            <div class="flex items-center justify-between border-t border-b border-slate-100 py-4 mb-8">
                                <div class="text-center w-1/2 border-r border-slate-100">
                                    <div class="text-[13px] text-slate-500 font-bold mb-1">Starts From</div>
                                    <div class="text-2xl font-black text-[#0ea5e9]">${{ number_format($svc->starting_price ?? 0.49, 2) }}</div>
                                </div>
                                <div class="text-center w-1/2">
                                    <div class="text-[13px] text-slate-500 font-bold mb-1">
                                        {{ Str::contains(strtolower($category->name), ['video', 'animation', 'motion']) ? 'Videos/24Hr' : 'Images/24Hr' }}
                                    </div>
                                    <div class="text-2xl font-black text-slate-800">{{ $svc->delivery_capacity ?? (Str::contains(strtolower($category->name), ['video', 'animation', 'motion']) ? '50' : '3000') }}</div>
                                </div>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex items-center justify-center gap-4">
                                @if($svc->has_details)
                                    <a href="{{ route('graphics.service-detail', $svc->slug) }}"
                                        class="px-8 py-3 text-[13px] font-bold tracking-wide text-center border-2 rounded-full transition-all duration-300 hover:bg-[#0ea5e9] hover:text-white"
                                        style="color: #0ea5e9; border-color: #0ea5e9;">
                                        View Details
                                    </a>
                                @endif

                                <a href="{{ route('graphics.get-quote') }}"
                                    class="px-8 py-3 text-[13px] font-bold tracking-wide text-center text-white rounded-full shadow-lg shadow-cyan-500/30 hover:shadow-cyan-500/50 hover:-translate-y-0.5 transition-all"
                                    style="background: #0ea5e9;">
                                    Get A Quote
                                </a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        {{-- ── TESTIMONIALS ───────────────────────────────── --}}
        @include('graphics.partials.testimonials')
        <div class="bg-[#0b141a] pb-0">
            @include('graphics.partials.blog')
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
                    clip.style.clipPath = `polygon(0 0, ${pos}%  0, ${pos}% 100%, 0 100%)`;
                    handle.style.left = pos + '%';
                }

                container.addEventListener('mousedown', function (e) {
                    isDragging = true;
                    updatePosition(e.clientX);
                    e.preventDefault();
                });

                document.addEventListener('mousemove', function (e) {
                    if (isDragging) {
                        updatePosition(e.clientX);
                        e.preventDefault();
                    }
                });

                document.addEventListener('mouseup', function () {
                    isDragging = false;
                });

                // Touch support
                container.addEventListener('touchstart', function (e) {
                    isDragging = true;
                    updatePosition(e.touches[0].clientX);
                }, { passive: true });

                document.addEventListener('touchmove', function (e) {
                    if (isDragging) {
                        updatePosition(e.touches[0].clientX);
                    }
                }, { passive: true });

                document.addEventListener('touchend', function () {
                    isDragging = false;
                });
            });
        });
    </script>
@endsection