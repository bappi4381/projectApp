{{-- resources/views/graphics/partials/ecommerce.blade.php --}}
<section class="relative py-16 overflow-hidden bg-[#0f172a]"> {{-- Reduced Padding --}}
    
    {{-- Decorative High-End Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-[#20c997]/10 blur-[130px] rounded-full translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-[#17a2b8]/10 blur-[130px] rounded-full -translate-x-1/2 translate-y-1/2"></div>
        {{-- Subtle Grid Pattern --}}
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>
    </div>

    <div class="max-w-[1400px] mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
            
            {{-- Left Content: Compact Typography --}}
            <div class="w-full lg:w-[45%] space-y-6 reveal">
                <div class="space-y-3">
                    <div class="inline-block px-3 py-1 rounded-full border border-[#20c997]/30 bg-[#20c997]/10 text-[#20c997] text-[12px] font-bold uppercase tracking-[0.15em]">
                        E-Commerce Solutions
                    </div>
                    <h2 class="text-4xl md:text-5xl font-black text-white leading-[1.15] tracking-tight">
                        Product Photo <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#20c997] to-[#00d2ff]">Editing</span>
                    </h2>
                </div>
                
                <p class="text-base md:text-lg text-slate-400 leading-relaxed font-medium max-w-lg">
                    Elevate your brand with high-end post-production. We specialize in creating pixel-perfect images for marketplaces like <span class="text-white">Amazon, eBay, and Etsy.</span>
                </p>

                <div class="flex flex-wrap items-center gap-6 pt-2">
                    {{-- Premium Action Button --}}
                    <a href="#" class="relative group px-8 py-4 bg-[#20c997] rounded-full text-xs font-black uppercase tracking-widest text-[#0f172a] overflow-hidden transition-all duration-500 hover:shadow-[0_15px_30px_rgba(32,201,151,0.25)] hover:-translate-y-1">
                        <span class="relative z-10">Get Quick Quote</span>
                        <div class="absolute inset-0 bg-white translate-y-full group-hover:translate-y-0 transition-transform duration-500"></div>
                    </a>

                    {{-- Link Style --}}
                    <a href="#" class="group flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-white/60 hover:text-[#20c997] transition-colors">
                        View Portfolio
                        <i class="ri-arrow-right-line transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </div>

            {{-- Right Content: Centered Product Composition --}}
            <div class="w-full lg:w-[55%] relative h-[450px] sm:h-[500px] flex items-center justify-center reveal" style="animation-delay: 0.3s">
                
                {{-- Glassmorphism Base (The Circle) --}}
                <div class="absolute w-[80%] aspect-square bg-white/[0.03] border border-white/10 rounded-full backdrop-blur-3xl animate-[pulse_8s_infinite] max-w-[450px]"></div>
                
                {{-- Focal Product Group --}}
                <div class="relative w-full aspect-square max-w-[450px]">
                    
                    {{-- 1. Center Hero (Blazer) --}}
                    <div class="absolute top-1/2 left-1/2 w-[75%] z-20 float-center">
                        <img src="{{ asset('images/ecommerce/blazer.png') }}" alt="Blazer" 
                             class="w-full h-auto drop-shadow-[0_30px_60px_rgba(0,0,0,0.6)] brightness-110">
                    </div>

                    {{-- 2. Luxury Handbag (Bottom Left) --}}
                    <div class="absolute bottom-[10%] left-[2%] w-[48%] z-40 rotate-[-8deg] hover:rotate-0 transition-transform duration-500 cursor-pointer group float">
                        <img src="{{ asset('images/ecommerce/bag.png') }}" alt="Handbag" 
                             class="w-full h-auto drop-shadow-[0_20px_40px_rgba(0,0,0,0.4)] transition-all group-hover:scale-105">
                    </div>

                    {{-- 3. Leather Boot (Bottom Right) --}}
                    <div class="absolute bottom-[8%] right-[5%] w-[42%] z-30 rotate-[10deg] hover:rotate-0 transition-transform duration-500 cursor-pointer group float-medium">
                        <img src="{{ asset('images/ecommerce/boot.png') }}" alt="Boot" 
                             class="w-full h-auto drop-shadow-[0_20px_40px_rgba(0,0,0,0.45)] transition-all group-hover:scale-105">
                    </div>

                    {{-- 4. Premium Watch (Top Left orbit) --}}
                    <div class="absolute top-[10%] left-[12%] w-[25%] z-50 -rotate-12 hover:rotate-0 transition-all duration-500 cursor-pointer group float-fast">
                        <div class="p-2.5 bg-white/[0.05] border border-white/10 rounded-xl backdrop-blur-md transform group-hover:bg-white/10">
                            <img src="{{ asset('images/ecommerce/watch.png') }}" alt="Watch" class="w-full h-auto">
                        </div>
                    </div>

                    {{-- 5. Sunglasses (Top Right orbit) --}}
                    <div class="absolute top-[15%] right-[8%] w-[32%] z-50 rotate-12 hover:rotate-0 transition-all duration-500 cursor-pointer group float-medium">
                        <div class="p-2.5 bg-white/[0.05] border border-white/10 rounded-xl backdrop-blur-md transform group-hover:rotate-0">
                            <img src="{{ asset('images/ecommerce/sunglasses.png') }}" alt="Sunglasses" class="w-full h-auto scale-110">
                        </div>
                    </div>

                </div>

                {{-- Light Leaks / Flares --}}
                <div class="absolute top-[25%] right-[35%] w-1.5 h-1.5 bg-white rounded-full blur-[8px] animate-ping"></div>
                <div class="absolute bottom-[35%] left-[25%] w-2 h-2 bg-[#20c997] rounded-full blur-[12px] animate-pulse"></div>

            </div>
        </div>
    </div>

    <style>
        @keyframes float { 0%, 100% { transform: translateY(0) rotate(-8deg); } 50% { transform: translateY(-15px) rotate(-5deg); } }
        @keyframes float-medium { 0%, 100% { transform: translateY(0) rotate(10deg); } 50% { transform: translateY(-12px) rotate(7deg); } }
        @keyframes float-center { 0%, 100% { transform: translate(-50%, -50%) translateY(0); } 50% { transform: translate(-50%, -50%) translateY(-10px); } }
        @keyframes float-fast { 0%, 100% { transform: translateY(0) rotate(-12deg); } 50% { transform: translateY(-20px) rotate(-10deg); } }
        .float { animation: float 6s ease-in-out infinite; }
        .float-medium { animation: float-medium 7s ease-in-out infinite; }
        .float-center { animation: float-center 8s ease-in-out infinite; }
        .float-fast { animation: float-fast 5s ease-in-out infinite; }
    </style>
</section>
