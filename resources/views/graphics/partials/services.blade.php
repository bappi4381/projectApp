{{-- resources/views/graphics/partials/services.blade.php --}}
<section id="services" class="relative py-24 bg-slate-950 overflow-hidden">
    {{-- Decorative Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-yellow-400/5 blur-[120px] rounded-full"></div>
    </div>

    <div class="max-w-[1400px] mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 xl:gap-24 items-center">

            {{-- Left Column: WHY CHOOSE US --}}
            <div class="flex flex-col reveal">
                <div class="mb-12">
                    <span class="text-[12px] font-black text-yellow-400 uppercase tracking-[0.25em] mb-4 block">Color Experts</span>
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white uppercase mb-6 leading-tight">Why Choose <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Our Studio</span></h2>
                    <p class="text-slate-400 text-lg leading-relaxed max-w-xl mb-8">We don't just edit photos; we craft visual experiences. Our team blends artistry with technical precision to deliver unmatched quality for global brands.</p>
                    <div class="flex gap-2">
                        <span class="w-12 h-1 bg-yellow-400 rounded-full"></span>
                        <span class="w-4 h-1 bg-white/20 rounded-full"></span>
                        <span class="w-4 h-1 bg-white/10 rounded-full"></span>
                    </div>
                </div>

                <div class="relative grid grid-cols-1 sm:grid-cols-2 flex-grow gap-px bg-white/5 rounded-3xl overflow-hidden border border-white/10">
                    {{-- Item 1 --}}
                    <div class="p-8 bg-slate-900/40 hover:bg-slate-900/60 transition-colors group">
                        <div class="flex items-start gap-5">
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 rounded-2xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 text-3xl group-hover:scale-110 transition-transform">
                                    <i class="ri-history-line"></i>
                                </div>
                                <div class="flex gap-0.5 mt-2">
                                    <i class="ri-star-fill text-yellow-400 text-[10px]"></i>
                                    <i class="ri-star-fill text-yellow-400 text-[10px]"></i>
                                    <i class="ri-star-fill text-yellow-400 text-[10px]"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-2xl font-black text-white leading-none mb-2">30+ Years</h4>
                                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">of Experience</p>
                            </div>
                        </div>
                    </div>

                    {{-- Item 2 --}}
                    <div class="p-8 bg-slate-900/40 hover:bg-slate-900/60 transition-colors group">
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 text-3xl group-hover:scale-110 transition-transform">
                                <i class="ri-shield-check-line"></i>
                            </div>
                            <div>
                                <h4 class="text-2xl font-black text-white leading-none mb-2">ISO</h4>
                                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Certified Studio</p>
                            </div>
                        </div>
                    </div>

                    {{-- Item 3 --}}
                    <div class="p-8 bg-slate-900/40 hover:bg-slate-900/60 transition-colors group">
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 text-3xl group-hover:scale-110 transition-transform">
                                <i class="ri-team-line"></i>
                            </div>
                            <div>
                                <h4 class="text-2xl font-black text-white leading-none mb-2">250+</h4>
                                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Pro Designers</p>
                            </div>
                        </div>
                    </div>

                    {{-- Item 4 --}}
                    <div class="p-8 bg-slate-900/40 hover:bg-slate-900/60 transition-colors group">
                        <div class="flex items-start gap-5">
                            <div class="w-12 h-12 rounded-2xl bg-yellow-400/10 flex items-center justify-center text-yellow-400 text-3xl group-hover:scale-110 transition-transform">
                                <i class="ri-customer-service-2-line"></i>
                            </div>
                            <div>
                                <h4 class="text-2xl font-black text-white leading-none mb-2">24/7</h4>
                                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Live Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: OUR SERVICES (Grid with images) --}}
            <div class="reveal" style="animation-delay: 0.2s">
                <div class="bg-white/[0.03] border border-white/10 rounded-[40px] p-8 md:p-12 relative overflow-hidden group">
                    {{-- Glossy highlight --}}
                    <div class="absolute -top-24 -left-24 w-64 h-64 bg-yellow-400/10 blur-[80px] rounded-full group-hover:bg-yellow-400/20 transition-all duration-700"></div>
                    
                    <h3 class="text-2xl font-black text-white uppercase mb-10 text-center tracking-widest">Core Capabilities</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        {{-- Clipping Path --}}
                        <div class="bg-[#6ab04c]/20 border border-[#6ab04c]/30 rounded-2xl p-5 relative min-h-[140px] flex flex-col justify-between group/svc cursor-pointer overflow-hidden backdrop-blur-sm">
                            <h4 class="text-white text-lg font-black uppercase relative z-10 select-none">Clipping<br>Path</h4>
                            <div class="flex items-center gap-2 relative z-10 text-[10px] font-bold text-[#6ab04c] uppercase">
                                View Detail <i class="ri-arrow-right-line"></i>
                            </div>
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80" alt="Shoe" class="absolute -right-4 -bottom-4 h-[100px] w-auto object-contain opacity-40 group-hover/svc:opacity-100 group-hover/svc:scale-110 transition-all duration-500">
                        </div>

                        {{-- Image Masking --}}
                        <div class="bg-[#f0932b]/20 border border-[#f0932b]/30 rounded-2xl p-5 relative min-h-[140px] flex flex-col justify-between group/svc cursor-pointer overflow-hidden backdrop-blur-sm">
                            <h4 class="text-white text-lg font-black uppercase relative z-10 select-none">Image<br>Masking</h4>
                            <div class="flex items-center gap-2 relative z-10 text-[10px] font-bold text-[#f0932b] uppercase">
                                View Detail <i class="ri-arrow-right-line"></i>
                            </div>
                            <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=400&q=80" alt="Plant" class="absolute -right-4 -bottom-4 h-[100px] w-auto object-contain opacity-40 group-hover/svc:opacity-100 group-hover/svc:scale-110 transition-all duration-500">
                        </div>

                        {{-- Photo Retouching --}}
                        <div class="bg-[#3498db]/20 border border-[#3498db]/30 rounded-2xl p-5 relative min-h-[140px] flex flex-col justify-between group/svc cursor-pointer overflow-hidden backdrop-blur-sm">
                            <h4 class="text-white text-lg font-black uppercase relative z-10 select-none">Photo<br>Retouching</h4>
                            <div class="flex items-center gap-2 relative z-10 text-[10px] font-bold text-[#3498db] uppercase">
                                View Detail <i class="ri-arrow-right-line"></i>
                            </div>
                            <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&q=80" alt="Jewelry" class="absolute -right-4 -bottom-4 h-[100px] w-auto object-contain opacity-40 group-hover/svc:opacity-100 group-hover/svc:scale-110 transition-all duration-500">
                        </div>

                        {{-- Ghost Mannequin --}}
                        <div class="bg-[#eb4d4b]/20 border border-[#eb4d4b]/30 rounded-2xl p-5 relative min-h-[140px] flex flex-col justify-between group/svc cursor-pointer overflow-hidden backdrop-blur-sm">
                            <h4 class="text-white text-lg font-black uppercase relative z-10 select-none">Ghost<br>Mannequin</h4>
                            <div class="flex items-center gap-2 relative z-10 text-[10px] font-bold text-[#eb4d4b] uppercase">
                                View Detail <i class="ri-arrow-right-line"></i>
                            </div>
                            <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=400&q=80" alt="Jacket" class="absolute -right-4 -bottom-4 h-[100px] w-auto object-contain opacity-40 group-hover/svc:opacity-100 group-hover/svc:scale-110 transition-all duration-500">
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('graphics.services') }}" class="block w-full text-center py-4 rounded-2xl bg-gradient-to-r from-yellow-400 to-yellow-600 text-slate-900 font-black text-xs uppercase tracking-widest hover:scale-[1.02] transition-transform shadow-lg shadow-yellow-400/20">
                            Check For More Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
