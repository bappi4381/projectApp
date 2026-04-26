@extends('layouts.app')
@section('title', 'Video Editing Cost & Pricing | Graphics Studio')
@section('meta_description', 'Professional video editing cost and pricing plans. Transparent rates for Basic, Medium and Advanced video production services.')

@section('content')

    {{-- ── HERO ── --}}
    <div class="relative pt-36 pb-28 overflow-hidden bg-[#0b1f3a]">
        <div class="absolute inset-0 opacity-20"
            style="background-image: radial-gradient(#ffffff22 1px, transparent 1px); background-size: 28px 28px;"></div>
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-400/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
            <div
                class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 text-cyan-400 text-xs font-black uppercase tracking-widest mb-6">
                <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></span> Transparent Pricing
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tight mb-6 leading-tight">
                Video Editing <span class="text-cyan-400">Cost</span>
            </h1>
            <p class="text-white/60 text-lg md:text-xl font-light max-w-2xl mx-auto mb-10">
                Transparent and Flexible Pricing for Professional Video Production Services
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('graphics.get-quote') }}"
                    class="px-8 py-4 bg-cyan-500 hover:bg-cyan-400 text-white font-black uppercase tracking-widest text-xs rounded-xl transition-all shadow-xl shadow-cyan-500/30 active:scale-95">
                    Get A Quote
                </a>
                <a href="{{ route('graphics.upload') }}"
                    class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-black uppercase tracking-widest text-xs rounded-xl border border-white/20 transition-all">
                    Upload Files
                </a>
            </div>

            {{-- Trust Badges --}}
            <div class="mt-12 flex flex-wrap items-center justify-center gap-8 text-sm text-white/50">
                @foreach(['10+ Years Experience', '100% Satisfaction', '24/7 Support', 'Quick Turnaround'] as $badge)
                    <div class="flex items-center gap-2">
                        <i class="ri-check-double-line text-cyan-400"></i> {{ $badge }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── PRICING SECTION ── --}}
    <div class="bg-[#f4f8fb] min-h-screen pb-24" x-data="{ activeTab: 0 }">

        {{-- Service Tab Navigation --}}
        @if($videoServices->count() > 0)
            <div class="max-w-5xl mx-auto px-6 -mt-6 relative z-30">
                <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-2 flex flex-wrap justify-center gap-2">
                    @foreach($videoServices as $index => $svc)
                        <button @click="activeTab = {{ $index }}" :class="activeTab === {{ $index }}
                                ? 'bg-[#0b1f3a] text-white shadow-lg shadow-slate-900/20'
                                : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800'"
                            class="px-6 py-3 rounded-xl text-xs font-black uppercase tracking-widest transition-all duration-300">
                            {{ $svc->service_name }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="max-w-6xl mx-auto px-6 pt-16">

            @forelse($videoServices as $index => $svc)
                @php
                    $tiers = $svc->pricing_tiers ?? [];
                    if (empty($tiers)) {
                        $tiers = [
                            ['title' => 'Basic', 'price' => '15', 'unit' => 'per hour', 'highlight' => false, 'features' => ['Duration of the Video', 'Visual Graphics', 'Video Transitions', 'Color Grading', 'Turn Around Time', 'Seamless loop', 'Character Design']],
                            ['title' => 'Medium', 'price' => '20', 'unit' => 'per hour', 'highlight' => true, 'features' => ['Duration of the Video', 'Visual Graphics', 'Video Transitions', 'Color Grading', 'Turn Around Time', 'Seamless loop', 'Character Design']],
                            ['title' => 'Advanced', 'price' => '25', 'unit' => 'per hour', 'highlight' => false, 'features' => ['Duration of the Video', 'Visual Graphics', 'Video Transitions', 'Color Grading', 'Turn Around Time', 'Seamless loop', 'Character Design']],
                        ];
                    }
                @endphp

                <div x-show="activeTab === {{ $index }}" x-cloak x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">

                    {{-- Section Heading --}}
                    <div class="text-center mb-12">
                        <h2 class="text-3xl md:text-4xl font-black text-[#0b1f3a] uppercase tracking-tight mb-4">
                            {{ $svc->service_name }}</h2>
                        <div class="flex justify-center gap-2 mb-4">
                            <span class="w-4 h-1.5 bg-green-400 rounded-full"></span>
                            <span class="w-4 h-1.5 bg-yellow-400 rounded-full"></span>
                            <span class="w-4 h-1.5 bg-cyan-500 rounded-full"></span>
                            <span class="w-4 h-1.5 bg-[#0b1f3a] rounded-full"></span>
                        </div>
                    </div>

                    {{-- Pricing Cards --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
                        @foreach($tiers as $tier)
                            @php $isHighlight = $tier['highlight'] ?? false; @endphp
                            <div class="flex flex-col rounded-lg overflow-hidden border transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl
                                {{ $isHighlight ? 'border-[#12537e] shadow-xl' : 'border-slate-200 shadow-md' }}">

                                {{-- Header Bar --}}
                                <div class="py-4 px-6 text-center {{ $isHighlight ? 'bg-[#12537e]' : 'bg-[#3ab1d8]' }}">
                                    <h3 class="text-sm font-black uppercase tracking-[0.2em] text-white">{{ $tier['title'] }}</h3>
                                </div>

                                {{-- White Body --}}
                                <div class="bg-white flex-1 flex flex-col">
                                    {{-- Price --}}
                                    <div class="pt-8 pb-3 px-8 text-center">
                                        @if(!empty($tier['price']) && $tier['price'] !== '-')
                                            <div class="flex items-start justify-center">
                                                <span class="text-2xl font-bold text-slate-700 mt-2">$</span>
                                                <span class="text-6xl font-black leading-none {{ $isHighlight ? 'text-[#12537e]' : 'text-[#0b1f3a]' }}">{{ $tier['price'] }}</span>
                                                <span class="text-xl font-bold text-slate-400 mt-2">*</span>
                                                <span class="text-sm text-slate-400 mt-3.5 ml-1">/Per hour</span>
                                            </div>
                                        @else
                                            <div class="text-4xl font-black text-[#0b1f3a] py-4">Custom</div>
                                        @endif
                                    </div>

                                    {{-- Factors Label --}}
                                    <div class="px-6 pb-4 text-center">
                                        <p class="text-[#3ab1d8] text-xs font-semibold leading-snug">Pricing varies based on the following factors:</p>
                                    </div>

                                    {{-- Feature List --}}
                                    <div class="px-6 flex-1">
                                        @php $features = $tier['features'] ?? []; @endphp
                                        @if(is_array($features) && count($features) > 0)
                                            @foreach($features as $fi => $feature)
                                                <div class="py-2.5 {{ $fi > 0 ? 'border-t border-slate-100' : '' }} flex items-center gap-2.5">
                                                    <span class="w-2 h-2 rounded-full {{ $isHighlight ? 'bg-[#12537e]' : 'bg-[#3ab1d8]' }} shrink-0"></span>
                                                    <span class="text-slate-700 text-sm font-medium">{{ $feature }}</span>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-slate-400 text-xs italic py-4 text-center">Features listed on request.</p>
                                        @endif
                                    </div>

                                    {{-- CTA --}}
                                    <div class="px-6 py-7">
                                        <a href="{{ route('graphics.get-quote') }}"
                                            class="block w-full py-3 text-center rounded-full font-black text-xs uppercase tracking-widest transition-all duration-300
                                            {{ $isHighlight
                                                ? 'bg-[#12537e] text-white hover:bg-[#0e4266] shadow-lg'
                                                : 'border-2 border-[#3ab1d8] text-[#3ab1d8] hover:bg-[#3ab1d8] hover:text-white' }}">
                                            Get A Quote
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Note --}}
                    <p class="text-center text-xs text-slate-400 italic mb-20">* Prices may vary depending on project complexity. Contact us for a custom quote.</p>

                </div>
            @empty
                <div class="text-center py-24 text-slate-400">
                    <i class="ri-vidicon-off-line text-6xl mb-4 block opacity-30"></i>
                    <p class="font-bold uppercase tracking-widest">No pricing data available yet.</p>
                    <p class="text-sm mt-2">Add services from the admin panel.</p>
                </div>
            @endforelse

        </div>
    </div>

    {{-- ── PRICING FACTORS ── --}}
    <div class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-[#f4f8fb] rounded-[3rem] overflow-hidden shadow-xl border border-slate-100">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <div class="p-12 md:p-16 flex flex-col justify-center">
                        <span class="text-xs font-black text-[#3ab1d8] uppercase tracking-[0.3em] mb-3 block">Pricing Variables</span>
                        <h2 class="text-3xl md:text-4xl font-black text-[#0b1f3a] leading-tight mb-6">
                            Pricing varies based on the <span class="text-[#3ab1d8] underline underline-offset-4 decoration-[#3ab1d8]/30">following factors</span>
                        </h2>
                        <p class="text-slate-500 mb-10 leading-relaxed">Understanding what affects your video production cost helps you plan your budget accurately.</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach([
                                ['icon' => 'ri-time-line',      'title' => 'Duration of Video', 'desc' => 'Length of the final edit'],
                                ['icon' => 'ri-magic-line',      'title' => 'Visual Graphics',   'desc' => '2D/3D motion elements'],
                                ['icon' => 'ri-swap-box-line',   'title' => 'Transitions',       'desc' => 'Scene change complexity'],
                                ['icon' => 'ri-palette-line',    'title' => 'Color Grading',     'desc' => 'Cinematic look & feel'],
                                ['icon' => 'ri-flashlight-line', 'title' => 'Turn Around Time',  'desc' => 'Rush delivery premium'],
                                ['icon' => 'ri-user-smile-line', 'title' => 'Character Design',  'desc' => 'Custom animated characters'],
                            ] as $f)
                            <div class="flex items-start gap-3 p-4 rounded-2xl hover:bg-white transition-colors group">
                                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center border border-[#3ab1d8]/20 shrink-0 group-hover:bg-[#3ab1d8] transition-colors">
                                    <i class="{{ $f['icon'] }} text-[#3ab1d8] group-hover:text-white transition-colors"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[#0b1f3a] text-sm">{{ $f['title'] }}</h4>
                                    <p class="text-[11px] text-slate-400 font-medium mt-0.5">{{ $f['desc'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="relative hidden lg:block min-h-[480px]">
                        <img src="https://images.unsplash.com/photo-1536240478700-b869070f9279?auto=format&fit=crop&w=900&q=80"
                             alt="Video Editing" class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#f4f8fb]/30 to-transparent"></div>
                        <div class="absolute bottom-10 left-10 bg-[#0b1f3a] text-white p-8 rounded-2xl shadow-2xl">
                            <div class="text-4xl font-black text-[#3ab1d8] mb-1">100%</div>
                            <div class="text-[10px] font-black uppercase tracking-[0.2em] opacity-70">Satisfaction Guaranteed</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── VIDEO SUB-CATEGORIES ── --}}
    @if(isset($videoSubCategories) && $videoSubCategories->count() > 0)
    <div class="bg-[#f4f8fb] py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-xs font-black text-[#3ab1d8] uppercase tracking-[0.3em] mb-3 block">What We Offer</span>
                <h2 class="text-3xl md:text-4xl font-black text-[#0b1f3a] uppercase tracking-tight mb-4">
                    {{ $videoCategory->name ?? 'Video Production' }} Services
                </h2>
                <div class="flex justify-center gap-2 mb-4">
                    <span class="w-4 h-1.5 bg-green-400 rounded-full"></span>
                    <span class="w-4 h-1.5 bg-yellow-400 rounded-full"></span>
                    <span class="w-4 h-1.5 bg-cyan-500 rounded-full"></span>
                    <span class="w-4 h-1.5 bg-[#0b1f3a] rounded-full"></span>
                </div>
                <p class="text-slate-500 text-sm max-w-xl mx-auto">Explore all our professional video production services tailored to your needs.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($videoSubCategories as $sub)
                <a href="{{ route('graphics.service-detail', $sub->slug) }}"
                   class="group block bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="aspect-[4/3] bg-gradient-to-br from-[#3ab1d8]/10 to-[#0b1f3a]/10 relative overflow-hidden">
                        @if($sub->services->first()?->image_after)
                            <img src="{{ asset('storage/'.$sub->services->first()->image_after) }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="ri-vidicon-line text-5xl text-[#3ab1d8]/30 group-hover:text-[#3ab1d8]/60 transition-colors"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-[#0b1f3a]/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white text-xs font-black uppercase tracking-widest border border-white/50 px-4 py-2 rounded-full">View Service</span>
                        </div>
                    </div>
                    <div class="px-5 py-4">
                        <h3 class="text-sm font-black text-[#0b1f3a] uppercase tracking-tight group-hover:text-[#3ab1d8] transition-colors leading-tight">{{ $sub->name }}</h3>
                        @if($sub->services->count() > 0)
                        <p class="text-[11px] text-slate-400 mt-1">{{ $sub->services->count() }} service{{ $sub->services->count() > 1 ? 's' : '' }}</p>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- ── TESTIMONIALS ── --}}
    @php $testimonials = \App\Models\Testimonial::where('is_active', true)->orderBy('sort_order')->limit(4)->get(); @endphp
    @if($testimonials->count() > 0)
    <div class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-black text-[#0b1f3a] uppercase tracking-tight">What Our Client's Say</h2>
                <div class="flex justify-center gap-2 mt-4">
                    <span class="w-4 h-1.5 bg-green-400 rounded-full"></span>
                    <span class="w-4 h-1.5 bg-yellow-400 rounded-full"></span>
                    <span class="w-4 h-1.5 bg-cyan-500 rounded-full"></span>
                    <span class="w-4 h-1.5 bg-[#0b1f3a] rounded-full"></span>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($testimonials as $t)
                <div class="bg-[#f4f8fb] rounded-[2rem] p-10 border border-slate-100 relative hover:shadow-xl transition-all duration-300 group">
                    <i class="ri-double-quotes-r absolute top-8 right-8 text-7xl text-slate-200 group-hover:text-[#3ab1d8]/10 transition-colors"></i>
                    <div class="flex gap-1 text-yellow-400 text-sm mb-5">
                        @for($s=0; $s < ($t->rating ?? 5); $s++) <i class="ri-star-fill"></i> @endfor
                    </div>
                    <p class="text-slate-600 leading-relaxed mb-8 italic relative z-10">"{{ $t->content }}"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-tr from-[#3ab1d8] to-[#0b1f3a] p-0.5 shrink-0">
                            <div class="w-full h-full rounded-full bg-white p-0.5">
                                @if($t->avatar)
                                    <img src="{{ asset('storage/'.$t->avatar) }}" class="w-full h-full rounded-full object-cover">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($t->name) }}&background=0b1f3a&color=fff" class="w-full h-full rounded-full object-cover">
                                @endif
                            </div>
                        </div>
                        <div>
                            <div class="font-black text-[#0b1f3a] uppercase text-sm tracking-tight">{{ $t->name }}</div>
                            <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">{{ $t->designation ?? 'Verified Client' }}</div>
                        </div>
                        <div class="ml-auto">
                            <i class="ri-checkbox-circle-fill text-2xl text-[#3ab1d8]"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- ── BLOG POSTS ── --}}
    @php $blogPosts = \App\Models\BlogPost::where('is_published', true)->latest()->limit(4)->get(); @endphp
    @if($blogPosts->count() > 0)
    <div class="bg-[#f4f8fb] py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-14">
                <span class="text-xs font-black text-[#3ab1d8] uppercase tracking-[0.3em] mb-3 block">Our Experts</span>
                <h2 class="text-3xl font-black uppercase text-[#0b1f3a] tracking-tight">Latest Blog Updates</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($blogPosts as $post)
                <a href="{{ route('graphics.blog.single', $post->slug) }}"
                   class="group block bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="aspect-video overflow-hidden relative">
                        <img src="{{ Str::startsWith($post->featured_image ?? '', 'http') ? $post->featured_image : asset('storage/'.($post->featured_image ?? '')) }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-3 left-3 px-2.5 py-1 bg-[#3ab1d8] text-white text-[9px] font-black uppercase rounded">
                            {{ strtoupper($post->category ?? 'Video') }}
                        </div>
                    </div>
                    <div class="p-5">
                        <h4 class="text-sm font-bold text-slate-800 leading-snug group-hover:text-[#3ab1d8] transition-colors line-clamp-2 mb-3">{{ $post->title }}</h4>
                        <div class="flex items-center gap-2 text-[11px] text-slate-400">
                            <i class="ri-calendar-line"></i> {{ $post->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- ── FINAL CTA ── --}}
    <div class="bg-[#0b1f3a] py-20 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[400px] bg-cyan-500/10 rounded-full blur-3xl"></div>
        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <span class="text-xs font-black text-[#3ab1d8] uppercase tracking-[0.3em] mb-4 block">Get Started Today</span>
            <h2 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tight mb-6">Ready to Start Your Project?</h2>
            <p class="text-white/60 text-lg max-w-2xl mx-auto mb-12">Get a custom quote tailored to your specific video production needs. We usually reply within 10 minutes.</p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="{{ route('graphics.get-quote') }}"
                   class="px-10 py-5 bg-[#3ab1d8] hover:bg-[#2e99bc] text-white font-black text-sm uppercase tracking-widest rounded-2xl transition-all shadow-xl active:scale-95">
                    Get A Quote
                </a>
                <a href="{{ route('graphics.portfolio') }}"
                   class="px-10 py-5 bg-white/10 hover:bg-white/20 text-white font-black text-sm uppercase tracking-widest rounded-2xl border border-white/20 transition-all">
                    View Portfolio
                </a>
            </div>
        </div>
    </div>

<style>
    [x-cloak] { display: none !important; }
</style>

@endsection