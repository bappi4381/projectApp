@extends('layouts.app')

@section('title', 'IT Solutions | Enterprise Software & Technical Excellence | PixelForge Group')
@section('meta_description', 'Customized software development, cloud solutions, and enterprise digital engineering by PixelForge Group. We turn complex problems into scalable digital solutions.')

@push('styles')
<style>
    :root {
        --it-primary: #3ABEF9;
        --it-secondary: #0078D4;
        --it-accent: #A7E6FF;
    }

    /* ── Animations ────────────────────────────────────── */
    @keyframes float-panel {
        0%, 100% { transform: translateY(0) rotate(0); }
        50% { transform: translateY(-15px) rotate(1deg); }
    }
    .animate-float-panel { animation: float-panel 5s ease-in-out infinite; }

    /* ── Hero Gradient ─────────────────────────────────── */
    .hero-gradient {
        background: radial-gradient(circle at top right, rgba(58, 190, 249, 0.15) 0%, transparent 60%),
                    radial-gradient(circle at bottom left, rgba(0, 120, 212, 0.1) 0%, transparent 50%),
                    #020817;
    }

    .card-glass {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-glass:hover {
        background: rgba(255, 255, 255, 0.06);
        border-color: var(--it-primary);
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(58, 190, 249, 0.15);
    }

    .text-gradient-it {
        background: linear-gradient(135deg, #3ABEF9 0%, #0078D4 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-it-primary {
        background: linear-gradient(135deg, #3ABEF9 0%, #0078D4 100%);
        box-shadow: 0 10px 20px rgba(58, 190, 249, 0.3);
    }
    .btn-it-primary:hover {
        box-shadow: 0 15px 30px rgba(58, 190, 249, 0.5);
        transform: translateY(-2px);
    }

    .line-height-1 { line-height: 1; }

    /* ── Swiper Overrides ──────────────────────────────── */
    .service-swiper .swiper-slide {
        height: auto;
    }
</style>
{{-- Swiper CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
@endpush

@section('content')

<!-- Wrapper for boxed layout -->
<section class="relative min-h-[75vh] flex items-center pt-16 pb-24">
    {{-- Background Image & Overlays --}}
    <div class="absolute inset-0 z-0">
        {{-- Professional IT Team Image --}}
        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=2069" alt="Team Working" class="w-full h-full object-cover">
        {{-- Blueish dark overlay --}}
        <div class="absolute inset-0 bg-[#0a192f] mix-blend-multiply opacity-80"></div>
        {{-- Gradient to make text readable --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#081326] via-[#081326]/80 to-transparent"></div>
    </div>
    
    {{-- Carousel Pagination Dots --}}
    <div class="absolute right-8 top-1/2 -translate-y-1/2 flex flex-col gap-3 z-30 hidden md:flex">
        <div class="w-4 h-4 rounded-full border border-white flex items-center justify-center cursor-pointer">
            <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
        </div>
        <div class="w-2.5 h-2.5 rounded-full bg-white/40 cursor-pointer hover:bg-white transition-colors mx-auto"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 pt-10">
        <div class="max-w-3xl reveal">
            {{-- Subheading --}}
            <h5 class="text-[#3ABEF9] font-bold text-[9px] tracking-[0.2em] uppercase mb-3">
                Point of Sale, Enterprise Resource Planning (ERP).
            </h5>
            
            {{-- Main Heading --}}
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-white leading-[1.05] mb-6 uppercase font-sans">
                <span class="text-transparent" style="-webkit-text-stroke: 1.2px white;">Customize</span> Software<br>
                Development.
            </h1>
            
            {{-- Action Buttons --}}
            <div class="flex flex-wrap items-center gap-6 md:gap-8">
                <a href="#" class="bg-[#3ABEF9] hover:bg-sky-500 text-white px-8 py-3.5 rounded text-[13px] font-bold tracking-[0.1em] transition-colors flex items-center gap-2">
                    READMORE <i class="ri-arrow-right-line text-lg"></i>
                </a>
                
                <button class="flex items-center gap-3 group">
                    <div class="w-[45px] h-[45px] rounded-full bg-[#3ABEF9] group-hover:bg-sky-50 flex items-center justify-center text-white transition-colors">
                        <i class="ri-play-fill text-xl ml-0.5 mt-0.5"></i>
                    </div>
                    <span class="text-white font-bold text-[13px] tracking-[0.1em] uppercase border-b-2 border-white pb-0.5 group-hover:border-[#3ABEF9] transition-colors">
                        HOW IT WORKS
                    </span>
                </button>
            </div>
        </div>
    </div>

    {{-- Floating Features Cards --}}
    <div class="absolute w-full bottom-0 translate-y-[50%] z-30 px-6 left-0">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 lg:max-w-6xl mx-auto">
                <!-- Card 1 -->
                <div class="bg-sky-950/60 backdrop-blur-xl border border-[#3ABEF9]/20 shadow-[0_15px_40px_rgba(0,0,0,0.2)] rounded-2xl px-8 py-10 transition-all flex items-start gap-5 group cursor-pointer reveal hover:-translate-y-2 hover:bg-sky-900/80 hover:border-[#3ABEF9]/50 hover:shadow-[0_25px_50px_rgba(58,190,249,0.15)]" style="animation-delay: 0.1s;">
                    <div class="w-[55px] h-[55px] rounded-full bg-sky-900/50 shadow-sm border border-[#3ABEF9]/30 flex items-center justify-center flex-shrink-0 text-[#3ABEF9] transition-all group-hover:bg-[#3ABEF9] group-hover:text-white group-hover:border-[#3ABEF9]">
                        <i class="ri-server-line text-[26px] group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div class="pt-1">
                        <h4 class="text-white font-extrabold text-[15px] group-hover:text-[#3ABEF9] transition-colors uppercase mb-2">WEB HOSTING</h4>
                        <p class="text-slate-300 font-medium text-[13px] leading-relaxed group-hover:text-slate-200 transition-colors">Fast, secure, and affordable hosting plans for any budget.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-sky-950/60 backdrop-blur-xl border border-[#3ABEF9]/20 shadow-[0_15px_40px_rgba(0,0,0,0.2)] rounded-2xl px-8 py-10 transition-all flex items-start gap-5 group cursor-pointer reveal hover:-translate-y-2 hover:bg-sky-900/80 hover:border-[#3ABEF9]/50 hover:shadow-[0_25px_50px_rgba(58,190,249,0.15)]" style="animation-delay: 0.2s;">
                    <div class="w-[55px] h-[55px] rounded-full bg-sky-900/50 shadow-sm border border-[#3ABEF9]/30 flex items-center justify-center flex-shrink-0 text-[#3ABEF9] transition-all group-hover:bg-[#3ABEF9] group-hover:text-white group-hover:border-[#3ABEF9]">
                        <i class="ri-computer-line text-[26px] group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div class="pt-1">
                        <h4 class="text-white font-extrabold text-[15px] group-hover:text-[#3ABEF9] transition-colors uppercase mb-2">WEB DEVELOPMENT</h4>
                        <p class="text-slate-300 font-medium text-[13px] leading-relaxed group-hover:text-slate-200 transition-colors">The beautiful, easy website Development.</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-sky-950/60 backdrop-blur-xl border border-[#3ABEF9]/20 shadow-[0_15px_40px_rgba(0,0,0,0.2)] rounded-2xl px-8 py-10 transition-all flex items-start gap-5 group cursor-pointer reveal hover:-translate-y-2 hover:bg-sky-900/80 hover:border-[#3ABEF9]/50 hover:shadow-[0_25px_50px_rgba(58,190,249,0.15)]" style="animation-delay: 0.3s;">
                    <div class="w-[55px] h-[55px] rounded-full bg-sky-900/50 shadow-sm border border-[#3ABEF9]/30 flex items-center justify-center flex-shrink-0 text-[#3ABEF9] transition-all group-hover:bg-[#3ABEF9] group-hover:text-white group-hover:border-[#3ABEF9]">
                        <i class="ri-code-s-slash-line text-[26px] group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div class="pt-1">
                        <h4 class="text-white font-extrabold text-[15px] group-hover:text-[#3ABEF9] transition-colors uppercase mb-2">CUSTOM SOFTWARE</h4>
                        <p class="text-slate-300 font-medium text-[13px] leading-relaxed group-hover:text-slate-200 transition-colors">Custom software development is perfect for enterprise.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     ABOUT / EXECUTION SECTION
══════════════════════════════════════════ --}}
<section class="py-16 lg:py-28 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-24 items-center">
            {{-- Image Side --}}
            <div class="relative reveal mx-auto w-full max-w-md lg:max-w-none lg:pr-8">
                <div class="relative rounded-[2rem] overflow-hidden shadow-2xl">
                    <div class="absolute inset-0 bg-[#3ABEF9]/10 mix-blend-multiply z-10 pointer-events-none"></div>
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=1000" alt="Team" class="w-full object-cover aspect-square sm:aspect-[4/5] relative z-0">
                </div>
                
                {{-- Floating Stats Card --}}
                <div class="absolute -bottom-6 -right-6 lg:-bottom-12 lg:-right-4 bg-white shadow-[0_20px_50px_rgba(0,0,0,0.15)] p-6 lg:p-8 rounded-[2rem] border border-slate-100 z-20 hidden sm:block">
                    <div class="text-5xl lg:text-6xl font-black text-slate-900 mb-2 line-height-1">2K<span class="text-[#3ABEF9]">+</span></div>
                    <div class="text-slate-500 font-bold tracking-widest uppercase text-[10px] lg:text-xs">Global Clients</div>
                </div>
            </div>
            
            {{-- Text Side --}}
            <div class="reveal mt-8 lg:mt-0" style="animation-delay: 0.2s">
                <span class="inline-block px-4 py-1.5 rounded-full bg-sky-50 border border-sky-100 text-[#3ABEF9] font-bold uppercase tracking-[0.2em] text-[10px] mb-5">
                    About Our Company
                </span>
                
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-6 leading-[1.15] ">
                    <span class="uppercase">We Execute Ideas From</span> <span class="text-gradient-it uppercase">Beginning To Finish.</span>
                </h2>
                
                <p class="text-slate-600 leading-relaxed text-[15px] mb-10">
                    Our multi-disciplinary team follows an agile deployment strategy, ensuring every pixel and every line of code aligns with your business goals. We don't just build software; we architect market advantages.
                </p>
                
                <div class="grid sm:grid-cols-2 gap-6 mb-12">
                    @php
                        $features = [
                            ['Expert Tech Advice', 'ri-lightbulb-flash-line'],
                            ['Agile Development', 'ri-loop-right-line'],
                            ['Quality Assurance', 'ri-shield-check-line'],
                            ['24/7 Tech Support', 'ri-customer-service-2-line'],
                        ];
                    @endphp
                    @foreach($features as [$feat, $icon])
                    <div class="flex items-center gap-4 group">
                        <div class="w-12 h-12 rounded-2xl bg-sky-50 flex items-center justify-center flex-shrink-0 group-hover:bg-[#3ABEF9] transition-colors">
                            <i class="{{ $icon }} text-[#3ABEF9] text-xl group-hover:text-white transition-colors"></i>
                        </div>
                        <span class="text-slate-800 font-bold text-[14px]">{{ $feat }}</span>
                    </div>
                    @endforeach
                </div>
                
                <a href="/about" class="inline-flex items-center gap-3 text-white bg-[#3ABEF9] hover:bg-sky-500 px-8 py-4 rounded-xl font-bold tracking-[0.1em] text-[13px] uppercase transition-all hover:-translate-y-1 hover:shadow-xl shadow-sky-500/30">
                    LEARN MORE ABOUT US
                    <i class="ri-arrow-right-line text-lg"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     OUR SERVICE (CAROUSEL) SECTION
══════════════════════════════════════════ --}}
<section class="relative py-24 bg-[#111111] overflow-hidden">
    {{-- Right background extending infinitely right --}}
    <div class="absolute inset-y-0 right-0 w-[100%] lg:w-[65%] bg-slate-900 z-0"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-12 gap-12 items-center">
            
            {{-- Left Column (Text & Navigation) --}}
            <div class="lg:col-span-4 reveal relative">
                {{-- Black masking layer that overlaps the left section to hide cards sliding left --}}
                <div class="absolute -inset-y-[300px] -left-[100vw] -right-8 bg-[#111111] z-20 hidden lg:block pointer-events-none"></div>

                <div class="relative z-30">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="text-[#3ABEF9] font-black uppercase tracking-widest text-[12px]">Our Service</span>
                        <div class="w-10 h-0.5 bg-[#3ABEF9]"></div>
                    </div>
                    <h2 class="text-3xl md:text-[40px] font-black text-white leading-tight mb-6 uppercase">
                        We provide best solutions for preparing your success
                    </h2>
                    <p class="text-slate-400 leading-relaxed mb-10 text-[14px]">
                        We help digital companies to volume their self-interest and get a space. Eaque ipsa quae ab illo inventore veritatis et quasi.
                    </p>
                    
                    {{-- Swiper Navigation Buttons --}}
                    <div class="flex items-center gap-4 relative z-40">
                        <button class="swiper-prev-btn w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-[#3ABEF9] hover:border-[#3ABEF9] transition-all group">
                            <i class="ri-arrow-left-line group-hover:-translate-x-1 transition-transform"></i>
                        </button>
                        <button class="swiper-next-btn w-12 h-12 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-[#3ABEF9] hover:border-[#3ABEF9] transition-all group">
                            <i class="ri-arrow-right-line group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Right Column (Swiper Carousel) --}}
            <div class="lg:col-span-8 overflow-visible relative reveal z-0" style="animation-delay: 0.2s">
                <div class="swiper service-swiper !overflow-visible">
                    <div class="swiper-wrapper">
                        @php
                            $serviceSlides = [
                                ['Mobile Apps Development', 'ri-smartphone-line', 'https://images.unsplash.com/photo-1551650975-87deedd944c3?auto=format&fit=crop&q=80&w=800'],
                                ['Web Design & Development', 'ri-computer-line', 'https://images.unsplash.com/photo-1547658719-da2b51169166?auto=format&fit=crop&q=80&w=800'],
                                ['Domain Registration', 'ri-global-line', 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?auto=format&fit=crop&q=80&w=800'],
                                ['Security & Backup', 'ri-shield-keyhole-line', 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?auto=format&fit=crop&q=80&w=800'],
                                ['Web Hosting', 'ri-server-line', 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&q=80&w=800'],
                                ['Custom Software', 'ri-code-s-slash-line', 'https://images.unsplash.com/photo-1510915228340-29c85a43dcfe?auto=format&fit=crop&q=80&w=800'],
                                ['Digital Marketing', 'ri-megaphone-line', 'https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?auto=format&fit=crop&q=80&w=800'],
                            ];
                        @endphp
                        
                        @foreach($serviceSlides as [$title, $icon, $img])
                        <div class="swiper-slide pt-7 px-2">
                            <div class="group cursor-pointer relative w-full h-[360px] block border border-transparent hover:border-white transition-all">
                                {{-- Card Background / Overlay --}}
                                <div class="absolute inset-0 overflow-hidden">
                                    <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#020617] via-[#020617]/40 to-transparent"></div>
                                </div>
                                
                                {{-- Icon out of bounds (Top Center) --}}
                                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[55px] h-[55px] rounded-full bg-white flex items-center justify-center text-[#3ABEF9] z-20 shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="{{ $icon }} text-2xl"></i>
                                </div>

                                {{-- Text Content (Bottom) --}}
                                <div class="absolute bottom-6 left-6 right-6 z-20">
                                    <span class="text-[#3ABEF9] font-black text-[9px] tracking-[0.15em] uppercase mb-1 block">{{ $title }}</span>
                                    <h3 class="text-white font-black text-[15px] uppercase leading-tight">{{ $title }}</h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     STATISTICS & GROWTH SECTION
══════════════════════════════════════════ --}}
<section class="py-24 bg-white relative overflow-hidden">
    {{-- Decorative World Map Background (simulated using light pattern or subtle svg) --}}
    <div class="absolute inset-0 z-0 opacity-[0.03]" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/80/World_map_-_low_resolution.svg'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        {{-- Section Title --}}
        <div class="text-center max-w-3xl mx-auto mb-20 reveal">
            <div class="flex items-center justify-center gap-4 mb-4">
                <div class="w-12 h-px bg-[#3ABEF9]"></div>
                <span class="text-[#3ABEF9] font-bold uppercase tracking-widest text-[10px]">Numbers Are Talking</span>
                <div class="w-12 h-px bg-[#3ABEF9]"></div>
            </div>
            <h2 class="text-3xl md:text-[32px] font-black text-slate-800 uppercase leading-[1.3]">
                Let's talk about our business growth in<br>IT consulting solution
            </h2>
        </div>

        {{-- Stats Content --}}
        <div class="max-w-5xl mx-auto grid md:grid-cols-12 gap-12 items-center reveal" style="animation-delay: 0.1s">
            <div class="md:col-span-5 text-center flex flex-col items-center justify-center border-b md:border-b-0 md:border-r border-slate-100 pb-10 md:pb-0 md:pr-10">
                <div class="text-[140px] font-black leading-none text-slate-900 relative inline-block tracking-tighter">
                    12<span class="text-[#3ABEF9] absolute text-[60px] -top-2 -right-14">+</span>
                </div>
                <p class="text-slate-500 font-bold text-[12px] tracking-wide mt-2">Learn more about our Success Stories</p>
            </div>
            
            <div class="md:col-span-7 grid sm:grid-cols-2 gap-y-12 gap-x-8 pl-0 md:pl-6">
                @php
                    $stats = [
                        ['8792', 'Delivered Goods', 'ri-macbook-line'],
                        ['20', 'IT Consultant', 'ri-user-settings-line'],
                        ['7000', 'Project Complete', 'ri-focus-3-line'],
                        ['150', 'Total Team Member', 'ri-team-line'],
                    ];
                @endphp
                @foreach($stats as [$num, $label, $icon])
                <div class="flex items-start gap-4">
                    <i class="{{ $icon }} text-[40px] text-[#3ABEF9] font-light"></i>
                    <div class="pt-1">
                        <div class="text-xl font-black text-slate-900 mb-1 leading-none tracking-tight">{{ $num }} <span class="text-slate-900 absolute text-sm ml-0.5 rounded-full overflow-hidden top-0">+</span></div>
                        <div class="text-slate-500 text-[10px] font-bold uppercase tracking-wide">{{ $label }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     VIDEO PROMO BANNER
══════════════════════════════════════════ --}}
<section class="pb-24 bg-white relative z-20 overflow-hidden">
    <div class="container mx-auto px-6 max-w-[1000px]">
        <div class="relative bg-white shadow-2xl shadow-slate-200/50 rounded-xl overflow-hidden flex flex-col md:flex-row reveal min-h-[300px]">
            {{-- Image Side --}}
            <div class="w-full md:w-2/3 h-[250px] md:h-auto relative">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&q=80&w=1200" alt="Team" class="w-full h-full object-cover">
                {{-- Play Button --}}
                <div class="absolute inset-0 flex items-center justify-end pr-10">
                    <button class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-[#3ABEF9] text-xl shadow-xl hover:scale-110 transition-transform relative z-20 translate-x-12 md:translate-x-10">
                        <i class="ri-play-fill ml-1"></i>
                    </button>
                </div>
            </div>
            {{-- Solid Blue Graphic Side --}}
            <div class="w-full md:w-1/3 bg-[#3ABEF9] relative flex flex-col justify-center px-10 py-12 md:py-0 text-white">
                {{-- Curved styling on left border --}}
                <div class="hidden md:block absolute -left-[70px] top-1/2 -translate-y-1/2 w-[140px] h-[340px] bg-white rounded-full mix-blend-overlay opacity-10 pointer-events-none"></div>
                <div class="hidden md:block absolute -left-12 top-0 bottom-0 w-24 bg-white rounded-r-[100px]"></div>
                
                <div class="relative z-10 flex flex-col justify-end h-full pl-6 md:pl-8">
                    <h3 class="text-[19px] font-black uppercase leading-[1.3] mb-6 tracking-wide mt-auto">
                        Agency Excited With<br>Our Solutions
                    </h3>
                    <a href="#" class="inline-block text-[10px] font-bold tracking-[0.2em] uppercase border-b border-white pb-0.5 w-max hover:text-slate-100 mb-6 transition-colors">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     TESTIMONIALS (CLIENTS REVIEW)
══════════════════════════════════════════ --}}
<section class="py-24 bg-slate-50 border-t border-slate-100">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 reveal">
            <div>
                <div class="flex items-center gap-4 mb-3">
                    <span class="text-[#3ABEF9] font-bold uppercase tracking-widest text-[10px]">Our Client's Review</span>
                    <div class="w-10 h-0.5 bg-[#3ABEF9]"></div>
                </div>
                <h2 class="text-3xl md:text-[32px] font-black text-slate-800 uppercase tracking-tight">What Client's Say About Us</h2>
            </div>
            <div class="flex gap-2 mt-6 md:mt-0">
                <button class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-400 hover:bg-[#3ABEF9] hover:border-[#3ABEF9] hover:text-white transition-all"><i class="ri-arrow-left-line"></i></button>
                <button class="w-10 h-10 rounded-full border border-slate-300 flex items-center justify-center text-slate-400 hover:bg-[#3ABEF9] hover:border-[#3ABEF9] hover:text-white transition-all"><i class="ri-arrow-right-line"></i></button>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-8 reveal" style="animation-delay: 0.1s">
            {{-- Testimonial 1 --}}
            <div class="bg-white p-8 relative flex shadow-sm border border-slate-100/50 rounded-sm">
                <div class="absolute top-6 left-6 text-slate-900 text-2xl">
                    <i class="ri-double-quotes-l"></i>
                </div>
                <div class="mt-12 flex gap-6 w-full">
                    <div class="w-32 h-32 bg-[#3ABEF9] shrink-0 flex items-center justify-center text-white text-[11px] font-black text-center leading-tight tracking-widest px-2">
                        TRADEVISION<br>LTD
                    </div>
                    <div class="flex flex-col justify-between">
                        <p class="text-slate-500 text-[12px] italic leading-relaxed mb-6 font-medium pr-4">
                            it sounds like you've had a truly exceptional experience with FUTURE IT ! Their consistent delivery of high-quality service and dedicated support must have been invaluable to your organization.
                        </p>
                        <div class="flex items-center justify-between">
                            <div>
                                <h5 class="text-slate-900 font-black text-[11px] uppercase tracking-wide">TVL</h5>
                                <span class="text-[#3ABEF9] font-bold text-[8px] uppercase tracking-widest block mt-0.5">Chairman</span>
                            </div>
                            <div class="flex gap-1 text-[#3ABEF9] text-[10px]">
                                <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Testimonial 2 --}}
            <div class="bg-white p-8 relative flex shadow-sm border border-slate-100/50 rounded-sm">
                <div class="absolute top-6 left-6 text-slate-900 text-2xl">
                    <i class="ri-double-quotes-l"></i>
                </div>
                <div class="mt-12 flex gap-6 w-full">
                    <div class="w-32 h-32 bg-white border border-slate-100 shrink-0 flex items-center justify-center text-slate-900 text-[11px] font-black text-center leading-tight tracking-widest flex-col px-2">
                         <div class="w-full h-8 mb-2 flex items-center justify-center text-[#ff9900] text-3xl"><i class="ri-send-plane-fill"></i></div>
                         <span class="text-[#3ABEF9]">Delight</span> Holiday<br>
                         <span class="text-[6px] tracking-normal text-slate-400 mt-1">Touring Support</span>
                    </div>
                    <div class="flex flex-col justify-between">
                        <p class="text-slate-500 text-[12px] italic leading-relaxed mb-6 font-medium pr-4">
                            it sounds like you've had a truly exceptional experience with FUTURE IT ! Their consistent delivery of high-quality service and dedicated support must have been invaluable to your organization.
                        </p>
                        <div class="flex items-center justify-between">
                            <div>
                                <h5 class="text-slate-900 font-black text-[11px] uppercase tracking-wide">Delight Holiday</h5>
                                <span class="text-[#3ABEF9] font-bold text-[8px] uppercase tracking-widest block mt-0.5">Chairman</span>
                            </div>
                            <div class="flex gap-1 text-[#3ABEF9] text-[10px]">
                                <i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     TECHNOLOGY INDEX (IMPROVED & INNOVATIVE)
══════════════════════════════════════════ --}}
<section class="py-24 bg-[#212429] relative overflow-hidden">
    <div class="container mx-auto px-6 max-w-6xl relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16 reveal">
            <div class="flex items-center justify-center gap-4 mb-3">
                <span class="text-[#3ABEF9] font-bold uppercase tracking-widest text-[9px]">Technology Index</span>
                <div class="w-8 h-px bg-[#3ABEF9]"></div>
            </div>
            <h2 class="text-3xl md:text-[34px] font-black text-white uppercase mb-6 drop-shadow-md tracking-tight">
                Improved And Innovative
            </h2>
            <p class="text-slate-300 text-[11px] leading-relaxed font-bold mx-auto max-w-2xl px-8 tracking-wide">
                We have the specialist to help you define in stages a business plan, design the products customers want. Its helped to customer define their vision for success of business.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 reveal" style="animation-delay: 0.1s">
            @php
                $techIndex = [
                    ['Marketing Strategy', 'ri-bar-chart-grouped-line'],
                    ['Cyber Security', 'ri-macbook-line'],
                    ['Business Services', 'ri-shield-user-fill'],
                    ['Digital Marketing', 'ri-bar-chart-box-line'],
                    ['Industry Service', 'ri-phone-find-line'],
                    ['Insider Survey', 'ri-profile-line'],
                ];
            @endphp
            @foreach($techIndex as $index => [$title, $icon])
            <div class="group border border-slate-700 hover:border-[#3ABEF9] bg-transparent p-6 flex flex-col items-center justify-center text-center transition-all duration-300 cursor-pointer h-36">
                <i class="{{ $icon }} text-3xl text-cyan-400 mb-5 group-hover:scale-110 transition-transform font-light"></i>
                <h5 class="text-slate-100 text-[9px] font-bold uppercase tracking-widest leading-[1.6] mx-auto block">{!! str_replace(' ', '<br>', $title) !!}</h5>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     BLOG SECTION
══════════════════════════════════════════ --}}
<section class="py-24 bg-slate-50 relative overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-end justify-between mb-16 reveal">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <span class="text-[#3ABEF9] font-bold uppercase tracking-widest text-[11px]">Recent News</span>
                    <div class="w-12 h-0.5 bg-[#3ABEF9]"></div>
                </div>
                <h2 class="text-4xl md:text-[40px] font-black text-slate-900 uppercase leading-tight">WHAT'S GOING ON OUR BLOG?</h2>
            </div>
            <a href="/blog" class="px-8 py-3.5 bg-[#3ABEF9] hover:bg-[#2da9e3] text-white font-bold text-xs tracking-widest uppercase transition-colors mt-6 md:mt-0 shadow-lg shadow-sky-500/20">VIEW ALL</a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
                $blogs = [
                    ['How to become a successful businessman', 'Business', 'https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&q=80&w=800'],
                    ['10 Efficient & Measurable Benefits of Software', 'Creative Invention', 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=800'],
                    ['Exploring latest Web design together with Theme', 'Professionals', 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&q=80&w=800'],
                ];
            @endphp
            @foreach($blogs as $index => [$title, $category, $img])
            <div class="group reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="relative overflow-hidden h-[240px]">
                    <img src="{{ $img }}" alt="Blog" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute bottom-0 right-0 lg:right-4 bg-[#3ABEF9] text-white text-[10px] tracking-widest font-bold px-4 py-2.5 flex items-center gap-2">
                        <i class="ri-calendar-line text-sm"></i>
                        JUN 03, 2020
                    </div>
                </div>
                <div class="bg-white p-8 lg:p-10 shadow-[0_15px_40px_rgba(0,0,0,0.04)]">
                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2 text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-5">
                        <span class="flex items-center gap-2 hover:text-[#3ABEF9] cursor-pointer transition-colors"><i class="ri-user-line text-[#3ABEF9] text-[14px]"></i> BY ADMIN</span>
                        <span class="flex items-center gap-2 hover:text-[#3ABEF9] cursor-pointer transition-colors"><i class="ri-folder-open-line text-[#3ABEF9] text-[14px]"></i> {{ $category }}</span>
                    </div>
                    <h4 class="text-[17px] font-bold text-slate-900 mb-5 group-hover:text-[#3ABEF9] transition-colors uppercase leading-snug">{{ $title }}</h4>
                    <p class="text-slate-500 text-[14px] leading-relaxed mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CONTACT STRIP
══════════════════════════════════════════ --}}
<section class="bg-[#2da9e3]">
    <div class="container mx-auto">
        <div class="flex flex-col lg:flex-row items-stretch text-white text-[13px] font-bold">
            <div class="flex-1 flex items-center justify-center gap-3 py-6 lg:py-6 border-b lg:border-b-0 lg:border-r border-white/20 hover:bg-white/10 transition-colors">
                <i class="ri-mail-line text-xl"></i>
                <a href="mailto:futureitlimited@gmail.com" class="hover:text-slate-100">futureitlimited@gmail.com</a>
            </div>
            <div class="flex-1 flex items-center justify-center gap-3 py-6 lg:py-6 border-b lg:border-b-0 lg:border-r border-white/20 hover:bg-white/10 transition-colors">
                <i class="ri-phone-line text-xl"></i>
                <a href="tel:+8801971111209" class="hover:text-slate-100">+8801971111209</a>
            </div>
            <div class="flex-1 flex items-center justify-center gap-3 py-6 lg:py-6 border-b lg:border-b-0 lg:border-r border-white/20 hover:bg-white/10 transition-colors">
                <i class="ri-map-pin-line text-xl"></i>
                <span>Dhaka,Bangladesh.</span>
            </div>
            <div class="flex-1 flex items-center justify-center gap-3 py-6 lg:py-6 hover:bg-white/10 transition-colors">
                <a href="#" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#2da9e3] hover:text-white hover:bg-slate-900 transition-all"><i class="ri-facebook-fill"></i></a>
                <a href="#" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#2da9e3] hover:text-white hover:bg-slate-900 transition-all"><i class="ri-twitter-fill"></i></a>
                <a href="#" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#2da9e3] hover:text-white hover:bg-slate-900 transition-all"><i class="ri-linkedin-fill"></i></a>
                <a href="#" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#2da9e3] hover:text-white hover:bg-slate-900 transition-all"><i class="ri-youtube-fill"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     FOOTER
══════════════════════════════════════════ --}}
<footer class="pt-24 pb-10 relative bg-[#2a2a2a] text-white overflow-hidden">
    {{-- Background overlay texture --}}
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('https://www.transparenttextures.com/patterns/maze-white.png');"></div>
    <div class="absolute inset-0 bg-gradient-to-tr from-slate-900/90 to-transparent pointer-events-none"></div>
    
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-20">
            
            {{-- Column 1 --}}
            <div>
                <h4 class="text-xl font-bold uppercase mb-8 tracking-wide">FUTURE IT</h4>
                <p class="text-[12px] font-medium text-slate-300/80 leading-[1.8] mb-8 pr-4 text-justify">
                    FUTURE IT. is a reputed software development company with 9+ years of experience and is located in Dhaka, Bangladesh. Our services are Customized Web-based Software Development, eCommerce Development, Online News Portal Development & Digital Marketing (Website Development, Website Design (UI/UX), Search Engine Optimization, Paid Promotion (PPC).
                </p>
                <div class="bg-white rounded p-6 flex flex-wrap items-center justify-between text-slate-900 lg:mr-4">
                    <div>
                        <div class="font-bold text-[16px] mb-1">Talk To Our Support</div>
                        <div class="text-[13px] font-medium text-slate-500">+8801971111209</div>
                    </div>
                    <div class="w-12 h-12 bg-[#2da9e3] rounded-full flex items-center justify-center text-white text-[22px] shadow-lg shadow-[#2da9e3]/30 hover:scale-110 transition-transform cursor-pointer">
                        <i class="ri-phone-fill"></i>
                    </div>
                </div>
            </div>

            {{-- Column 2 --}}
            <div>
                <h4 class="text-xl font-bold uppercase mb-8 tracking-wide">OUR SERVICES</h4>
                <ul class="space-y-4 text-[13px] font-bold text-slate-300">
                    @php
                        $footerServices = ['Domain Registration', 'Web Hosting', 'Software Development', 'Web Design & Development', 'Mobile Apps Development', 'Digital Marketing', 'Graphic Design & Animation', 'Security & Backup', 'IT Consulting', 'IT Training'];
                    @endphp
                    @foreach($footerServices as $service)
                    <li><a href="#" class="flex items-center gap-2 hover:text-white transition-colors"><i class="ri-arrow-right-s-line text-[16px]"></i>{{ $service }}</a></li>
                    @endforeach
                </ul>
            </div>

            {{-- Column 3 --}}
            <div>
                <h4 class="text-xl font-bold uppercase mb-8 tracking-wide">LATEST NEWS</h4>
                <div class="space-y-6">
                    @php
                        $newsItems = [
                            ['How to become a successful businessman', 'https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&q=80&w=150'],
                            ['10 Efficient & Measurable Benefits of Software', 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=150'],
                            ['10 Efficient & Measurable Benefits of Software', 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=150'],
                            ['10 Efficient & Measurable Benefits of Software', 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&q=80&w=150'],
                        ];
                    @endphp
                    @foreach($newsItems as [$title, $img])
                    <div class="flex gap-4 group cursor-pointer">
                        <img src="{{ $img }}" alt="News" class="w-16 h-16 object-cover bg-slate-800 p-1 group-hover:opacity-80 transition-opacity">
                        <div>
                            <h5 class="text-[12px] font-bold mb-1.5 leading-[1.4] group-hover:text-[#3ABEF9] transition-colors pr-4">{{ $title }}</h5>
                            <span class="text-[#3ABEF9] text-[10px] uppercase font-bold tracking-widest">JUNE 3, 2020</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Column 4 --}}
            <div>
                <h4 class="text-xl font-bold uppercase mb-8 tracking-wide">NEWSLETTER</h4>
                <p class="text-[12px] font-bold text-slate-300 mb-6 leading-[1.6]">Sign up today for hints, tips and the latest product news</p>
                <div class="flex border-none rounded bg-white overflow-hidden p-1 shadow-inner h-12">
                    <input type="email" placeholder="Your email address" class="w-full px-3 text-[12px] text-slate-900 focus:outline-none bg-transparent">
                    <button class="bg-[#2da9e3] hover:bg-sky-500 text-white px-5 rounded text-lg transition-colors"><i class="ri-send-plane-fill"></i></button>
                </div>
            </div>

        </div>

        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between gap-4 text-[11px] font-bold text-slate-200">
            <p>Copyright © 2025 FUTURE IT, All Rights Reserved.</p>
            <div class="flex flex-wrap gap-4 md:gap-7">
                <a href="#" class="hover:text-white transition-colors">Terms and Conditions</a>
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Refund and Returns Policy</a>
                <a href="#" class="hover:text-white transition-colors">FAQ</a>
            </div>
        </div>
    </div>
</footer>

@endsection

@push('scripts')
<script>
    // Reveal animations
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
</script>

{{-- Swiper JS --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const swiper = new Swiper('.service-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            speed: 1000,
            grabCursor: true,
            navigation: {
                nextEl: '.swiper-next-btn',
                prevEl: '.swiper-prev-btn',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                1280: {
                    slidesPerView: 3.5,
                }
            }
        });
    });
</script>
@endpush
