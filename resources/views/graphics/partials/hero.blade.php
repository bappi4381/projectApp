@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .hero-swiper { width: 100%; height: 100vh; background: #020617; }
    .swiper-slide { overflow: hidden; position: relative; }
    
    /* Ultra-Smooth Background Zoom */
    .swiper-slide-active .slide-bg { transform: scale(1.15); transition: transform 8s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
    .slide-bg { transform: scale(1); transition: transform 1.2s ease; will-change: transform; }

    /* Premium Content Entry */
    .swiper-slide .hero-content > * { opacity: 0; transform: translateY(40px) skewY(2deg); transition: all 1s cubic-bezier(0.22, 1, 0.36, 1); }
    .swiper-slide-active .hero-content > * { opacity: 1; transform: translateY(0) skewY(0); }
    .swiper-slide-active .hero-content > *:nth-child(1) { transition-delay: 0.4s; }
    .swiper-slide-active .hero-content > *:nth-child(2) { transition-delay: 0.6s; }
    .swiper-slide-active .hero-content > *:nth-child(3) { transition-delay: 0.8s; }
    .swiper-slide-active .hero-content > *:nth-child(4) { transition-delay: 1.0s; }

    /* Noise Texture Overlay */
    .noise-overlay::before {
        content: ""; position: absolute; inset: 0; z-index: 5;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        opacity: 0.03; pointer-events: none;
    }

    /* Dynamic Pagination bullets */
    .hero-pagination { bottom: 60px !important; left: 50% !important; transform: translateX(-50%) !important; width: auto !important; padding: 12px 24px; background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); border-radius: 100px; border: 1px solid rgba(255,255,255,0.08); z-index: 30 !important; display: flex; gap: 12px; }
    .hero-pagination .swiper-pagination-bullet { 
        width: 8px; height: 8px; margin: 0 !important; border-radius: 50%; 
        background: rgba(255,255,255,0.3) !important; opacity: 1; transition: all 0.4s ease;
    }
    .hero-pagination .swiper-pagination-bullet-active { 
        background: #818cf8 !important; transform: scale(1.5); box-shadow: 0 0 15px rgba(129, 140, 248, 0.6);
    }

    /* Slide Progress Bar */
    .slide-progress { position: absolute; bottom: 0; left: 0; height: 3px; background: linear-gradient(to right, #6366f1, #a855f7); z-index: 40; width: 0; transition: width linear; }

    /* Decorative Floating Elements */
    .floating-orb { position: absolute; border-radius: 50%; filter: blur(80px); opacity: 0.2; pointer-events: none; z-index: 2; animate: pulse-orb 10s infinite alternate; }
    @keyframes pulse-orb { from { transform: scale(1) translate(0, 0); } to { transform: scale(1.2) translate(30px, -20px); } }

    @media (max-width: 768px) {
        .hero-swiper { height: 90vh; }
        .hero-pagination { bottom: 40px !important; }
    }
</style>
@endpush

<section id="home" class="relative swiper hero-swiper noise-overlay">
    
    {{-- Decorative Orbs --}}
    <div class="floating-orb w-[500px] h-[500px] bg-indigo-600 -top-20 -left-20"></div>
    <div class="floating-orb w-[400px] h-[400px] bg-purple-600 -bottom-20 -right-20" style="animation-delay: -5s"></div>

    <div class="swiper-wrapper">
        
        @php
        $slides = [
            [
                'title' => 'CRAFTING <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400">PIXEL-PERFECT</span> VISUALS',
                'desc' => 'High-end clipping path, complex masking, and high-frequency retouching for brands that refuse to settle for average.',
                'image' => 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=1920&q=80&auto=format&fit=crop',
                'badge' => 'Premium Post-Production',
                'accent' => 'indigo'
            ],
            [
                'title' => 'ELEVATE <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">YOUR PRODUCT</span> AESTHETICS',
                'desc' => 'From ghost mannequin effects to jewelry enhancement, we transform raw clicks into high-converting commercial assets.',
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=1920&q=80&auto=format&fit=crop',
                'badge' => 'Commercial Excellence',
                'accent' => 'purple'
            ],
            [
                'title' => 'ELITE <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">REAL ESTATE</span> & ARCHITECTURE',
                'desc' => 'Professional HDR blending, twilight enhancement, and virtual staging that makes properties sell 35% faster.',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1920&q=80&auto=format&fit=crop',
                'badge' => 'Architecture Specialty',
                'accent' => 'cyan'
            ]
        ];
        @endphp

        @foreach($slides as $slide)
        <div class="swiper-slide h-full">
            {{-- Background with multi-layer overlays --}}
            <div class="absolute inset-0 slide-bg">
                <img src="{{ $slide['image'] }}" alt="{{ strip_tags($slide['title']) }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-slate-950/60 transition-opacity duration-1000"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/40 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/20"></div>
            </div>

            {{-- Content Container --}}
            <div class="relative z-20 h-full flex items-center justify-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-4xl mx-auto text-center hero-content">
                        {{-- Refined Badge --}}
                        <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md mb-10 group/badge">
                            <span class="flex h-2 w-2 rounded-full bg-{{ $slide['accent'] }}-400 shadow-[0_0_10px_#818cf8]"></span>
                            <span class="text-xs font-bold text-slate-300 uppercase tracking-[0.2em]">{{ $slide['badge'] }}</span>
                        </div>

                        {{-- Mega Heading (Resized) --}}
                        <h2 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] tracking-tight mb-8">
                            {!! $slide['title'] !!}
                        </h2>

                        {{-- Elegant Description (Centered) --}}
                        <p class="text-base sm:text-lg text-slate-400 leading-relaxed mb-12 max-w-2xl mx-auto">
                            {{ $slide['desc'] }}
                        </p>

                        {{-- Premium CTAs (Centered) --}}
                        <div class="flex flex-wrap items-center justify-center gap-5">
                            <a href="#pricing" class="relative group px-10 py-5 rounded-2xl font-bold text-white overflow-hidden shadow-2xl shadow-indigo-500/20 transition-transform hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 transition-all duration-300 group-hover:scale-110"></div>
                                <span class="relative flex items-center gap-3">
                                    <i class="ri-flashlight-line text-xl"></i>
                                    START FREE TRIAL
                                    <i class="ri-arrow-right-up-line text-xl group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i>
                                </span>
                            </a>
                            <a href="#services" class="group px-10 py-5 rounded-2xl font-bold text-white border border-white/10 bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all hover:scale-105">
                                VIEW SHOWREEL
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    {{-- Controls --}}
    <div class="swiper-pagination hero-pagination"></div>
    <div class="slide-progress"></div>

    {{-- Floating Interaction Prompt --}}
    <div class="absolute right-10 top-1/2 -translate-y-1/2 z-30 hidden xl:flex flex-col items-center gap-4 py-8 px-2 border-y border-white/10">
        <span class="text-[10px] fountain-text text-slate-500 uppercase tracking-[0.5em] [writing-mode:vertical-lr]">Scroll to explore</span>
        <div class="w-px h-12 bg-gradient-to-b from-white/20 to-transparent"></div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const progressBar = document.querySelector('.slide-progress');
        const duration = 7000;

        const heroSwiper = new Swiper('.hero-swiper', {
            loop: true,
            speed: 1200,
            autoplay: {
                delay: duration,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: { crossFade: true },
            pagination: {
                el: '.hero-pagination',
                clickable: true,
            },
            on: {
                autoplayTimeLeft(s, time, progress) {
                    progressBar.style.width = `${(1 - progress) * 100}%`;
                },
                slideChangeTransitionStart() {
                    progressBar.style.transitionDuration = '0ms';
                    progressBar.style.width = '0%';
                },
                slideChangeTransitionEnd() {
                    progressBar.style.transitionDuration = `${duration}ms`;
                }
            }
        });
    });
</script>
@endpush


