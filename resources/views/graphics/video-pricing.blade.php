@extends('layouts.app')

@section('custom_navbar')
    @include('graphics.partials.video-navbar', ['videoSubCategories' => $videoSubCategories])
@endsection

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
                <a href="{{ route('graphics.video-quote') }}"
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
                                        <a href="{{ route('graphics.video-quote') }}"
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




    {{-- ── TESTIMONIALS ── --}}
    @php $testimonials = \App\Models\Testimonial::where('is_active', true)->orderBy('sort_order')->limit(4)->get(); @endphp
    @if($testimonials->count() > 0)
    <div class="bg-white py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-xs font-black text-[#3ab1d8] uppercase tracking-[0.3em] mb-3 block">Testimonials</span>
                <h2 class="text-3xl md:text-5xl font-black text-[#0b1f3a] uppercase tracking-tight">What Our <span class="text-[#3ab1d8]">Client's Say</span></h2>
                <div class="flex justify-center gap-2 mt-6">
                    <span class="w-10 h-1 bg-[#3ab1d8] rounded-full"></span>
                    <span class="w-4 h-1 bg-yellow-400 rounded-full"></span>
                    <span class="w-4 h-1 bg-green-400 rounded-full"></span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($testimonials as $t)
                <div class="bg-white rounded-[2.5rem] p-10 md:p-12 border border-slate-100 shadow-[0_10px_50px_rgba(0,0,0,0.04)] relative group hover:-translate-y-2 transition-all duration-500">
                    <div class="absolute -top-6 -left-6 w-12 h-12 bg-[#3ab1d8] rounded-2xl flex items-center justify-center shadow-lg shadow-[#3ab1d8]/20 z-10 group-hover:rotate-12 transition-transform">
                        <i class="ri-double-quotes-l text-2xl text-white"></i>
                    </div>

                    <div class="flex gap-1 text-[#fbbf24] text-sm mb-6">
                        @for($s=0; $s < ($t->rating ?? 5); $s++)
                            <i class="ri-star-fill"></i>
                        @endfor
                    </div>

                    <p class="text-slate-600 text-lg leading-relaxed mb-10 font-medium">"{{ $t->content }}"</p>

                    <div class="flex items-center gap-5 pt-8 border-t border-slate-50">
                        <div class="w-16 h-16 rounded-2xl overflow-hidden shadow-md shrink-0">
                            @if($t->avatar)
                                <img src="{{ asset('storage/'.$t->avatar) }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($t->name) }}&background=0b1f3a&color=fff&bold=true" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div>
                            <div class="font-black text-[#0b1f3a] uppercase text-sm tracking-widest leading-none mb-1.5">{{ $t->name }}</div>
                            <div class="flex items-center gap-2 text-[10px] font-black text-[#3ab1d8] uppercase tracking-[0.1em] bg-[#3ab1d8]/10 px-2.5 py-1 rounded-full">
                                <i class="ri-checkbox-circle-fill"></i> Verified Client
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    {{-- ── BLOG POSTS ── --}}
    @php 
        $blogPosts = \App\Models\BlogPost::where('is_published', true)
            ->where(function($q) {
                $q->where('title', 'LIKE', '%video%')
                  ->orWhere('category', 'LIKE', '%video%');
            })
            ->latest()
            ->limit(4)
            ->get(); 
    @endphp
    @if($blogPosts->count() > 0)
    <div class="bg-[#f8fafc] py-24">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
                <div class="max-w-xl">
                    <span class="text-xs font-black text-[#3ab1d8] uppercase tracking-[0.3em] mb-3 block">Knowledge Base</span>
                    <h2 class="text-3xl md:text-5xl font-black text-[#0b1f3a] uppercase tracking-tight">Latest <span class="text-[#3ab1d8]">Blog Updates</span></h2>
                </div>
                <a href="{{ route('graphics.blog') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-slate-200 text-[#0b1f3a] font-black text-xs uppercase tracking-widest rounded-xl hover:bg-slate-50 transition-colors shrink-0">
                    View All Posts <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($blogPosts as $post)
                <article class="group relative bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 hover:shadow-[0_20px_60px_rgb(0,0,0,0.08)] hover:-translate-y-2 transition-all duration-500">
                    <a href="{{ route('graphics.blog.single', $post->slug) }}" class="block">
                        <div class="aspect-video overflow-hidden relative">
                            <img src="{{ Str::startsWith($post->featured_image ?? '', 'http') ? $post->featured_image : asset('storage/'.($post->featured_image ?? '')) }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-[#0b1f3a]/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1.5 bg-white/90 backdrop-blur text-[#0b1f3a] text-[10px] font-black uppercase tracking-widest rounded-lg shadow-sm">
                                    {{ $post->category ?? 'Video' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-7">
                            <div class="flex items-center gap-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">
                                <i class="ri-calendar-event-line text-[#3ab1d8]"></i> {{ $post->created_at->format('M d, Y') }}
                            </div>
                            <h3 class="text-base font-black text-[#0b1f3a] leading-snug group-hover:text-[#3ab1d8] transition-colors line-clamp-2 mb-6">
                                {{ $post->title }}
                            </h3>
                            <div class="flex items-center text-[11px] font-black text-[#3ab1d8] uppercase tracking-widest gap-1 group-hover:gap-2 transition-all">
                                Read Article <i class="ri-arrow-right-s-line text-base"></i>
                            </div>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
    </div>
    @endif



<style>
    [x-cloak] { display: none !important; }
</style>

@endsection