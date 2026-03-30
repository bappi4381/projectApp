{{-- resources/views/graphics/partials/services.blade.php --}}
<section id="services" class="relative py-28 lg:py-36 bg-gradient-to-b from-[#f8fafc] via-white to-[#f8fafc] overflow-hidden">
    {{-- Premium Decorative Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-[#1072C2]/[0.03] blur-[100px] rounded-full"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-[#34E89E]/[0.03] blur-[100px] rounded-full"></div>
        {{-- Subtle grid pattern --}}
        <div class="absolute inset-0 opacity-[0.015]" style="background-image: radial-gradient(circle, #1072C2 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-[1400px] mx-auto px-6 sm:px-8 lg:px-12 relative z-10">

        {{-- Section Top Header --}}
        <div class="text-center mb-20 reveal">
            <span class="inline-block text-[11px] font-black text-white uppercase tracking-[0.3em] mb-5 bg-[#1072C2] px-5 py-2 rounded-full">Color Experts International</span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-slate-900 uppercase leading-none tracking-tight">
                Delivering <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1072C2] to-[#34E89E]">Excellence</span>
            </h2>
            <p class="text-slate-500 text-lg mt-5 max-w-2xl mx-auto leading-relaxed">We craft visual experiences with precision. Our team blends artistry with technical mastery to deliver unmatched quality for global brands.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 xl:gap-20">

            {{-- Left Column: WHY CHOOSE US --}}
            <div class="flex flex-col reveal">
                <div class="mb-10">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-[3px] bg-gradient-to-r from-[#1072C2] to-[#34E89E] rounded-full"></div>
                        <span class="text-[11px] font-black text-[#1072C2] uppercase tracking-[0.25em]">Why Choose Us</span>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight">Industry-Leading <br>Photo Editing Studio</h3>
                </div>

                {{-- Stats Grid --}}
                <div class="grid grid-cols-2 gap-[1px] bg-slate-200/70 rounded-2xl overflow-hidden shadow-sm mb-10 flex-grow">
                    {{-- Item 1 --}}
                    <div class="p-8 bg-white hover:bg-[#1072C2]/[0.02] transition-all duration-300 group relative">
                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="ri-arrow-right-up-line text-[#1072C2]/30 text-lg"></i>
                        </div>
                        <div class="flex flex-col items-start gap-4">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#6ab04c]/10 to-[#6ab04c]/5 flex items-center justify-center text-[#6ab04c] text-2xl group-hover:scale-110 transition-transform duration-300 border border-[#6ab04c]/10">
                                <i class="ri-history-line"></i>
                            </div>
                            <div>
                                <h4 class="text-3xl font-black text-slate-900 leading-none mb-1">30+</h4>
                                <p class="text-slate-500 text-xs font-semibold uppercase tracking-widest">Years Experience</p>
                            </div>
                        </div>
                    </div>

                    {{-- Item 2 --}}
                    <div class="p-8 bg-white hover:bg-[#1072C2]/[0.02] transition-all duration-300 group relative">
                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="ri-arrow-right-up-line text-[#1072C2]/30 text-lg"></i>
                        </div>
                        <div class="flex flex-col items-start gap-4">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#f0932b]/10 to-[#f0932b]/5 flex items-center justify-center text-[#f0932b] text-2xl group-hover:scale-110 transition-transform duration-300 border border-[#f0932b]/10">
                                <i class="ri-shield-check-line"></i>
                            </div>
                            <div>
                                <h4 class="text-3xl font-black text-slate-900 leading-none mb-1">BBB</h4>
                                <p class="text-slate-500 text-xs font-semibold uppercase tracking-widest">Accredited</p>
                            </div>
                        </div>
                    </div>

                    {{-- Item 3 --}}
                    <div class="p-8 bg-white hover:bg-[#1072C2]/[0.02] transition-all duration-300 group relative">
                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="ri-arrow-right-up-line text-[#1072C2]/30 text-lg"></i>
                        </div>
                        <div class="flex flex-col items-start gap-4">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#013543]/10 to-[#013543]/5 flex items-center justify-center text-[#013543] text-2xl group-hover:scale-110 transition-transform duration-300 border border-[#013543]/10">
                                <i class="ri-team-line"></i>
                            </div>
                            <div>
                                <h4 class="text-3xl font-black text-slate-900 leading-none mb-1">250+</h4>
                                <p class="text-slate-500 text-xs font-semibold uppercase tracking-widest">Creative Designers</p>
                            </div>
                        </div>
                    </div>

                    {{-- Item 4 --}}
                    <div class="p-8 bg-white hover:bg-[#1072C2]/[0.02] transition-all duration-300 group relative">
                        <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                            <i class="ri-arrow-right-up-line text-[#1072C2]/30 text-lg"></i>
                        </div>
                        <div class="flex flex-col items-start gap-4">
                            <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#1072C2]/10 to-[#1072C2]/5 flex items-center justify-center text-[#1072C2] text-2xl group-hover:scale-110 transition-transform duration-300 border border-[#1072C2]/10">
                                <i class="ri-customer-service-2-line"></i>
                            </div>
                            <div>
                                <h4 class="text-3xl font-black text-slate-900 leading-none mb-1">24/7</h4>
                                <p class="text-slate-500 text-xs font-semibold uppercase tracking-widest">Support</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Left Button: Gradient Border Pill --}}
                <div class="mt-auto">
                    <a href="{{ route('graphics.get-quote') }}" class="block w-full text-center p-[2px] rounded-full bg-gradient-to-r from-[#1072C2] to-[#34E89E] transition-all transform active:scale-95 group/btn shadow-lg shadow-[#1072C2]/10 hover:shadow-xl hover:shadow-[#1072C2]/15">
                        <div class="bg-white rounded-full py-4 text-slate-900 font-black text-[11px] uppercase tracking-[0.2em] group-hover/btn:bg-transparent group-hover/btn:text-white transition-all duration-300">
                            Get Your First Trial
                        </div>
                    </a>
                </div>
            </div>

            {{-- Right Column: OUR SERVICES --}}
            <div class="flex flex-col reveal" style="animation-delay: 0.15s">
                <div class="mb-10">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-[3px] bg-gradient-to-r from-[#1072C2] to-[#34E89E] rounded-full"></div>
                        <span class="text-[11px] font-black text-[#1072C2] uppercase tracking-[0.25em]">Our Services</span>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight">Premium Photo <br>Editing Solutions</h3>
                </div>

                <div class="grid grid-cols-2 gap-3 flex-grow mb-10">
                    {{-- Clipping Path --}}
                    <div class="bg-[#6ab04c] rounded-2xl p-6 relative min-h-[170px] flex flex-col justify-between group/svc cursor-pointer overflow-hidden shadow-lg shadow-[#6ab04c]/15 hover:shadow-xl hover:shadow-[#6ab04c]/25 transition-all duration-300">
                        <h4 class="text-white text-xl font-black uppercase relative z-10 select-none leading-tight">Clipping<br>Path</h4>
                        <div class="flex items-center gap-1.5 text-white/70 text-[10px] font-bold uppercase relative z-10 group-hover/svc:text-white transition-colors">
                            <span>View</span> <i class="ri-arrow-right-line group-hover/svc:translate-x-1 transition-transform"></i>
                        </div>
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80" alt="Shoe" class="absolute -right-6 -bottom-6 h-[120px] w-auto object-contain opacity-60 group-hover/svc:opacity-100 group-hover/svc:scale-110 group-hover/svc:-rotate-6 transition-all duration-500">
                    </div>

                    {{-- Image Masking --}}
                    <div class="bg-[#f0932b] rounded-2xl p-6 relative min-h-[170px] flex flex-col justify-between group/svc cursor-pointer overflow-hidden shadow-lg shadow-[#f0932b]/15 hover:shadow-xl hover:shadow-[#f0932b]/25 transition-all duration-300">
                        <h4 class="text-white text-xl font-black uppercase relative z-10 select-none leading-tight">Image<br>Masking</h4>
                        <div class="flex items-center gap-1.5 text-white/70 text-[10px] font-bold uppercase relative z-10 group-hover/svc:text-white transition-colors">
                            <span>View</span> <i class="ri-arrow-right-line group-hover/svc:translate-x-1 transition-transform"></i>
                        </div>
                        <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=400&q=80" alt="Plant" class="absolute -right-6 -bottom-6 h-[120px] w-auto object-contain opacity-60 group-hover/svc:opacity-100 group-hover/svc:scale-110 group-hover/svc:-rotate-6 transition-all duration-500">
                    </div>

                    {{-- Photo Retouching --}}
                    <div class="bg-[#1072C2] rounded-2xl p-6 relative min-h-[170px] flex flex-col justify-between group/svc cursor-pointer overflow-hidden shadow-lg shadow-[#1072C2]/15 hover:shadow-xl hover:shadow-[#1072C2]/25 transition-all duration-300">
                        <h4 class="text-white text-xl font-black uppercase relative z-10 select-none leading-tight">Photo<br>Retouching</h4>
                        <div class="flex items-center gap-1.5 text-white/70 text-[10px] font-bold uppercase relative z-10 group-hover/svc:text-white transition-colors">
                            <span>View</span> <i class="ri-arrow-right-line group-hover/svc:translate-x-1 transition-transform"></i>
                        </div>
                        <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&q=80" alt="Jewelry" class="absolute -right-6 -bottom-6 h-[120px] w-auto object-contain opacity-60 group-hover/svc:opacity-100 group-hover/svc:scale-110 group-hover/svc:-rotate-6 transition-all duration-500">
                    </div>

                    {{-- Ghost Mannequin --}}
                    <div class="bg-[#013543] rounded-2xl p-6 relative min-h-[170px] flex flex-col justify-between group/svc cursor-pointer overflow-hidden shadow-lg shadow-[#013543]/15 hover:shadow-xl hover:shadow-[#013543]/25 transition-all duration-300">
                        <h4 class="text-white text-xl font-black uppercase relative z-10 select-none leading-tight">Ghost<br>Mannequin</h4>
                        <div class="flex items-center gap-1.5 text-white/70 text-[10px] font-bold uppercase relative z-10 group-hover/svc:text-white transition-colors">
                            <span>View</span> <i class="ri-arrow-right-line group-hover/svc:translate-x-1 transition-transform"></i>
                        </div>
                        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=400&q=80" alt="Jacket" class="absolute -right-6 -bottom-6 h-[120px] w-auto object-contain opacity-60 group-hover/svc:opacity-100 group-hover/svc:scale-110 group-hover/svc:-rotate-6 transition-all duration-500">
                    </div>
                </div>

                {{-- Right Button: Solid Gradient Pill --}}
                <div class="mt-auto">
                    <a href="{{ route('graphics.services') }}" class="block w-full text-center py-4 bg-gradient-to-r from-[#1072C2] to-[#34E89E] text-white font-black text-[11px] uppercase tracking-[0.2em] rounded-full hover:shadow-xl transition-all transform active:scale-95 shadow-lg shadow-[#1072C2]/20 hover:shadow-[#1072C2]/30">
                        Check For More Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
