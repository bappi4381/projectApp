@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories])
@endsection

@section('title', $service->name . ' | Video Production | Graphics Studio')

@section('content')
<div class="bg-[#0b2b3d] min-h-screen text-white font-sans selection:bg-emerald-500 selection:text-white overflow-x-hidden">

    {{-- ── 1. HERO SECTION (AS PER SCREENSHOT) ── --}}
    <section class="relative pt-44 pb-32">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
                
                {{-- Left Side: Subject Card --}}
                <div class="w-full lg:w-5/12 relative group">
                    <div class="relative z-10 p-2 bg-white/10 rounded-[3rem] border border-white/10 backdrop-blur-sm shadow-2xl overflow-hidden">
                        <div class="aspect-square rounded-[2.5rem] overflow-hidden relative checkerboard-bg border border-white/5">
                            @if($service->image_after)
                                <img src="{{ asset('storage/' . $service->image_after) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=800" class="w-full h-full object-cover opacity-80 mix-blend-multiply">
                            @endif
                            <div class="absolute top-8 right-8 z-30 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                <span class="text-[9px] font-black uppercase tracking-[0.2em] text-white/50">Cinematic</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Side: Content --}}
                <div class="w-full lg:w-7/12 text-center lg:text-left">
                    <div class="mb-4 text-[10px] font-black uppercase tracking-[0.4em] text-emerald-400">Color Experts Studio</div>
                    <h1 class="text-5xl md:text-7xl font-black text-white uppercase tracking-tighter leading-[0.9] mb-8">
                        @php
                            $words = explode(' ', $service->name);
                            $lastWord = array_pop($words);
                            $firstPart = implode(' ', $words);
                        @endphp
                        {{ $firstPart }} <br>
                        <span class="text-white">{{ $lastWord }}</span>
                    </h1>
                    <p class="text-slate-200 text-lg font-medium leading-relaxed max-w-xl mx-auto lg:mx-0 mb-12">
                         {{ $service->description ?? 'We provide high-end video background removal and cinematic motion production with pixel-perfect accuracy.' }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-8">
                        <a href="{{ route('graphics.get-quote') }}" class="px-12 py-5 bg-white text-[#0b2b3d] font-black uppercase tracking-widest text-xs rounded-full shadow-2xl hover:scale-105 transition-all">Get A Quote</a>
                        <div class="flex gap-2">
                            @for($i=0;$i<4;$i++) <div class="w-2 h-2 rounded-full bg-white/{{ ($i==0) ? '100' : '20' }}"></div> @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 2. RESULT DRIVEN OUTCOME (LAPTOP PREVIEW) ── --}}
    <section class="py-24 bg-white/5 border-y border-white/5">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <h2 class="text-3xl md:text-4xl font-black uppercase tracking-tighter mb-4">Result Driven Outcome</h2>
            <p class="text-slate-400 text-sm italic font-medium mb-12">Focus on premium quality that speaks for your brand value.</p>
            
            <div class="relative max-w-3xl mx-auto group">
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-emerald-500 rounded-3xl blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                <div class="relative bg-[#0d1b2a] p-2 rounded-2xl shadow-2xl border border-white/10">
                    <div class="aspect-video rounded-xl overflow-hidden bg-black">
                        @if($service->video_url)
                            @php
                                $vidUrl = $service->video_url;
                                if (str_contains($vidUrl, 'watch?v=')) $vidUrl = str_replace('watch?v=', 'embed/', $vidUrl);
                            @endphp
                            <iframe src="{{ $vidUrl }}?autoplay=0&controls=1" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                        @else
                            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1200" class="w-full h-full object-cover opacity-60">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="ri-play-circle-line text-7xl text-white/20"></i>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Secondary Info Header --}}
            <div class="mt-24">
                <h3 class="text-3xl md:text-4xl font-black uppercase tracking-tighter mb-4 italic">Create Best Ecommerce Videos</h3>
                <p class="text-emerald-400 text-sm font-bold uppercase tracking-[0.3em] mb-12">Success in every frame we edit</p>
                <div class="flex justify-center gap-2">
                    @for($i=0;$i<4;$i++) <div class="w-2 h-2 rounded-full bg-white/{{ ($i==0) ? '100' : '20' }}"></div> @endfor
                </div>
            </div>

            {{-- 3-Column Preview Grid as seen in screenshot --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-20">
                @for($i=1; $i<=3; $i++)
                <div class="group relative aspect-[4/5] rounded-[2rem] overflow-hidden border border-white/10">
                    <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=600' }}" class="w-full h-full object-cover grayscale transition-all duration-700 group-hover:scale-110 group-hover:grayscale-0">
                </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- ── 3. RATE MATRIX (CAPSULE DESIGN) ── --}}
    <section class="py-32 bg-white text-[#0b2b3d]">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <div class="mb-12">
                <p class="text-[11px] font-black uppercase tracking-[0.3em] text-cyan-500 mb-3 tracking-widest">Pricing</p>
                <h2 class="text-4xl md:text-6xl font-black uppercase tracking-tighter italic">How We Quote</h2>
                <div class="flex justify-center gap-2 mt-8">
                    @for($i=0;$i<4;$i++) <div class="w-2.5 h-2.5 rounded-full bg-{{ ['emerald-500','yellow-500','blue-500','[#0b2b3d]'][$i] }}"></div> @endfor
                </div>
            </div>

            {{-- Table Headers --}}
            <div class="grid grid-cols-12 gap-4 mb-4 pr-12 hidden md:grid">
                <div class="col-start-6 col-span-2 text-[10px] font-black uppercase tracking-widest text-slate-400">Basic</div>
                <div class="col-start-8 col-span-2 text-[10px] font-black uppercase tracking-widest text-slate-400">Medium</div>
                <div class="col-start-10 col-span-2 text-[10px] font-black uppercase tracking-widest text-slate-400">Advanced</div>
            </div>

            {{-- Capsule Row Implementation --}}
            <div class="space-y-4">
                @forelse($service->features ?? [] as $f)
                <div class="flex flex-col md:flex-row items-center gap-0 group">
                    <div class="w-full md:w-5/12 bg-[#0b2b3d] py-5 px-10 rounded-full md:rounded-l-full md:rounded-r-none z-10 shadow-xl">
                        <h4 class="text-white font-black uppercase tracking-widest text-sm text-center md:text-left truncate">{{ $f['name'] }}</h4>
                    </div>
                    <div class="w-full md:w-7/12 bg-[#94a3b8] py-5 px-12 rounded-full md:rounded-r-full md:rounded-l-none -mt-4 md:mt-0 md:-ml-10 shadow-inner group-hover:bg-[#8393a7] transition-colors border border-white/10">
                        <div class="flex items-center justify-center md:justify-around text-white font-black text-sm tracking-tight">
                            @php
                                $price = $f['price'] ?? '-';
                                $tiers = str_contains($price, '|') ? explode('|', $price) : [$price, $price, $price];
                            @endphp
                            <div class="px-2">{{ trim($tiers[0] ?? '-') }}</div>
                            <div class="h-4 w-px bg-white/30 hidden md:block"></div>
                            <div class="px-2">{{ trim($tiers[1] ?? '-') }}</div>
                            <div class="h-4 w-px bg-white/30 hidden md:block"></div>
                            <div class="px-2">{{ trim($tiers[2] ?? '-') }}</div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="py-12 bg-slate-50 rounded-full border-2 border-dashed italic text-slate-400">Custom pricing tiers available in admin.</div>
                @endforelse
            </div>
            
            <a href="{{ route('graphics.pricing') }}" class="mt-20 inline-block text-[10px] font-black text-blue-600 uppercase tracking-[0.3em] hover:text-blue-700 underline underline-offset-8">VIEW ALL PRICING</a>
        </div>
    </section>

    {{-- ── 4. CTA SECTION ── --}}
    <section class="py-32 bg-white border-t border-slate-100 text-[#0b2b3d]">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <h2 class="text-2xl md:text-4xl font-black italic uppercase tracking-tighter mb-4">Need Accurate Pricing? Send Us a Quote Request</h2>
            <p class="text-slate-400 font-bold italic mb-12">We Usually Reply Within 10 Minutes</p>

            <div class="max-w-xl mx-auto p-12 bg-[#f8fafc] rounded-[3rem] border-2 border-dashed border-slate-200 group hover:border-blue-500 transition-all cursor-pointer shadow-lg mb-20 overflow-hidden relative">
                <div class="relative z-10 flex flex-col items-center">
                    <p class="text-[10px] font-black text-slate-400 mb-6 uppercase tracking-widest italic leading-tight">Upload Your Files (max 500mb/file, 5 files only)</p>
                    <div class="flex items-center gap-4 px-10 py-4 bg-[#5082b4] text-white rounded-lg shadow-xl font-black uppercase text-xs tracking-[0.2em] hover:bg-blue-600 transition-all">
                        <i class="ri-upload-cloud-fill text-2xl"></i>
                        Upload Files
                    </div>
                </div>
            </div>

            {{-- Testimonial Peek --}}
            <div class="mb-20">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 rounded-full bg-slate-200 border-4 border-white shadow-xl mb-6 overflow-hidden">
                        <i class="ri-user-3-fill text-5xl text-slate-300 mt-4 inline-block"></i>
                    </div>
                    <div class="max-w-2xl px-6">
                        <p class="text-[15px] font-medium italic text-slate-500 leading-relaxed">"These are perfect and exactly what I was looking for. Thank you so much!!! As always, a job well done and executed with excellence!!"</p>
                    </div>
                </div>
            </div>

            {{-- ── LATEST BLOG ── --}}
            <div class="mt-32">
                 <h2 class="text-[11px] font-black text-cyan-500 uppercase tracking-[0.4em] mb-4">Color Experts</h2>
                 <h3 class="text-4xl font-black uppercase tracking-tighter mb-16">Latest Blog Update</h3>
                 <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-left">
                    @php $blogPosts = \App\Models\BlogPost::latest()->limit(4)->get(); @endphp
                    @foreach($blogPosts as $post)
                    <a href="{{ route('graphics.blog.single', $post->slug) }}" class="group block">
                        <div class="aspect-video rounded-xl overflow-hidden mb-6 bg-slate-100 border border-slate-200 relative">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover grayscale brightness-90 group-hover:grayscale-0 transition-all duration-700">
                            <div class="absolute top-0 right-0 px-3 py-1 bg-cyan-400 text-white text-[9px] font-black uppercase">Blog</div>
                        </div>
                        <h4 class="text-xs font-black uppercase italic leading-tight group-hover:text-blue-600 transition-colors">{{ $post->title }}</h4>
                    </a>
                    @endforeach
                 </div>
            </div>
        </div>
    </section>

</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap');
    .font-sans { font-family: 'Outfit', sans-serif; }
    .checkerboard-bg {
        background-color: #ffffff;
        background-image: linear-gradient(45deg, #f0f0f0 25%, transparent 25%), 
                          linear-gradient(-45deg, #f0f0f0 25%, transparent 25%), 
                          linear-gradient(45deg, transparent 75%, #f0f0f0 75%), 
                          linear-gradient(-45deg, transparent 75%, #f0f0f0 75%);
        background-size: 20px 20px;
        background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
    }
</style>
@endsection
