@php 
    /** @var \App\Models\Service $service */ 
@endphp
@extends('layouts.app')
@section('title', $service->name . ' | Graphics Studio')
@section('meta_description', Str::limit(strip_tags($service->description ?? ''), 160))

@section('content')
<div class="bg-white min-h-screen font-sans selection:bg-blue-600 selection:text-white">

    {{-- ── 1. PAGE TITLE BANNER (Exact to reference) ── --}}
    <div class="bg-[#404a50] pt-44 pb-28 text-center leading-none">
        <h1 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tighter">{{ $service->name }}</h1>
    </div>

    {{-- ── 2. STATS STRIP (Dark Indigo) ── --}}
    <div class="bg-[#0f172a] py-6 border-t border-white/5">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex items-center justify-center gap-4 border-r border-white/10 last:border-0 px-4">
                    <i class="ri-price-tag-3-fill text-yellow-400 text-2xl"></i>
                    <div class="text-left">
                        <p class="text-[10px] uppercase font-bold text-slate-400 leading-none mb-1">Price Starts From</p>
                        <h4 class="text-xl font-black text-white leading-none">${{ number_format($service->starting_price ?? 0.25, 2) }}</h4>
                        <p class="text-[9px] text-slate-500 mt-1 uppercase">{{ $service->price_unit ?? 'Per Image' }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-4 border-r border-white/10 last:border-0 px-4">
                    <i class="ri-shopping-cart-2-fill text-blue-400 text-2xl"></i>
                    <div class="text-left">
                        <p class="text-[10px] uppercase font-bold text-slate-400 leading-none mb-1">Get Big Discount</p>
                        <h4 class="text-xl font-black text-white leading-none">{{ $service->discount_upto ?? 40 }}%</h4>
                        <p class="text-[9px] text-slate-500 mt-1 uppercase">{{ $service->discount_tag ?? 'On Bulk Order' }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-4 border-r border-white/10 last:border-0 px-4">
                    <i class="ri-truck-fill text-emerald-400 text-2xl"></i>
                    <div class="text-left">
                        <p class="text-[10px] uppercase font-bold text-slate-400 leading-none mb-1">We Can Deliver</p>
                        <h4 class="text-xl font-black text-white leading-none">{{ number_format($service->delivery_capacity ?? 5000) }}</h4>
                        <p class="text-[9px] text-slate-500 mt-1 uppercase">{{ $service->delivery_unit ?? 'Images/Day' }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-4 border-0 px-4">
                    <i class="ri-shield-check-fill text-cyan-400 text-2xl"></i>
                    <div class="text-left">
                        <p class="text-[10px] uppercase font-bold text-slate-400 leading-none mb-1">Comprehensive QA</p>
                        <h4 class="text-xl font-black text-white leading-none">6+</h4>
                        <p class="text-[9px] text-slate-500 mt-1 uppercase">Steps</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── 3. INTRO SECTION (Title + Video Mockup) ── --}}
    <section class="py-20 bg-[#f8fafc]">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-col lg:flex-row items-start gap-12">
                {{-- Left Side --}}
                <div class="w-full lg:w-7/12">
                    <h2 class="text-2xl font-black text-[#082f49] mb-8 border-b-2 border-slate-200 pb-2 inline-block">{{ $service->name }}</h2>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-4 text-justify">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                    <div class="mt-4 flex gap-2">
                        @if($service->serviceCategory)
                        <span class="px-2 py-1 bg-slate-100 text-[10px] font-bold text-slate-500 rounded ring-1 ring-slate-200 uppercase">{{ $service->serviceCategory->name }}</span>
                        @endif
                        @if($service->subCategory)
                        <span class="px-2 py-1 bg-slate-100 text-[10px] font-bold text-slate-500 rounded ring-1 ring-slate-200 uppercase">{{ $service->subCategory->name }}</span>
                        @endif
                    </div>
                </div>

                {{-- Right Side (iMac Mockup Style) --}}
                <div class="w-full lg:w-5/12">
                    <div class="relative p-2 bg-slate-200 rounded-3xl shadow-xl">
                        <div class="aspect-video bg-black rounded-2xl overflow-hidden relative">
                            @if($service->video_url)
                                @php 
                                    $videoId = '';
                                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $service->video_url, $match)) {
                                        $videoId = $match[1];
                                    }
                                @endphp
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}?rel=0" frameborder="0" allowfullscreen></iframe>
                            @else
                                <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=800' }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-full flex items-center justify-center cursor-pointer hover:scale-110 transition-transform">
                                        <i class="ri-play-fill text-3xl text-white"></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- Stand Base --}}
                        <div class="h-4 w-32 bg-slate-300 mx-auto rounded-b-xl"></div>
                        <div class="h-1 w-48 bg-slate-400 mx-auto opacity-50"></div>
                    </div>
                    <div class="mt-8 flex justify-center gap-4">
                        <a href="#" class="px-6 py-2.5 bg-[#4170b9] text-white text-[10px] font-black uppercase rounded shadow-lg hover:bg-blue-700 transition-all">See Free Trial</a>
                        <a href="#" class="px-6 py-2.5 bg-[#648bcd] text-white text-[10px] font-black uppercase rounded shadow-lg hover:bg-blue-600 transition-all">Get A Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 4. DIFFERENCES TABLE (Exact to reference) ── --}}
    @if(!empty($service->features))
    <section class="py-20 border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-xl font-black text-[#082f49] mb-8 text-center uppercase italic">{{ $service->features_table_heading ?? 'Differences between Basic and other Clipping Paths' }}</h2>
            <div class="overflow-x-auto rounded-xl border border-slate-200">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-[#f1f5f9] border-b border-slate-200">
                            <th class="px-6 py-4 font-black text-slate-600 uppercase text-[11px] tracking-widest">Feature Comparison</th>
                            <th class="px-6 py-4 font-black text-slate-600 uppercase text-[11px] tracking-widest text-center">{{ $service->name }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($service->features as $f)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 font-bold text-slate-600">{{ $f['name'] ?? 'Detail' }}</td>
                            <td class="px-6 py-4 text-center font-black text-blue-600">{{ $f['price'] ?? 'Yes' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endif

    {{-- ── 5. INTERACTIVE PROCESS (Text List + Slider) ── --}}
    <section class="py-20 bg-[#f8fafc]">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-xl font-black text-[#082f49] mb-12 uppercase border-l-4 border-blue-600 pl-4 tracking-tight">May you need {{ $service->name }}</h2>
            
            <div class="flex flex-col lg:flex-row items-center gap-16">
                {{-- Text List (Dynamic Bullets) --}}
                <ul class="w-full lg:w-1/2 space-y-4">
                    @forelse($service->summary_bullets ?? [] as $bullet)
                    <li class="flex gap-3 text-slate-600 text-sm italic items-start">
                        <span class="text-blue-600 text-lg mt-[-4px]">●</span>
                        <span>{!! $bullet !!}</span>
                    </li>
                    @empty
                    <li class="flex gap-3 text-slate-600 text-sm italic items-start">
                        <span class="text-blue-600 text-lg mt-[-4px]">●</span>
                        <span>Professional precision and high-end results guaranteed.</span>
                    </li>
                    @endforelse
                </ul>

                {{-- Interactive Comparer (Alpine.js) --}}
                <div class="w-full lg:w-1/2">
                    <div class="relative aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl border-4 border-white"
                        x-data="{ position: 50 }"
                        @mousemove="position = Math.max(0, Math.min(100, (($event.clientX - $el.getBoundingClientRect().left) / $el.getBoundingClientRect().width) * 100))"
                        @touchmove.passive="position = Math.max(0, Math.min(100, (($event.touches[0].clientX - $el.getBoundingClientRect().left) / $el.getBoundingClientRect().width) * 100))"
                    >
                        <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1000' }}" class="w-full h-full object-cover">
                        <div class="absolute inset-x-0 bottom-6 right-6 flex justify-end">
                            <span class="px-3 py-1 bg-black/80 text-white text-[9px] font-black uppercase tracking-widest rounded">AFTER</span>
                        </div>
                        
                        <div class="absolute inset-0 z-10" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                            <img src="{{ $service->image_before ? asset('storage/' . $service->image_before) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1000&sat=-100' }}" class="w-full h-full object-cover grayscale brightness-75">
                            <div class="absolute inset-x-0 bottom-6 left-6 flex justify-start">
                                <span class="px-3 py-1 bg-black/80 text-white text-[9px] font-black uppercase tracking-widest rounded">BEFORE</span>
                            </div>
                        </div>

                        {{-- Vertical Handler --}}
                        <div class="absolute top-0 bottom-0 z-20 w-0.5 bg-white transition-all shadow-lg" :style="'left: ' + position + '%'"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

            <div class="mt-12 flex gap-4">
                <a href="#" class="px-8 py-3 bg-[#648bcd] text-white text-[11px] font-black uppercase rounded shadow-md hover:bg-blue-600 transition-all">Free Trial</a>
                <a href="#" class="px-8 py-3 bg-[#4170b9] text-white text-[11px] font-black uppercase rounded shadow-md hover:bg-blue-700 transition-all">Order Now</a>
            </div>
        </div>
    </section>

    {{-- ── 7. NECESSITY SECTION (Side-by-side Images) ── --}}
    <section class="py-20 bg-slate-50 border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="w-full lg:w-1/2">
                    <h2 class="text-xl font-black text-[#082f49] mb-8 uppercase tracking-tight">The necessity of {{ $service->name }}</h2>
                    <div class="text-slate-600 text-sm leading-relaxed space-y-6 italic">
                        @if($service->necessity_text)
                            {!! nl2br(e($service->necessity_text)) !!}
                        @else
                            <p>In the digital world, image quality is everything. Without a precise path, your products look unprofessional and disconnected. Our Senior Editors meticulously craft each path to ensure your products stand out on every eCommerce platform.</p>
                            <p>Whether it's Amazon, eBay or your personal website, pixel-perfection is the key to conversion. Our {{ $service->name }} ensures zero jagged edges and perfect alignment.</p>
                        @endif
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative group cursor-pointer overflow-hidden rounded-xl border-4 border-white shadow-lg">
                            <img src="{{ $service->image_before ? asset('storage/' . $service->image_before) : 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=600&sat=-100' }}" class="w-full aspect-square object-cover grayscale brightness-75">
                            <div class="absolute inset-x-0 bottom-4 left-4">
                                <span class="px-3 py-1 bg-black/80 text-white text-[9px] font-black uppercase tracking-widest rounded-lg">BEFORE</span>
                            </div>
                        </div>
                        <div class="relative group cursor-pointer overflow-hidden rounded-xl border-4 border-white shadow-lg">
                            <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?w=600' }}" class="w-full aspect-square object-cover">
                            <div class="absolute inset-x-0 bottom-4 right-4 text-right">
                                <span class="px-3 py-1 bg-blue-600/90 text-white text-[9px] font-black uppercase tracking-widest rounded-lg">AFTER</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── 8. POPULAR SERVICES (Dynamic from L3 Services) ── --}}
    @php
        $popularServices = \App\Models\Service::whereNull('parent_id')
            ->where('id', '!=', $service->id)
            ->where('is_active', true)
            ->limit(3)
            ->get();
    @endphp

    @if($popularServices->count() > 0)
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black text-[#082f49] uppercase tracking-tighter mb-4 leading-none">Our Popular Services</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($popularServices as $popular)
                <div class="group">
                    <div class="relative aspect-[4/3] rounded-xl overflow-hidden shadow-lg border border-slate-100 mb-6"
                         x-data="{ position: 50 }"
                         @mousemove="position = Math.max(0, Math.min(100, (($event.clientX - $el.getBoundingClientRect().left) / $el.getBoundingClientRect().width) * 100))"
                         @touchmove.passive="position = Math.max(0, Math.min(100, (($event.touches[0].clientX - $el.getBoundingClientRect().left) / $el.getBoundingClientRect().width) * 100))"
                    >
                        <img src="{{ $popular->image_after ? asset('storage/' . $popular->image_after) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600' }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 z-10" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                             <img src="{{ $popular->image_before ? asset('storage/' . $popular->image_before) : 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&sat=-100' }}" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute top-0 bottom-0 z-20 w-0.5 bg-white shadow-xl" :style="'left: ' + position + '%'"></div>
                    </div>

                    <h3 class="text-lg font-black text-[#082f49] mb-3 uppercase tracking-tight text-center truncate group-hover:text-blue-600 transition-colors">{{ $popular->name }}</h3>
                    <p class="text-slate-500 text-xs leading-relaxed text-center mb-6 line-clamp-3">
                        {{ Str::limit(strip_tags($popular->description), 120) }}
                    </p>
                    <div class="flex gap-2 justify-center">
                        <a href="{{ route('graphics.service-detail', $popular->slug) }}" class="px-5 py-2 bg-[#648bcd] text-white text-[9px] font-black uppercase rounded shadow-sm hover:bg-blue-600 transition-all">See Free Trial</a>
                        <a href="{{ route('graphics.service-detail', $popular->slug) }}" class="px-5 py-2 bg-[#4170b9] text-white text-[9px] font-black uppercase rounded shadow-sm hover:bg-blue-700 transition-all">Get A Quote</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ── 9. TESTIMONIALS (Dynamic from DB) ── --}}
    @php
        $testimonials = \App\Models\Testimonial::where('is_active', true)->orderBy('sort_order')->limit(2)->get();
    @endphp

    @if($testimonials->count() > 0)
    <section class="py-24 bg-slate-50 border-t border-slate-100">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black text-[#082f49] uppercase tracking-tighter mb-4 leading-none">Testimonials</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                @foreach($testimonials as $testi)
                <div class="p-10 bg-white rounded-2xl shadow-xl border border-slate-100 relative group">
                    <i class="ri-double-quotes-l text-4xl text-blue-100 absolute top-6 left-6 group-hover:text-blue-200 transition-colors"></i>
                    <div class="relative z-10">
                        <p class="text-slate-600 text-sm leading-relaxed mb-8 italic">
                            "{{ $testi->content }}"
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full overflow-hidden bg-slate-200 border-2 border-white shadow-md">
                                @if($testi->avatar)
                                    <img src="{{ asset('storage/' . $testi->avatar) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400"><i class="ri-user-3-fill text-2xl"></i></div>
                                @endif
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-[#082f49] uppercase tracking-tight">{{ $testi->name }}</h4>
                                <p class="text-[10px] text-blue-600 font-bold uppercase tracking-widest">{{ $testi->designation }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</div>

<style>
    /* Mimic the reference link/button styles */
    .font-sans { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
</style>
@endsection
