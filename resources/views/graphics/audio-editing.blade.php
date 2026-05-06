@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories ?? [], 'theme' => 'light'])
@endsection

@section('title', $service->name . ' | Graphics Studio')

@section('content')
<div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-blue-500 selection:text-white overflow-x-hidden">

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
                        Premium Audio Services
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight mb-6 uppercase tracking-tighter">
                        @php
                            $words = explode(' ', $service->name);
                            $lastWord = count($words) > 1 ? array_pop($words) : '';
                            $firstPart = implode(' ', $words);
                        @endphp
                        {{ $firstPart }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">{{ $lastWord }}</span>
                    </h1>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                         {{ $service->description ?? 'Color Experts deals with a lot of tasks to improve audio quality and make it more authentic.' }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('graphics.video-quote') }}" class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-lg shadow-lg shadow-blue-600/30 hover:shadow-blue-600/50 hover:-translate-y-1 transition-all duration-300">
                            Get A Quote
                        </a>
                    </div>
                </div>

                {{-- Right Side: Image Showcase --}}
                <div class="w-full lg:w-1/2 relative group">
                    <div class="absolute -inset-4 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-3xl blur-2xl opacity-20 group-hover:opacity-40 transition duration-700"></div>
                    <div class="relative bg-white p-2 rounded-2xl shadow-2xl border border-slate-100 overflow-hidden z-10">
                        <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=800' }}" class="w-full h-full object-cover rounded-xl transition-transform duration-700 group-hover:scale-105">
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ── 2. RECENT SAMPLES ── --}}
    @php
        $samples = collect();
        
        // 1. Add top-level service audio file if exists
        if($service->audio_file) {
            $samples->push([
                'title' => $service->name . ' (Main)',
                'file' => $service->audio_file,
                'is_main' => true
            ]);
        }

        // 2. Add variants with audio
        if($service->variants && $service->variants->count() > 0) {
            $samples = $samples->concat($service->variants);
        }

        // 3. Add work samples from JSON
        if($service->work_samples && is_array($service->work_samples)) {
            $samples = $samples->concat($service->work_samples);
        }
    @endphp

    @if($samples->count() > 0)
    <section id="samples" class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <span class="text-xs font-black text-blue-600 uppercase tracking-widest mb-2 block">Recent Work</span>
                <h2 class="text-3xl md:text-4xl font-black text-[#0b2b3d] uppercase tracking-tight">Recent <span class="text-blue-600">Samples</span></h2>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['blue-600','yellow-400','emerald-500','slate-800'][$i] }} rounded-sm"></div> @endfor
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($samples as $sample)
                    @php
                        $isModel = $sample instanceof \Illuminate\Database\Eloquent\Model;
                        $title = $isModel ? $sample->name : ($sample['title'] ?? 'Audio Sample');
                        
                        // Determine the correct file path
                        $filePath = '';
                        if($isModel) {
                            $filePath = $sample->audio_file ?? '';
                        } else {
                            $filePath = $sample['file'] ?? ($sample['file_path'] ?? '');
                        }
                        
                        $audioUrl = $filePath ? asset('storage/' . $filePath) : '';
                    @endphp
                    @if($audioUrl)
                    <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 group hover:shadow-xl transition-all duration-500">
                        <div class="flex items-center gap-6 mb-6">
                            <div class="w-16 h-16 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-3xl shadow-lg shadow-blue-600/20">
                                <i class="ri-music-2-line"></i>
                            </div>
                            <div>
                                <h3 class="font-black text-[#0b2b3d] uppercase tracking-tight">{{ $title }}</h3>
                                <p class="text-slate-500 text-sm italic">Professional audio processing</p>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm">
                            <audio controls class="w-full">
                                <source src="{{ $audioUrl }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ── 3. PRICING SECTION ── --}}
    <section class="py-24 bg-slate-50 border-y border-slate-200">
        <div class="container mx-auto px-6 max-w-2xl text-center">
            <span class="text-xs font-black text-blue-600 uppercase tracking-[0.3em] mb-3 block">Pricing</span>
            <h2 class="text-3xl md:text-4xl font-black uppercase text-[#0b1f3a] mb-4">How We Quote</h2>
            <div class="flex justify-center gap-1 mb-10">
                @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['blue-600','yellow-400','emerald-500','slate-800'][$i] }} rounded-sm"></div> @endfor
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
                @foreach($videoPricings as $pricing)
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
                @endforeach
            </div>

            <div class="mt-12">
                <a href="{{ route('graphics.video-quote') }}" class="inline-block px-12 py-4 bg-blue-600 hover:bg-blue-700 text-white font-black uppercase tracking-widest text-xs rounded-md shadow-xl transition-all">Get A Quote</a>
            </div>
        </div>
    </section>

    {{-- ── 4. WHAT OUR CLIENT'S SAY ── --}}
    @include('graphics.partials.testimonials')

    {{-- ── 5. LATEST BLOG UPDATE ── --}}
    <section class="py-24 bg-white border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16">
                <span class="text-xs font-black text-blue-600 uppercase tracking-widest mb-2 block">Knowledge Base</span>
                <h2 class="text-3xl font-black uppercase text-[#082f49]">Latest Blog Update</h2>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['blue-600','yellow-400','emerald-500','slate-800'][$i] }} rounded-sm"></div> @endfor
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
                                 class="w-full h-full object-cover brightness-95 group-hover:scale-105 transition-all duration-700">
                            <div class="absolute top-0 right-0 px-3 py-1 bg-blue-600 text-white text-[9px] font-black uppercase tracking-widest">Blog</div>
                        </div>
                        <h4 class="text-xs font-black uppercase italic leading-tight group-hover:text-blue-600 transition-colors line-clamp-2">{{ $post->title }}</h4>
                        <div class="mt-4 flex items-center gap-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                            <i class="ri-calendar-line text-blue-600"></i> {{ $post->created_at->format('M d, Y') }}
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
