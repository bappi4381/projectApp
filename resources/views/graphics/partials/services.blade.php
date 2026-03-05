{{-- resources/views/graphics/partials/services.blade.php --}}
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
                    <a href="#" class="block w-full text-center py-4 rounded-md border-2 border-[#1ebba3] text-[13px] font-black uppercase tracking-widest text-[#1a1a1a] relative overflow-hidden group">
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
                    <a href="#" class="block w-full text-center py-4 rounded-md bg-gradient-to-r from-[#0984e3] to-[#1ebba3] text-[13px] font-black uppercase tracking-widest text-white hover:shadow-lg transition-all duration-300">
                        Check For More Services
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>
