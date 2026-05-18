@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories ?? [], 'theme' => 'dark'])
@endsection

@section('title', $service->name . ' | Storyboarding Services | Graphics Studio')

@section('content')
<div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-amber-500 selection:text-white overflow-x-hidden">

    {{-- ── 1. HERO SECTION ── --}}
    <section class="relative pt-44 pb-32 bg-[#0b1f3a] text-white overflow-hidden">
        <div class="absolute inset-0 opacity-15">
            <img src="https://images.unsplash.com/photo-1579783902614-a3fb3927b6a5?auto=format&fit=crop&w=1920&q=80" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#0b1f3a]/80 to-[#0b1f3a]"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                {{-- Left Side: Text --}}
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-500/10 text-amber-400 font-bold text-xs uppercase tracking-widest mb-6 border border-amber-500/20">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        Pre-Production Masterpiece
                    </div>
                    <h1 class="text-4xl md:text-6xl font-black uppercase tracking-tight mb-6">
                        {{ $service->name }}
                    </h1>
                    <p class="text-slate-300 text-lg leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                        {{ $service->description ?? 'Transform your script, concepts, and ideas into cinematic pre-visualizations. Our master storytellers build stunning scene-by-scene blueprints to guide your production crew flawlessly.' }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('graphics.video-quote') }}" class="px-8 py-4 bg-amber-500 hover:bg-amber-600 text-slate-950 font-extrabold rounded-lg shadow-lg shadow-amber-500/30 hover:shadow-amber-500/50 hover:-translate-y-1 transition-all duration-300">
                            Get A Free Quote
                        </a>
                        <a href="#services-list" class="px-8 py-4 border border-slate-500 hover:border-white text-white font-extrabold rounded-lg transition-all duration-300">
                            Explore Services
                        </a>
                    </div>
                </div>

                {{-- Right Side: Illustration --}}
                <div class="w-full lg:w-1/2 relative group">
                    <div class="absolute -inset-4 bg-gradient-to-tr from-amber-500 to-orange-400 rounded-3xl blur-2xl opacity-20 group-hover:opacity-40 transition duration-700"></div>
                    <div class="relative bg-[#0d2646] p-2 rounded-2xl shadow-2xl border border-slate-800 overflow-hidden z-10">
                        <div class="aspect-video rounded-xl overflow-hidden bg-slate-950 relative">
                            <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=800" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                <div class="w-16 h-16 bg-amber-500 rounded-full flex items-center justify-center shadow-2xl cursor-pointer hover:scale-110 transition-transform">
                                    <i class="ri-palette-fill text-2xl text-slate-950"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 2. BRANDING IN STORY BOARDING ── --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="w-full lg:w-1/2">
                    <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=800&q=80" class="w-full rounded-3xl shadow-2xl">
                </div>
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <h2 class="text-3xl md:text-4xl font-black text-[#0b1f3a] uppercase mb-6 leading-tight">Visualize Your <br> <span class="text-amber-500">Story First</span></h2>
                    <p class="text-slate-500 text-lg leading-relaxed mb-8">
                        Avoid costly production re-shoots by nailing the layout and shot selection early. Our custom storyboard frames layout camera angles, character key poses, movements, and pacing to align your entire creative team.
                    </p>
                    <div class="flex justify-center lg:justify-start gap-1">
                        @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['amber-500','yellow-400','orange-400','slate-800'][$i] }} rounded-sm"></div> @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 3. WORKFLOW PROCESS ── --}}
    <section class="py-24 bg-slate-50 border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-[#0b1f3a] uppercase mb-4">Our Creative Workflow</h2>
                <p class="text-slate-500 text-sm max-w-2xl mx-auto italic">Crafting professional narrative grids through a systematic, collaborative process.</p>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['amber-500','yellow-400','orange-400','slate-800'][$i] }} rounded-sm"></div> @endfor
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @php
                    $steps = [
                        ['num' => '01', 'title' => 'Script Analysis', 'desc' => 'We review your script or brief to extract vital scenes, visual transitions, and framing goals.'],
                        ['num' => '02', 'title' => 'Thumbnail Roughs', 'desc' => 'Rapid sketch layouts to map general composition, camera direction, and scene transitions.'],
                        ['num' => '03', 'title' => 'Detail Sketching', 'desc' => 'Detailed character anatomy, facial expressions, clear foreground/background elements.'],
                        ['num' => '04', 'title' => 'Clean & Ink', 'desc' => 'Polished vector lines, shading, coloring, and final narrative notes for immediate hand-off.']
                    ];
                @endphp
                @foreach($steps as $step)
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
                        <div class="text-amber-500 font-black text-4xl mb-4">{{ $step['num'] }}</div>
                        <h3 class="text-sm font-black uppercase text-[#0b1f3a] mb-2 tracking-wide">{{ $step['title'] }}</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── 4. OUR SERVICES GRID ── --}}
    <section id="services-list" class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-[#0b1f3a] uppercase mb-4">Storyboarding Specialties</h2>
                <p class="text-slate-500 text-sm max-w-2xl mx-auto italic">High-fidelity storyboard outputs curated specifically for various visual media platforms.</p>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['amber-500','yellow-400','orange-400','slate-800'][$i] }} rounded-sm"></div> @endfor
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $specialties = [
                        ['title' => 'Video Ad Storyboards', 'img' => 'https://images.unsplash.com/photo-1542744094-3a31f103e35f?w=400'],
                        ['title' => 'Explainer Video Boards', 'img' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?w=400'],
                        ['title' => 'Cinematic / Movie Layouts', 'img' => 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?w=400'],
                        ['title' => '2D & 3D Animation Blueprints', 'img' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=400'],
                        ['title' => 'E-Learning Narratives', 'img' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=400'],
                        ['title' => 'Comic Book & Manga Panels', 'img' => 'https://images.unsplash.com/photo-1612036782180-6f0b6cd846fe?w=400']
                    ];
                @endphp
                @foreach($specialties as $item)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-slate-100">
                        <div class="aspect-video overflow-hidden bg-slate-100 relative">
                            <img src="{{ $item['img'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-amber-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-xs font-black text-[#0b1f3a] uppercase tracking-widest group-hover:text-amber-500 transition-colors">{{ $item['title'] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── 5. PRICING SECTION ── --}}
    <section class="py-24 bg-slate-50 border-t border-slate-200">
        <div class="container mx-auto px-6 max-w-2xl text-center">
            <span class="text-xs font-black text-amber-500 uppercase tracking-[0.3em] mb-3 block">Pricing</span>
            <h2 class="text-3xl md:text-4xl font-black uppercase text-[#0b1f3a] mb-4">How We Quote</h2>
            <div class="flex justify-center gap-1 mb-10">
                @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['amber-500','yellow-400','orange-400','slate-800'][$i] }} rounded-sm"></div> @endfor
            </div>

            <div class="flex items-center mb-2 px-1">
                <div class="w-[44%]"></div>
                <div class="flex-1 flex text-[10px] font-black uppercase tracking-widest text-slate-400">
                    <span class="flex-1 text-center">Basic</span>
                    <span class="flex-1 text-center">Medium</span>
                    <span class="flex-1 text-center">Premium</span>
                </div>
            </div>

            <div class="space-y-2.5">
                @forelse($videoPricings as $pricing)
                    @php $tiers = $pricing->pricing_tiers ?? []; @endphp
                    <div class="flex items-center gap-2">
                        <div class="w-[44%] shrink-0">
                            <div class="bg-[#0b1f3a] text-white text-[11px] font-black uppercase tracking-wider rounded-full py-3.5 px-6 text-left leading-none">
                                {{ $pricing->service_name }}
                            </div>
                        </div>
                        <div class="flex-1 bg-[#ebebeb] rounded-full py-3.5 flex items-center justify-center">
                            <span class="flex-1 text-center text-[13px] font-black text-slate-600">${{ $tiers[0]['price'] ?? '—' }}</span>
                            <span class="text-slate-400 text-sm px-1">|</span>
                            <span class="flex-1 text-center text-[13px] font-black text-slate-600">${{ $tiers[1]['price'] ?? '—' }}</span>
                            <span class="text-slate-400 text-sm px-1">|</span>
                            <span class="flex-1 text-center text-[13px] font-black text-slate-600">${{ $tiers[2]['price'] ?? '—' }}</span>
                        </div>
                    </div>
                @empty
                    <div class="py-10 text-slate-400 italic text-sm">No pricing details defined yet.</div>
                @endforelse
            </div>

            <div class="mt-12">
                <a href="{{ route('graphics.video-quote') }}" class="inline-block px-12 py-4 bg-amber-500 hover:bg-amber-600 text-slate-950 font-black uppercase tracking-widest text-xs rounded-md shadow-xl transition-all active:scale-95">Get A Quote</a>
            </div>
        </div>
    </section>

    {{-- ── 6. TESTIMONIALS ── --}}
    @include('graphics.partials.testimonials')

    {{-- ── 7. LATEST BLOGS ── --}}
    <section class="py-24 bg-white border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16">
                <span class="text-xs font-black text-amber-500 uppercase tracking-widest mb-2 block">Insights</span>
                <h2 class="text-3xl font-black uppercase text-[#0b1f3a]">Latest Blog Update</h2>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['amber-500','yellow-400','orange-400','slate-800'][$i] }} rounded-sm"></div> @endfor
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @php 
                    $blogPosts = \App\Models\BlogPost::latest()->limit(4)->get(); 
                @endphp
                @foreach($blogPosts as $post)
                    <a href="{{ route('graphics.blog.single', $post->slug) }}" class="group block">
                        <div class="aspect-video rounded-xl overflow-hidden mb-6 bg-slate-100 border border-slate-200 relative">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" 
                                 class="w-full h-full object-cover grayscale brightness-95 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-700">
                            <div class="absolute top-0 right-0 px-3 py-1 bg-amber-500 text-slate-950 text-[9px] font-black uppercase tracking-widest">Blog</div>
                        </div>
                        <h4 class="text-xs font-black uppercase italic leading-tight group-hover:text-amber-500 transition-colors">{{ $post->title }}</h4>
                        <div class="mt-4 flex items-center gap-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                            <i class="ri-calendar-line text-amber-500"></i> {{ $post->created_at->format('M d, Y') }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
    .font-sans { font-family: 'Plus Jakarta Sans', sans-serif; }
</style>
@endsection
