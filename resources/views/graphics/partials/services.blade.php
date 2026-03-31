<section id="services" class="relative py-20 bg-white overflow-hidden">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 xl:gap-20">

            {{-- Left Column: WHY CHOOSE US --}}
            <div class="flex flex-col">
                <div class="mb-10">
                    <span class="text-[15px] font-bold text-[#1ebba3] uppercase tracking-wider mb-2 block">Color Experts</span>
                    <h2 class="text-4xl md:text-[42px] font-black text-[#1a1a1a] uppercase mb-4 leading-none">Why Choose Us</h2>
                    <div class="flex gap-2">
                        <span class="w-3 h-3 bg-[#6ab04c]"></span>
                        <span class="w-3 h-3 bg-[#f0932b]"></span>
                        <span class="w-3 h-3 bg-[#3498db]"></span>
                        <span class="w-3 h-3 bg-[#130f40]"></span>
                    </div>
                </div>

                <div class="relative grid grid-cols-2 flex-grow">
                    {{-- Grid Lines --}}
                    <div class="absolute inset-0 pointer-events-none">
                        <div class="absolute top-1/2 left-0 right-0 h-px bg-slate-200 border-t border-dashed border-slate-300"></div>
                        <div class="absolute left-1/2 top-0 bottom-0 w-px bg-slate-200 border-l border-dashed border-slate-300"></div>
                    </div>

                    {{-- Item 1 --}}
                    <div class="p-8 flex items-start gap-5">
                        <div class="flex flex-col items-center">
                            <i class="ri-history-line text-[#6ab04c] text-3xl"></i>
                            <div class="flex gap-0.5 mt-1">
                                <i class="ri-star-fill text-[#6ab04c] text-[10px]"></i>
                                <i class="ri-star-fill text-[#6ab04c] text-[10px]"></i>
                                <i class="ri-star-fill text-[#6ab04c] text-[10px]"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-[#1a1a1a] leading-none mb-1">30+ Years</h4>
                            <p class="text-slate-500 text-sm font-medium">of Experience</p>
                        </div>
                    </div>

                    {{-- Item 2 --}}
                    <div class="p-8 flex items-start gap-5">
                        <div class="flex-shrink-0">
                            <i class="ri-shield-check-line text-[#f0932b] text-4xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-[#1a1a1a] leading-none mb-1">BBB</h4>
                            <p class="text-slate-500 text-sm font-medium">Accredited</p>
                        </div>
                    </div>

                    {{-- Item 3 --}}
                    <div class="p-8 flex items-start gap-5">
                        <div class="flex-shrink-0">
                            <i class="ri-team-line text-[#130f40] text-4xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-[#1a1a1a] leading-none mb-1">250+ Creative</h4>
                            <p class="text-slate-500 text-sm font-medium">Designers</p>
                        </div>
                    </div>

                    {{-- Item 4 --}}
                    <div class="p-8 flex items-start gap-5">
                        <div class="flex-shrink-0">
                            <i class="ri-customer-service-2-line text-[#0abde3] text-4xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-[#1a1a1a] leading-none mb-1">24/7</h4>
                            <p class="text-slate-500 text-sm font-medium">Support</p>
                        </div>
                    </div>
                </div>

                {{-- Left Button --}}
                <div class="mt-8">
                    <a href="{{ route('graphics.get-quote') }}" class="block w-full text-center py-4 rounded-md border-2 border-[#1ebba3] text-[13px] font-black uppercase tracking-widest text-[#1a1a1a] relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#0984e3] to-[#1ebba3] translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        <span class="relative group-hover:text-white transition-colors">Get Your First Trial</span>
                    </a>
                </div>
            </div>

            {{-- Right Column: OUR SERVICES --}}
            <div class="flex flex-col">
                <div class="mb-10">
                    <span class="text-[15px] font-bold text-[#1ebba3] uppercase tracking-wider mb-2 block">Color Experts</span>
                    <h2 class="text-4xl md:text-[42px] font-black text-[#1a1a1a] uppercase mb-4 leading-none">Our Services</h2>
                    <div class="flex gap-2">
                        <span class="w-3 h-3 bg-[#6ab04c]"></span>
                        <span class="w-3 h-3 bg-[#f0932b]"></span>
                        <span class="w-3 h-3 bg-[#3498db]"></span>
                        <span class="w-3 h-3 bg-[#130f40]"></span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 flex-grow">
                    {{-- Clipping Path --}}
                    <div class="bg-[#6ab04c] rounded-sm p-5 relative h-[100px] flex items-center group cursor-pointer overflow-hidden">
                        <h4 class="text-white text-lg font-bold uppercase relative z-10 select-none">Clipping<br>Path</h4>
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80" alt="Shoe" class="absolute right-0 top-0 h-full w-[100px] object-cover drop-shadow-xl transform group-hover:scale-110 transition-transform duration-500">
                    </div>

                    {{-- Image Masking --}}
                    <div class="bg-[#f0932b] rounded-sm p-5 relative h-[100px] flex items-center group cursor-pointer overflow-hidden">
                        <h4 class="text-white text-lg font-bold uppercase relative z-10 select-none">Image<br>Masking</h4>
                        <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?w=400&q=80" alt="Plant" class="absolute right-0 top-0 h-full w-[100px] object-cover drop-shadow-xl transform group-hover:scale-110 transition-transform duration-500">
                    </div>

                    {{-- Photo Retouching --}}
                    <div class="bg-[#3498db] rounded-sm p-5 relative h-[100px] flex items-center group cursor-pointer overflow-hidden">
                        <h4 class="text-white text-lg font-bold uppercase relative z-10 select-none">Photo<br>Retouching</h4>
                        <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&q=80" alt="Jewelry" class="absolute right-0 top-0 h-full w-[100px] object-cover drop-shadow-xl transform group-hover:scale-110 transition-transform duration-500">
                    </div>

                    {{-- Ghost Mannequin --}}
                    <div class="bg-[#004e67] rounded-sm p-5 relative h-[100px] flex items-center group cursor-pointer overflow-hidden">
                        <h4 class="text-white text-lg font-bold uppercase relative z-10 select-none">Ghost<br>Mannequin</h4>
                        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=400&q=80" alt="Jacket" class="absolute right-0 top-0 h-full w-[100px] object-cover drop-shadow-xl transform group-hover:scale-110 transition-transform duration-500">
                    </div>
                </div>

                {{-- Right Button --}}
                <div class="mt-8">
                    <a href="{{ route('graphics.services') }}" class="block w-full text-center py-4 rounded-md bg-gradient-to-r from-[#0984e3] to-[#1ebba3] text-[13px] font-black uppercase tracking-widest text-white hover:shadow-lg transition-all duration-300">
                        Check For More Services
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>

{{-- ── WORKING PROCESS ────────────────────────────────── --}}
<section class="py-16 bg-white shrink-0">
    <div class="text-center mb-10 px-4">
        <h2 class="text-2xl md:text-3xl font-black text-[#1a1a1a] uppercase tracking-wide mb-3">WORKING PROCESS</h2>
        <p class="text-slate-500 text-sm mb-4">This visual representation will help you to get a better understanding of our bulk photo editing service process.</p>
        <div class="flex justify-center gap-1">
            <div class="w-1.5 h-1.5 bg-emerald-500 rounded-sm"></div>
            <div class="w-1.5 h-1.5 bg-yellow-400 rounded-sm"></div>
            <div class="w-1.5 h-1.5 bg-orange-400 rounded-sm"></div>
            <div class="w-1.5 h-1.5 bg-blue-600 rounded-sm"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 w-full">
        {{-- Step 1 --}}
        <div class="relative h-[250px] bg-[#6c6c6c] flex items-center justify-center group overflow-hidden border border-white">
            <div class="absolute inset-4 border border-white/50 pointer-events-none z-10"></div>
            <div class="relative z-20 text-center uppercase tracking-widest text-[#6ab04c] text-sm font-black whitespace-pre-line group-hover:scale-105 transition-transform duration-500">
                GET
                PRICE QUOTE
            </div>
        </div>

        {{-- Step 2 --}}
        <div class="relative h-[250px] flex items-center justify-center group overflow-hidden border border-white">
            <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=800&q=80" alt="Upload Files" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0984e3]/80 to-[#1ebba3]/80 mix-blend-multiply"></div>
            <div class="absolute inset-4 border border-white/50 pointer-events-none z-10 hidden md:block"></div>
            <div class="absolute inset-4 border border-white/50 pointer-events-none z-10 md:hidden"></div>
            <div class="relative z-20 text-center uppercase tracking-widest text-white text-sm font-black whitespace-pre-line group-hover:scale-105 transition-transform duration-500">
                UPLOAD
                YOUR FILES
            </div>
        </div>

        {{-- Step 3 --}}
        <div class="relative h-[250px] flex items-center justify-center group overflow-hidden border border-white bg-[#0e1726]">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=800&q=80" alt="Download Files" class="absolute inset-0 w-full h-full object-cover opacity-50">
            <div class="absolute inset-4 border border-white/50 pointer-events-none z-10"></div>
            
            {{-- Big Arrow Graphic --}}
            <div class="absolute top-0 left-1/2 -translate-x-1/2 text-white/20 select-none pointer-events-none z-10" style="font-size: 150px; line-height: 0.8; transform: translateX(-50%) scaleY(1.5);">
                <i class="ri-arrow-down-line"></i>
            </div>
            
            <div class="relative z-20 text-center uppercase tracking-widest text-[#38bdf8] text-sm font-black whitespace-pre-line group-hover:scale-105 transition-transform duration-500 drop-shadow-md">
                DOWNLOAD
                EDITED FILES
            </div>
        </div>
    </div>
</section>

{{-- ── TRIAL CTA SECTION ──────────────────────────────── --}}
<section class="relative py-20 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-[#0ea5e9] to-[#2dd4bf]"></div>
    <img src="https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?auto=format&fit=crop&w=1920&q=80" alt="Desk Background" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-30">
    
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-2xl md:text-3xl font-black text-[#1a1a1a] uppercase tracking-wide mb-4">GET YOUR FIRST TRIAL</h2>
        <div class="flex justify-center gap-1.5 mb-8">
            <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
            <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
            <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
            <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
        </div>
        
        <h3 class="text-xl md:text-2xl font-bold text-white mb-2 leading-tight">
            Don't Believe Any Commercial Brags.
        </h3>
        <p class="text-lg md:text-xl font-medium text-white mb-10">
            You Be the Judge
        </p>
        
        <a href="{{ route('graphics.get-quote') }}" class="inline-block px-10 py-3 rounded-full bg-white text-[#1a1a1a] font-bold text-xs tracking-widest shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 uppercase">
            GET YOUR FIRST TRIAL
        </a>
    </div>
</section>
