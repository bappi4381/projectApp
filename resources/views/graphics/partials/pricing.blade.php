{{-- resources/views/graphics/partials/pricing.blade.php --}}
<section id="pricing" class="relative py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
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

        {{-- Pricing Cards --}}
        @php
        $pricingPlans = [
            [
                'title' => 'Clipping Path Services',
                'headerColor' => 'bg-[#6ab04c]',
                'btnColor' => 'bg-[#6ab04c] hover:bg-[#5a9e3e]',
                'btnBorder' => 'border-[#6ab04c] text-[#6ab04c] hover:bg-[#6ab04c] hover:text-white',
                'price' => '0.49',
                'before' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=600&q=80',
                'services' => [
                    ['Basic Paths', '0.49'],
                    ['Simple Paths', '0.99'],
                    ['Complex Paths', '6.90'],
                    ['Super Complex Path', '7.99'],
                ]
            ],
            [
                'title' => 'Photoshop Shadow Services',
                'headerColor' => 'bg-[#0984e3]',
                'btnColor' => 'bg-[#0984e3] hover:bg-[#0873c7]',
                'btnBorder' => 'border-[#0984e3] text-[#0984e3] hover:bg-[#0984e3] hover:text-white',
                'price' => '0.25',
                'before' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?w=600&q=80',
                'services' => [
                    ['Drop Shadow', '0.25'],
                    ['Natural Shadow', '0.49'],
                    ['Reflection Shadow', '0.49'],
                    ['Retain original shadow', '0.49'],
                ]
            ],
            [
                'title' => 'Ghost Mannequin Effect',
                'headerColor' => 'bg-[#1a1a1a]',
                'btnColor' => 'bg-[#1ebba3] hover:bg-[#17a08c]',
                'btnBorder' => 'border-[#1ebba3] text-[#1ebba3] hover:bg-[#1ebba3] hover:text-white',
                'price' => '1.49',
                'before' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
                'after' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=600&q=80',
                'services' => [
                    ['Neck Joint', '1.49'],
                    ['Remove Mannequin', '1.49'],
                    ['3D Ghost Mannequin', '1.75'],
                    ['Bottom or Sleeves Joint', '2.49'],
                ]
            ]
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 xl:gap-8">
            @foreach($pricingPlans as $i => $plan)
            <div class="bg-white rounded-sm border border-slate-200 flex flex-col overflow-hidden hover:shadow-xl transition-shadow duration-300">
                
                {{-- Card Title Header --}}
                <div class="{{ $plan['headerColor'] }} py-3 px-6 text-center">
                    <h3 class="text-white font-bold text-sm tracking-wide">{{ $plan['title'] }}</h3>
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
                    <img src="{{ $plan['after'] }}" alt="After" class="absolute inset-0 w-full h-full object-cover">
                    
                    {{-- Before Image (clipped) --}}
                    <div class="absolute inset-0 z-10 overflow-hidden slider-smooth" :style="'clip-path: inset(0 ' + (100 - position) + '% 0 0)'">
                        <img src="{{ $plan['before'] }}" alt="Before" class="absolute inset-0 w-full h-full object-cover grayscale brightness-90">
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
                    {{-- Price Display --}}
                    <div class="text-center mb-5 pb-5 border-b border-slate-100">
                        <span class="text-slate-400 text-xs italic">Starts From</span>
                        <div class="flex items-start justify-center gap-0.5 mt-1">
                            <span class="text-[#1a1a1a] text-lg font-bold mt-2">$</span>
                            <span class="text-[#1a1a1a] text-5xl font-black tracking-tighter">{{ explode('.', $plan['price'])[0] }}</span>
                            <span class="text-[#1a1a1a] text-lg font-bold mt-2">.{{ explode('.', $plan['price'])[1] }}</span>
                        </div>
                        <span class="text-slate-400 text-xs italic">per image</span>
                    </div>

                    {{-- Service Items --}}
                    <div class="space-y-3.5 mb-8 flex-grow">
                        @foreach($plan['services'] as [$name, $val])
                        <div class="flex justify-between items-center">
                            <span class="text-[13px] text-slate-600 italic">{{ $name }}</span>
                            <span class="text-[13px] font-bold text-[#1a1a1a]">${{ $val }}</span>
                        </div>
                        @endforeach
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex gap-3">
                        <a href="{{ route('graphics.get-quote') }}" 
                           class="flex-1 text-center py-2.5 rounded-sm border-2 {{ $plan['btnBorder'] }} font-bold text-[11px] uppercase tracking-widest transition-all duration-300">
                            Free Trial
                        </a>
                        <a href="{{ route('graphics.get-quote') }}" 
                           class="flex-1 text-center py-2.5 rounded-sm {{ $plan['btnColor'] }} text-white font-bold text-[11px] uppercase tracking-widest transition-all duration-300">
                            Get a Quote
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination Dots --}}
        <div class="flex justify-center gap-2 mt-10">
            <span class="w-3 h-3 rounded-full border-2 border-[#1ebba3] bg-transparent"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 mt-[1px]"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 mt-[1px]"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-slate-300 mt-[1px]"></span>
        </div>
    </div>
</section>

<style>
    .slider-smooth {
        transition: clip-path 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67), 
                    left 0.1s cubic-bezier(0.17, 0.67, 0.83, 0.67);
    }
</style>
