@php 
    /** @var \App\Models\Service|\App\Models\SubCategory $service */ 
    $isGroup = $isGroup ?? false;
@endphp
@extends('layouts.app')

@if(isset($isVedio) && $isVedio)
    @section('custom_navbar')
        @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories])
    @endsection
@endif

@section('title', $service->name . ' | Graphics Studio')
@section('meta_description', Str::limit(strip_tags($service->description ?? ''), 160))

@section('content')
    <div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-[#0ea5e9] selection:text-white pb-20">

        {{-- ── HERO SECTION ────────────────────────────────── --}}
        @include('graphics.partials.service-hero', [
            'title' => strtoupper($service->name),
            'description' => $service->description ?? 'Professional ' . $service->name . ' services with pixel-perfect precision and fast turnaround.',
            'hero_image' => $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1200&q=80',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ])

        {{-- ── STATS STRIP ────────────────────────────────── --}}
        <div class="bg-black text-white py-10">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <i class="ri-price-tag-3-line text-2xl mb-3 block text-emerald-400"></i>
                        <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mb-1">Price Starts From</div>
                        <div class="text-2xl font-black text-white">${{ number_format($service->starting_price ?? 0.49, 2) }}</div>
                        <div class="text-[10px] text-slate-500 mt-1">{{ $service->price_unit ?? 'Per Image' }}</div>
                    </div>
                    <div>
                        <i class="ri-shopping-cart-2-line text-2xl mb-3 block text-orange-400"></i>
                        <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mb-1">Get Big Discount</div>
                        <div class="text-2xl font-black text-white">{{ $service->discount_upto ?? 25 }}%<span class="text-sm"> OFF</span></div>
                        <div class="text-[10px] text-slate-500 mt-1">{{ $service->discount_tag ?? 'Contact Us' }}</div>
                    </div>
                    <div>
                        <i class="ri-send-plane-line text-2xl mb-3 block text-green-500"></i>
                        <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mb-1">We Can Deliver</div>
                        <div class="text-2xl font-black text-white">{{ $service->delivery_capacity ?? 5000 }}<span class="text-sm font-normal text-slate-400">/day</span></div>
                        <div class="text-[10px] text-slate-500 mt-1">{{ $service->delivery_unit ?? '2500+ Images in 12 hours' }}</div>
                    </div>
                    <div>
                        <i class="ri-shield-check-line text-2xl mb-3 block text-indigo-400"></i>
                        <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mb-1">Comprehensive QA</div>
                        <div class="text-2xl font-black text-white">6+</div>
                        <div class="text-[10px] text-slate-500 mt-1">Steps</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── GRID HEADER ────────────────────────────────── --}}
        <div class="container mx-auto px-6 max-w-6xl py-20 text-center">
            <h2 class="text-[28px] md:text-[34px] font-black text-[#082f49] mb-6 uppercase tracking-tight leading-tight">
                PROFESSIONAL {{ strtoupper($service->name) }} {{ $isGroup ? 'SOLUTIONS' : 'SERVICE PROVIDER' }}
            </h2>
            <p class="text-slate-500 text-sm leading-relaxed max-w-3xl mx-auto mb-10">
                @if($isGroup)
                    Our {{ $service->name }} group encompasses a wide range of specialized services tailored to meet your unique project requirements. Explore our offerings below:
                @else
                    To offer top-notch service, we have classified this particular service into various categories depending on the product's complexity. Have a look underneath:
                @endif
            </p>
            <div class="flex justify-center gap-2">
                <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
                <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></div>
                <div class="w-1.5 h-1.5 bg-orange-400 rounded-full"></div>
                <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
            </div>
        </div>

        {{-- ── CLIPPING CATEGORIES GRID ───────────────────── --}}
        <div class="container mx-auto px-6 max-w-6xl mb-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                @php
                    if($isGroup) {
                        // Level 1 (Category) shows SubCategories. Level 2 (SubCategory) shows Services.
                        $displayItems = count($service->subcategories ?? []) > 0 ? $service->subcategories : ($service->services ?? collect());
                    } else {
                        // Level 3 (Service) shows Variants (Level 4). If no variants, show hardcoded complexities.
                        $displayItems = $service->variants->isNotEmpty() ? $service->variants : ($service->complexities->isNotEmpty() ? $service->complexities : collect());
                    }
                @endphp

                @foreach($displayItems as $index => $item)

                    <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-slate-100 flex flex-col group h-full transition-all hover:shadow-2xl">
                        {{-- Slider --}}
                        <div class="relative overflow-hidden bg-slate-100 before-after-container aspect-[4/3] cursor-ew-resize" data-index="{{ $index }}">
                            <img src="{{ $item->image_before ? asset('storage/' . $item->image_before) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80' }}" alt="{{ $item->name }} Before" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 before-after-clip overflow-hidden" style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                                <img src="{{ $item->image_after ? asset('storage/' . $item->image_after) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80&sat=-100' }}" alt="{{ $item->name }} After" class="absolute inset-0 w-full h-full object-cover">
                            </div>
                            
                            {{-- Handle --}}
                            <div class="absolute top-0 bottom-0 z-20 before-after-handle" style="left: 50%; transform: translateX(-50%);">
                                <div class="absolute top-0 bottom-0 w-[2px] bg-white/80" style="left: 50%; transform: translateX(-50%);"></div>
                                <div class="absolute top-1/2 -translate-y-1/2 -translate-x-1/2 w-8 h-8 rounded-full border-2 border-white bg-slate-900/80 shadow-lg flex items-center justify-center" style="left: 50%;">
                                    <i class="ri-arrow-left-right-line text-white text-[12px]"></i>
                                </div>
                            </div>

                            <div class="absolute bottom-4 left-4 z-20 bg-slate-800 text-[10px] text-white px-3 py-1 font-bold uppercase tracking-widest rounded-sm">BEFORE</div>
                            <div class="absolute bottom-4 right-4 z-20 bg-slate-500 text-[10px] text-white px-3 py-1 font-bold uppercase tracking-widest rounded-sm">AFTER</div>
                        </div>

                        {{-- Card Content --}}
                        <div class="p-8 flex-1 flex flex-col">
                            <h3 class="text-xl font-black text-[#0ea5e9] text-center mb-6 uppercase tracking-tight">{{ $item->name }}</h3>
                            <p class="text-slate-600 text-[13px] leading-relaxed text-center mb-8 flex-1">
                                {{ Str::limit(strip_tags($item->description), 160) }}
                            </p>
                            
                            {{-- Info Row --}}
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="border border-sky-400 rounded-sm py-3 text-center">
                                    <div class="text-[10px] text-slate-400 font-bold uppercase mb-1">Starts From</div>
                                    <div class="text-[18px] font-black text-slate-800">${{ number_format($item->starting_price ?? $item->price ?? 0.49, 2) }}</div>
                                </div>
                                <div class="border border-sky-400 rounded-sm py-3 text-center">
                                    <div class="text-[10px] text-slate-400 font-bold uppercase mb-1">Capacity</div>
                                    <div class="text-[15px] font-black text-slate-800 leading-tight">
                                        {{ $item->delivery_capacity ?? 3000 }} 
                                        <span class="block text-[9px] text-slate-400 font-bold">{{ $item->delivery_unit ?? 'Images/24Hr' }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="grid grid-cols-2 gap-4">
                                <a href="{{ route('graphics.service-variant', $item->slug) }}" 
                                   class="py-3.5 px-4 text-[10px] font-black text-center text-slate-800 border-2 border-sky-400 rounded-full hover:bg-sky-50 transition-all uppercase tracking-widest shadow-sm">
                                    VIEW DETAILS
                                </a>
                                <a href="{{ route('graphics.get-quote') }}" 
                                   class="py-3.5 px-4 text-[10px] font-black text-center text-white bg-gradient-to-r from-[#0ea5e9] via-[#0ea5e9] to-[#2dd4bf] rounded-full hover:brightness-105 transition-all shadow-md uppercase tracking-widest">
                                    GET A QUOTE
                                </a>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- ── DISCLAIMER ALERT ──────────────────────────── --}}
        <div class="container mx-auto px-6 max-w-6xl mb-16">
            <div class="bg-red-50 border border-red-100 p-4 rounded flex items-center gap-3 text-red-700/80 italic text-[13px] shadow-sm">
                <i class="ri-error-warning-line text-lg"></i>
                <p>
                    <span class="font-bold">Disclaimer:</span> The before/after photos are used as a sample of services we offer. The actual price of displayed images might be higher than the mentioned Starting Price. For accurate prices, please <a href="{{ route('graphics.get-quote') }}" class="underline hover:text-red-500 font-bold">Request a Quote</a>
                </p>
            </div>
        </div>

        {{-- ── QUOTE REQUEST FORM ────────────────────────── --}}
        <div class="bg-white pt-20 border-t border-slate-100">
            <div class="container mx-auto px-6 max-w-6xl text-center">
                <h2 class="text-2xl md:text-3xl font-black text-slate-800 italic mb-2 tracking-tight">
                    Need Accurate Pricing? Send Us a Quote Request
                </h2>
                <p class="text-[#0ea5e9] font-bold text-sm italic mb-12">We Usually Reply Within 30 Minutes</p>

                <form action="#" method="POST" class="text-left space-y-8">
                    @csrf
                    <p class="text-slate-400 text-[11px] text-center italic mb-8">Please Fill up the Required (*) Fields to Submit the Form Properly.</p>

                    {{-- Upload Area --}}
                    <div class="border-2 border-dashed border-slate-200 rounded-lg p-10 text-center bg-slate-50/30 group hover:border-[#0ea5e9] transition-colors">
                        <p class="text-slate-500 text-sm font-bold mb-4 uppercase tracking-widest">Upload Your Files (max 500mb/file, 10 files only)</p>
                        <button type="button" class="inline-flex items-center gap-2 px-8 py-3 bg-[#5487ab] text-white rounded font-black text-[11px] uppercase tracking-widest shadow-md hover:bg-[#436d8a] transition-all">
                            <i class="ri-upload-cloud-2-line text-lg"></i>
                            Upload Files
                        </button>
                    </div>

                    {{-- Form Fields --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <div class="relative">
                            <label class="block text-[11px] font-bold text-slate-700 uppercase mb-2">Full Name<span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="name" required class="w-full bg-slate-50 border border-slate-200 rounded py-3 px-4 focus:ring-1 focus:ring-[#0ea5e9] focus:outline-none text-sm transition-all shadow-inner">
                                <i class="ri-user-smile-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            </div>
                        </div>
                        <div class="relative">
                            <label class="block text-[11px] font-bold text-slate-700 uppercase mb-2">Phone<span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" name="phone" required class="w-full bg-slate-50 border border-slate-200 rounded py-3 px-4 focus:ring-1 focus:ring-[#0ea5e9] focus:outline-none text-sm transition-all shadow-inner">
                                <i class="ri-phone-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            </div>
                        </div>
                        <div class="relative">
                            <label class="block text-[11px] font-bold text-slate-700 uppercase mb-2">Website</label>
                            <div class="relative">
                                <input type="url" name="website" class="w-full bg-slate-50 border border-slate-200 rounded py-3 px-4 focus:ring-1 focus:ring-[#0ea5e9] focus:outline-none text-sm transition-all shadow-inner">
                                <i class="ri-global-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            </div>
                        </div>
                        <div class="relative">
                            <label class="block text-[11px] font-bold text-slate-700 uppercase mb-2">Return File Type</label>
                            <input type="text" name="file_type" class="w-full bg-slate-50 border border-slate-200 rounded py-3 px-4 focus:ring-1 focus:ring-[#0ea5e9] focus:outline-none text-sm transition-all shadow-inner">
                        </div>
                        <div class="relative">
                            <label class="block text-[11px] font-bold text-slate-700 uppercase mb-2">Services<span class="text-red-500">*</span></label>
                            <select name="service" class="w-full bg-slate-50 border border-slate-200 rounded py-3 px-4 focus:ring-1 focus:ring-[#0ea5e9] focus:outline-none text-sm transition-all shadow-inner appearance-none cursor-pointer">
                                <option value="{{ $service->slug }}" selected>{{ $service->name }}</option>
                            </select>
                        </div>
                        <div class="relative">
                            <label class="block text-[11px] font-bold text-slate-700 uppercase mb-2">Email<span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="email" name="email" required class="w-full bg-slate-50 border border-slate-200 rounded py-3 px-4 focus:ring-1 focus:ring-[#0ea5e9] focus:outline-none text-sm transition-all shadow-inner">
                                <i class="ri-mail-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <label class="block text-[11px] font-bold text-slate-700 uppercase mb-2">Your Instructions<span class="text-red-500">*</span></label>
                        <textarea name="instructions" rows="5" required class="w-full bg-slate-50 border border-slate-200 rounded py-4 px-4 focus:ring-1 focus:ring-[#0ea5e9] focus:outline-none text-sm transition-all shadow-inner"></textarea>
                    </div>

                    <div class="text-center pt-6">
                        <button type="submit" class="w-full py-4 bg-[#5487ab] text-white font-black text-[13px] uppercase tracking-[0.2em] rounded hover:brightness-105 transition-all shadow-lg active:scale-[0.98]">
                            Submit
                        </button>
                        <p class="text-slate-500 text-[11px] mt-10">By submitting Quote you are automatically agreeing with our <a href="#" class="text-[#0ea5e9] font-bold hover:underline">Terms and Conditions</a> and <a href="#" class="text-[#0ea5e9] font-bold hover:underline">Privacy Policy</a></p>
                    </div>
                </form>

                {{-- Testimonial Section --}}
                <div class="mt-28 flex flex-col items-center">
                    <div class="flex items-center gap-4 text-left max-w-2xl px-6">
                        <i class="ri-double-quotes-l text-[#5487ab] text-5xl shrink-0 opacity-40"></i>
                        <div>
                            <p class="text-slate-800 text-[16px] md:text-[18px] font-bold leading-relaxed italic">
                                "These are perfect and exactly what I was looking for. Thank you so much!!! As always, a job well done and executed with excellence!!"
                            </p>
                            <div class="flex items-center gap-2 mt-4">
                                <i class="ri-user-3-line text-[#5487ab]"></i>
                                <span class="text-slate-900 font-bold text-sm tracking-tight">Michele Wright • USA</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ── COMPLEXITIES & PRICES GRID ────────────────── --}}
                <div class="bg-slate-50/50 py-24 border-t border-slate-100">
                    <div class="container mx-auto px-6 max-w-6xl text-center">
                        <h2 class="text-[28px] md:text-[34px] font-black text-slate-900 mb-6 uppercase tracking-tight">
                            IMAGE CLIPPING PATH COMPLEXITIES AND PRICES
                        </h2>
                        <div class="flex justify-center gap-2 mb-16">
                            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-[#0ea5e9] rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-16 mb-20">
                            @if($service->variants && $service->variants->count() > 0)
                                @foreach($service->variants as $item)
                                    <div class="group">
                                        <div class="aspect-square bg-white rounded-lg overflow-hidden shadow-sm border border-slate-100 mb-6 group-hover:shadow-md transition-shadow block">
                                            <img src="{{ $item->image_after ? asset('storage/' . $item->image_after) : ($service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&q=80') }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                                        </div>
                                        <h4 class="text-[14px] font-bold text-slate-800 mb-2 uppercase tracking-tight">{{ $item->name }}</h4>
                                        <div class="text-[18px] font-black text-[#0ea5e9] tracking-tight">${{ number_format($item->starting_price ?? 0, 2) }} {{ $item->price_unit ? '/ ' . $item->price_unit : '' }}</div>
                                    </div>
                                @endforeach
                            @elseif(is_array($service->features) && count($service->features) > 0)
                                @foreach($service->features as $item)
                                    <div class="group">
                                        <div class="aspect-square bg-white rounded-lg overflow-hidden shadow-sm border border-slate-100 mb-6 group-hover:shadow-md transition-shadow">
                                            <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80' }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                        </div>
                                        <h4 class="text-[14px] font-bold text-slate-800 mb-2 uppercase tracking-tight">{{ $item['name'] }}</h4>
                                        <div class="text-[18px] font-black text-[#0ea5e9] tracking-tight">{{ $item['price'] }}</div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-span-full py-10 text-slate-400 italic">No pricing tiers or variants available for this service.</div>
                            @endif
                        </div>

                        <div class="flex justify-center">
                            <a href="{{ route('graphics.get-quote') }}" class="inline-flex items-center justify-center px-10 py-3.5 rounded-full bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] text-white font-black text-[11px] tracking-[0.2em] shadow-lg hover:brightness-105 transition-all">
                                GET MORE ACCURATE QUOTE
                            </a>
                        </div>
                    </div>
                </div>
                {{-- ── HOW TO CUTOUT SECTION ────────────────────── --}}
                <div class="bg-white py-24 border-t border-slate-100">
                        <div class="container mx-auto px-6 max-w-6xl">
                        <div class="text-center mb-20">
                            <h2 class="text-[28px] md:text-[34px] font-black text-slate-900 mb-6 uppercase tracking-tight">
                                How to Apply {{ $service->name }}
                            </h2>
                            <div class="flex justify-center gap-2">
                                <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
                                <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></div>
                                <div class="w-1.5 h-1.5 bg-[#0ea5e9] rounded-full"></div>
                                <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <p class="text-slate-500 text-sm leading-relaxed max-w-4xl mx-auto mt-8">
                                There are multiple ways available to remove background from images. But we basically make use of clipping path and image masking leveraging the deft touch of our background removal professionals. Let's introduce with some methods we follow:
                            </p>
                        </div>

                        @if($service->methods && count($service->methods) > 0)
                            @foreach($service->methods as $index => $method)
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
                                    <div class="space-y-6 {{ $index % 2 != 0 ? 'lg:order-2' : '' }}">
                                        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">{{ $method['title'] }}</h3>
                                        <div class="text-slate-600 text-[13px] leading-relaxed space-y-6 text-justify">
                                            {!! nl2br(e($method['description'])) !!}
                                        </div>
                                    </div>
                                    <div class="aspect-[4/3] rounded-xl overflow-hidden shadow-2xl border border-slate-100 bg-slate-50 {{ $index % 2 != 0 ? 'lg:order-1' : '' }}">
                                        <img src="{{ isset($method['image']) ? asset('storage/' . $method['image']) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $method['title'] }}" class="w-full h-full object-cover">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- Fallback Method 1: Hand-Drawing --}}
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
                                <div class="space-y-6">
                                    <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Using Hand-Drawing Photoshop Pen tool</h3>
                                    <div class="text-slate-600 text-[13px] leading-relaxed space-y-6 text-justify">
                                        <p>In order to remove the background of an image, we primarily utilize clipping path technique. In the process of clipping path, we cut out a 2D image using the pen tool from Photoshop to bring out a perfect output.</p>
                                    </div>
                                </div>
                                <div class="aspect-[4/3] rounded-xl overflow-hidden shadow-2xl border border-slate-100 bg-slate-50">
                                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80" alt="Photoshop Pen Tool Logic" class="w-full h-full object-cover">
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-center mt-12">
                            <a href="{{ route('graphics.get-quote') }}" class="inline-flex items-center justify-center px-10 py-3 bg-[#0ea5e9] text-white font-black text-[12px] uppercase tracking-widest rounded-full shadow-lg hover:brightness-105 transition-all">
                                GET A QUOTE
                            </a>
                        </div>
                    </div>
                </div>

                 {{-- ── OUR POPULAR SERVICES ────────────────────── --}}
                <div class="bg-white py-24 border-t border-slate-100">
                    <div class="container mx-auto px-6 max-w-6xl text-center">
                        <h2 class="text-[28px] md:text-[34px] font-black text-[#082f49] mb-6 uppercase tracking-tight">
                            OUR POPULAR SERVICES
                        </h2>
                        <div class="flex justify-center gap-2 mb-10">
                            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-[#0ea5e9] rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                        </div>
                        <p class="text-slate-500 text-sm leading-relaxed max-w-4xl mx-auto mb-16">
                            We offer a wide variety of on-demand image editing services including background removal, high-end photo retouching, color correction, photo blending, and many more. Since the beginning of our journey in the image editing world, many of the international brands like Apple, Sony, Samsung, Adidas, Philips, Nike, and many more have already kept faith in us. Browse through our popular services shown underneath.
                        </p>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                            @forelse($popularServices ?? [] as $svc)
                                <a href="{{ route('graphics.service-detail', $svc->slug) }}" 
                                   class="group block"
                                   title="{{ $svc->name }}">
                                    <div class="aspect-square rounded-lg overflow-hidden border border-slate-200 shadow-sm mb-3 relative bg-slate-100">
                                        
                                        @if($svc->image_before && $svc->image_after)
                                            {{-- Before (left half) --}}
                                            <div style="position:absolute;top:0;bottom:0;left:0;width:50%;overflow:hidden;">
                                                <img src="{{ asset('storage/' . $svc->image_before) }}" 
                                                     alt="{{ $svc->name }} Before"
                                                     style="width:100%;height:100%;object-fit:cover;object-position:center;">
                                            </div>
                                            {{-- After (right half) --}}
                                            <div style="position:absolute;top:0;bottom:0;right:0;width:50%;overflow:hidden;">
                                                <img src="{{ asset('storage/' . $svc->image_after) }}" 
                                                     alt="{{ $svc->name }} After"
                                                     style="width:100%;height:100%;object-fit:cover;object-position:center;">
                                            </div>
                                            {{-- Divider --}}
                                            <div style="position:absolute;top:0;bottom:0;left:50%;width:1px;background:rgba(255,255,255,0.8);z-index:10;transform:translateX(-50%);"></div>
                                        @else
                                            <img src="{{ $svc->image_after ? asset('storage/' . $svc->image_after) : ($svc->image_before ? asset('storage/' . $svc->image_before) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=400&q=80') }}"
                                                 alt="{{ $svc->name }}"
                                                 style="width:100%;height:100%;object-fit:cover;">
                                        @endif

                                        {{-- Hover Overlay --}}
                                        <div class="absolute inset-0 bg-white/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20 flex items-center justify-center">
                                            <div class="w-10 h-10 rounded-full bg-white/90 shadow-lg flex items-center justify-center">
                                                <i class="ri-links-line text-slate-600 text-lg"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="text-[10px] font-bold text-slate-800 tracking-wider text-center uppercase group-hover:underline transition-all leading-tight">
                                        {{ $svc->name }}
                                    </h4>
                                </a>
                            @empty
                                <div class="col-span-4 text-center py-8 text-slate-400 italic text-sm">
                                    No services available yet.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- ── FAQ SECTION ──────────────────────────────── --}}
                <div class="bg-slate-50/30 py-24 border-t border-slate-100">
                    <div class="container mx-auto px-6 max-w-6xl">
                        <div class="text-center mb-16">
                            <h2 class="text-[28px] md:text-[34px] font-black text-slate-900 mb-2 uppercase tracking-tight">
                                FREQUENTLY ASKED QUESTIONS(FAQ)
                            </h2>
                        </div>

                        <div class="space-y-4" id="faq-accordion">
                            @if($service->faqs && is_array($service->faqs) && count($service->faqs) > 0)
                                @foreach($service->faqs as $i => $faq)
                                    <div class="bg-white border-l-4 border-l-slate-200 hover:border-l-[#0ea5e9] transition-all overflow-hidden rounded-r-lg shadow-sm">
                                        <button 
                                            type="button"
                                            onclick="toggleFaq(this)"
                                            class="w-full flex items-center text-left py-4 px-6 focus:outline-none">
                                            <div class="w-8 h-8 rounded bg-slate-50 flex items-center justify-center text-[11px] font-black mr-4 text-slate-500 faq-num shrink-0">
                                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                                            </div>
                                            <span class="text-[13px] font-bold text-slate-700 tracking-tight flex-1 uppercase leading-snug">{{ $faq['question'] }}</span>
                                            <i class="ri-add-line text-slate-300 text-lg faq-icon shrink-0 transition-transform duration-300"></i>
                                        </button>
                                        <div class="faq-body hidden px-6 pb-5 pl-[4.5rem] text-[13px] text-slate-500 leading-relaxed">
                                            {{ $faq['answer'] }}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-slate-400 italic py-6">No FAQs available for this service.</p>
                            @endif
                        </div>

                        <div class="flex justify-center gap-4 mt-20">
                            <a href="{{ route('graphics.get-quote') }}" class="px-10 py-3 bg-[#0ea5e9] text-white font-black text-[11px] uppercase tracking-widest rounded-full shadow-lg hover:translate-y-[-2px] transition-all">
                                GET A QUOTE
                            </a>
                            <a href="#" class="px-10 py-3 bg-white border-2 border-[#5de2ca] text-[#2dd4bf] font-black text-[11px] uppercase tracking-widest rounded-full hover:bg-emerald-50 transition-all">
                                CONTACT US
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
    <div>
        @include('graphics.partials.testimonials')
    </div>
    <div class="bg-[#0b141a]">
        @include('graphics.partials.blog') 
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
                    clip.style.clipPath = `polygon(0 0, ${pos}% 0, ${pos}% 100%, 0 100%)`;
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

                // Touch
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

        // FAQ Accordion Toggle
        function toggleFaq(btn) {
            const wrapper = btn.closest('div');
            const body = wrapper.querySelector('.faq-body');
            const icon = btn.querySelector('.faq-icon');
            const isOpen = !body.classList.contains('hidden');

            // Close all
            document.querySelectorAll('.faq-body').forEach(b => b.classList.add('hidden'));
            document.querySelectorAll('.faq-icon').forEach(i => {
                i.classList.remove('ri-subtract-line', 'rotate-45');
                i.classList.add('ri-add-line');
            });
            document.querySelectorAll('#faq-accordion > div').forEach(d => d.classList.remove('border-l-[#0ea5e9]'));

            // Toggle current
            if (!isOpen) {
                body.classList.remove('hidden');
                icon.classList.remove('ri-add-line');
                icon.classList.add('ri-subtract-line');
                wrapper.classList.add('border-l-[#0ea5e9]');
            }
        }
    </script>
@endsection
