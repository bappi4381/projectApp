@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories])
@endsection

@section('title', ($service->hero_heading ?? $service->name) . ' | Video Production | Graphics Studio')

@section('content')
<div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-emerald-500 selection:text-white overflow-x-hidden">

    {{-- ── 1. HERO SECTION ── --}}
    <section class="relative pt-44 pb-32 bg-[#0b2b3d] text-white overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-blue-900/20 to-transparent"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
                {{-- Left Side: Content --}}
                <div class="w-full lg:w-7/12 text-center lg:text-left">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight mb-6">
                        {!! $service->hero_heading ?? 'Video Editing and <br> Post Production Services' !!}
                    </h1>
                    <p class="text-slate-300 text-lg md:text-xl font-medium leading-relaxed max-w-2xl mx-auto lg:mx-0 mb-8">
                        {{ $service->description ?? $service->short_description ?? 'Quickly and easily turn traditional videos into cinematic masterpieces through professional editing and post-production.' }}
                    </p>
                    
                    {{-- Rating --}}
                    <div class="flex items-center justify-center lg:justify-start gap-1 mb-10">
                        @for($i=0;$i<5;$i++)
                            <i class="ri-star-fill text-yellow-400 text-xl"></i>
                        @endfor
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('graphics.get-quote') }}" class="px-8 py-4 bg-[#1ebba3] text-white font-black uppercase tracking-widest text-xs rounded-md shadow-xl hover:bg-[#199f8a] transition-all">Get A Quote</a>
                        <a href="#" class="px-8 py-4 bg-white text-[#0b2b3d] font-black uppercase tracking-widest text-xs rounded-md shadow-xl hover:bg-slate-100 transition-all">Free Trial</a>
                    </div>
                </div>

                {{-- Right Side: Illustration --}}
                <div class="w-full lg:w-5/12 relative">
                    <div class="relative z-10 group">
                        <div class="absolute -inset-4 bg-emerald-500/20 rounded-[2.5rem] blur-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <img src="https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=800&q=80" alt="Video Editing" class="relative rounded-[2.5rem] shadow-2xl border-8 border-white/5 transition-transform duration-700 group-hover:scale-[1.02]">
                        
                        {{-- Floating Badges --}}
                        <div class="absolute -top-6 -right-6 bg-white p-4 rounded-2xl shadow-2xl border border-slate-100 animate-bounce-slow hidden sm:block">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                                    <i class="ri-flashlight-line text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Turnaround</div>
                                    <div class="text-sm font-black text-[#0b2b3d]">12-24 Hours</div>
                                </div>
                            </div>
                        </div>

                        <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-2xl border border-slate-100 animate-float hidden sm:block">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                    <i class="ri-shield-check-line text-xl"></i>
                                </div>
                                <div>
                                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none mb-1">Experience</div>
                                    <div class="text-sm font-black text-[#0b2b3d]">10+ Years</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 2. POPULAR SERVICES ── --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black uppercase tracking-tight text-[#082f49] mb-4">Popular Services</h2>
                <p class="text-slate-500 text-sm max-w-2xl mx-auto">Take your visual stories further with our top-rated video production services, tailored for businesses and creators.</p>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-2.5 h-1 bg-{{ ['emerald-500','cyan-500','blue-500','slate-200'][$i] }} rounded-full"></div> @endfor
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @php
                    $displayItems = (isset($videoSubCategories) && $videoSubCategories->isNotEmpty()) ? $videoSubCategories : (count($service->subcategories ?? []) > 0 ? $service->subcategories : ($service->services ?? collect()));
                @endphp

                @foreach($displayItems as $item)
                    <a href="{{ route('graphics.service-detail', $item->slug) }}" class="group block text-center">
                        <div class="aspect-video rounded-xl overflow-hidden bg-slate-100 mb-4 shadow-sm group-hover:shadow-lg transition-all border border-slate-100">
                            @if($item->image_after || $item->image_before)
                                <img src="{{ asset('storage/' . ($item->image_after ?? $item->image_before)) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <img src="https://images.unsplash.com/photo-1536240478700-b869070f9279?w=400" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                            @endif
                        </div>
                        <h3 class="text-[11px] font-black text-[#0f172a] uppercase tracking-wider group-hover:text-emerald-600 transition-colors">{{ $item->name }}</h3>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── 3. VIDEO EDITING PROCESS ── --}}
    <section class="py-24 bg-[#f0f9ff]">
        <div class="container mx-auto px-6 max-w-6xl text-center">
            <h2 class="text-3xl font-black uppercase text-[#082f49] mb-4">Video Editing Process</h2>
            <p class="text-slate-500 text-sm mb-16">Step by step process to ensure the highest quality for your video projects.</p>
            
            <div class="flex flex-wrap justify-center items-start gap-12 lg:gap-20">
                @if($service->methods && count($service->methods) > 0)
                    @foreach($service->methods as $index => $method)
                        <div class="flex flex-col items-center group w-32">
                            <div class="w-20 h-20 rounded-2xl bg-white shadow-lg flex items-center justify-center text-3xl text-emerald-500 group-hover:bg-emerald-500 group-hover:text-white transition-all mb-4 relative">
                                <i class="ri-settings-4-line"></i>
                                @if($index < count($service->methods) - 1)
                                    <div class="hidden lg:block absolute -right-12 top-1/2 -translate-y-1/2 text-slate-300">
                                        <i class="ri-arrow-right-s-line text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">{{ $method['title'] }}</span>
                        </div>
                    @endforeach
                @else
                    @php
                        $steps = [
                            ['icon' => 'ri-upload-cloud-2-line', 'title' => 'Upload Files'],
                            ['icon' => 'ri-settings-3-line', 'title' => 'Work In Progress'],
                            ['icon' => 'ri-checkbox-circle-line', 'title' => 'Delivery'],
                            ['icon' => 'ri-wallet-3-line', 'title' => 'Payment'],
                            ['icon' => 'ri-feedback-line', 'title' => 'Feedback']
                        ];
                    @endphp
                    @foreach($steps as $index => $step)
                        <div class="flex flex-col items-center group w-32">
                            <div class="w-20 h-20 rounded-2xl bg-white shadow-lg flex items-center justify-center text-3xl text-emerald-500 group-hover:bg-emerald-500 group-hover:text-white transition-all mb-4 relative">
                                <i class="{{ $step['icon'] }}"></i>
                                @if($index < count($steps) - 1)
                                    <div class="hidden lg:block absolute -right-12 top-1/2 -translate-y-1/2 text-slate-300">
                                        <i class="ri-arrow-right-s-line text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-slate-500">{{ $step['title'] }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    {{-- ── 4. PRICING SECTION ── --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <div class="mb-16">
                <span class="text-xs font-black text-emerald-500 uppercase tracking-widest mb-2 block">Pricing</span>
                <h2 class="text-3xl md:text-4xl font-black uppercase text-[#082f49]">How We Quote</h2>
                <div class="w-12 h-1 bg-yellow-400 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="overflow-hidden rounded-[2rem] border border-slate-100 shadow-2xl relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-500 via-blue-500 to-emerald-500"></div>
                <table class="w-full text-left border-collapse bg-white">
                    <thead class="bg-[#0b2b3d] text-white">
                        <tr>
                            <th class="py-6 px-10 text-[10px] font-black uppercase tracking-[0.2em] opacity-70">Service Category</th>
                            <th class="py-6 px-10 text-[10px] font-black uppercase tracking-[0.2em] opacity-70 text-center">Basic / 1080p</th>
                            <th class="py-6 px-10 text-[10px] font-black uppercase tracking-[0.2em] opacity-70 text-center bg-emerald-500/10 text-emerald-400">Pro / 4K</th>
                            <th class="py-6 px-10 text-[10px] font-black uppercase tracking-[0.2em] opacity-70 text-center">Premium / Raw</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-[13px] font-bold text-slate-600">
                        @forelse($videoPricings as $pricing)
                        <tr class="hover:bg-slate-50 transition-colors group">
                            <td class="py-6 px-10">
                                <div class="flex items-center gap-4">
                                    <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                                        <i class="ri-vidicon-line"></i>
                                    </div>
                                    <span class="font-black text-[#0b2b3d] uppercase tracking-tight">{{ $pricing->service_name }}</span>
                                </div>
                            </td>
                            @php $tiers = $pricing->pricing_tiers ?? []; @endphp
                            <td class="py-6 px-10 text-center font-black text-slate-400">{{ $tiers[0]['price'] ?? '-' }}</td>
                            <td class="py-6 px-10 text-center font-black text-emerald-600 bg-emerald-500/[0.02]">{{ $tiers[1]['price'] ?? '-' }}</td>
                            <td class="py-6 px-10 text-center font-black text-slate-400">{{ $tiers[2]['price'] ?? '-' }}</td>
                        </tr>
                        @empty
                            <tr><td colspan="4" class="py-12 text-center text-slate-400 italic">No pricing defined yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <a href="{{ route('graphics.video-pricing') }}" class="inline-block mt-12 text-[11px] font-black uppercase tracking-widest text-emerald-500 hover:text-emerald-600 border-b-2 border-emerald-500/20 pb-1">View Full Pricing</a>
        </div>
    </section>

    {{-- ── 5. TESTIMONIALS ── --}}
    @if(isset($testimonials) && $testimonials->isNotEmpty())
    <section class="py-32 bg-[#f8fafc] relative overflow-hidden">
        {{-- Decorative background elements --}}
        <div class="absolute top-0 left-0 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="text-center mb-20">
                <span class="text-xs font-black text-emerald-500 uppercase tracking-[0.3em] mb-4 block">Endorsements</span>
                <h2 class="text-4xl md:text-5xl font-black uppercase text-[#082f49] tracking-tighter">What Our Client's Say</h2>
                <div class="w-20 h-1.5 bg-emerald-500 mx-auto mt-6 rounded-full"></div>
            </div>
            
            <div class="relative px-4 sm:px-12">
                {{-- Slider Wrapper --}}
                <div class="overflow-hidden py-10">
                    <div id="testimonial-slider" class="flex transition-transform duration-1000 cubic-bezier(0.4, 0, 0.2, 1)">
                        @foreach($testimonials->chunk(2) as $chunk)
                            <div class="w-full flex-shrink-0 grid grid-cols-1 lg:grid-cols-2 gap-10">
                                @foreach($chunk as $testimonial)
                                    <div class="relative bg-white rounded-[3rem] p-12 shadow-[0_15px_40px_rgba(0,0,0,0.02)] text-left border border-slate-100/50 hover:shadow-[0_30px_60px_rgba(0,0,0,0.05)] transition-all duration-500 group">
                                        {{-- Quote Icon Watermark --}}
                                        <i class="ri-double-quotes-r absolute top-12 right-12 text-8xl text-slate-100 opacity-40 group-hover:text-emerald-500 group-hover:opacity-10 transition-all duration-700"></i>
                                        
                                        <div class="relative z-10">
                                            <div class="flex items-center gap-6 mb-10">
                                                <div class="relative">
                                                    <div class="w-20 h-20 rounded-full bg-gradient-to-tr from-emerald-500 to-blue-500 p-1 shadow-lg group-hover:rotate-6 transition-transform duration-500">
                                                        <div class="w-full h-full rounded-full bg-white p-1">
                                                            @if($testimonial->avatar)
                                                                <img src="{{ asset('storage/' . $testimonial->avatar) }}" class="w-full h-full rounded-full object-cover">
                                                            @else
                                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($testimonial->name) }}&background=0b2b3d&color=fff" class="w-full h-full rounded-full object-cover">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-white rounded-full flex items-center justify-center shadow-md">
                                                        <i class="ri-checkbox-circle-fill text-emerald-500 text-lg"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-black text-xl text-[#0f172a] uppercase tracking-tight mb-1">{{ $testimonial->name }}</div>
                                                    <div class="flex items-center gap-2">
                                                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">{{ $testimonial->designation }}</span>
                                                        <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                                        <span class="text-[9px] text-emerald-500 font-black uppercase tracking-widest">Verified Client</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex gap-1.5 mb-8">
                                                @for($i=0; $i<$testimonial->rating; $i++)
                                                    <i class="ri-star-fill text-yellow-400 text-xs"></i>
                                                @endfor
                                            </div>

                                            <p class="text-slate-600 text-lg font-medium leading-relaxed italic line-clamp-4">
                                                "{{ $testimonial->content }}"
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Custom Pagination Dots --}}
                <div class="flex justify-center items-center gap-4 mt-16">
                    @foreach($testimonials->chunk(2) as $index => $chunk)
                        <button onclick="goToSlide({{ $index }})" 
                                class="testimonial-dot group relative h-3 rounded-full transition-all duration-500 flex items-center justify-center focus:outline-none {{ $index === 0 ? 'w-12 bg-emerald-500' : 'w-3 bg-slate-200 hover:bg-slate-300' }}" 
                                data-index="{{ $index }}">
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function goToSlide(index) {
            const slider = document.getElementById('testimonial-slider');
            slider.style.transform = `translateX(-${index * 100}%)`;
            
            // Update dots styling
            document.querySelectorAll('.testimonial-dot').forEach(dot => {
                const dotIndex = parseInt(dot.getAttribute('data-index'));
                if (dotIndex === index) {
                    dot.classList.remove('bg-slate-200', 'w-3');
                    dot.classList.add('bg-emerald-500', 'w-12');
                } else {
                    dot.classList.remove('bg-emerald-500', 'w-12');
                    dot.classList.add('bg-slate-200', 'w-3');
                }
            });
        }
    </script>
    @endpush
    @endif

    {{-- ── 6. SOFTWARE WE USE ── --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-5xl text-center">
            <div class="mb-16">
                <span class="text-xs font-black text-emerald-500 uppercase tracking-widest mb-2 block">Tools</span>
                <h2 class="text-3xl font-black uppercase text-[#082f49]">Software We Use</h2>
                <p class="text-slate-500 text-xs mt-4 uppercase tracking-widest">Industry standard tools for industry standard results</p>
            </div>

            <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-y-12 gap-x-8 items-center justify-center">
                @php
                    $tools = [
                        ['id' => 'Pr', 'name' => 'Adobe Premiere', 'bg' => '#00005b', 'text' => '#9999ff'],
                        ['id' => 'Ae', 'name' => 'After Effects', 'bg' => '#00005b', 'text' => '#cf96fd'],
                        ['id' => 'Ps', 'name' => 'Photoshop', 'bg' => '#001e36', 'text' => '#31a8ff'],
                        ['id' => 'Ai', 'name' => 'Illustrator', 'bg' => '#330000', 'text' => '#ff9a00'],
                        ['id' => 'Id', 'name' => 'InDesign', 'bg' => '#3d0a21', 'text' => '#ff3366'],
                        ['id' => 'Lr', 'name' => 'Lightroom', 'bg' => '#001e36', 'text' => '#31a8ff'],
                        ['id' => 'Me', 'name' => 'Media Encoder', 'bg' => '#032900', 'text' => '#00ff00'],
                        ['id' => 'An', 'name' => 'Animate', 'bg' => '#2e0000', 'text' => '#ff0000'],
                        ['id' => 'Au', 'name' => 'Audition', 'bg' => '#012823', 'text' => '#00ffcc'],
                        ['id' => 'Br', 'name' => 'Bridge', 'bg' => '#2b1c00', 'text' => '#ffc107'],
                        ['id' => 'Ch', 'name' => 'Character Animator', 'bg' => '#141444', 'text' => '#5c5cff'],
                        ['id' => 'Dn', 'name' => 'Dimension', 'bg' => '#122c01', 'text' => '#8cff00'],
                        ['id' => 'Xd', 'name' => 'Adobe XD', 'bg' => '#2e001f', 'text' => '#ff26be'],
                        ['id' => 'Fr', 'name' => 'Fresco', 'bg' => '#0a1d32', 'text' => '#ff9a00'],
                        ['id' => 'Pl', 'name' => 'Prelude', 'bg' => '#1f002e', 'text' => '#ff26be'],
                        ['id' => 'Dw', 'name' => 'Dreamweaver', 'bg' => '#1f002e', 'text' => '#ff26be'],
                    ];
                @endphp
                @foreach($tools as $tool)
                    <div class="flex flex-col items-center group cursor-pointer">
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center text-xl font-black shadow-xl hover:scale-110 transition-all duration-300 border-2" 
                             style="background-color: {{ $tool['bg'] }}; color: {{ $tool['text'] }}; border-color: {{ $tool['text'] }}44;">
                            {{ $tool['id'] }}
                        </div>
                        <span class="mt-3 text-[9px] font-bold text-slate-500 uppercase tracking-tighter opacity-0 group-hover:opacity-100 transition-opacity text-center whitespace-nowrap">{{ $tool['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── 7. LATEST BLOG UPDATE ── --}}
    <div class="bg-[#f0f9ff] py-24">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16">
                <span class="text-xs font-black text-emerald-500 uppercase tracking-widest mb-2 block">Our Experts</span>
                <h2 class="text-3xl font-black uppercase text-[#082f49]">Latest Blog Update</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @php 
                    $blogPosts = \App\Models\BlogPost::where('category', 'LIKE', '%video%')
                        ->orWhere('category', 'LIKE', '%production%')
                        ->latest()
                        ->limit(4)
                        ->get(); 
                @endphp
                @foreach($blogPosts as $post)
                    <a href="{{ route('graphics.blog.single', $post->slug) }}" class="group block">
                        <div class="aspect-video rounded-xl overflow-hidden mb-6 bg-slate-100 border border-slate-200 relative">
                            <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}" 
                                 class="w-full h-full object-cover grayscale brightness-90 group-hover:grayscale-0 transition-all duration-700">
                            <div class="absolute top-0 right-0 px-3 py-1 bg-cyan-400 text-white text-[9px] font-black uppercase">Blog</div>
                        </div>
                        <h4 class="text-xs font-black uppercase italic leading-tight group-hover:text-blue-600 transition-colors">{{ $post->title }}</h4>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap');
    .font-sans { font-family: 'Outfit', sans-serif; }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }
    .animate-float {
        animation: float 5s ease-in-out infinite;
    }

    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 4s ease-in-out infinite;
    }
</style>
@endsection

