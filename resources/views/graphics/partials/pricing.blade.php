{{-- resources/views/graphics/partials/pricing.blade.php --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section id="pricing" class="relative py-20 bg-white overflow-hidden">
    <div class="max-w-[1500px] mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Original Section Header --}}
        <div class="text-center mb-14">
            <h2 class="text-2xl md:text-3xl font-black text-[#1a1a1a] uppercase tracking-wide mb-5">
                PRICES FOR PHOTO EDITING SERVICES
            </h2>
            <p class="text-slate-500 text-sm max-w-3xl mx-auto leading-relaxed mb-5 italic">
                We offer <strong class="text-[#1a1a1a] not-italic">affordable prices and big discounts</strong> for bulk professional photo editing and retouching services. We charge reasonably for our service along with providing the most reliable and top-quality <strong class="text-[#1a1a1a] not-italic">photo retouching</strong> and <strong class="text-[#1a1a1a] not-italic">image editing services</strong>. Because we care for you, your time, and cost!
            </p>
            <div class="flex justify-center gap-1.5">
                <span class="w-2 h-2 bg-[#6ab04c] rounded-sm"></span>
                <span class="w-2 h-2 bg-[#f0932b] rounded-sm"></span>
                <span class="w-2 h-2 bg-[#3498db] rounded-sm"></span>
                <span class="w-2 h-2 bg-[#130f40] rounded-sm"></span>
            </div>
        </div>

        {{-- Swiper Slider for dynamic content --}}
        <div class="swiper pricing-swiper !pb-14">
            <div class="swiper-wrapper flex-nowrap">
                @php
                $colorPalette = [
                    ['header' => 'bg-[#6ab04c]', 'btn' => 'bg-[#6ab04c] hover:bg-[#5a9e3e]', 'border' => 'border-[#6ab04c] text-[#6ab04c] hover:bg-[#6ab04c] hover:text-white'],
                    ['header' => 'bg-[#0984e3]', 'btn' => 'bg-[#0984e3] hover:bg-[#0873c7]', 'border' => 'border-[#0984e3] text-[#0984e3] hover:bg-[#0984e3] hover:text-white'],
                    ['header' => 'bg-[#1a1a1a]', 'btn' => 'bg-[#1ebba3] hover:bg-[#17a08c]', 'border' => 'border-[#1ebba3] text-[#1ebba3] hover:bg-[#1ebba3] hover:text-white'],
                    ['header' => 'bg-[#f0932b]', 'btn' => 'bg-[#f0932b] hover:bg-[#d88426]', 'border' => 'border-[#f0932b] text-[#f0932b] hover:bg-[#f0932b] hover:text-white'],
                ];
                @endphp

                @foreach($pricingServices as $index => $service)
                    @php 
                        $color = $colorPalette[$index % count($colorPalette)];
                        $priceStr = number_format($service->starting_price ?? 0.00, 2);
                    @endphp
                    <div class="swiper-slide h-auto">
                        <div class="bg-white rounded-sm border border-slate-200 flex flex-col h-full overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            
                            {{-- Card Title Header (Original Style) --}}
                            <div class="{{ $color['header'] }} py-3 px-6 text-center">
                                <h3 class="text-white font-bold text-sm tracking-wide">{{ strtoupper($service->name) }}</h3>
                            </div>

                            {{-- Before/After Slider --}}
                            <div class="relative w-full aspect-[4/3] overflow-hidden border-b border-slate-100"
                                x-data="{ 
                                    position: 50, 
                                    isDragging: false,
                                    updatePosition(e) {
                                        if (!this.isDragging && e.type !== 'click') return;
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
                                {{-- After Image --}}
                                <img src="{{ $service->image_after ? asset('storage/' . $service->image_after) : 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80' }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                                
                                {{-- Before Image (clipped) --}}
                                <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                                    <img src="{{ $service->image_before ? asset('storage/' . $service->image_before) : 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80' }}" alt="Before" class="absolute inset-0 w-full h-full object-cover">
                                </div>

                                {{-- Slider Handle --}}
                                <div class="absolute inset-y-0 z-20 w-0.5 bg-white cursor-ew-resize slider-smooth shadow-md" :style="'left: ' + position + '%'">
                                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-7 h-7 bg-white rounded-full shadow-lg flex items-center justify-center border border-slate-200">
                                        <i class="ri-arrow-left-right-fill text-[10px] text-slate-500"></i>
                                    </div>
                                </div>

                                {{-- Before / After Labels --}}
                                <div class="absolute bottom-3 left-3 z-30">
                                    <span class="bg-[#1a1a1a]/80 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1">Before</span>
                                </div>
                                <div class="absolute bottom-3 right-3 z-30">
                                    <span class="bg-[#1a1a1a]/80 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1">After</span>
                                </div>
                            </div>

                            {{-- Price & Services --}}
                            <div class="p-6 flex flex-col flex-grow">
                                {{-- Price Display (Matched to your Screenshot) --}}
                                <div class="flex items-center justify-center gap-2 mb-5 pb-5 border-b border-slate-100">
                                    <span class="text-slate-400 text-xs italic">Starts From</span>
                                    <span class="text-[#1a1a1a] text-3xl font-black tracking-tighter">${{ $priceStr }}</span>
                                    <span class="text-slate-400 text-xs italic lowercase">{{ $service->price_unit ?? 'per image' }}</span>
                                </div>

                                {{-- Variants List (Level 4) - Limited to 2 --}}
                                <div class="space-y-3.5 mb-8 flex-grow">
                                    @forelse($service->variants->take(2) as $variant)
                                    <div class="flex justify-between items-center">
                                        <span class="text-[13px] text-slate-600 italic font-medium">{{ $variant->name }}</span>
                                        <span class="text-[14px] font-bold text-[#1a1a1a]">${{ number_format($variant->starting_price ?? 0.00, 2) }}</span>
                                    </div>
                                    @empty
                                    <div class="text-center py-4 bg-slate-50 rounded border border-dashed border-slate-200">
                                        <span class="text-[12px] text-slate-400 italic">Global Pricing Applies</span>
                                    </div>
                                    @endforelse
                                </div>

                                {{-- Action Buttons --}}
                                <div class="flex gap-3 mt-auto">
                                    <a href="{{ route('graphics.get-quote') }}" 
                                       class="flex-1 text-center py-2.5 rounded-sm border-2 {{ $color['border'] }} font-bold text-[11px] uppercase tracking-widest transition-all">
                                        Free Trial
                                    </a>
                                    <a href="{{ route('graphics.get-quote') }}" 
                                       class="flex-1 text-center py-2.5 rounded-sm {{ $color['btn'] }} text-white font-bold text-[11px] uppercase tracking-widest transition-all shadow-md">
                                        Get a Quote
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Slider Controls (Original Simple Style) --}}
            <div class="swiper-pagination !static mt-10"></div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        new Swiper('.pricing-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: {{ count($pricingServices ?? []) > 3 ? 'true' : 'false' }},
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            }
        });
    });
</script>

<style>
    .pricing-swiper .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: #cbd5e1;
        opacity: 1;
        transition: all 0.3s ease;
    }
    .pricing-swiper .swiper-pagination-bullet-active {
        width: 32px;
        border-radius: 6px;
        background: #facc15;
    }
    .slider-smooth {
        transition: clip-path 0.1s linear, left 0.1s linear;
    }
    .reveal {
        animation: reveal 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes reveal {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<style>
    .slider-smooth {
        transition: clip-path 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67), 
                    left 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67);
    }
</style>
