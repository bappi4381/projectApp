@extends('it.layouts.master')

@section('title', 'IT Solutions | Enterprise Software & Technical Excellence | PixelForge Group')
@section('meta_description', 'Customized software development, cloud solutions, and enterprise digital engineering by PixelForge Group. We turn complex problems into scalable digital solutions.')

@section('content')

{{-- ══════════════════════════════════════════
     HERO SECTION: PREMIUM CORP CANVAS
     ══════════════════════════════════════════ --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-slate-50/50">
    {{-- Soft Ambient Radial Lights --}}
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute -top-[10%] -left-[10%] w-[800px] h-[800px] bg-cyan-100/30 blur-[180px] rounded-full"></div>
        <div class="absolute -bottom-[10%] -right-[10%] w-[900px] h-[900px] bg-blue-100/20 blur-[200px] rounded-full"></div>
    </div>

    <div class="swiper hero-swiper absolute inset-0 z-0">
        <div class="swiper-wrapper">
            @forelse($sliders as $slider)
            <div class="swiper-slide relative">
                <div class="absolute inset-0">
                    <img src="{{ $slider->image ? asset('storage/' . $slider->image) : 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&q=80&w=2072' }}" 
                         alt="{{ $slider->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/94"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent"></div>
                </div>

                <div class="container mx-auto px-6 md:px-12 h-full flex items-center relative z-10">
                    <div class="max-w-4xl pt-24 md:pt-0">
                        @if($slider->subtitle)
                        <div class="flex items-center gap-3 mb-6 reveal">
                            <span class="w-8 h-[2px] bg-cyan-500 rounded-full"></span>
                            <span class="text-cyan-600 font-extrabold text-xs uppercase tracking-[0.35em]">{{ $slider->subtitle }}</span>
                        </div>
                        @endif
                        
                        <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-slate-900 leading-[1.1] mb-8 uppercase tracking-tight reveal" style="animation-delay: 0.1s">
                            {!! nl2br(e($slider->title)) !!}
                        </h1>
                        
                        <div class="flex flex-wrap items-center gap-6 mt-10 reveal" style="animation-delay: 0.2s">
                            @if($slider->btn_text)
                            <a href="{{ $slider->btn_url ?? '#' }}" class="group relative px-8 py-4 bg-cyan-600 hover:bg-cyan-500 text-white rounded-xl font-bold uppercase text-xs tracking-wider transition-all duration-300 shadow-lg shadow-cyan-600/10 active:scale-95 overflow-hidden">
                                <span class="relative z-10">{{ $slider->btn_text }}</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </a>
                            @endif
                            
                            <a href="{{ route('it.contact') }}" class="px-8 py-4 bg-slate-100 hover:bg-slate-200/80 text-slate-700 rounded-xl border border-slate-200/60 font-bold uppercase text-xs tracking-wider transition-all duration-300">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            {{-- Fallback Slide --}}
            <div class="swiper-slide relative">
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&q=80&w=2070" 
                         alt="PixelForge IT Solution" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-white/94"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent"></div>
                </div>
                <div class="container mx-auto px-6 md:px-12 h-full flex items-center relative z-10">
                    <div class="max-w-4xl pt-24 md:pt-0">
                        <div class="flex items-center gap-3 mb-6">
                            <span class="w-8 h-[2px] bg-cyan-500 rounded-full"></span>
                            <span class="text-cyan-600 font-extrabold text-xs uppercase tracking-[0.35em]">PixelForge IT Studio</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-slate-900 leading-[1.1] mb-8 uppercase tracking-tight">
                            CUSTOM SOFTWARE <br> <span class="text-cyan-600">DEVELOPMENT</span>
                        </h1>
                        <a href="{{ route('it.contact') }}" class="px-8 py-4 bg-cyan-600 hover:bg-cyan-500 text-white rounded-xl font-bold uppercase text-xs tracking-wider transition-all duration-300">
                            Deploy Solution
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        
        {{-- Clean Navigation HUD --}}
        <div class="absolute bottom-12 left-0 w-full z-20 px-6 md:px-12">
            <div class="container mx-auto flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <button class="hero-prev w-10 h-10 rounded-lg border border-slate-200 flex items-center justify-center text-slate-700 bg-white hover:bg-slate-50 transition-all shadow-sm"><i class="ri-arrow-left-s-line text-lg"></i></button>
                    <button class="hero-next w-10 h-10 rounded-lg border border-slate-200 flex items-center justify-center text-slate-700 bg-white hover:bg-slate-50 transition-all shadow-sm"><i class="ri-arrow-right-s-line text-lg"></i></button>
                </div>
                <div class="hidden md:flex items-center gap-6">
                    <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">PixelForge Technical Division</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SERVICES SHOWCASE (CORE CAPABILITIES)
     ══════════════════════════════════════════ --}}
<section class="py-32 bg-white relative border-b border-slate-100">
    <div class="container mx-auto px-6 md:px-12">
        <div class="flex flex-col lg:flex-row items-start lg:items-end justify-between gap-12 mb-20 reveal">
            <div class="max-w-3xl">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 rounded-full bg-cyan-500"></span>
                    <span class="text-cyan-600 font-extrabold text-xs uppercase tracking-widest">Core Capabilities</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight uppercase tracking-tight">
                    ENGINEERING DIGITAL INFRASTRUCTURE
                </h2>
            </div>
            <div class="lg:max-w-md">
                <p class="text-slate-500 text-sm leading-relaxed border-l-2 border-cyan-500 pl-4">
                    We architect high-performance, resilient software systems that solve complex enterprise challenges. Our team is dedicated to providing standard-compliant engineering.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($services as $index => $service)
            <div class="group relative bg-[#FCFDFE] border border-slate-100 rounded-2xl p-8 hover:bg-white hover:border-cyan-500/20 hover:shadow-[0_24px_50px_rgba(6,182,212,0.04)] transition-all duration-300 flex flex-col justify-between reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-cyan-50 flex items-center justify-center text-cyan-600 border border-cyan-100 mb-8 group-hover:scale-105 group-hover:bg-cyan-600 group-hover:text-white transition-all duration-300">
                            <i class="{{ $service->icon ?? 'ri-stack-line' }} text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-cyan-600 transition-colors">
                            {{ $service->name }}
                        </h3>
                        <p class="text-slate-600 text-xs leading-relaxed mb-6 line-clamp-3">
                            {{ $service->description ?? 'Specialized digital engineering solutions designed for enterprise scalability.' }}
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100/60">
                        <a href="{{ route('it.service-detail', $service->slug) }}" class="inline-flex items-center gap-2 text-cyan-600 hover:text-cyan-500 font-extrabold uppercase text-[10px] tracking-wider transition-colors">
                            Explore Solution <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            {{-- Fallbacks for the 4 core services --}}
            @php
                $fallbacks = [
                    ['Custom Software Development', 'ri-code-s-slash-line', 'Tailored software solutions designed to meet your specific business requirements.', 'custom-software-development'],
                    ['Web Application Development', 'ri-window-line', 'High-performance, scalable web applications built with modern technologies.', 'web-application-development'],
                    ['Mobile App Development', 'ri-smartphone-line', 'Native and cross-platform mobile apps for iOS and Android devices.', 'mobile-application-development'],
                    ['Quality Assurance & Testing', 'ri-test-tube-line', 'Professional software quality assurance, testing, and validation services.', 'quality-assurance-testing'],
                ];
            @endphp
            @foreach($fallbacks as $index => [$name, $icon, $desc, $slug])
            <div class="group relative bg-[#FCFDFE] border border-slate-100 rounded-2xl p-8 hover:bg-white hover:border-cyan-500/20 hover:shadow-[0_24px_50px_rgba(6,182,212,0.04)] transition-all duration-300 flex flex-col justify-between reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="relative z-10 flex flex-col h-full justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-cyan-50 flex items-center justify-center text-cyan-600 border border-cyan-100 mb-8 group-hover:scale-105 group-hover:bg-cyan-600 group-hover:text-white transition-all">
                            <i class="{{ $icon }} text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-3 group-hover:text-cyan-600 transition-colors">{{ $name }}</h3>
                        <p class="text-slate-600 text-xs leading-relaxed mb-6">{{ $desc }}</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100/60">
                        <a href="{{ route('it.service-detail', $slug) }}" class="inline-flex items-center gap-2 text-cyan-600 font-extrabold uppercase text-[10px] tracking-wider transition-colors">
                            Explore Solution <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     DYNAMIC SOFTWARE PRODUCTS SECTION (LIGHT MODE)
     ══════════════════════════════════════════ --}}
@if($softwareList->isNotEmpty())
<section class="py-32 bg-slate-50/50 relative border-b border-slate-100">
    <div class="container mx-auto px-6 md:px-12">
        <div class="max-w-2xl mb-20 reveal">
            <div class="flex items-center gap-2 mb-4">
                <span class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></span>
                <span class="text-cyan-600 font-extrabold text-xs uppercase tracking-widest">Proprietary Software</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight uppercase tracking-tight">
                FEATURED ENTERPRISE PRODUCTS
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($softwareList as $index => $item)
            <div class="group bg-white border border-slate-200/60 hover:border-cyan-500/30 rounded-2xl p-8 md:p-10 shadow-sm hover:shadow-[0_30px_60px_rgba(6,182,212,0.05)] transition-all duration-300 flex flex-col justify-between reveal relative overflow-hidden" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="space-y-6 relative z-10">
                    <div class="flex items-center justify-between">
                        @if($item->category)
                        <span class="px-3.5 py-1 rounded-full bg-cyan-50 border border-cyan-100 text-cyan-600 text-[9px] font-bold uppercase tracking-wider">
                            {{ $item->category }}
                        </span>
                        @endif
                        <span class="text-[9px] font-mono text-slate-400 uppercase tracking-widest">{{ $item->slug }}</span>
                    </div>

                    <div class="flex items-center gap-4">
                        @if($item->image_url)
                        <div class="w-14 h-14 rounded-xl overflow-hidden shrink-0 border border-slate-100 bg-slate-50 flex items-center justify-center">
                            <img src="{{ Str::startsWith($item->image_url, 'http') ? $item->image_url : asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                        </div>
                        @else
                        <div class="w-14 h-14 rounded-xl bg-cyan-50 border border-cyan-100 text-cyan-600 flex items-center justify-center shrink-0">
                            <i class="ri-app-store-line text-xl"></i>
                        </div>
                        @endif
                        <h3 class="text-2xl font-bold text-slate-900 group-hover:text-cyan-600 transition-colors">
                            {{ $item->name }}
                        </h3>
                    </div>

                    <p class="text-slate-600 text-sm leading-relaxed line-clamp-2">
                        {{ $item->short_desc }}
                    </p>
                </div>

                <div class="mt-8 flex items-center gap-4 relative z-10 border-t border-slate-100 pt-6">
                    <a href="{{ route('it.software-detail', $item->slug) }}" class="inline-flex items-center gap-2 px-6 py-3 bg-cyan-600 hover:bg-cyan-500 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-all duration-200 shadow-sm shadow-cyan-600/5">
                        View Product <i class="ri-arrow-right-line"></i>
                    </a>
                    @if($item->link_url)
                    <a href="{{ $item->link_url }}" target="_blank" class="inline-flex items-center gap-1.5 text-slate-500 hover:text-slate-900 font-bold text-xs uppercase tracking-wider transition-colors ml-4">
                        Launch Site <i class="ri-external-link-line"></i>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ══════════════════════════════════════════
     ENGINEERING STUDIO (ABOUT)
     ══════════════════════════════════════════ --}}
<section class="py-32 bg-white relative overflow-hidden border-b border-slate-100">
    <div class="container mx-auto px-6 md:px-12 relative z-10">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            
            {{-- Visual Grid --}}
            <div class="relative reveal">
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-6 pt-12">
                        <div class="rounded-2xl overflow-hidden border border-slate-100 shadow-lg h-[300px] hover:scale-[1.02] transition-transform duration-500">
                            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover">
                        </div>
                        <div class="bg-gradient-to-br from-slate-50 to-cyan-50/50 rounded-2xl p-8 text-slate-850 border border-cyan-100/50">
                            <div class="text-4xl font-extrabold text-cyan-600 mb-2">09+</div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Years of Development Excellence</p>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-gradient-to-br from-slate-50 to-blue-50/50 rounded-2xl p-8 text-slate-850 border border-slate-200/60">
                            <div class="text-4xl font-extrabold text-cyan-600 mb-2">2K+</div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Successful Deployments</p>
                        </div>
                        <div class="rounded-2xl overflow-hidden border border-slate-100 shadow-lg h-[300px] hover:scale-[1.02] transition-transform duration-500">
                            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=800" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Text Details --}}
            <div class="reveal" style="animation-delay: 0.2s">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-6 h-[1px] bg-cyan-500"></span>
                    <span class="text-cyan-600 font-extrabold text-xs uppercase tracking-widest">PixelForge IT Studio</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-black text-slate-900 leading-tight uppercase mb-6">
                    WE DON'T JUST BUILD APPS. WE ARCHITECT ADVANTAGES.
                </h2>
                <p class="text-slate-600 text-sm leading-relaxed mb-8 opacity-95">
                    Our team follows an agile development strategy, ensuring every pixel and every line of code aligns with your business goals. We specialize in high-load platforms and complex enterprise integrations.
                </p>

                <div class="grid sm:grid-cols-2 gap-8 mb-10">
                    <div class="space-y-2">
                        <h4 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Technical Analysis</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">Deep-dive auditing of workflows and configurations to create clear legacy blueprints.</p>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-sm font-bold text-slate-800 uppercase tracking-wider">Cloud Strategy</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">Optimizing database architectures utilizing standard technical solutions.</p>
                    </div>
                </div>

                <a href="{{ route('it.about') }}" class="inline-block px-8 py-4 bg-cyan-600 hover:bg-cyan-500 text-white rounded-lg font-bold text-xs uppercase tracking-wider transition-all shadow-md shadow-cyan-600/10 active:scale-95">
                    Studio Overview
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     SUCCESS METRICS (LIGHT MODE)
     ══════════════════════════════════════════ --}}
<section class="py-32 bg-slate-50/50 relative overflow-hidden border-b border-slate-100">
    <div class="container mx-auto px-6 md:px-12">
        <div class="max-w-4xl mx-auto text-center mb-20 reveal">
            <h2 class="text-2xl md:text-4xl font-black text-slate-900 uppercase tracking-tight">
                OUR SOLUTIONS POWER GLOBAL BUSINESS GROWTH
            </h2>
            <div class="w-16 h-1 bg-cyan-600 mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($metrics as $index => $metric)
            <div class="text-center bg-white border border-slate-200/50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="w-14 h-14 rounded-xl bg-cyan-50 border border-cyan-100 flex items-center justify-center text-cyan-600 mx-auto mb-6 hover:bg-cyan-600 hover:text-white hover:border-cyan-600 transition-all duration-300">
                    <i class="{{ $metric->icon ?? 'ri-bar-chart-2-line' }} text-2xl"></i>
                </div>
                <div class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-1">
                    {{ $metric->count }}<span class="text-cyan-600">{{ $metric->suffix }}</span>
                </div>
                <p class="text-[9px] font-bold uppercase tracking-widest text-slate-400">{{ $metric->title }}</p>
            </div>
            @empty
            @php
                $metricFallbacks = [
                    ['Projects Completed', '700', '+', 'ri-terminal-box-line'],
                    ['Active Clients', '120', '+', 'ri-team-line'],
                    ['Success Rate', '99', '%', 'ri-medal-line'],
                    ['Expert Engineers', '45', '+', 'ri-user-settings-line'],
                ];
            @endphp
            @foreach($metricFallbacks as $index => [$title, $count, $suffix, $icon])
            <div class="text-center bg-white border border-slate-200/50 p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="w-14 h-14 rounded-xl bg-cyan-50 border border-cyan-100 flex items-center justify-center text-cyan-600 mx-auto mb-6 hover:bg-cyan-600 hover:text-white hover:border-cyan-600 transition-all duration-300">
                    <i class="{{ $icon }} text-2xl"></i>
                </div>
                <div class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-1">
                    {{ $count }}<span class="text-cyan-600">{{ $suffix }}</span>
                </div>
                <p class="text-[9px] font-bold uppercase tracking-widest text-slate-400">{{ $title }}</p>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     TECHNOLOGY INDEX (CLEAN LIGHT GRID)
     ══════════════════════════════════════════ --}}
<section class="py-32 bg-white relative">
    <div class="container mx-auto px-6 md:px-12">
        <div class="text-center max-w-xl mx-auto mb-20 reveal">
            <span class="text-cyan-600 font-extrabold uppercase tracking-widest text-[10px] block mb-2">Modern Ecosystem</span>
            <h2 class="text-3xl font-black text-slate-900 uppercase tracking-tight">Advanced Technical Stack</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 reveal" style="animation-delay: 0.1s">
            @php
                $techIndex = [
                    ['Infrastructure', 'ri-pie-chart-2-line'],
                    ['Cyber Security', 'ri-shield-flash-line'],
                    ['Cloud Operations', 'ri-cloud-line'],
                    ['Performance', 'ri-pulse-line'],
                    ['Enterprise ERP', 'ri-settings-5-line'],
                    ['QA Automation', 'ri-test-tube-line'],
                ];
            @endphp
            @foreach($techIndex as $index => [$title, $icon])
            <div class="group bg-slate-50 border border-slate-200/50 hover:bg-white hover:border-cyan-500/20 hover:shadow-lg hover:shadow-slate-100 rounded-xl p-6 flex flex-col items-center justify-center text-center transition-all duration-300 cursor-pointer h-36">
                <div class="w-10 h-10 rounded-lg bg-cyan-50 flex items-center justify-center text-cyan-600 mb-4 group-hover:bg-cyan-600 group-hover:text-white transition-all duration-300">
                    <i class="{{ $icon }} text-xl"></i>
                </div>
                <h5 class="text-slate-800 text-[10px] font-bold uppercase tracking-widest leading-relaxed">{!! str_replace(' ', '<br>', $title) !!}</h5>
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
        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            speed: 1200,
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
                    document.querySelectorAll('.hero-swiper .swiper-slide-active .reveal').forEach(el => {
                        el.classList.add('revealed');
                    });
                },
                slideChange: function () {
                    document.querySelectorAll('.hero-swiper .swiper-slide-active .reveal').forEach(el => {
                        el.classList.add('revealed');
                    });
                }
            }
        });

        // Scroll Reveal
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
        transform: translateY(20px);
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .revealed {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }
</style>
@endpush
