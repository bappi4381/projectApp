@extends('layouts.app')
@section('title', 'Professional Photo Shadow Service | Graphics Studio')
@section('meta_description', 'High-quality drop shadow, natural shadow, and reflection shadow services. Make your e-commerce products look realistic, grounded, and premium.')

@section('content')
    <div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-[#0ea5e9] selection:text-white pb-20">

        {{-- ── HERO SECTION ────────────────────────────────── --}}
        @include('graphics.partials.service-hero', [
            'title' => 'PHOTO SHADOW SERVICE',
            'description' => 'Enhance product realism with natural drop shadows, reflection shadows, and cast shadows. Make your products look grounded and premium.',
            'hero_image' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=1200&q=80',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ])

        {{-- ── STATS STRIP ────────────────────────────────── --}}
        <div class="bg-black text-white py-10">
            <div class="container mx-auto px-6 max-w-6xl">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <i class="ri-price-tag-3-line text-2xl mb-3 block text-emerald-400"></i>
                        <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mb-1">Price Starts From</div>
                        <div class="text-2xl font-black text-white">39<span class="text-sm">¢</span></div>
                        <div class="text-[10px] text-slate-500 mt-1">Per Image</div>
                    </div>
                    <div>
                        <i class="ri-shopping-cart-2-line text-2xl mb-3 block text-orange-400"></i>
                        <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mb-1">Get Big Discount</div>
                        <div class="text-2xl font-black text-white">25<span class="text-sm">¢</span></div>
                        <div class="text-[10px] text-slate-500 mt-1">Contact Us</div>
                    </div>
                    <div>
                        <i class="ri-send-plane-line text-2xl mb-3 block text-green-500"></i>
                        <div class="text-[11px] font-bold text-slate-300 uppercase tracking-widest mb-1">We Can Deliver</div>
                        <div class="text-2xl font-black text-white">5000<span class="text-sm font-normal text-slate-400">/day</span></div>
                        <div class="text-[10px] text-slate-500 mt-1">2500+ Images in 12 hours</div>
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
                PROFESSIONAL PHOTO SHADOW SERVICE PROVIDER
            </h2>
            <p class="text-slate-500 text-sm leading-relaxed max-w-3xl mx-auto mb-10">
                To offer top-notch realism, we have classified our shadow service into 4 categories depending on the products' depth and lighting complexity. Adding the right shadow stops your products from looking like they are floating in mid-air. Have a look at the categories underneath:
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
                    $categories = [
                        [
                            'name' => 'Simple Drop Shadow',
                            'price' => '0.39',
                            'desc' => 'A subtle, faint shadow placed directly beneath the product. It gives a slight glow effect and is perfect for flat objects like books, phones, or jewelry boxes to lift them slightly off the background.',
                            'img1' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?auto=format&fit=crop&w=800&q=80',
                            'img2' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?auto=format&fit=crop&w=800&q=80&sat=-100',
                        ],
                        [
                            'name' => 'Natural Shadow',
                            'price' => '0.79',
                            'desc' => 'We create a realistic shadow using the original light source direction. This is ideal for bags, shoes, and cosmetics, making the object look naturally grounded as if shot in a perfect studio setting.',
                            'img1' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=800&q=80',
                            'img2' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=800&q=80&sepia=100',
                        ],
                        [
                            'name' => 'Reflection / Mirror Effect',
                            'price' => '0.99',
                            'desc' => 'Creates a beautiful mirror-like reflection at the base of the product. This effect is highly popular for premium electronics, perfumes, and sunglasses, providing a luxurious, glass-floor aesthetic.',
                            'img1' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80',
                            'img2' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80&sepia=100',
                        ],
                        [
                            'name' => 'Cast Shadow',
                            'price' => '1.29',
                            'desc' => 'A hard or dramatic shadow cast in a specific direction based on an angled light source. This adds a moody, editorial feel and is often used for creative ad campaigns and hero shots.',
                            'img1' => 'https://images.unsplash.com/photo-1572635196237-14b3f281501f?auto=format&fit=crop&w=800&q=80',
                            'img2' => 'https://images.unsplash.com/photo-1572635196237-14b3f281501f?auto=format&fit=crop&w=800&q=80&sepia=100',
                        ],
                    ];
                @endphp

                @foreach($categories as $index => $cat)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg border border-slate-100 flex flex-col group h-full">
                        {{-- Slider --}}
                        <div class="relative overflow-hidden bg-slate-100 before-after-container aspect-[4/3] cursor-ew-resize" data-index="{{ $index }}">
                            <img src="{{ $cat['img2'] }}" alt="{{ $cat['name'] }} Before" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 before-after-clip overflow-hidden" style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                                <img src="{{ $cat['img1'] }}" alt="{{ $cat['name'] }} After" class="absolute inset-0 w-full h-full object-cover">
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
                            <h3 class="text-xl font-black text-[#0ea5e9] text-center mb-6 uppercase tracking-tight">{{ $cat['name'] }}</h3>
                            <p class="text-slate-600 text-[13px] leading-relaxed text-justify mb-8 flex-1">{{ $cat['desc'] }}</p>
                            
                            {{-- Info Row --}}
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="border border-sky-400 rounded-sm py-3 text-center">
                                    <div class="text-[10px] text-slate-400 font-bold uppercase mb-1">Starts From</div>
                                    <div class="text-[18px] font-black text-slate-800">$ {{ $cat['price'] }}</div>
                                </div>
                                <div class="border border-sky-400 rounded-sm py-3 text-center">
                                    <div class="text-[10px] text-slate-400 font-bold uppercase mb-1">Images/24Hr</div>
                                    <div class="text-[18px] font-black text-slate-800">3000</div>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="grid grid-cols-2 gap-4">
                                <a href="#" class="py-3 text-[11px] font-black text-center text-[#0ea5e9] border-[1.5px] border-[#0ea5e9] rounded-sm hover:bg-[#0ea5e9] hover:text-white transition-all uppercase tracking-widest">
                                    VIEW DETAILS
                                </a>
                                <a href="{{ route('graphics.get-quote') }}" class="py-3 text-[11px] font-black text-center text-white bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf] rounded-sm hover:brightness-105 transition-all shadow-md uppercase tracking-widest">
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
                                <option>Select Services</option>
                                <option value="clipping-path">Clipping Path</option>
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
                            IMAGE SHADOW COMPLEXITIES AND PRICES
                        </h2>
                        <div class="flex justify-center gap-2 mb-16">
                            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-[#0ea5e9] rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-16 mb-20">
                            @php
                                $complexities = [
                                    ['name' => 'Simple Drop Shadow', 'price' => '0.39', 'img' => 'https://images.unsplash.com/photo-1511499767150-a48a237f0083?auto=format&fit=crop&w=600&q=80'],
                                    ['name' => 'Natural Shadow', 'price' => '0.79', 'img' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=600&q=80'],
                                    ['name' => 'Reflection Shadow', 'price' => '0.99', 'img' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=600&q=80'],
                                    ['name' => 'Cast Shadow', 'price' => '1.29', 'img' => 'https://images.unsplash.com/photo-1572635196237-14b3f281501f?auto=format&fit=crop&w=600&q=80'],
                                    ['name' => 'Complex Multi-Shadow', 'price' => '2.49', 'img' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=600&q=80'],
                                    ['name' => 'Retouch + Shadow', 'price' => '3.49', 'img' => 'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=600&q=80'],
                                ];
                            @endphp

                            @foreach($complexities as $item)
                                <div class="group">
                                    <div class="aspect-square bg-white rounded-lg overflow-hidden shadow-sm border border-slate-100 mb-6 group-hover:shadow-md transition-shadow">
                                        <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="text-[14px] font-bold text-slate-800 mb-2 uppercase tracking-tight">{{ $item['name'] }}</h4>
                                    <div class="text-[18px] font-black text-[#0ea5e9] tracking-tight">$ {{ $item['price'] }}</div>
                                </div>
                            @endforeach
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
                                How to Apply Photo Shadow Effects
                            </h2>
                            <div class="flex justify-center gap-2">
                                <div class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></div>
                                <div class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></div>
                                <div class="w-1.5 h-1.5 bg-[#0ea5e9] rounded-full"></div>
                                <div class="w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                            </div>
                            <p class="text-slate-500 text-sm leading-relaxed max-w-4xl mx-auto mt-8">
                                Removing a background usually leaves a product looking unnatural, as if it's floating. Our professionals meticulously recreate shadows from scratch using Photoshop to anchor the product. Here is how we do it:
                            </p>
                        </div>

                        {{-- Method 1: Drop & Natural --}}
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-32">
                            <div class="space-y-6">
                                <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Crafting Natural & Drop Shadows</h3>
                                <div class="text-slate-600 text-[13px] leading-relaxed space-y-6 text-justify">
                                    <p>First, we isolate the product. For a drop shadow, we create a soft, blurred black layer directly behind the object, adjusting opacity and feathering to simulate a gentle studio light from above.</p>
                                    <p>For a natural shadow, we study the original light source and paint a customized shadow footprint beneath the subject, accurately warping the shape so it mimics how the actual object would cast a shadow onto a perfectly flat studio surface.</p>
                                </div>
                            </div>
                            <div class="aspect-[4/3] rounded-xl overflow-hidden shadow-2xl border border-slate-100 bg-slate-50">
                                <img src="https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=800&q=80" alt="Natural Shadow Logic" class="w-full h-full object-cover">
                            </div>
                        </div>

                        {{-- Method 2: Reflections --}}
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
                            <div class="order-2 lg:order-1 aspect-[4/3] rounded-xl overflow-hidden shadow-2xl border border-slate-100 bg-slate-50">
                                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80" alt="Reflection Shadow Logic" class="w-full h-full object-cover">
                            </div>
                            <div class="order-1 lg:order-2 space-y-6">
                                <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Building Mirror / Reflection Effects</h3>
                                <div class="text-slate-600 text-[13px] leading-relaxed space-y-6 text-justify">
                                    <p>A reflection shadow implies the product is sitting on a highly polished surface like glass or acrylic. To achieve this, we duplicate the cleanly extracted product, flip it vertically, and position it directly touching the base.</p>
                                    <p>Then, we apply a <span class="text-[#0ea5e9] font-bold">gradient mask</span> to the mirrored layer, gradually fading it out as it moves downwards. We blur the edges slightly and tweak the transparency to produce an ultra-premium, high-end commercial look.</p>
                                </div>
                            </div>
                        </div>

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
                            @php
                                $popular = [
                                    ['name' => 'BACKGROUND REMOVAL', 'img' => 'https://images.unsplash.com/photo-1542496658-e33a6d0d50f6?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'HIGH-END RETOUCHING', 'img' => 'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'E-COMMERCE PHOTO EDITING', 'img' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'GHOST MANNEQUIN EDITING', 'img' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'IMAGE MASKING', 'img' => 'https://images.unsplash.com/photo-1582233113702-86927d3fa87a?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'IMAGE RETOUCHING', 'img' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'PHOTO SHADOW SERVICE', 'img' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'PHOTO COLOR CORRECTION', 'img' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'PHOTO POST PRODUCTION', 'img' => 'https://images.unsplash.com/photo-1547996160-81dfa63595aa?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'RASTER TO VECTOR EDITING', 'img' => 'https://images.unsplash.com/photo-1626785774573-4b799315345d?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'IMAGE RESTORATION', 'img' => 'https://images.unsplash.com/photo-1562967916-eb82221dfb92?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => '3D MODELING', 'img' => 'https://images.unsplash.com/photo-1617791160505-6f008e17ad31?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'DESKTOP PUBLISHING', 'img' => 'https://images.unsplash.com/photo-1586717791821-3f44a563eb4c?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'VIDEO EDITING', 'img' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'ADVERTISING DESIGN', 'img' => 'https://images.unsplash.com/photo-1542744094-24638eff58bb?auto=format&fit=crop&w=400&q=80'],
                                    ['name' => 'VECTOR LINE DRAWING', 'img' => 'https://images.unsplash.com/photo-1614850715649-1d005629c1aa?auto=format&fit=crop&w=400&q=80'],
                                ];
                            @endphp

                            @foreach($popular as $svc)
                                <div class="group cursor-pointer">
                                    <div class="aspect-square rounded-lg overflow-hidden border border-slate-100 shadow-sm mb-3 group-hover:shadow-md transition-shadow">
                                        <img src="{{ $svc['img'] }}" alt="{{ $svc['name'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <h4 class="text-[10px] font-bold text-slate-800 tracking-wider text-center group-hover:text-[#0ea5e9] transition-colors">{{ $svc['name'] }}</h4>
                                </div>
                            @endforeach
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

                        <div class="space-y-4">
                            @php
                                $faqs = [
                                    'Understanding What Clipping Path is-',
                                    'Difference between Clipping Path and Deep-etching-',
                                    'When to Apply Clipping Path-',
                                    'Advantages of Clipping Path Service-',
                                    'Who Actually Requires this Service-',
                                    'Clipping Path Services at Color Experts International, Inc.',
                                    'Clipping path is a manual photo editing technique, right?',
                                    'Can I get clipping path service for images in different formats?',
                                    'How You Do It?',
                                    'How can I place an order?',
                                    'How fast can you provide the service?',
                                    'How about your daily delivery capacity?',
                                ];
                            @endphp

                            @foreach($faqs as $i => $faq)
                                <div class="bg-white border-l-4 border-l-slate-200 hover:border-l-[#0ea5e9] transition-all group overflow-hidden">
                                    <button class="w-full flex items-center text-left py-4 px-6 focus:outline-none">
                                        <div class="w-8 h-8 rounded bg-slate-50 flex items-center justify-center text-[11px] font-black mr-4 group-hover:bg-sky-50 group-hover:text-[#0ea5e9] transition-all">
                                            {{ $i + 1 }}
                                        </div>
                                        <span class="text-[14px] font-bold text-slate-700 tracking-tight flex-1 uppercase">{{ $faq }}</span>
                                        <i class="ri-add-line text-slate-300"></i>
                                    </button>
                                </div>
                            @endforeach
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
    </script>
@endsection
