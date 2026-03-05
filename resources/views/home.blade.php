@extends('layouts.app')

@section('title', 'PixelForge Group | Creative & Digital Excellence')
@section('meta_description', 'World-class image editing services and enterprise IT solutions under one roof. PixelForge Group — where visual excellence meets digital innovation.')

@push('styles')
<style>
    /* ── Custom animations & keyframes ────────────────────── */
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        33%       { transform: translateY(-18px) rotate(2deg); }
        66%       { transform: translateY(-8px) rotate(-2deg); }
    }
    @keyframes float-slow {
        0%, 100% { transform: translateY(0px); }
        50%       { transform: translateY(-24px); }
    }
    @keyframes pulse-glow {
        0%, 100% { opacity: 0.4; transform: scale(1); }
        50%       { opacity: 0.7; transform: scale(1.08); }
    }
    @keyframes marquee {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    @keyframes fade-up {
        from { opacity: 0; transform: translateY(30px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-in {
        from { opacity: 0; }
        to   { opacity: 1; }
    }
    @keyframes slide-left {
        from { opacity: 0; transform: translateX(-40px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes slide-right {
        from { opacity: 0; transform: translateX(40px); }
        to   { opacity: 1; transform: translateX(0); }
    }
    @keyframes spin-slow {
        to { transform: rotate(360deg); }
    }
    @keyframes draw {
        from { stroke-dashoffset: 400; }
        to   { stroke-dashoffset: 0; }
    }

    .animate-float        { animation: float 6s ease-in-out infinite; }
    .animate-float-slow   { animation: float-slow 8s ease-in-out infinite; }
    .animate-pulse-glow   { animation: pulse-glow 3s ease-in-out infinite; }
    .animate-marquee      { animation: marquee 28s linear infinite; }
    .animate-fade-up      { animation: fade-up 0.8s ease forwards; }
    .animate-fade-in      { animation: fade-in 1s ease forwards; }
    .animate-slide-left   { animation: slide-left 0.8s ease forwards; }
    .animate-slide-right  { animation: slide-right 0.8s ease forwards; }
    .animate-spin-slow    { animation: spin-slow 20s linear infinite; }

    /* ── Reveal on scroll ─────────────────────────────────── */
    .reveal { opacity: 0; transform: translateY(30px); transition: opacity 0.7s ease, transform 0.7s ease; }
    .reveal.revealed { opacity: 1; transform: translateY(0); }

    /* ── Glassmorphism cards ──────────────────────────────── */
    .glass-card {
        background: rgba(255,255,255,0.04);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255,255,255,0.08);
    }
    .glass-card-purple {
        background: linear-gradient(135deg, rgba(99,102,241,0.06) 0%, rgba(168,85,247,0.06) 50%, rgba(139,92,246,0.04) 100%);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(167,139,250,0.15);
    }
    .glass-card-cyan {
        background: linear-gradient(135deg, rgba(6,182,212,0.06) 0%, rgba(59,130,246,0.06) 50%, rgba(14,165,233,0.04) 100%);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(103,232,249,0.15);
    }

    /* ── Division card hover glow ─────────────────────────── */
    .division-card-graphics:hover {
        box-shadow: 0 30px 80px rgba(99,102,241,0.25), 0 0 0 1px rgba(167,139,250,0.3);
        border-color: rgba(167,139,250,0.4) !important;
    }
    .division-card-it:hover {
        box-shadow: 0 30px 80px rgba(6,182,212,0.25), 0 0 0 1px rgba(103,232,249,0.3);
        border-color: rgba(103,232,249,0.4) !important;
    }

    /* ── Gradient text ────────────────────────────────────── */
    .gradient-text-purple { background: linear-gradient(135deg, #a78bfa, #7c3aed, #c084fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .gradient-text-cyan   { background: linear-gradient(135deg, #67e8f9, #2563eb, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .gradient-text-hero   { background: linear-gradient(135deg, #e2e8f0 0%, #a78bfa 40%, #67e8f9 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }

    /* ── Services list check icon ─────────────────────────── */
    .service-check { color: #818cf8; font-size: 0.75rem; }
    .service-check-cyan { color: #22d3ee; font-size: 0.75rem; }

    /* ── Why-us card hover ────────────────────────────────── */
    .why-card:hover .why-icon-wrap { transform: scale(1.1) rotate(-5deg); }

    /* ── Marquee container ────────────────────────────────── */
    .marquee-container:hover .animate-marquee { animation-play-state: paused; }

    /* ── Noise texture overlay ────────────────────────────── */
    .noise::before {
        content: '';
        position: absolute; inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        opacity: 0.025;
        pointer-events: none;
        border-radius: inherit;
    }
</style>
@endpush

@section('content')

{{-- ══════════════════════════════════════════
     ULTRA-PREMIUM HERO SECTION
══════════════════════════════════════════ --}}
<section class="relative min-h-[100vh] flex items-center justify-center overflow-hidden pt-20">

    {{-- ── Background Layers ── --}}
    <div class="absolute inset-0 bg-slate-950 z-0"></div>
    
    {{-- Animated Mesh Gradient (Graphics Side) --}}
    <div class="absolute top-[-10%] left-[-10%] w-[80%] h-[80%] rounded-[100%] bg-indigo-600/20 blur-[120px] animate-pulse-glow pointer-events-none opacity-40"></div>
    {{-- Animated Mesh Gradient (IT Side) --}}
    <div class="absolute bottom-[-10%] right-[-10%] w-[70%] h-[70%] rounded-[100%] bg-cyan-600/15 blur-[120px] animate-pulse-glow pointer-events-none opacity-30" style="animation-delay: 2s"></div>

    {{-- Noise Texture --}}
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none z-10" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\"0 0 200 200\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cfilter id=\"noiseFilter\"%3E%3CfeTurbulence type=\"fractalNoise\" baseFrequency=\"0.65\" numOctaves=\"3\" stitchTiles=\"stitch\"/%3E%3C/filter%3E%3Crect width=\"100%25\" height=\"100%25\" filter=\"url(%23noiseFilter)\"/%3E%3C/svg%3E')"></div>

    {{-- Grid Projection --}}
    <div class="absolute inset-0 pointer-events-none z-5" style="background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px); background-size: 80px 80px; mask-image: radial-gradient(circle at center, black, transparent 80%);"></div>

    {{-- ── Floating Interactive Panels ── --}}
    <div class="absolute inset-0 pointer-events-none z-10 overflow-hidden">
        {{-- Left Panel (Graphics) --}}
        <div class="absolute left-[5%] top-[20%] w-[350px] h-[450px] hidden lg:block animate-float" style="animation-delay: 1s">
            <div class="w-full h-full rounded-3xl border border-white/10 bg-white/[0.02] backdrop-blur-xl rotate-[-6deg] flex flex-col items-center justify-center p-8 group transition-all duration-500 hover:rotate-0 hover:scale-105 hover:bg-white/[0.05]">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 mb-6 flex items-center justify-center shadow-lg shadow-indigo-500/30">
                    <i class="ri-palette-line text-white text-3xl"></i>
                </div>
                <h4 class="text-white font-bold text-xl mb-3 tracking-tight">Graphics Studio</h4>
                <p class="text-slate-400 text-sm text-center leading-relaxed">High-end image editing & creative retouching.</p>
                <div class="mt-8 flex gap-2">
                    <div class="h-1 w-8 rounded-full bg-indigo-500/30"></div>
                    <div class="h-1 w-12 rounded-full bg-indigo-500"></div>
                    <div class="h-1 w-8 rounded-full bg-indigo-500/30"></div>
                </div>
            </div>
        </div>

        {{-- Right Panel (IT) --}}
        <div class="absolute right-[5%] bottom-[15%] w-[380px] h-[480px] hidden lg:block animate-float-slow">
            <div class="w-full h-full rounded-3xl border border-white/10 bg-white/[0.02] backdrop-blur-xl rotate-[4deg] flex flex-col items-center justify-center p-8 transition-all duration-500 hover:rotate-0 hover:scale-105 hover:bg-white/[0.05]">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 mb-6 flex items-center justify-center shadow-lg shadow-cyan-500/30">
                    <i class="ri-code-s-slash-line text-white text-3xl"></i>
                </div>
                <h4 class="text-white font-bold text-xl mb-3 tracking-tight">IT Solutions</h4>
                <p class="text-slate-400 text-sm text-center leading-relaxed">Enterprise software & technical excellence.</p>
                <div class="mt-8 flex gap-2">
                    <div class="h-1 w-8 rounded-full bg-cyan-500/30"></div>
                    <div class="h-1 w-12 rounded-full bg-cyan-500"></div>
                    <div class="h-1 w-8 rounded-full bg-cyan-500/30"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Main Content Container ── --}}
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-28 pb-32">
        
        {{-- Luxury Badge --}}
        <div class="inline-flex items-center gap-2.5 px-5 py-2 rounded-full border border-white/10 bg-white/[0.03] backdrop-blur-md mb-8 animate-fade-in group">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-400"></span>
            </span>
            <span class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-[0.3em]">The Synergy of Tech & Art</span>
        </div>

        {{-- Balanced Headline (Slightly Smaller & Sharp) --}}
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight mb-8 animate-fade-up">
            ONE <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-cyan-500">UNIFIED</span> FORCE<br>
            <span class="relative inline-block mt-2">
                FOR EXCELLENCE
                <svg class="absolute -bottom-4 left-0 w-full" viewBox="0 0 400 20" fill="none"><path d="M5 15Q100 0 200 15T395 15" stroke="url(#grad2)" stroke-width="4" stroke-linecap="round" class="animate-draw"/></svg>
                <defs><linearGradient id="grad2"><stop offset="0%" stop-color="#6366f1"/><stop offset="100%" stop-color="#06b6d4"/></linearGradient></defs>
            </span>
        </h1>

        {{-- Balanced Subheadline --}}
        <p class="max-w-2xl mx-auto text-base sm:text-lg text-slate-400 leading-relaxed mb-12 animate-fade-up px-4" style="animation-delay: 0.2s">
            PixelForge Group bridges the gap between creative visual artistry and advanced digital engineering. A dual-force engine built for the next era of business.
        </p>

        {{-- Premium Actions --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6 animate-fade-up" style="animation-delay: 0.4s">
            <a href="{{ route('graphics.index') }}" target="_blank"
               class="group relative px-10 py-5 rounded-2xl font-bold text-white transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl shadow-indigo-600/20"></div>
                <span class="relative flex items-center gap-3">
                    <i class="ri-palette-fill text-lg"></i>
                    ENTER STUDIO
                    <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>
            
            <a href="{{ route('it.index') }}" 
               class="group relative px-10 py-5 rounded-2xl font-bold text-white transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-600 to-blue-600 rounded-2xl shadow-xl shadow-cyan-600/20"></div>
                <span class="relative flex items-center gap-3">
                    <i class="ri-code-box-fill text-lg"></i>
                    TECH LAB
                    <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>
        </div>
    </div>

    {{-- Professional Scroll Indicator --}}
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-30 flex flex-col items-center gap-3 opacity-60 hover:opacity-100 transition-opacity">
        <div class="w-6 h-10 border-2 border-slate-500 rounded-full flex justify-center p-1">
            <div class="w-1 h-2 bg-indigo-500 rounded-full animate-bounce"></div>
        </div>
        <span class="text-[9px] text-slate-500 uppercase tracking-[0.4em] font-bold">Discover Synergy</span>
    </div>

</section>



{{-- ══════════════════════════════════════════
     DUAL DIVISION CARDS SECTION
══════════════════════════════════════════ --}}
<section id="divisions" class="relative py-24 md:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-xs font-medium text-slate-400 mb-5 uppercase tracking-wider">
                <i class="ri-apps-2-line text-purple-400"></i>
                Our Two Divisions
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">Choose Your <span class="gradient-text-hero">Growth Path</span></h2>
            <p class="text-slate-400 max-w-xl mx-auto text-base leading-relaxed">Two specialized arms, built to handle distinct needs — creative pixel work and cutting-edge digital engineering.</p>
        </div>

        {{-- Division Cards --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">

            {{-- ── LEFT: Graphics Studio Card ── --}}
            <div id="graphics"
                 class="division-card-graphics glass-card-purple relative rounded-3xl p-8 md:p-10 group cursor-pointer overflow-hidden transition-all duration-500 hover:scale-[1.02] hover:-translate-y-2 noise reveal"
                 style="animation-delay:0.1s">

                {{-- Corner decorative ring --}}
                <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full border border-indigo-500/20 group-hover:border-indigo-400/40 transition-colors duration-500"></div>
                <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full border border-purple-500/15 group-hover:border-purple-400/30 transition-colors duration-500"></div>

                {{-- Inner glow --}}
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-indigo-600/5 via-transparent to-purple-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                {{-- Division Label --}}
                <div class="flex items-center justify-between mb-8">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-900/50 border border-indigo-500/30 text-xs font-semibold text-indigo-300 uppercase tracking-wider">
                        <i class="ri-palette-line text-indigo-400"></i>
                        Division 01
                    </span>
                    <div class="flex -space-x-1">
                        <div class="h-3 w-3 rounded-full bg-indigo-500"></div>
                        <div class="h-3 w-3 rounded-full bg-purple-500"></div>
                        <div class="h-3 w-3 rounded-full bg-pink-500"></div>
                    </div>
                </div>

                {{-- Icon + Title --}}
                <div class="flex items-start gap-5 mb-6">
                    <div class="flex-shrink-0 relative">
                        <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-xl shadow-indigo-500/30 group-hover:shadow-indigo-500/50 transition-all duration-500 group-hover:rotate-3">
                            <i class="ri-scissors-cut-line text-white text-2xl"></i>
                        </div>
                        <div class="absolute -inset-1 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 opacity-0 group-hover:opacity-20 blur-xl transition-opacity duration-500"></div>
                    </div>
                    <div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-1.5 group-hover:text-indigo-100 transition-colors duration-300">World-Class<br>Image Editing</h3>
                        <p class="text-indigo-300/70 text-xs font-semibold uppercase tracking-widest">Creative Graphics Studio</p>
                    </div>
                </div>

                {{-- Description --}}
                <p class="text-slate-400 text-sm leading-relaxed mb-8">
                    From product catalogue retouching to complex masking — our pixel artists deliver magazine-quality results at production scale. Trusted by global e-commerce giants and fashion brands.
                </p>

                {{-- Services List --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3 mb-8">
                    @php
                    $graphicsServices = [
                        ['Photo Retouching', 'ri-magic-line'],
                        ['Video Editing', 'ri-film-line'],
                        ['3D Modeling', 'ri-cube-line'],
                        ['Clipping Path', 'ri-scissors-cut-line'],
                        ['Product Editing', 'ri-image-edit-line'],
                        ['Background Removal', 'ri-eraser-line'],
                        ['Real Estate Editing', 'ri-home-4-line'],
                        ['Ghost Mannequin', 'ri-t-shirt-line'],
                        ['Vector Conversion', 'ri-vector-line']
                    ];
                    @endphp
                    @foreach($graphicsServices as [$service, $icon])
                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-indigo-950/40 border border-indigo-500/15 hover:border-indigo-400/35 hover:bg-indigo-950/60 transition-all duration-200 group/item">
                        <div class="flex-shrink-0 h-7 w-7 rounded-lg bg-indigo-900/60 flex items-center justify-center">
                            <i class="{{ $icon }} text-indigo-400 text-xs group-hover/item:text-indigo-300"></i>
                        </div>
                        <span class="text-slate-300 text-xs font-medium group-hover/item:text-white transition-colors">{{ $service }}</span>
                        <i class="ri-check-line text-indigo-500/60 text-xs ml-auto group-hover/item:text-indigo-400"></i>
                    </div>
                    @endforeach
                </div>

                {{-- Metrics strip --}}
                <div class="flex items-center gap-6 mb-8 p-4 rounded-2xl bg-indigo-950/30 border border-indigo-500/10">
                    <div class="text-center">
                        <div class="text-xl font-bold text-white">2M+</div>
                        <div class="text-[10px] text-slate-500 font-medium">Images/Year</div>
                    </div>
                    <div class="h-8 w-px bg-white/10"></div>
                    <div class="text-center">
                        <div class="text-xl font-bold text-white">24hr</div>
                        <div class="text-[10px] text-slate-500 font-medium">Turnaround</div>
                    </div>
                    <div class="h-8 w-px bg-white/10"></div>
                    <div class="text-center">
                        <div class="text-xl font-bold text-white">99.8%</div>
                        <div class="text-[10px] text-slate-500 font-medium">Accuracy</div>
                    </div>
                </div>

                {{-- CTA Button --}}
                <a href="{{ route('graphics.index') }}"
                   class="group/btn inline-flex items-center justify-center gap-2.5 w-full px-6 py-4 rounded-2xl font-bold text-sm bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white shadow-lg shadow-indigo-600/25 hover:shadow-indigo-500/40 transition-all duration-300 hover:scale-[1.02]">
                    <i class="ri-gallery-line text-base"></i>
                    Visit the Graphics Studio
                    <i class="ri-arrow-right-line group-hover/btn:translate-x-1 transition-transform duration-300 ml-auto"></i>
                </a>
            </div>

            {{-- ── RIGHT: IT Solutions Card ── --}}
            <div id="it-solutions"
                 class="division-card-it glass-card-cyan relative rounded-3xl p-8 md:p-10 group cursor-pointer overflow-hidden transition-all duration-500 hover:scale-[1.02] hover:-translate-y-2 noise reveal"
                 style="animation-delay:0.2s">

                {{-- Corner decorative ring --}}
                <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full border border-cyan-500/20 group-hover:border-cyan-400/40 transition-colors duration-500"></div>
                <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full border border-blue-500/15 group-hover:border-blue-400/30 transition-colors duration-500"></div>

                {{-- Inner glow --}}
                <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-cyan-600/5 via-transparent to-blue-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                {{-- Division Label --}}
                <div class="flex items-center justify-between mb-8">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-900/50 border border-cyan-500/30 text-xs font-semibold text-cyan-300 uppercase tracking-wider">
                        <i class="ri-code-s-slash-line text-cyan-400"></i>
                        Division 02
                    </span>
                    <div class="flex -space-x-1">
                        <div class="h-3 w-3 rounded-full bg-cyan-500"></div>
                        <div class="h-3 w-3 rounded-full bg-blue-500"></div>
                        <div class="h-3 w-3 rounded-full bg-indigo-500"></div>
                    </div>
                </div>

                {{-- Icon + Title --}}
                <div class="flex items-start gap-5 mb-6">
                    <div class="flex-shrink-0 relative">
                        <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-xl shadow-cyan-500/30 group-hover:shadow-cyan-500/50 transition-all duration-500 group-hover:rotate-3">
                            <i class="ri-terminal-box-line text-white text-2xl"></i>
                        </div>
                        <div class="absolute -inset-1 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 opacity-0 group-hover:opacity-20 blur-xl transition-opacity duration-500"></div>
                    </div>
                    <div>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-1.5 group-hover:text-cyan-100 transition-colors duration-300">Next-Gen<br>IT Solutions</h3>
                        <p class="text-cyan-300/70 text-xs font-semibold uppercase tracking-widest">Enterprise Technology Wing</p>
                    </div>
                </div>

                {{-- Description --}}
                <p class="text-slate-400 text-sm leading-relaxed mb-8">
                    From scalable SaaS platforms to AI-integrated mobile apps — our engineers craft future-ready digital products. We deliver code that performs, scales, and evolves with your business.
                </p>

                {{-- Services List --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-8">
                    @php
                    $itServices = [
                        ['Website Design & Dev', 'ri-global-line'],
                        ['Mobile App Development', 'ri-smartphone-line'],
                        ['Digital Marketing', 'ri-advertisement-line'],
                        ['Software Development', 'ri-code-s-slash-line'],
                        ['E-commerce Solutions', 'ri-shopping-cart-2-line'],
                        ['Web Hosting', 'ri-server-line'],
                    ];
                    @endphp
                    @foreach($itServices as [$service, $icon])
                    <div class="flex items-center gap-2.5 p-3 rounded-xl bg-cyan-950/40 border border-cyan-500/15 hover:border-cyan-400/35 hover:bg-cyan-950/60 transition-all duration-200 group/item">
                        <div class="flex-shrink-0 h-7 w-7 rounded-lg bg-cyan-900/60 flex items-center justify-center">
                            <i class="{{ $icon }} text-cyan-400 text-xs group-hover/item:text-cyan-300"></i>
                        </div>
                        <span class="text-slate-300 text-xs font-medium group-hover/item:text-white transition-colors">{{ $service }}</span>
                        <i class="ri-check-line text-cyan-500/60 text-xs ml-auto group-hover/item:text-cyan-400"></i>
                    </div>
                    @endforeach
                </div>

                {{-- Metrics strip --}}
                <div class="flex items-center gap-6 mb-8 p-4 rounded-2xl bg-cyan-950/30 border border-cyan-500/10">
                    <div class="text-center">
                        <div class="text-xl font-bold text-white">150+</div>
                        <div class="text-[10px] text-slate-500 font-medium">Projects Live</div>
                    </div>
                    <div class="h-8 w-px bg-white/10"></div>
                    <div class="text-center">
                        <div class="text-xl font-bold text-white">99.9%</div>
                        <div class="text-[10px] text-slate-500 font-medium">Uptime SLA</div>
                    </div>
                    <div class="h-8 w-px bg-white/10"></div>
                    <div class="text-center">
                        <div class="text-xl font-bold text-white">40+</div>
                        <div class="text-[10px] text-slate-500 font-medium">Engineers</div>
                    </div>
                </div>

                {{-- CTA Button --}}
                <a href="{{ route('it.index') }}"
                   class="group/btn inline-flex items-center justify-center gap-2.5 w-full px-6 py-4 rounded-2xl font-bold text-sm bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-500 hover:to-blue-500 text-white shadow-lg shadow-cyan-600/25 hover:shadow-cyan-500/40 transition-all duration-300 hover:scale-[1.02]">
                    <i class="ri-rocket-line text-base"></i>
                    Visit the Tech Lab
                    <i class="ri-arrow-right-line group-hover/btn:translate-x-1 transition-transform duration-300 ml-auto"></i>
                </a>
            </div>

        </div>{{-- /grid --}}
    </div>
</section>


{{-- ══════════════════════════════════════════
     TRUSTED BY / LOGO MARQUEE SECTION
══════════════════════════════════════════ --}}
<section class="relative py-20 overflow-hidden">

    <div class="absolute inset-0 border-y border-white/5 bg-white/[0.01]"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-12 reveal">
        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-xs font-medium text-slate-400 mb-4 uppercase tracking-wider">
            <i class="ri-verified-badge-line text-emerald-400"></i>
            Trusted By
        </span>
        <h2 class="text-2xl md:text-3xl font-bold text-white">Powering Brands Across <span class="gradient-text-hero">30+ Countries</span></h2>
    </div>

    {{-- Marquee Track --}}
    <div class="marquee-container relative overflow-hidden">
        {{-- Left & Right fade masks --}}
        <div class="absolute left-0 top-0 bottom-0 w-32 z-10 bg-gradient-to-r from-slate-950 to-transparent pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-32 z-10 bg-gradient-to-l from-slate-950 to-transparent pointer-events-none"></div>

        <div class="flex animate-marquee gap-8 w-max">
            @php
            $brands = [
                ['Amazon', 'ri-amazon-fill', '#ff9900'],
                ['Adobe', 'ri-adobe-line', '#ff0000'],
                ['Shopify', 'ri-shopping-bag-line', '#96bf48'],
                ['Fiverr', 'ri-map-pin-2-line', '#1dbf73'],
                ['Upwork', 'ri-briefcase-4-line', '#6fda44'],
                ['Alibaba', 'ri-store-3-line', '#ff6a00'],
                ['eBay', 'ri-price-tag-3-line', '#e43137'],
                ['Zalando', 'ri-shirt-line', '#f4792f'],
                ['ASOS', 'ri-handbag-line', '#2d2d2d'],
                ['Getty', 'ri-image-2-line', '#c9a84c'],
                ['Shutterstock', 'ri-camera-line', '#ff4081'],
                ['Getty', 'ri-film-line', '#c9a84c'],
            ];
            @endphp
            @foreach(array_merge($brands, $brands) as [$name, $icon, $color])
            <div class="flex items-center gap-3 px-8 py-4 rounded-2xl bg-white/[0.03] border border-white/[0.06] backdrop-blur-sm hover:bg-white/[0.07] hover:border-white/10 transition-all duration-300 cursor-default flex-shrink-0">
                <i class="{{ $icon }} text-xl" style="color: {{ $color }}99"></i>
                <span class="text-sm font-semibold text-slate-400 whitespace-nowrap">{{ $name }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Second marquee row (opposite direction) --}}
    <div class="marquee-container relative overflow-hidden mt-6">
        <div class="absolute left-0 top-0 bottom-0 w-32 z-10 bg-gradient-to-r from-slate-950 to-transparent pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-32 z-10 bg-gradient-to-l from-slate-950 to-transparent pointer-events-none"></div>
        <div class="flex gap-8 w-max" style="animation: marquee 32s linear infinite reverse;">
            @php
            $brands2 = [
                ['Microsoft', 'ri-microsoft-fill', '#00a4ef'],
                ['Google', 'ri-google-fill', '#4285f4'],
                ['Apple', 'ri-apple-fill', '#a2a2a2'],
                ['Meta', 'ri-meta-fill', '#0668e1'],
                ['Slack', 'ri-slack-line', '#4a154b'],
                ['Stripe', 'ri-bank-card-line', '#008cdd'],
                ['Notion', 'ri-file-text-line', '#000000'],
                ['Figma', 'ri-pen-nib-line', '#f24e1e'],
                ['GitHub', 'ri-github-fill', '#333'],
                ['Vercel', 'ri-cloud-fill', '#000'],
                ['Netlify', 'ri-layout-line', '#00c7b7'],
                ['Twilio', 'ri-phone-line', '#f22f46'],
            ];
            @endphp
            @foreach(array_merge($brands2, $brands2) as [$name, $icon, $color])
            <div class="flex items-center gap-3 px-8 py-4 rounded-2xl bg-white/[0.03] border border-white/[0.06] backdrop-blur-sm hover:bg-white/[0.07] hover:border-white/10 transition-all duration-300 cursor-default flex-shrink-0">
                <i class="{{ $icon }} text-xl" style="color: {{ $color }}99"></i>
                <span class="text-sm font-semibold text-slate-400 whitespace-nowrap">{{ $name }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════════
     WHY US SECTION
══════════════════════════════════════════ --}}
<section id="why-us" class="relative py-24 md:py-32">

    {{-- Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[800px] h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-radial from-indigo-950/20 via-transparent to-transparent" style="background: radial-gradient(ellipse at center, rgba(79,70,229,0.06) 0%, transparent 70%)"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center mb-16 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-xs font-medium text-slate-400 mb-5 uppercase tracking-wider">
                <i class="ri-star-line text-amber-400"></i>
                Why Choose Us
            </span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-4">The <span class="gradient-text-hero">PixelForge Promise</span></h2>
            <p class="text-slate-400 max-w-xl mx-auto text-base">Three pillars that define every project we take on — regardless of which division you partner with.</p>
        </div>

        {{-- 3-column Why Us Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $whyUs = [
                [
                    'icon' => 'ri-medal-line',
                    'title' => 'Uncompromising Quality',
                    'desc' => 'Every deliverable passes through a rigorous QA pipeline. We maintain ISO-grade quality standards across all creative and technical outputs — from single images to enterprise platforms.',
                    'accent' => 'from-amber-500 to-orange-500',
                    'glow' => 'amber',
                    'points' => ['ISO 9001 Aligned Workflow', 'Multi-layer QA Review', 'Revision-free Guarantee'],
                    'tag' => 'Quality',
                    'tagColor' => 'text-amber-300 bg-amber-900/50 border-amber-500/30',
                    'color' => 'amber',
                ],
                [
                    'icon' => 'ri-speed-line',
                    'title' => 'Lightning-Fast Delivery',
                    'desc' => 'Speed is our competitive edge. Our 400+ specialist team and agile sprints ensure you get market-ready outputs in record time — with zero compromise on precision.',
                    'accent' => 'from-indigo-500 to-purple-500',
                    'glow' => 'indigo',
                    'points' => ['24hr Turnaround Available', 'Agile Sprint Delivery', 'Real-time Progress Portal'],
                    'tag' => 'Speed',
                    'tagColor' => 'text-indigo-300 bg-indigo-900/50 border-indigo-500/30',
                    'color' => 'indigo',
                ],
                [
                    'icon' => 'ri-shield-check-line',
                    'title' => 'Bank-Grade Security',
                    'desc' => 'Your data, IP, and assets are protected with enterprise-grade encryption and strict NDA protocols. We hold SOC 2 readiness and GDPR compliance standards to keep your information safe.',
                    'accent' => 'from-emerald-500 to-cyan-500',
                    'glow' => 'emerald',
                    'points' => ['256-bit AES Encryption', 'Signed NDAs for All Projects', 'GDPR & SOC 2 Ready'],
                    'tag' => 'Security',
                    'tagColor' => 'text-emerald-300 bg-emerald-900/50 border-emerald-500/30',
                    'color' => 'emerald',
                ],
            ];
            @endphp
            @foreach($whyUs as $index => $card)
            <div class="why-card glass-card relative rounded-3xl p-8 group hover:scale-[1.03] hover:-translate-y-2 transition-all duration-500 cursor-default overflow-hidden reveal"
                 style="animation-delay: {{ $index * 0.15 }}s">

                {{-- Background glow on hover --}}
                <div class="absolute inset-0 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"
                     style="background: radial-gradient(ellipse at top left, rgba({{ $card['color'] === 'amber' ? '245,158,11' : ($card['color'] === 'indigo' ? '99,102,241' : '16,185,129') }},0.06) 0%, transparent 70%)"></div>

                {{-- Icon --}}
                <div class="relative mb-6 why-icon-wrap inline-flex transition-transform duration-300">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br {{ $card['accent'] }} flex items-center justify-center shadow-xl"
                         style="box-shadow: 0 10px 30px rgba({{ $card['color'] === 'amber' ? '245,158,11' : ($card['color'] === 'indigo' ? '99,102,241' : '16,185,129') }},0.3)">
                        <i class="{{ $card['icon'] }} text-white text-xl"></i>
                    </div>
                </div>

                {{-- Tag --}}
                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold uppercase tracking-wider border {{ $card['tagColor'] }} mb-4">
                    {{ $card['tag'] }}
                </span>

                {{-- Content --}}
                <h3 class="text-xl font-bold text-white mb-3">{{ $card['title'] }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">{{ $card['desc'] }}</p>

                {{-- Points --}}
                <ul class="space-y-2.5">
                    @foreach($card['points'] as $point)
                    <li class="flex items-center gap-2.5 text-sm">
                        <i class="ri-check-double-line text-{{ $card['color'] === 'amber' ? 'amber' : ($card['color'] === 'indigo' ? 'indigo' : 'emerald') }}-400 flex-shrink-0 text-base"></i>
                        <span class="text-slate-400 group-hover:text-slate-300 transition-colors">{{ $point }}</span>
                    </li>
                    @endforeach
                </ul>

                {{-- Bottom decoration line --}}
                <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent group-hover:via-white/20 transition-colors duration-500"></div>
            </div>
            @endforeach
        </div>

        {{-- Process Steps --}}
        <div class="mt-20 reveal">
            <div class="text-center mb-10">
                <h3 class="text-2xl font-bold text-white">How We <span class="gradient-text-purple">Work Together</span></h3>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                $steps = [
                    ['01', 'Discovery', 'ri-search-eye-line', 'We understand your exact requirements and goals.'],
                    ['02', 'Strategy', 'ri-map-2-line', 'A tailored action plan is crafted for your project.'],
                    ['03', 'Execution', 'ri-tools-line', 'Expert teams deliver with precision and speed.'],
                    ['04', 'Launch', 'ri-rocket-line', 'We hand over and support your go-live phase.'],
                ];
                @endphp
                @foreach($steps as $i => [$num, $title, $icon, $desc])
                <div class="relative glass-card rounded-2xl p-5 text-center group hover:scale-105 transition-transform duration-300">
                    {{-- Connector line (not on last) --}}
                    @if($i < 3)
                    <div class="hidden md:block absolute top-1/2 -right-2 w-4 h-px bg-white/10 z-10"></div>
                    @endif
                    <div class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-600 to-purple-600 mb-3 mx-auto">
                        <i class="{{ $icon }} text-white text-base"></i>
                    </div>
                    <div class="text-xs text-slate-500 font-bold tracking-widest mb-1">STEP {{ $num }}</div>
                    <div class="text-sm font-bold text-white mb-2">{{ $title }}</div>
                    <p class="text-slate-500 text-xs leading-relaxed">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>


{{-- ══════════════════════════════════════════
     QUOTE / CTA BANNER SECTION
══════════════════════════════════════════ --}}
<section class="relative py-24 overflow-hidden">

    <div class="absolute inset-0 bg-gradient-to-r from-indigo-950/60 via-slate-950 to-cyan-950/60 border-y border-white/5"></div>
    <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full bg-indigo-900/25 blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 rounded-full bg-cyan-900/25 blur-[100px] pointer-events-none"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">

        <div class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-gradient-to-br from-indigo-500 via-purple-500 to-cyan-500 shadow-2xl shadow-purple-500/30 mb-8 animate-float">
            <i class="ri-quote-text-line text-white text-2xl"></i>
        </div>

        <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 leading-tight">
            Ready to <span class="gradient-text-hero">Scale Your Vision?</span>
        </h2>
        <p class="text-slate-400 text-lg leading-relaxed mb-10 max-w-2xl mx-auto">
            Whether you need pixel-perfect image editing or a full-stack digital product — let's talk. Our team is ready to turn your ideas into results.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="mailto:hello@pixelforgegroup.com?subject=Quote Request"
               class="group inline-flex items-center gap-3 px-8 py-4 rounded-xl font-bold text-base bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 text-white shadow-xl shadow-indigo-500/30 hover:shadow-indigo-500/50 transition-all duration-300 hover:scale-105 hover:-translate-y-0.5">
                <i class="ri-send-plane-line text-lg group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-300"></i>
                Request a Free Quote
            </a>
            <a href="https://wa.me/8801700000000" target="_blank"
               class="group inline-flex items-center gap-3 px-8 py-4 rounded-xl font-bold text-base bg-white/5 hover:bg-emerald-500/10 text-white border border-white/10 hover:border-emerald-500/30 backdrop-blur-sm transition-all duration-300 hover:scale-105">
                <i class="ri-whatsapp-line text-emerald-400 text-lg group-hover:scale-110 transition-transform"></i>
                Chat on WhatsApp
            </a>
        </div>

    </div>
</section>

@endsection

@push('scripts')
{{-- Alpine.js for mobile nav toggle --}}
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
    // ── Parallax on hero orbs on mousemove ───────────────────
    window.addEventListener('mousemove', (e) => {
        const x = (e.clientX / window.innerWidth - 0.5) * 20;
        const y = (e.clientY / window.innerHeight - 0.5) * 20;
        document.querySelectorAll('.animate-pulse-glow').forEach((el, i) => {
            const depth = i % 2 === 0 ? 1 : -0.6;
            el.style.transform = `translate(${x * depth}px, ${y * depth}px)`;
        });
    });
</script>
@endpush

