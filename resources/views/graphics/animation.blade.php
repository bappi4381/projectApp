@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories ?? [], 'theme' => 'light'])
@endsection

@section('title', $service->name . ' | Animation Services | Graphics Studio')

@section('content')
<div class="bg-white min-h-screen text-slate-800 font-sans selection:bg-emerald-500 selection:text-white overflow-x-hidden">

    {{-- ── 1. HERO SECTION ── --}}
    <section class="relative pt-44 pb-32 bg-[#0b2b3d] text-white overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=1920&q=80" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-[#0b2b3d]/80 to-[#0b2b3d]"></div>
        
        <div class="container mx-auto px-6 max-w-7xl relative z-10 text-center">
            <h1 class="text-5xl md:text-7xl font-black uppercase tracking-tighter mb-4">{{ $service->name }}</h1>
            <div class="flex items-center justify-center gap-2 text-emerald-400 font-bold uppercase text-xs tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                <span>/</span>
                <span class="text-white">Animation</span>
            </div>
        </div>
    </section>

    {{-- ── 2. BRANDING IN ANIMATION ── --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="w-full lg:w-1/2">
                    <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d?auto=format&fit=crop&w=800&q=80" class="w-full rounded-3xl shadow-2xl">
                </div>
                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <h2 class="text-3xl md:text-4xl font-black text-[#0b2b3d] uppercase mb-6 leading-tight">Branding In <br> <span class="text-emerald-500">Animation</span></h2>
                    <p class="text-slate-500 text-lg leading-relaxed mb-8">
                        The current marketing era is visual. An animation is an attractive way to present your brand to your target audience. It helps in explaining complex ideas in a simple, engaging, and memorable way.
                    </p>
                    <div class="flex justify-center lg:justify-start gap-1">
                        @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['emerald-500','yellow-400','blue-400','slate-800'][$i] }} rounded-sm"></div> @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 3. OUR ANIMATION SERVICES ── --}}
    <section class="py-24 bg-slate-50">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-[#0b2b3d] uppercase mb-4">Our Animation Services</h2>
                <p class="text-slate-500 text-sm max-w-2xl mx-auto italic">Everything you need to bring your visual brand stories to life through expert animation and motion graphics.</p>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['emerald-500','yellow-400','blue-400','slate-800'][$i] }} rounded-sm"></div> @endfor
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $animServices = [
                        ['title' => 'Logo Animation', 'img' => 'https://images.unsplash.com/photo-1572044162444-ad60f128bde2?w=400'],
                        ['title' => 'Frame By Frame Animation', 'img' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=400'],
                        ['title' => 'Brand Animation', 'img' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?w=400'],
                        ['title' => 'Web Animation', 'img' => 'https://images.unsplash.com/photo-1551288049-bbbda5366391?w=400'],
                        ['title' => '2D Animation', 'img' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w=400'],
                        ['title' => 'Educational Animation', 'img' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400']
                    ];
                @endphp
                @foreach($animServices as $item)
                    <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-slate-100">
                        <div class="aspect-video overflow-hidden bg-slate-100 relative">
                            <img src="{{ $item['img'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-emerald-500/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-xs font-black text-[#0b2b3d] uppercase tracking-widest group-hover:text-emerald-500 transition-colors">{{ $item['title'] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── 4. WHY AN ANIMATED VIDEO? ── --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-black text-[#0b2b3d] uppercase mb-4 tracking-tighter">Why An <br> <span class="text-emerald-500">Animated Video?</span></h2>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['emerald-500','yellow-400','blue-400','slate-800'][$i] }} rounded-sm"></div> @endfor
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-px bg-slate-100 border border-slate-100 rounded-3xl overflow-hidden">
                @php
                    $reasons = [
                        ['title' => 'Cost Effective', 'desc' => 'Animated videos are often more affordable than live-action shoots, offering high production value at a fraction of the cost.', 'icon' => 'ri-money-dollar-circle-line'],
                        ['title' => 'More Engaging', 'desc' => 'Animation captures attention quickly and keeps viewers hooked with dynamic visuals and creative storytelling.', 'icon' => 'ri-user-star-line'],
                        ['title' => 'Easy To Update', 'desc' => 'Need to change a detail? Animations can be modified easily compared to re-shooting live video content.', 'icon' => 'ri-edit-2-line'],
                        ['title' => 'Impact In Buying Products', 'desc' => 'Studies show that animation significantly increases conversion rates by simplifying product benefits.', 'icon' => 'ri-shopping-cart-2-line']
                    ];
                @endphp
                @foreach($reasons as $reason)
                    <div class="bg-white p-12 hover:bg-slate-50 transition-colors group">
                        <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-500 flex items-center justify-center text-3xl mb-6 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            <i class="{{ $reason['icon'] }}"></i>
                        </div>
                        <h3 class="text-lg font-black text-[#0b2b3d] uppercase mb-3 tracking-tight">{{ $reason['title'] }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">{{ $reason['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── 5. PRICING SECTION ── --}}
    <section class="py-24 bg-slate-50 border-t border-slate-200">
        <div class="container mx-auto px-6 max-w-2xl text-center">
            <span class="text-xs font-black text-emerald-500 uppercase tracking-[0.3em] mb-3 block">Pricing</span>
            <h2 class="text-3xl md:text-4xl font-black uppercase text-[#0b1f3a] mb-4">How We Quote</h2>
            <div class="flex justify-center gap-1 mb-10">
                @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['emerald-500','yellow-400','blue-400','slate-800'][$i] }} rounded-sm"></div> @endfor
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
                <a href="{{ route('graphics.video-quote') }}" class="inline-block px-12 py-4 bg-[#1ebba3] hover:bg-emerald-600 text-white font-black uppercase tracking-widest text-xs rounded-md shadow-xl transition-all active:scale-95">Get A Quote</a>
            </div>
        </div>
    </section>

    {{-- ── 6. TESTIMONIALS ── --}}
    @include('graphics.partials.testimonials')

    {{-- ── 7. BLOG UPDATE ── --}}
    <section class="py-24 bg-white border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-7xl">
            <div class="text-center mb-16">
                <span class="text-xs font-black text-emerald-500 uppercase tracking-widest mb-2 block">Color Experts</span>
                <h2 class="text-3xl font-black uppercase text-[#082f49]">Latest Blog Update</h2>
                <div class="flex justify-center gap-1 mt-6">
                    @for($i=0;$i<4;$i++) <div class="w-3 h-3 bg-{{ ['emerald-500','yellow-400','blue-400','slate-800'][$i] }} rounded-sm"></div> @endfor
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
                            <div class="absolute top-0 right-0 px-3 py-1 bg-emerald-500 text-white text-[9px] font-black uppercase tracking-widest">Blog</div>
                        </div>
                        <h4 class="text-xs font-black uppercase italic leading-tight group-hover:text-emerald-600 transition-colors">{{ $post->title }}</h4>
                        <div class="mt-4 flex items-center gap-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                            <i class="ri-calendar-line text-emerald-500"></i> {{ $post->created_at->format('M d, Y') }}
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
