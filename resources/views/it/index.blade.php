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

<section class="relative min-h-[95vh] flex items-center pt-24 pb-32">
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
        <div class="max-w-4xl reveal">
            {{-- Subheading --}}
            <h5 class="text-[#3ABEF9] font-bold text-[11px] tracking-[0.2em] uppercase mb-4">
                Point of Sale, Enterprise Resource Planning (ERP).
            </h5>
            
            {{-- Main Heading --}}
            <h1 class="text-5xl md:text-[5rem] lg:text-[6rem] font-black text-white leading-[1.05] mb-10 uppercase font-sans">
                <span style="-webkit-text-stroke: 2px white; color: transparent;">Customize</span> Software<br>
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
                <div class="bg-white/80 backdrop-blur-xl border border-white/60 shadow-[0_15px_40px_rgba(0,0,0,0.08)] rounded-2xl px-8 py-10 transition-all flex items-start gap-5 group cursor-pointer reveal hover:-translate-y-2 hover:bg-white hover:border-[#3ABEF9]/40 hover:shadow-[0_25px_50px_rgba(58,190,249,0.15)]" style="animation-delay: 0.1s;">
                    <div class="w-[55px] h-[55px] rounded-full bg-white/90 shadow-sm border border-slate-100 flex items-center justify-center flex-shrink-0 text-[#3ABEF9] transition-all group-hover:bg-[#3ABEF9] group-hover:text-white group-hover:border-[#3ABEF9]">
                        <i class="ri-server-line text-[26px] group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div class="pt-1">
                        <h4 class="text-slate-900 font-extrabold text-[15px] group-hover:text-[#3ABEF9] transition-colors uppercase mb-2">WEB HOSTING</h4>
                        <p class="text-slate-600 font-medium text-[13px] leading-relaxed group-hover:text-slate-500 transition-colors">Fast, secure, and affordable hosting plans for any budget.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white/80 backdrop-blur-xl border border-white/60 shadow-[0_15px_40px_rgba(0,0,0,0.08)] rounded-2xl px-8 py-10 transition-all flex items-start gap-5 group cursor-pointer reveal hover:-translate-y-2 hover:bg-white hover:border-[#3ABEF9]/40 hover:shadow-[0_25px_50px_rgba(58,190,249,0.15)]" style="animation-delay: 0.2s;">
                    <div class="w-[55px] h-[55px] rounded-full bg-white/90 shadow-sm border border-slate-100 flex items-center justify-center flex-shrink-0 text-[#3ABEF9] transition-all group-hover:bg-[#3ABEF9] group-hover:text-white group-hover:border-[#3ABEF9]">
                        <i class="ri-computer-line text-[26px] group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div class="pt-1">
                        <h4 class="text-slate-900 font-extrabold text-[15px] group-hover:text-[#3ABEF9] transition-colors uppercase mb-2">WEB DEVELOPMENT</h4>
                        <p class="text-slate-600 font-medium text-[13px] leading-relaxed group-hover:text-slate-500 transition-colors">The beautiful, easy website Development.</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white/80 backdrop-blur-xl border border-white/60 shadow-[0_15px_40px_rgba(0,0,0,0.08)] rounded-2xl px-8 py-10 transition-all flex items-start gap-5 group cursor-pointer reveal hover:-translate-y-2 hover:bg-white hover:border-[#3ABEF9]/40 hover:shadow-[0_25px_50px_rgba(58,190,249,0.15)]" style="animation-delay: 0.3s;">
                    <div class="w-[55px] h-[55px] rounded-full bg-white/90 shadow-sm border border-slate-100 flex items-center justify-center flex-shrink-0 text-[#3ABEF9] transition-all group-hover:bg-[#3ABEF9] group-hover:text-white group-hover:border-[#3ABEF9]">
                        <i class="ri-code-s-slash-line text-[26px] group-hover:scale-110 transition-transform"></i>
                    </div>
                    <div class="pt-1">
                        <h4 class="text-slate-900 font-extrabold text-[15px] group-hover:text-[#3ABEF9] transition-colors uppercase mb-2">CUSTOM SOFTWARE</h4>
                        <p class="text-slate-600 font-medium text-[13px] leading-relaxed group-hover:text-slate-500 transition-colors">Custom software development is perfect for enterprise.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     ABOUT / EXECUTION SECTION
══════════════════════════════════════════ --}}
<section class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative reveal">
                <div class="relative rounded-[40px] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=1000" alt="Team" class="w-full">
                </div>
                <div class="absolute -bottom-10 -right-10 bg-white shadow-[0_20px_50px_rgba(0,0,0,0.1)] p-10 rounded-[40px] border border-slate-100">
                    <div class="text-6xl font-black text-slate-900 mb-2 line-height-1">2K+</div>
                    <div class="text-[#3ABEF9] font-bold tracking-widest uppercase text-sm">Global Clients</div>
                </div>
            </div>
            
            <div class="reveal" style="animation-delay: 0.2s">
                <span class="text-[#3ABEF9] font-bold uppercase tracking-widest text-sm mb-4 block">About Our Company</span>
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-8 leading-tight">
                    WE EXECUTE OUR IDEAS FROM THE <span class="text-gradient-it">BEGINNING TO FINISH.</span>
                </h2>
                <p class="text-slate-600 leading-relaxed mb-10">
                    Our multi-disciplinary team follow an agile deployment strategy, ensuring every pixel and every line of code aligns with your business goals. We don't just build software; we build market advantages.
                </p>
                <div class="grid sm:grid-cols-2 gap-6 mb-12">
                    @php
                        $features = [
                            ['Expert Tech Advice', 'ri-lightbulb-line'],
                            ['Agile Development', 'ri-refresh-line'],
                            ['Quality Assurance', 'ri-checkbox-circle-line'],
                            ['24/7 Tech Support', 'ri-headphone-line'],
                        ];
                    @endphp
                    @foreach($features as [$feat, $icon])
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-sky-50 flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} text-[#3ABEF9]"></i>
                        </div>
                        <span class="text-slate-800 font-bold">{{ $feat }}</span>
                    </div>
                    @endforeach
                </div>
                <a href="/about" class="text-[#3ABEF9] font-bold flex items-center gap-3 group border-b-2 border-transparent hover:border-[#3ABEF9] w-max pb-1 transition-all">
                    LEARN MORE ABOUT US
                    <i class="ri-arrow-right-line group-hover:translate-x-2 transition-transform"></i>
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
     PORTFOLIO / SOLUTIONS SECTION
══════════════════════════════════════════ --}}
<section class="py-24 bg-slate-950">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-end justify-between mb-16 reveal">
            <div class="max-w-xl">
                <span class="text-sky-500 font-bold uppercase tracking-widest text-sm mb-4 block">Our Portfolio</span>
                <h2 class="text-4xl md:text-5xl font-black text-white leading-tight">
                    WE PROVIDE <span class="text-gradient-it">BEST SOLUTIONS</span> FOR FORECASTING YOUR SUCCESS
                </h2>
            </div>
            <div class="flex gap-4 mt-8 md:mt-0">
                <button class="w-14 h-14 rounded-full border border-white/10 flex items-center justify-center text-white hover:bg-sky-500 hover:border-sky-500 transition-all"><i class="ri-arrow-left-line"></i></button>
                <button class="w-14 h-14 rounded-full border border-white/10 flex items-center justify-center text-white hover:bg-sky-500 hover:border-sky-500 transition-all"><i class="ri-arrow-right-line"></i></button>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
                $portfolio = [
                    ['Financial Analysis', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=800'],
                    ['Cloud Storage', 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&q=80&w=800'],
                    ['Digital Marketing', 'https://images.unsplash.com/photo-1551288049-bbbda5366391?auto=format&fit=crop&q=80&w=800'],
                ];
            @endphp
            @foreach($portfolio as $index => [$title, $img])
            <div class="group relative rounded-[40px] overflow-hidden reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <img src="{{ $img }}" alt="{{ $title }}" class="w-full aspect-[4/5] object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-x-6 bottom-6 p-8 card-glass rounded-[32px] translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                    <h4 class="text-xl font-bold text-white mb-2">{{ $title }}</h4>
                    <p class="text-slate-400 text-sm">Enterprise Solution</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     STATS / GROWTH SECTION
══════════════════════════════════════════ --}}
<section class="py-24 bg-slate-900 overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="reveal">
                <h2 class="text-4xl md:text-5xl font-black text-white mb-6 leading-tight">
                    LET'S TALK ABOUT OUR BUSINESS GROWTH IN <span class="text-gradient-it">CONSULTING SOLUTIONS</span>
                </h2>
                <div class="flex items-center gap-12 mt-12">
                    <div class="text-center">
                        <div class="text-7xl font-black text-white mb-2 line-height-1">12<span class="text-sky-500">+</span></div>
                        <p class="text-slate-500 uppercase tracking-widest font-bold text-xs">Years of Experience</p>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-2 gap-6 reveal" style="animation-delay: 0.2s">
                <div class="card-glass p-10 rounded-3xl flex flex-col items-center gap-4 text-center">
                    <i class="ri-user-heart-line text-4xl text-sky-400"></i>
                    <div class="text-3xl font-black text-white">9,700+</div>
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-wider">Happy Clients</p>
                </div>
                <div class="card-glass p-10 rounded-3xl flex flex-col items-center gap-4 text-center">
                    <i class="ri-medal-fill text-4xl text-sky-400"></i>
                    <div class="text-3xl font-black text-white">40+</div>
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-wider">Awards Win</p>
                </div>
                <div class="card-glass p-10 rounded-3xl flex flex-col items-center gap-4 text-center">
                    <i class="ri-checkbox-circle-line text-4xl text-sky-400"></i>
                    <div class="text-3xl font-black text-white">4,800</div>
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-wider">Finished Projects</p>
                </div>
                <div class="card-glass p-10 rounded-3xl flex flex-col items-center gap-4 text-center">
                    <i class="ri-briefcase-line text-4xl text-sky-400"></i>
                    <div class="text-3xl font-black text-white">150+</div>
                    <p class="text-slate-500 text-[10px] font-bold uppercase tracking-wider">Experts Team</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     VIDEO SECTION
══════════════════════════════════════════ --}}
<section class="relative h-[600px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2000" alt="Video Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-slate-950/40"></div>
    </div>
    
    <div class="relative z-10 text-center reveal">
        <button class="w-24 h-24 rounded-full bg-white text-sky-600 flex items-center justify-center text-4xl shadow-3xl hover:scale-110 transition-transform mb-8 mx-auto">
            <i class="ri-play-fill"></i>
        </button>
        <h2 class="text-4xl md:text-5xl font-black text-white mb-4 uppercase">JUST WATCHING WITH EVERY STEP</h2>
        <a href="#" class="text-sm font-bold text-sky-400 uppercase tracking-[0.3em]">Learn More</a>
    </div>
</section>

{{-- ══════════════════════════════════════════
     BRAND LOGOS
══════════════════════════════════════════ --}}
<section class="py-16 bg-slate-950 border-y border-white/5">
    <div class="container mx-auto px-6">
        <div class="flex flex-wrap justify-between items-center gap-12 opacity-50 grayscale">
            <i class="ri-amazon-fill text-4xl"></i>
            <i class="ri-apple-fill text-4xl"></i>
            <i class="ri-google-fill text-4xl"></i>
            <i class="ri-microsoft-fill text-4xl"></i>
            <i class="ri-netflix-fill text-4xl"></i>
            <i class="ri-spotify-fill text-4xl"></i>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     TESTIMONIALS SECTION
══════════════════════════════════════════ --}}
<section class="py-24 bg-slate-950">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16 reveal">
            <span class="text-sky-500 font-bold uppercase tracking-widest text-sm mb-4 block">Testimonials</span>
            <h2 class="text-4xl md:text-5xl font-black text-white uppercase">WHAT CLIENTS SAY ABOUT US</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            @for($i=0; $i<2; $i++)
            <div class="card-glass p-12 rounded-[40px] relative reveal" style="animation-delay: {{ $i * 0.2 }}s">
                <i class="ri-double-quotes-l text-sky-500/20 text-7xl absolute top-8 left-8"></i>
                <p class="text-slate-300 text-lg leading-relaxed mb-8 relative z-10">
                    "PixelForge Group has completely transformed our enterprise infrastructure. Their team of experts delivered a custom solution that exceeded all expectations of performance and security."
                </p>
                <div class="flex items-center gap-5">
                    <img src="https://i.pravatar.cc/150?u={{$i}}" alt="User" class="w-16 h-16 rounded-full grayscale">
                    <div>
                        <h5 class="text-white font-bold text-lg">Alex Rivera</h5>
                        <p class="text-sky-500 text-sm uppercase tracking-widest font-bold">CTO, TechWave</p>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     WHY US / PILLARS SECTION
══════════════════════════════════════════ --}}
<section class="py-24 bg-slate-900 relative">
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=2000'); background-size: cover;"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16 reveal">
            <span class="text-sky-500 font-bold uppercase tracking-widest text-sm mb-4 block">Our Values</span>
            <h2 class="text-4xl md:text-5xl font-black text-white uppercase">IMPROVED AND INNOVATIVE</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 text-center reveal">
            @php
                $pillars = [
                    ['Expert Team', 'ri-team-line'],
                    ['Fast Delivery', 'ri-rocket-line'],
                    ['Secure Code', 'ri-shield-check-line'],
                    ['24/7 Support', 'ri-headphone-line'],
                    ['Global Scalability', 'ri-global-line'],
                    ['Modern Stack', 'ri-code-box-line'],
                ];
            @endphp
            @foreach($pillars as $index => [$title, $icon])
            <div class="group reveal" style="animation-delay: {{ $index * 0.05 }}s">
                <div class="w-20 h-20 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center mx-auto mb-6 group-hover:bg-sky-500 transition-all duration-500">
                    <i class="{{ $icon }} text-white text-3xl"></i>
                </div>
                <h5 class="text-white font-bold text-sm tracking-widest uppercase">{{ $title }}</h5>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     BLOG SECTION
══════════════════════════════════════════ --}}
<section class="py-24 bg-slate-950">
    <div class="container mx-auto px-6">
        <div class="flex items-end justify-between mb-16 reveal">
            <div>
                <span class="text-sky-500 font-bold uppercase tracking-widest text-sm mb-4 block">Our Blog</span>
                <h2 class="text-4xl md:text-5xl font-black text-white uppercase">WHAT'S GOING ON OUR BLOG?</h2>
            </div>
            <a href="/blog" class="px-8 py-4 bg-sky-500 text-white font-bold rounded-xl hidden md:block">VIEW ALL POSTS</a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
                $blogs = [
                    ['The Future of Artificial Intelligence in Software', 'Sept 12, 2024'],
                    ['Best Practices for Secure Cloud Infrastructure', 'Aug 28, 2024'],
                    ['Why Custom Software is Better Than Off-the-shelf', 'Aug 15, 2024'],
                ];
            @endphp
            @foreach($blogs as $index => [$title, $date])
            <div class="group bg-slate-900 rounded-[40px] overflow-hidden reveal" style="animation-delay: {{ $index * 0.1 }}s">
                <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&q=80&w=800" alt="Blog" class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="p-8">
                    <div class="flex items-center gap-3 text-sky-500 text-sm font-bold mb-4">
                        <i class="ri-calendar-line"></i>
                        {{ $date }}
                    </div>
                    <h4 class="text-xl font-bold text-white mb-6 group-hover:text-sky-400 transition-colors">{{ $title }}</h4>
                    <a href="#" class="text-white font-bold flex items-center gap-3 group/link">
                        READ MORE
                        <i class="ri-arrow-right-line group-hover/link:translate-x-2 transition-transform"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CONTACT STRIP
══════════════════════════════════════════ --}}
<section class="py-12 bg-sky-500">
    <div class="container mx-auto px-6">
        <div class="flex flex-wrap items-center justify-between gap-8">
            <div class="flex items-center gap-4 text-white">
                <i class="ri-customer-service-2-line text-3xl"></i>
                <span class="font-bold tracking-widest uppercase">Get Tech Support Now!</span>
            </div>
            <div class="flex items-center gap-4 text-white">
                <i class="ri-mail-line text-3xl"></i>
                <span class="font-bold tracking-widest uppercase">info@techlab.com</span>
            </div>
            <div class="flex items-center gap-4 text-white">
                <i class="ri-phone-line text-3xl"></i>
                <span class="font-bold tracking-widest uppercase">+880 123 456 789</span>
            </div>
            <div class="flex gap-4">
                <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-sky-500 transition-all"><i class="ri-facebook-fill"></i></a>
                <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-sky-500 transition-all"><i class="ri-twitter-fill"></i></a>
                <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-sky-500 transition-all"><i class="ri-linkedin-fill"></i></a>
                <a href="#" class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-white hover:text-sky-500 transition-all"><i class="ri-instagram-fill"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     ELITE FOOTER
══════════════════════════════════════════ --}}
<footer class="py-24 bg-slate-950 border-t border-white/5">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-4 gap-12">
            <div>
                <a href="#" class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-sky-500 flex items-center justify-center text-white text-xl font-bold">T</div>
                    <span class="text-2xl font-black text-white tracking-tighter uppercase">TechLab</span>
                </a>
                <p class="text-slate-500 leading-relaxed mb-8">
                    Empowering businesses through cutting-edge technology solutions and digital excellence.
                </p>
                <div class="card-glass p-8 rounded-2xl border-sky-500/20">
                    <div class="flex items-center gap-4">
                        <i class="ri-shield-check-line text-3xl text-sky-500"></i>
                        <div>
                            <div class="text-white font-bold text-sm">Certified Tech</div>
                            <div class="text-slate-500 text-xs">ISO 9001:2015</div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h5 class="text-white font-bold mb-8 uppercase tracking-widest">Our Services</h5>
                <ul class="space-y-4">
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">Web Development</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">Mobile App Development</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">Cloud Solutions</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">Cyber Security</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">IT Consulting</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-white font-bold mb-8 uppercase tracking-widest">Quick Links</h5>
                <ul class="space-y-4">
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">About Us</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">Our Portfolio</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">Meet Our Team</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">Latest News</a></li>
                    <li><a href="#" class="text-slate-500 hover:text-sky-400 transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-white font-bold mb-8 uppercase tracking-widest">Newsletter</h5>
                <p class="text-slate-500 text-sm mb-6">Subscribe to get latest updates and technical insights.</p>
                <div class="relative">
                    <input type="email" placeholder="Email Address" class="w-full bg-white/5 border border-white/10 rounded-xl px-5 py-4 text-white focus:outline-none focus:border-sky-500">
                    <button class="absolute right-2 top-2 bottom-2 px-6 bg-sky-500 text-white rounded-lg font-bold"><i class="ri-send-plane-fill"></i></button>
                </div>
            </div>
        </div>
        
        <div class="mt-20 pt-8 border-t border-white/5 text-center">
            <p class="text-slate-600 text-xs font-bold uppercase tracking-widest">&copy; 2024 TechLab Solutions. All Rights Reserved.</p>
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
