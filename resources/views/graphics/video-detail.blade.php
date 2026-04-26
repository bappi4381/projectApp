@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories ?? [], 'theme' => 'light'])
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
                        <a href="{{ route('graphics.get-quote') }}" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-lg shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 hover:-translate-y-1 transition-all duration-300">
                            Get A Quote
                        </a>
                        <a href="{{ route('graphics.get-quote') }}" class="px-8 py-4 bg-white text-slate-700 font-bold rounded-lg border border-slate-200 hover:border-blue-500 hover:text-blue-600 transition-all duration-300 flex items-center gap-2">
                            <i class="ri-play-circle-line text-xl"></i> See Examples
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
    <section class="py-24 bg-slate-50 border-y border-slate-100">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Video Editing Process</h2>
                <p class="text-slate-500 text-lg">We always prefer the simplest way for our clients. No hassle! Experience a seamless workflow designed for efficiency.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Step 1 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <i class="ri-upload-cloud-2-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">1. Upload Raw Files</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Securely upload your raw footage, product images, and instructions via our easy-to-use portal.</p>
                </div>
                {{-- Step 2 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:bg-green-500 group-hover:text-white transition-colors">
                        <i class="ri-scissors-cut-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">2. Expert Editing</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Our seasoned editors get to work, cutting, color grading, and adding animations to make your product shine.</p>
                </div>
                {{-- Step 3 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                        <i class="ri-search-eye-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">3. Review & Revise</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Receive your draft and request any tweaks. We ensure the final cut perfectly aligns with your brand vision.</p>
                </div>
                {{-- Step 4 --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-2xl mb-6 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <i class="ri-download-cloud-2-line"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3">4. Download Final</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Get the final, high-converting video in your desired format, ready to be published on your e-commerce platforms.</p>
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
                <div class="mt-6 md:mt-0">
                    <a href="#" class="text-blue-600 font-bold hover:text-blue-700 flex items-center gap-1 group">
                        View All Portfolio <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
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
            </div>
        </div>
    </section>

    {{-- ── 4. RATE MATRIX / HOW WE QUOTE ── --}}
    <section class="py-24 bg-slate-50 border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">How We Quote</h2>
                <p class="text-slate-500 text-lg">Transparent pricing tailored to your specific video editing needs.</p>
            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
                <div class="grid grid-cols-12 bg-slate-50 border-b border-slate-100 py-4 px-6 md:px-10 hidden md:grid">
                    <div class="col-span-6 text-xs font-bold uppercase tracking-widest text-slate-500">Service Feature</div>
                    <div class="col-span-2 text-xs font-bold uppercase tracking-widest text-slate-500 text-center">Basic</div>
                    <div class="col-span-2 text-xs font-bold uppercase tracking-widest text-slate-500 text-center">Standard</div>
                    <div class="col-span-2 text-xs font-bold uppercase tracking-widest text-slate-500 text-center">Premium</div>
                </div>

                <div class="divide-y divide-slate-100">
                    @forelse($service->features ?? [] as $f)
                    <div class="grid grid-cols-1 md:grid-cols-12 py-5 px-6 md:px-10 items-center hover:bg-blue-50/50 transition-colors">
                        <div class="col-span-1 md:col-span-6 mb-4 md:mb-0">
                            <h4 class="text-slate-800 font-bold text-sm">{{ $f['name'] }}</h4>
                        </div>
                        
                        @php
                            $price = $f['price'] ?? '-';
                            $tiers = str_contains($price, '|') ? explode('|', $price) : [$price, $price, $price];
                        @endphp
                        
                        <div class="col-span-1 md:col-span-6 grid grid-cols-3 gap-2 text-center text-sm font-medium text-slate-600">
                            <div class="flex flex-col md:block">
                                <span class="md:hidden text-xs text-slate-400 mb-1">Basic</span>
                                {{ trim($tiers[0] ?? '-') }}
                            </div>
                            <div class="flex flex-col md:block">
                                <span class="md:hidden text-xs text-slate-400 mb-1">Standard</span>
                                {{ trim($tiers[1] ?? '-') }}
                            </div>
                            <div class="flex flex-col md:block">
                                <span class="md:hidden text-xs text-slate-400 mb-1">Premium</span>
                                <span class="text-blue-600 font-bold">{{ trim($tiers[2] ?? '-') }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="py-12 text-center italic text-slate-400">Custom pricing tiers available in admin.</div>
                    @endforelse
                </div>
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('graphics.pricing') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-50 text-blue-600 font-bold rounded-lg hover:bg-blue-100 transition-colors">
                    View All Pricing <i class="ri-arrow-right-line"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ── 5. CTA SECTION ── --}}
    <section class="py-24 bg-white border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Need Accurate Pricing? Send Us a Quote Request</h2>
            <p class="text-blue-600 font-bold mb-10 text-lg">We Usually Reply Within 10 Minutes</p>

            <div class="p-1 lg:p-2 bg-gradient-to-r from-blue-100 to-green-100 rounded-3xl mx-auto max-w-2xl mb-16">
                <div class="bg-white p-10 md:p-14 rounded-[1.5rem] border border-white shadow-sm hover:shadow-lg transition-shadow relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full blur-2xl -mr-10 -mt-10 group-hover:scale-150 transition-transform duration-700"></div>
                    
                    <div class="relative z-10 flex flex-col items-center">
                        <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center text-4xl mb-6">
                            <i class="ri-cloud-upload-line"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Upload Your Files</h3>
                        <p class="text-slate-500 text-sm mb-8">Max 500mb/file, up to 5 files only.</p>
                        
                        <a href="{{ route('graphics.get-quote') }}" class="px-8 py-4 bg-blue-600 text-white font-bold rounded-lg shadow-lg hover:bg-blue-700 hover:-translate-y-1 transition-all duration-300 w-full md:w-auto">
                            Go to Upload Page
                        </a>
                    </div>
                </div>
            </div>

            <p class="text-sm text-slate-500">
                Note: If you have raw footage, send us a download link in the Instruction box or upload them. <br class="hidden md:block">
                By submitting a Quote you agree to our Terms and Conditions.
            </p>
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
