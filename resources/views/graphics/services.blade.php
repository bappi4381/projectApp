@extends('layouts.app')
@section('title', 'Professional Photoshop Services | Graphics Studio')
@section('meta_description', 'Explore our full range of professional photo editing services — from clipping path to high-end retouching.')

@section('content')
    <div class="bg-[#f0f9ff] min-h-screen font-sans selection:bg-[#0ea5e9] selection:text-white">

        {{-- ── HERO SECTION ────────────────────────────────── --}}
        @include('graphics.partials.service-hero', [
            'title' => 'POST PRODUCTION SERVICES',
            'description' => 'Professional image editing and retouching solutions tailored for photographers, e-commerce, and creative agencies.',
            'hero_image' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=1200&q=80',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ])

        {{-- ── INTRO TEXT ──────────────────────────────────── --}}
        <div class="container mx-auto px-4 md:px-8 max-w-5xl py-20">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-black text-[#082f49] uppercase tracking-wide mb-6">
                    PROFESSIONAL<br>PHOTOSHOP SERVICE
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
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-black text-[#082f49] uppercase tracking-wide">
                    Services Provided By Our Photoshop Experts
                </h2>
                <div class="w-16 h-1 bg-[#38bdf8] mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @php
                    $services = [
                        ['name' => 'Clipping Path Services', 'slug' => 'clipping-path', 'price' => '0.39', 'img1' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80&sat=-100', 'desc' => 'A clipping path is a closed vector path, or shape, used to cut out a 2D image in image editing software. Anything inside the path will be included after the clipping path is applied; anything outside the path will be omitted from the output.'],
                        ['name' => 'Background Removal Services', 'slug' => 'background-removal', 'price' => '0.49', 'img1' => 'https://images.unsplash.com/photo-1584771145729-0bd5095b9d41?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1584771145729-0bd5095b9d41?auto=format&fit=crop&w=600&q=80&blur=10', 'desc' => 'Background removal entails employing different techniques depending on the subject. With complex edges like hair or fur, advanced masking techniques are necessary over simple clipping paths.'],
                        ['name' => 'Ghost Mannequin Services', 'slug' => 'ghost-mannequin', 'price' => '0.99', 'img1' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=600&q=80&sat=-100', 'desc' => 'Showcasing apparel without the distraction of a mannequin provides a seamless and professional look. We flawlessly combine multiple photos to create a 3D hollow effect for your apparel.'],
                        ['name' => 'Shadow Making Services', 'slug' => 'shadow-services', 'price' => '0.25', 'img1' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?auto=format&fit=crop&w=600&q=80&sat=-100', 'desc' => 'Add depth, dimension, and realism to flat images by introducing natural, reflection, or drop shadows, enhancing the visual appeal and credibility of product presentations.'],
                        ['name' => 'Color Correction Services', 'slug' => 'color-correction', 'price' => '0.75', 'img1' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=600&q=80&sat=-100', 'desc' => 'Ensure all images align with your brand guidelines by adjusting colors, brightness, white balance, and contrast. Perfect for seasonal campaigns and unified product catalogues.'],
                        ['name' => 'Photo Retouching Services', 'slug' => 'photo-retouching', 'price' => '0.80', 'img1' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=600&q=80&sat=-100', 'desc' => 'High-end retouching to remove blemishes, smooth skin, clean up backgrounds, and emphasize the focal points of any portrait, lifestyle, or commercial photograph.'],
                        ['name' => 'Automotive Photo Editing', 'slug' => 'car-editing', 'price' => '1.00', 'img1' => 'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1600721391776-b5cd0e0048f9?auto=format&fit=crop&w=600&q=80&sat=-100', 'desc' => 'Elevate your automotive listings with crisp background replacements, shadow adjustments, and glare removal to make vehicles look their absolute best for online showrooms.'],
                        ['name' => 'E-Commerce Photo Editing', 'slug' => 'ecommerce-editing', 'price' => '0.40', 'img1' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=600&q=80', 'img2' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=600&q=80&sat=-100', 'desc' => 'Optimize your product images for major platforms like Amazon, eBay, and Shopify. We ensure strict adherence to technical requirements and visually stunning results.'],
                    ];
                @endphp

                @foreach($services as $i => $svc)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md border border-gray-200 flex flex-col">
                        {{-- Before/After Image Slider --}}
                        <div class="relative overflow-hidden bg-gray-100 before-after-container" style="height: 320px;"
                            data-index="{{ $i }}">
                            {{-- Before Image (full) --}}
                            <img src="{{ $svc['img2'] }}" alt="{{ $svc['name'] }} Before"
                                class="absolute inset-0 w-full h-full object-cover">

                            {{-- After Image (clipped left side) --}}
                            <div class="absolute inset-0 before-after-clip"
                                style="clip-path: polygon(0 0, 50% 0, 50% 100%, 0 100%);">
                                <img src="{{ $svc['img1'] }}" alt="{{ $svc['name'] }} After"
                                    class="absolute inset-0 w-full h-full object-cover">
                            </div>

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

                        {{-- Content --}}
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-lg font-bold text-center mb-3" style="color: #c0392b;">{{ $svc['name'] }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6 flex-1 text-justify">{{ $svc['desc'] }}</p>

                            {{-- Stats Row --}}
                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <div class="border border-gray-200 rounded py-2 px-3 text-center">
                                    <div class="text-[10px] text-gray-400 font-semibold uppercase tracking-wide">Starts From
                                    </div>
                                    <div class="text-xl font-black text-gray-800">$ {{ $svc['price'] }}</div>
                                </div>
                                <div class="border border-gray-200 rounded py-2 px-3 text-center">
                                    <div class="text-[10px] text-gray-400 font-semibold uppercase tracking-wide">Images/24Hr
                                    </div>
                                    <div class="text-xl font-black text-gray-800">3000</div>
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="grid grid-cols-2 gap-3">
                                <a href="{{ route('graphics.service-detail', $svc['slug']) }}"
                                    class="py-2.5 text-sm font-bold text-center border-2 rounded"
                                    style="color: #0ea5e9; border-color: #0ea5e9; transition: all 0.3s;"
                                    onmouseover="this.style.backgroundColor='#0ea5e9';this.style.color='#fff'"
                                    onmouseout="this.style.backgroundColor='transparent';this.style.color='#0ea5e9'">
                                    VIEW DETAILS
                                </a>
                                <a href="{{ route('graphics.get-quote') }}"
                                    class="py-2.5 text-sm font-bold text-center text-white rounded"
                                    style="background: linear-gradient(to right, #0ea5e9, #2dd4bf); transition: all 0.3s;"
                                    onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                    GET A QUOTE
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Disclaimer Alert --}}
            <div
                class="mt-12 bg-red-50 text-red-500/80 p-5 rounded flex items-start gap-4 border border-red-100 max-w-5xl mx-auto shadow-sm">
                <i class="ri-error-warning-line text-xl mt-0.5"></i>
                <p class="text-sm">
                    <span class="font-bold italic">Disclaimer:</span> <span class="text-gray-500">The before/after photos
                        are used as a sample of services we offer. The actual price of displayed images might be higher than
                        the mentioned Starting Price. For accurate prices, please</span> <a
                        href="{{ route('graphics.get-quote') }}"
                        class="text-gray-600 underline underline-offset-4 decoration-1 hover:text-red-500">Request a
                        Quote</a>
                </p>
            </div>
        </div>

        {{-- ── FEATURED PORTFOLIOS ────────────────────────── --}}
        <div class="bg-[#f0f9ff] py-20 mt-16 border-t border-slate-200">
            <div class="container mx-auto px-4 md:px-6 max-w-6xl text-center">
                <h2 class="text-2xl md:text-3xl font-black text-[#082f49] uppercase tracking-wide mb-2">
                    Also Featured in Our Clients' Portfolios
                </h2>
                <div class="w-16 h-1 bg-[#38bdf8] mx-auto mt-4 rounded-full mb-12"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                    @php
                        $portfolios = [
                            ['name' => 'Magazine Retouching', 'img' => 'https://images.unsplash.com/photo-1544441893-675973e31985?auto=format&fit=crop&w=600&q=80', 'desc' => 'Flawless skin retouching, color grading, and composition adjustments used by top fashion and lifestyle magazines globally.'],
                            ['name' => 'Print Media Design', 'img' => 'https://images.unsplash.com/photo-1587595431973-160d0d94add1?auto=format&fit=crop&w=600&q=80', 'desc' => 'High-resolution CMYK conversions, layout formatting, and prepress adjustments ensuring perfect prints without color bleeding.'],
                            ['name' => 'Creative Manipulation', 'img' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=600&q=80', 'desc' => 'Surreal compositions and digital art combining multiple images, advanced blending, and custom lighting effects for advertising campaigns.'],
                            ['name' => 'Social Media Content', 'img' => 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=600&q=80', 'desc' => 'Eye-catching banner designs, ad creatives, and profile imagery tailored specifically for Instagram, Facebook, and modern social platforms.'],
                        ];
                    @endphp

                    @foreach($portfolios as $port)
                        <div
                            class="bg-white rounded-xl overflow-hidden shadow-sm border border-[#e0e7ff] hover:shadow-md transition-all group">
                            <div class="h-64 overflow-hidden relative">
                                <img src="{{ $port['img'] }}" alt="{{ $port['name'] }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#082f49]/80 to-transparent"></div>
                                <h3 class="absolute bottom-6 left-6 text-xl font-bold text-white">{{ $port['name'] }}</h3>
                            </div>
                            <div class="p-6">
                                <p class="text-slate-600 text-sm leading-relaxed mb-6">{{ $port['desc'] }}</p>
                                <a href="{{ route('graphics.portfolio') }}"
                                    class="inline-block py-2 px-6 text-sm font-bold text-white bg-[#0ea5e9] rounded-full hover:bg-[#0284c7] transition-colors">
                                    View Work
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ── TESTIMONIALS ───────────────────────────────── --}}
        <div class="py-20 text-center container mx-auto px-4 md:px-6 max-w-5xl">
            <h2 class="text-2xl md:text-3xl font-black text-[#082f49] uppercase tracking-wide mb-2">
                What People Say
            </h2>
            <div class="text-yellow-400 text-xl tracking-widest mb-4">
                <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i
                    class="ri-star-fill"></i><i class="ri-star-fill"></i>
            </div>
            <div class="w-16 h-1 bg-[#38bdf8] mx-auto mb-12 rounded-full"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex gap-4">
                    <img src="https://ui-avatars.com/api/?name=Sarah+J&background=0ea5e9&color=fff" alt="Client"
                        class="w-16 h-16 rounded-full shadow-md shrink-0">
                    <div>
                        <h4 class="font-bold text-slate-800 text-lg">Sarah Jenkins</h4>
                        <p class="text-xs text-slate-400 mb-3 uppercase font-bold tracking-wider">E-commerce Director</p>
                        <p class="text-slate-600 text-sm leading-relaxed italic">"Graphics Studio completely transformed our
                            product catalogue. Their clipping path and background removal services are consistently
                            flawless, delivering our batches exactly when promised. Excellent service!"</p>
                    </div>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 flex gap-4">
                    <img src="https://ui-avatars.com/api/?name=Mark+D&background=0ea5e9&color=fff" alt="Client"
                        class="w-16 h-16 rounded-full shadow-md shrink-0">
                    <div>
                        <h4 class="font-bold text-slate-800 text-lg">Mark Davidson</h4>
                        <p class="text-xs text-slate-400 mb-3 uppercase font-bold tracking-wider">Lead Photographer</p>
                        <p class="text-slate-600 text-sm leading-relaxed italic">"The high-end retouching on our recent
                            fashion campaign was spectacular. They managed to retain skin texture perfectly while cleaning
                            up the images. I highly recommend their team."</p>
                    </div>
                </div>
            </div>
        </div>
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