{{-- resources/views/graphics/partials/ecommerce.blade.php --}}
<section class="relative py-20 overflow-hidden bg-gradient-to-r from-[#17a2b8] to-[#20c997]">
    
    {{-- Decorative Background Mesh --}}
    <div class="absolute inset-0 opacity-20 pointer-events-none">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-white/20 blur-[120px] rounded-full translate-x-1/2 -translate-y-1/2"></div>
    </div>

    <div class="max-w-[1400px] mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            
            {{-- Left Content: Text & Actions --}}
            <div class="w-full lg:w-[45%] space-y-8 reveal">
                <div class="space-y-4">
                    <h3 class="text-3xl font-medium text-slate-800 tracking-tight">E-Commerce</h3>
                    <h2 class="text-5xl md:text-6xl font-black text-slate-900 leading-tight">Product Photo Editing</h2>
                </div>
                
                <p class="text-lg md:text-xl text-slate-800/80 leading-relaxed font-medium">
                    Are you a vendor or seller in Ecommerce Marketplace like Amazon, eBay, AliExpress, Etsy, Flipkart? Do you need photo touch-up services for your store?
                </p>

                <div class="flex flex-wrap items-center gap-6 pt-4">
                    {{-- View Details Circular Button --}}
                    <a href="#" class="group flex items-center gap-4 text-sm font-black uppercase tracking-widest text-[#1a1a1a] hover:text-white transition-colors duration-300">
                        <span class="relative flex items-center justify-center w-14 h-14 rounded-full border-2 border-white group-hover:bg-[#1a1a1a] group-hover:border-[#1a1a1a] transition-all duration-300">
                            <i class="ri-arrow-right-s-line text-2xl group-hover:translate-x-1 transition-transform"></i>
                        </span>
                        VIEW DETAILS
                    </a>

                    {{-- Get Quick Quote Button --}}
                    <a href="#" class="px-10 py-5 bg-white rounded-full text-sm font-black uppercase tracking-widest text-[#1a1a1a] hover:bg-[#1a1a1a] hover:text-white transition-all duration-300 shadow-xl shadow-black/5">
                        GET QUICK QUOTE
                    </a>
                </div>
            </div>

            {{-- Right Content: Scattered Products --}}
            <div class="w-full lg:w-[55%] relative h-[500px] sm:h-[600px] reveal" style="animation-delay: 0.3s">
                
                {{-- Luxury Handbag --}}
                <div class="absolute top-10 left-[10%] w-[45%] z-20 hover:scale-110 transition-transform duration-500 cursor-pointer">
                    <img src="{{ asset('images/ecommerce/bag.png') }}" alt="Luxury Handbag" 
                         class="w-full h-auto drop-shadow-[0_20px_50px_rgba(0,0,0,0.3)] mix-blend-multiply brightness-[1.05] contrast-[1.05]">
                </div>

                {{-- Premium Watch --}}
                <div class="absolute -top-10 left-[5%] w-[32%] z-10 -rotate-12 hover:rotate-0 transition-transform duration-500 cursor-pointer">
                    <img src="{{ asset('images/ecommerce/watch.png') }}" alt="Premium Watch" 
                         class="w-full h-auto drop-shadow-[0_15px_30px_rgba(0,0,0,0.2)] mix-blend-multiply brightness-[1.05] contrast-[1.05]">
                </div>

                {{-- Designer Sunglasses --}}
                <div class="absolute top-[-30px] right-0 w-[42%] z-10 rotate-12 hover:rotate-0 transition-transform duration-500 cursor-pointer">
                    <img src="{{ asset('images/ecommerce/sunglasses.png') }}" alt="Designer Sunglasses" 
                         class="w-full h-auto drop-shadow-[0_15px_30px_rgba(0,0,0,0.2)] mix-blend-multiply brightness-[1.05] contrast-[1.05]">
                </div>

                {{-- Tailored Blazer --}}
                <div class="absolute bottom-0 left-0 w-[50%] z-30 hover:scale-115 transition-transform duration-700 cursor-pointer">
                    <img src="{{ asset('images/ecommerce/blazer.png') }}" alt="Tailored Blazer" 
                         class="w-full h-auto drop-shadow-[0_30px_60px_rgba(0,0,0,0.3)] mix-blend-multiply brightness-[1.1] contrast-[1.05]">
                </div>

                {{-- Leather Boot --}}
                <div class="absolute bottom-10 right-[22%] w-[40%] z-20 rotate-[-8deg] hover:rotate-0 transition-transform duration-500 cursor-pointer">
                    <img src="{{ asset('images/ecommerce/boot.png') }}" alt="Leather Chelsea Boot" 
                         class="w-full h-auto drop-shadow-[0_25px_50px_rgba(0,0,0,0.25)] mix-blend-multiply brightness-[1.05] contrast-[1.05]">
                </div>

                {{-- High-End Sneaker (Clean White Version) --}}
                <div class="absolute bottom-0 right-0 w-[44%] z-30 rotate-[15deg] hover:rotate-0 transition-transform duration-500 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?w=800&q=80" alt="Premium Sneaker" 
                         class="w-full h-auto drop-shadow-[0_30px_60px_rgba(0,0,0,0.35)] mix-blend-multiply brightness-[1.1] contrast-[1.1]">
                </div>

            </div>
        </div>
    </div>
</section>
