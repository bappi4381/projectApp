{{-- resources/views/it/partials/hero.blade.php --}}
<section class="relative min-h-[90vh] flex items-center justify-center overflow-hidden pt-20">

    {{-- Background logic --}}
    <div class="absolute inset-0 bg-slate-950">
        {{-- Matrix-like grid for IT feel --}}
        <div class="absolute inset-0 opacity-[0.15]"
             style="background-image: radial-gradient(circle at 2px 2px, rgba(14,165,233,0.3) 1px, transparent 0); background-size: 40px 40px;"></div>

        {{-- Dynamic Glows --}}
        <div class="absolute top-1/4 -left-1/4 w-[600px] h-[600px] rounded-full bg-cyan-900/20 blur-[130px] animate-pulse-glow"></div>
        <div class="absolute bottom-1/4 -right-1/4 w-[500px] h-[500px] rounded-full bg-blue-900/20 blur-[120px] animate-pulse-glow" style="animation-delay: 2s"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        {{-- Technical Badge --}}
        <div class="animate-fade-in inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-xs font-semibold text-cyan-300 mb-8 backdrop-blur-md">
            <span class="flex h-2 w-2 relative">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-500"></span>
            </span>
            Accelerating Digital Transformation
            <span class="text-slate-600">•</span>
            Enterprise Grade
        </div>

        {{-- Headline --}}
        <h1 class="animate-fade-up text-5xl md:text-7xl lg:text-8xl font-black text-white leading-none mb-6">
            Innovate. <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Scale.</span> <br>
            Succeed.
        </h1>

        {{-- Subheadline --}}
        <p class="animate-fade-up max-w-3xl mx-auto text-lg md:text-xl text-slate-400 leading-relaxed mb-12" style="animation-delay: 0.2s">
            We build high-performance software, websites, and mobile apps that empower businesses to lead in the digital era. From startups to enterprises, we are your engineering partner.
        </p>

        {{-- CTA --}}
        <div class="animate-fade-up flex flex-wrap justify-center gap-4" style="animation-delay: 0.4s">
            <a href="#services" class="group px-8 py-4 bg-gradient-to-r from-cyan-600 to-blue-600 text-white rounded-xl font-bold shadow-xl shadow-cyan-500/20 hover:scale-105 transition-all">
                Our IT Services
                <i class="ri-code-s-view ml-2 group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="mailto:it@pixelforge.com" class="px-8 py-4 bg-white/5 border border-white/10 text-white rounded-xl font-bold hover:bg-white/10 transition-all">
                Let's Talk Tech
            </a>
        </div>

        {{-- Platform Icons Strip --}}
        <div class="animate-fade-up mt-16 flex flex-wrap justify-center items-center gap-8 opacity-40 grayscale hover:grayscale-0 transition-all duration-700" style="animation-delay: 0.6s">
            <i class="ri-android-fill text-3xl"></i>
            <i class="ri-apple-fill text-3xl"></i>
            <i class="ri-chrome-fill text-3xl"></i>
            <i class="ri-reactjs-fill text-3xl"></i>
            <i class="ri-flutter-fill text-3xl"></i>
            <i class="ri-github-fill text-3xl"></i>
        </div>

    </div>

</section>
