{{-- resources/views/graphics/partials/pricing.blade.php --}}
<section id="pricing" class="relative py-28 bg-white overflow-hidden">
    {{-- High-End Studio Background --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        {{-- Soft Mesh Glows --}}
        <div class="absolute -top-32 -left-32 w-[700px] h-[700px] bg-indigo-100/40 rounded-full blur-[140px] opacity-60 animate-pulse-glow"></div>
        <div class="absolute top-1/2 -right-32 w-[600px] h-[600px] bg-cyan-100/30 rounded-full blur-[140px] opacity-60" style="animation-delay: 2s"></div>
        
        {{-- Refined Noise Texture --}}
        <div class="absolute inset-0 opacity-[0.012] mix-blend-multiply" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\"0 0 200 200\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cfilter id=\"noise\"%3E%3CfeTurbulence type=\"fractalNoise\" baseFrequency=\"0.65\" numOctaves=\"3\" stitchTiles=\"stitch\"/%3E%3C/filter%3E%3Crect width=\"100%25\" height=\"100%25\" filter=\"url(%23noise)\"/%3E%3C/svg%3E')"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        {{-- Section Header --}}
        <div class="text-center mb-24 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-50 border border-indigo-100 text-[10px] font-black text-indigo-600 uppercase tracking-[0.2em] mb-6">
                Transparent Pricing
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6 tracking-tight uppercase">
                Flexible <span class="text-indigo-600">Investment</span> Plans
            </h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-indigo-600 to-cyan-500 mx-auto rounded-full mb-8"></div>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">
                Premium visual work doesn't have to break the bank. Explore our scalable pricing models designed for creators, brands, and agencies worldwide.
            </p>
        </div>

        {{-- Pricing Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 xl:gap-12">
            @php
            $pricingPlans = [
                [
                    'title' => 'Clipping Path',
                    'headerIcon' => 'ri-scissors-2-line',
                    'headerGradient' => 'from-emerald-500 to-teal-600',
                    'price' => '0.49',
                    'before' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80',
                    'after' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80',
                    'services' => [
                        ['Basic Paths', '0.49'],
                        ['Simple Paths', '0.99'],
                        ['Complex Paths', '6.90'],
                        ['Super Complex', '7.99'],
                    ]
                ],
                [
                    'title' => 'Shadow Services',
                    'headerIcon' => 'ri-shadow-line',
                    'headerGradient' => 'from-indigo-600 to-blue-600',
                    'price' => '0.25',
                    'before' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80',
                    'after' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80',
                    'services' => [
                        ['Drop Shadow', '0.25'],
                        ['Natural Shadow', '0.49'],
                        ['Reflection Shadow', '0.49'],
                        ['Original Retain', '0.49'],
                    ]
                ],
                [
                    'title' => 'Ghost Mannequin',
                    'headerIcon' => 'ri-shirt-line',
                    'headerGradient' => 'from-amber-400 to-orange-500',
                    'price' => '1.49',
                    'before' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
                    'after' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
                    'services' => [
                        ['Neck Joint', '1.49'],
                        ['Remove Mannequin', '1.49'],
                        ['3D Effect', '1.75'],
                        ['Sleeves Joint', '2.49'],
                    ]
                ]
            ];
            @endphp

            @foreach($pricingPlans as $i => $plan)
            <div class="group bg-white rounded-[40px] shadow-[0_30px_70px_-15px_rgba(0,0,0,0.08)] hover:shadow-[0_40px_90px_-20px_rgba(0,0,0,0.12)] transition-all duration-500 border border-slate-100 flex flex-col reveal overflow-hidden hover:-translate-y-2" style="animation-delay: {{ $i * 0.15 }}s">
                
                {{-- Card Header --}}
                <div class="bg-gradient-to-r {{ $plan['headerGradient'] }} p-8 text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <i class="{{ $plan['headerIcon'] }} text-7xl text-white rotate-12"></i>
                    </div>
                    <h3 class="relative text-white font-black text-sm tracking-[0.2em] uppercase mb-1">{{ $plan['title'] }}</h3>
                    <div class="relative flex items-center justify-center gap-1">
                        <span class="text-white/70 text-xs font-bold uppercase">Starts At</span>
                        <div class="flex items-start">
                            <span class="text-white text-lg font-bold mt-1">$</span>
                            <span class="text-white text-4xl font-black tracking-tighter">{{ explode('.', $plan['price'])[0] }}</span>
                            <span class="text-white text-lg font-bold mt-1">.{{ explode('.', $plan['price'])[1] }}</span>
                        </div>
                    </div>
                </div>

                {{-- Interactive Slider --}}
                <div class="relative w-full aspect-[4/3] overflow-hidden"
                    x-data="{ 
                        position: 50, 
                        isDragging: false,
                        updatePosition(e) {
                            if (!this.isDragging && e.type !== 'mousemove' && e.type !== 'click') return;
                            const rect = $el.getBoundingClientRect();
                            const x = (e.clientX || (e.touches ? e.touches[0].clientX : 0)) - rect.left;
                            this.position = Math.max(0, Math.min(100, (x / rect.width) * 100));
                        }
                    }"
                    @mousedown="isDragging = true; updatePosition($event)"
                    @touchstart.passive="isDragging = true"
                    @mouseup="isDragging = false"
                    @touchend="isDragging = false"
                    @mousemove="updatePosition($event)"
                    @touchmove.passive="updatePosition($event)"
                    @click="updatePosition($event)"
                    @mouseleave="isDragging = false"
                >
                    <img src="{{ $plan['after'] }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                    
                    <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $plan['before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-75">
                    </div>

                    {{-- Refined Handle --}}
                    <div class="absolute inset-y-0 z-20 w-1 bg-white/80 cursor-ew-resize slider-smooth shadow-[0_0_20px_rgba(0,0,0,0.2)]" :style="'left: ' + position + '%'">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 bg-white rounded-full shadow-xl flex items-center justify-center border-2 border-white group-hover:scale-110 transition-transform">
                            <i class="ri-arrow-left-right-fill text-[12px] text-indigo-600"></i>
                        </div>
                    </div>
                </div>

                {{-- Pricing Content --}}
                <div class="p-8 pb-10 flex flex-col">
                    <div class="space-y-4 mb-10">
                        @foreach($plan['services'] as [$name, $val])
                        <div class="flex justify-between items-center group/item">
                            <div class="flex items-center gap-3">
                                <div class="w-1.5 h-1.5 rounded-full bg-slate-200 group-hover/item:bg-indigo-400 transition-colors"></div>
                                <span class="text-xs font-bold text-slate-600 uppercase tracking-widest group-hover/item:text-slate-900 transition-colors">{{ $name }}</span>
                            </div>
                            <div class="text-xs font-black text-slate-900 tabular-nums">${{ $val }}</div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Actions --}}
                    <div class="space-y-3">
                        <a href="#quote" class="flex items-center justify-center gap-3 w-full py-4 rounded-2xl bg-slate-900 text-white font-black text-[11px] uppercase tracking-widest hover:bg-indigo-600 transition-all shadow-xl shadow-slate-200 hover:shadow-indigo-500/20 active:scale-95">
                            Order Now <i class="ri-arrow-right-up-line text-lg"></i>
                        </a>
                        <a href="#quote" class="flex items-center justify-center w-full py-4 rounded-2xl border-2 border-slate-100 text-slate-400 font-bold text-[11px] uppercase tracking-widest hover:border-indigo-100 hover:text-indigo-600 transition-all active:scale-95">
                            Free Trial
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .slider-smooth {
        transition: clip-path 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67), 
                    left 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67);
    }
</style>
