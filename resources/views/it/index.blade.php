@extends('it.layouts.master')

@section('title', 'IT Solutions | Enterprise Software & Technical Excellence | PixelForge Group')
@section('meta_description', 'Customized software development, cloud solutions, and enterprise digital engineering by PixelForge Group. We turn complex problems into scalable digital solutions.')

@section('content')

{{-- ══════════════════════════════════════════
     DYNAMIC HERO SECTION (GLASSMORPHISM)
══════════════════════════════════════════ --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-[#020817]">
    {{-- Animated Background Elements --}}
    <div class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none">
        <div class="absolute top-[10%] left-[5%] w-[500px] h-[500px] bg-cyan-500/10 blur-[120px] rounded-full animate-pulse"></div>
        <div class="absolute bottom-[10%] right-[5%] w-[600px] h-[600px] bg-blue-600/10 blur-[150px] rounded-full"></div>
    </div>

    <div class="swiper hero-swiper absolute inset-0 z-0">
        <div class="swiper-wrapper">
            @forelse($sliders as $slider)
            <div class="swiper-slide relative">
                <div class="absolute inset-0">
                    <img src="{{ $slider->image ? asset('storage/' . $slider->image) : 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=2072' }}" 
                         alt="{{ $slider->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-[#020817]/80"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-[#020817] via-[#020817]/60 to-transparent"></div>
                </div>

                <div class="container mx-auto px-6 h-full flex items-center relative z-10">
                    <div class="max-w-4xl">
                        @if($slider->subtitle)
                        <div class="flex items-center gap-3 mb-6 reveal">
                            <div class="w-12 h-[2px] bg-cyan-500"></div>
                            <span class="text-cyan-400 font-black text-xs uppercase tracking-[0.4em]">{{ $slider->subtitle }}</span>
                        </div>
                        @endif
                        
                        <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-[0.95] mb-10 uppercase tracking-tighter reveal" style="animation-delay: 0.1s">
                            {!! nl2br(e($slider->title)) !!}
                        </h1>
                        
                        <div class="flex flex-wrap items-center gap-8 reveal" style="animation-delay: 0.2s">
                            @if($slider->btn_text)
                            <a href="{{ $slider->btn_url ?? '#' }}" class="group relative px-10 py-5 bg-cyan-600 hover:bg-cyan-500 text-white rounded-2xl font-black uppercase text-xs tracking-[0.2em] transition-all overflow-hidden shadow-2xl shadow-cyan-600/30 active:scale-95">
                                <span class="relative z-10">{{ $slider->btn_text }}</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </a>
                            @endif
                            
                            <button class="flex items-center gap-4 group">
                                <div class="w-14 h-14 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center text-white group-hover:bg-cyan-500 group-hover:border-cyan-500 transition-all duration-500">
                                    <i class="ri-play-fill text-2xl ml-1"></i>
                                </div>
                                <div class="text-left">
                                    <span class="block text-white font-black text-[10px] tracking-widest uppercase">Watch Story</span>
                                    <span class="block text-slate-500 text-[9px] font-bold uppercase mt-0.5 tracking-wider group-hover:text-cyan-400 transition-colors">Our Deployment Process</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            {{-- Fallback Slide 1 --}}
            <div class="swiper-slide relative">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=2070" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-[#020817]/85"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-[#020817] via-[#020817]/60 to-transparent"></div>
                </div>
                <div class="container mx-auto px-6 h-full flex items-center relative z-10">
                    <div class="max-w-4xl">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-[2px] bg-cyan-500"></div>
                            <span class="text-cyan-400 font-black text-xs uppercase tracking-[0.4em]">PixelForge IT Studio</span>
                        </div>
                        <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-[0.95] mb-10 uppercase tracking-tighter">
                            CUSTOM SOFTWARE <br> <span class="text-gradient-it">DEVELOPMENT</span>
                        </h1>
                        <a href="{{ route('it.contact') }}" class="group relative px-10 py-5 bg-cyan-600 hover:bg-cyan-500 text-white rounded-2xl font-black uppercase text-xs tracking-[0.2em] transition-all overflow-hidden shadow-2xl shadow-cyan-600/30">
                            Deploy Solution
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        
        {{-- Hero HUD Navigation --}}
        <div class="absolute bottom-12 left-0 w-full z-20 px-6">
            <div class="container mx-auto flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button class="hero-prev w-12 h-12 rounded-xl border border-white/10 flex items-center justify-center text-white hover:bg-white/5 transition-all"><i class="ri-arrow-left-s-line text-xl"></i></button>
                    <button class="hero-next w-12 h-12 rounded-xl border border-white/10 flex items-center justify-center text-white hover:bg-white/5 transition-all"><i class="ri-arrow-right-s-line text-xl"></i></button>
                </div>
                <div class="hidden md:flex items-center gap-8">
                    <div class="text-right">
                        <span class="block text-cyan-500 font-black text-[10px] tracking-widest uppercase">Trusted by</span>
                        <span class="block text-white text-xs font-bold mt-1 uppercase">Global Enterprises</span>
                    </div>
                    <div class="w-px h-10 bg-white/10"></div>
                    <div class="flex -space-x-3">
                        @for($i=1; $i<=4; $i++)
                        <div class="w-10 h-10 rounded-full border-2 border-[#020817] bg-slate-800 overflow-hidden shadow-xl">
                            <img src="https://i.pravatar.cc/100?img={{ $i+10 }}" class="w-full h-full object-cover">
                        </div>
                        @endfor
                        <div class="w-10 h-10 rounded-full border-2 border-[#020817] bg-cyan-600 flex items-center justify-center text-[10px] text-white font-black">+2K</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SERVICES SHOWCASE (CORE CAPABILITIES)
══════════════════════════════════════════ --}}
<section class="py-32 bg-[#020817] relative">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-end justify-between gap-10 mb-20 reveal">
            <div class="max-w-3xl">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></div>
                    <span class="text-cyan-400 font-black text-xs uppercase tracking-[0.4em]">Core Capabilities</span>
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-white leading-tight uppercase tracking-tight">
                    ENGINEERING <span class="text-gradient-it">THE FUTURE</span> OF DIGITAL INFRASTRUCTURE
                </h2>
            </div>
            <div class="lg:pb-4">
                <p class="text-slate-500 font-bold uppercase tracking-widest text-[11px] mb-6 max-w-sm">
                    We architect high-performance software systems that solve complex enterprise challenges.
                </p>
                <a href="{{ route('it.contact') }}" class="inline-flex items-center gap-4 text-white font-black uppercase text-[10px] tracking-[0.3em] group">
                    View All Services
                    <div class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center group-hover:bg-cyan-500 group-hover:border-cyan-500 transition-all duration-500">
                        <i class="ri-arrow-right-line"></i>
                    </div>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $index => $service)
            <div class="group relative bg-[#0a192f]/40 border border-white/5 rounded-[2.5rem] p-10 hover:bg-[#0a192f]/60 hover:border-cyan-500/30 transition-all duration-700 reveal" style="animation-delay: {{ $index * 0.1 }}s">
                {{-- Floating Background Decoration --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-500/5 blur-[40px] rounded-full group-hover:bg-cyan-500/10 transition-all duration-700"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 rounded-2xl bg-cyan-600/10 flex items-center justify-center text-cyan-500 border border-cyan-500/20 mb-8 group-hover:scale-110 group-hover:bg-cyan-500 group-hover:text-white transition-all duration-500">
                        <i class="{{ $service->icon ?? 'ri-stack-line' }} text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-white uppercase tracking-tight mb-4 group-hover:text-cyan-400 transition-colors">
                        {{ $service->name }}
                    </h3>
                    <p class="text-slate-400 text-sm font-medium leading-relaxed mb-8 line-clamp-3">
                        {{ $service->description ?? 'Specialized digital engineering solutions designed for enterprise scalability.' }}
                    </p>
                    
                    <ul class="space-y-3 mb-10">
                        @php
                            $serviceFeatures = is_array($service->features) ? array_slice($service->features, 0, 3) : ['Enterprise Scalability', 'High Performance', 'Technical Support'];
                        @endphp
                        @foreach($serviceFeatures as $feat)
                        <li class="flex items-center gap-3 text-[10px] font-black uppercase tracking-widest text-slate-500 group-hover:text-slate-300 transition-colors">
                            <div class="w-1.5 h-1.5 rounded-full bg-cyan-500"></div>
                            {{ $feat }}
                        </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('it.service-detail', $service->slug) }}" class="inline-flex items-center gap-4 px-8 py-4 bg-white/5 border border-white/10 rounded-xl text-white font-black uppercase text-[10px] tracking-widest group-hover:bg-cyan-600 group-hover:border-cyan-600 transition-all duration-500">
                        Explore Solution
                        <i class="ri-arrow-right-up-line text-lg"></i>
                    </a>
                </div>
            </div>
            @empty
            {{-- Fallback Services --}}
            @php
                $fallbacks = [
                    ['Web Application Development', 'ri-window-line', 'High-performance, scalable web applications built with modern technologies.'],
                    ['Custom Software Development', 'ri-code-s-slash-line', 'Tailored software solutions designed to meet your specific business requirements.'],
                    ['Mobile App Development', 'ri-smartphone-line', 'Native and cross-platform mobile apps for iOS and Android devices.'],
                ];
            @endphp
            @foreach($fallbacks as $index => [$name, $icon, $desc])
            <div class="group relative bg-[#0a192f]/40 border border-white/5 rounded-[2.5rem] p-10 hover:bg-[#0a192f]/60 hover:border-cyan-500/30 transition-all duration-700 reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="relative z-10">
                    <div class="w-16 h-16 rounded-2xl bg-cyan-600/10 flex items-center justify-center text-cyan-500 border border-cyan-500/20 mb-8 group-hover:bg-cyan-500 group-hover:text-white transition-all">
                        <i class="{{ $icon }} text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-white uppercase tracking-tight mb-4 group-hover:text-cyan-400 transition-colors">{{ $name }}</h3>
                    <p class="text-slate-400 text-sm font-medium leading-relaxed mb-8">{{ $desc }}</p>
                    <a href="#" class="inline-flex items-center gap-4 px-8 py-4 bg-white/5 border border-white/10 rounded-xl text-white font-black uppercase text-[10px] tracking-widest group-hover:bg-cyan-600 group-hover:border-cyan-600 transition-all duration-500">
                        Explore Solution <i class="ri-arrow-right-up-line text-lg"></i>
                    </a>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     ENGINEERING STUDIO (ABOUT)
══════════════════════════════════════════ --}}
<section class="py-32 bg-white relative overflow-hidden">
    {{-- Background Texture --}}
    <div class="absolute inset-0 opacity-[0.03] z-0" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-24 items-center">
            <div class="relative reveal">
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-6 pt-12">
                        <div class="rounded-[2.5rem] overflow-hidden shadow-2xl h-[350px]">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-cyan-600 rounded-[2.5rem] p-10 text-white shadow-xl shadow-cyan-600/20">
                            <div class="text-6xl font-black mb-2 line-height-1">09<span class="text-cyan-200">+</span></div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em]">Years of Engineering Excellence</p>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-xl shadow-slate-900/20">
                            <div class="text-5xl font-black mb-2 line-height-1">2K<span class="text-cyan-500">+</span></div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em]">Deployment Successes</p>
                        </div>
                        <div class="rounded-[2.5rem] overflow-hidden shadow-2xl h-[350px]">
                            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
                {{-- Decorative Floating Label --}}
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 bg-white rounded-full flex flex-col items-center justify-center text-center p-6 shadow-2xl z-20 border border-slate-50 border-4 animate-float-panel hidden lg:flex">
                    <div class="w-10 h-10 rounded-xl bg-cyan-600 flex items-center justify-center text-white mb-3">
                        <i class="ri-shield-check-fill text-xl"></i>
                    </div>
                    <span class="text-[9px] font-black uppercase text-slate-400 tracking-widest leading-tight">ISO Certified Operations</span>
                </div>
            </div>

            <div class="reveal" style="animation-delay: 0.2s">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-12 h-px bg-cyan-600"></div>
                    <span class="text-cyan-600 font-black text-xs uppercase tracking-[0.4em]">PixelForge IT Studio</span>
                </div>
                <h2 class="text-4xl md:text-6xl font-black text-slate-900 leading-[1.1] uppercase tracking-tighter mb-10">
                    WE DON'T JUST BUILD APPS. WE <span class="text-cyan-600">ARCHITECT ADVANTAGES.</span>
                </h2>
                <p class="text-slate-600 text-lg font-medium leading-relaxed mb-12">
                    Our multi-disciplinary team follows an agile deployment strategy, ensuring every pixel and every line of code aligns with your business goals. We specialize in high-load systems and complex enterprise architectures.
                </p>

                <div class="grid sm:grid-cols-2 gap-10 mb-12">
                    <div class="flex flex-col gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 flex items-center justify-center text-cyan-600 border border-slate-100 group">
                            <i class="ri-microscope-line text-2xl group-hover:scale-110 transition-transform"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-2">Technical Analysis</h4>
                            <p class="text-[12px] text-slate-500 font-medium leading-relaxed">Deep-dive assessment of your legacy systems and new requirements.</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-slate-50 flex items-center justify-center text-cyan-600 border border-slate-100 group">
                            <i class="ri-cloud-windy-line text-2xl group-hover:scale-110 transition-transform"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-2">Cloud Strategy</h4>
                            <p class="text-[12px] text-slate-500 font-medium leading-relaxed">Modernize your infrastructure with robust AWS and Azure integrations.</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('it.about') }}" class="px-10 py-5 bg-slate-900 hover:bg-slate-800 text-white rounded-2xl font-black uppercase text-xs tracking-[0.2em] transition-all shadow-xl shadow-slate-900/20 active:scale-95">
                    Studio Overview
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SUCCESS METRICS (DYNAMIC HUD)
══════════════════════════════════════════ --}}
<section class="py-32 bg-[#020817] relative overflow-hidden">
    {{-- World Map Pattern --}}
    <div class="absolute inset-0 z-0 opacity-[0.05]" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/80/World_map_-_low_resolution.svg'); background-size: cover; background-position: center;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center mb-24 reveal">
            <h2 class="text-3xl md:text-5xl font-black text-white uppercase tracking-tighter leading-tight">
                OUR SOLUTIONS POWER <span class="text-gradient-it">GLOBAL BUSINESS GROWTH</span>
            </h2>
            <div class="w-24 h-1 bg-cyan-600 mx-auto mt-8"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
            @forelse($metrics as $index => $metric)
            <div class="text-center reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="w-20 h-20 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-cyan-500 mx-auto mb-8 hover:bg-cyan-600 hover:text-white hover:border-cyan-600 transition-all duration-500">
                    <i class="{{ $metric->icon ?? 'ri-bar-chart-2-line' }} text-4xl"></i>
                </div>
                <div class="text-5xl lg:text-6xl font-black text-white mb-2 line-height-1 tracking-tighter">
                    {{ $metric->count }}<span class="text-cyan-500">{{ $metric->suffix }}</span>
                </div>
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-500">{{ $metric->title }}</p>
            </div>
            @empty
            {{-- Fallback Metrics --}}
            @php
                $metricFallbacks = [
                    ['Projects Completed', '700', '+', 'ri-terminal-box-line'],
                    ['Active Clients', '120', '+', 'ri-team-line'],
                    ['Success Rate', '99', '%', 'ri-medal-line'],
                    ['Expert Engineers', '45', '+', 'ri-user-settings-line'],
                ];
            @endphp
            @foreach($metricFallbacks as $index => [$title, $count, $suffix, $icon])
            <div class="text-center reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="w-20 h-20 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-cyan-500 mx-auto mb-8 hover:bg-cyan-600 hover:text-white hover:border-cyan-600 transition-all duration-500">
                    <i class="{{ $icon }} text-4xl"></i>
                </div>
                <div class="text-5xl lg:text-6xl font-black text-white mb-2 line-height-1 tracking-tighter">
                    {{ $count }}<span class="text-cyan-500">{{ $suffix }}</span>
                </div>
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-slate-500">{{ $title }}</p>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     TECHNOLOGY INDEX (IMPROVED & INNOVATIVE)
══════════════════════════════════════════ --}}
<section class="py-32 bg-[#020817] relative border-t border-white/5">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-4xl mx-auto mb-20 reveal">
            <span class="text-cyan-500 font-black uppercase tracking-[0.3em] text-[10px] block mb-4">The Global Tech Stack</span>
            <h2 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tighter mb-8">
                ADVANCED <span class="text-gradient-it">TECHNOLOGY INDEX</span>
            </h2>
            <p class="text-slate-500 text-[13px] font-bold uppercase tracking-widest max-w-2xl mx-auto leading-relaxed">
                We leverage a modern ecosystem of tools to ensure your products are secure, scalable, and ahead of the curve.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 reveal" style="animation-delay: 0.1s">
            @php
                $techIndex = [
                    ['Marketing Systems', 'ri-pie-chart-2-line'],
                    ['Cyber Security', 'ri-shield-flash-line'],
                    ['Cloud Operations', 'ri-cloud-line'],
                    ['Digital Marketing', 'ri-rocket-line'],
                    ['Enterprise ERP', 'ri-settings-5-line'],
                    ['QA Automation', 'ri-test-tube-line'],
                ];
            @endphp
            @foreach($techIndex as $index => [$title, $icon])
            <div class="group bg-white/5 border border-white/10 hover:border-cyan-500/50 rounded-[2rem] p-8 flex flex-col items-center justify-center text-center transition-all duration-500 cursor-pointer h-44 hover:-translate-y-2">
                <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center text-cyan-500 mb-6 group-hover:bg-cyan-600 group-hover:text-white transition-all">
                    <i class="{{ $icon }} text-2xl"></i>
                </div>
                <h5 class="text-white text-[10px] font-black uppercase tracking-widest leading-relaxed">{!! str_replace(' ', '<br>', $title) !!}</h5>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('scripts')
{{-- Swiper JS --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hero Swiper
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            speed: 1500,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.hero-next',
                prevEl: '.hero-prev',
            },
            on: {
                init: function () {
                    // Trigger reveal for the first slide manually
                    document.querySelectorAll('.hero-swiper .swiper-slide-active .reveal').forEach(el => {
                        el.classList.add('revealed');
                    });
                },
                slideChange: function () {
                    // Refresh reveals on slide change
                    document.querySelectorAll('.hero-swiper .swiper-slide-active .reveal').forEach(el => {
                        el.classList.add('revealed');
                    });
                }
            }
        });

        // Simple reveal on scroll
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, { threshold: 0.1 });

        reveals.forEach(el => observer.observe(el));
    });
</script>

<style>
    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .revealed {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
</style>
@endpush
