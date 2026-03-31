{{-- resources/views/graphics/partials/testimonials.blade.php --}}
@php
$testimonials = [
    [
        'name'    => 'Nicholsons',
        'role'    => 'E-commerce, Product Seller',
        'avatar'  => 'https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=150&q=80',
        'quote'   => 'I use Color Experts on a regular basis to clip my images and place them on a <strong>white background</strong> ready for use on my website. I am always impressed by the quality of the work which helps to show my website at its best. The quick "<strong>turn around</strong>" time is vital in helping us to keep our <strong>online product catalogue</strong> fresh and up-to-date.',
        'color'   => '#1ebba3'
    ],
    [
        'name'    => 'Kith Wig Seratch',
        'role'    => 'AB Kajpromenaden, Helsingborg Sweden',
        'avatar'  => 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=150&q=80',
        'quote'   => 'CEI has been providing me <strong>clipping path services</strong> for a long time. The quality and <strong>turnaround time</strong> are second to none. I recommend CEI for superior Clipping Path and top-notch Image Manipulation Services at very very <strong>reasonable cost</strong>.',
        'color'   => '#0984e3'
    ],
    [
        'name'    => 'Sarah Jenkins',
        'role'    => 'Creative Director',
        'avatar'  => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80',
        'quote'   => 'Their <strong>ghost mannequin</strong> editing is flawless. Our clothing line looks incredibly professional, and sales have increased noticeably since we started using their <strong>retouching services</strong> on a daily basis.',
        'color'   => '#f0932b'
    ],
    [
        'name'    => 'Markus Vance',
        'role'    => 'Lead Photographer',
        'avatar'  => 'https://images.unsplash.com/photo-1527980965255-d3b416303d12?auto=format&fit=crop&w=150&q=80',
        'quote'   => 'We process thousands of raw images weekly. Outsourcing the <strong>background removal</strong> and color correction to CEI has been the <strong>best decision</strong> we made for streamlining our studio workflow.',
        'color'   => '#6ab04c'
    ],
];
$chunks = array_chunk($testimonials, 2);
@endphp

<section id="testimonials" class="py-24 bg-[#fafafa] overflow-hidden" 
    x-data="{ 
        active: 0,
        count: {{ count($chunks) }},
        timer: null,
        init() {
            this.startAutoplay();
        },
        startAutoplay() {
            this.timer = setInterval(() => {
                this.active = (this.active + 1) % this.count;
            }, 7000);
        },
        stopAutoplay() {
            clearInterval(this.timer);
        },
        goTo(index) {
            this.stopAutoplay();
            this.active = index;
            this.startAutoplay();
        }
    }">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-[#1a1a1a] uppercase tracking-wide mb-4">
                TESTIMONIALS
            </h2>
            <p class="text-slate-500 text-sm md:text-base font-light mb-6">
                Over 15,000 photo editing clients all over the world, some of them speak for us!
            </p>
            <div class="flex justify-center gap-1.5">
                <span class="w-2 h-2 bg-[#6ab04c] rounded-sm"></span>
                <span class="w-2 h-2 bg-[#f0932b] rounded-sm"></span>
                <span class="w-2 h-2 bg-[#3498db] rounded-sm"></span>
                <span class="w-2 h-2 bg-[#130f40] rounded-sm"></span>
            </div>
        </div>

        {{-- Slider Container --}}
        <div class="relative w-full max-w-6xl mx-auto">
            
            <div class="relative min-h-[400px] md:min-h-[280px]">
                @foreach($chunks as $i => $slide)
                <div x-show="active === {{ $i }}" 
                     x-transition:enter="transition ease-out duration-700"
                     x-transition:enter-start="opacity-0 translate-x-8"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     x-transition:leave="transition ease-in duration-500 absolute inset-0"
                     x-transition:leave-start="opacity-100 translate-x-0"
                     x-transition:leave-end="opacity-0 -translate-x-8"
                     class="w-full grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-16"
                     x-cloak>
                    
                    @foreach($slide as $t)
                    <div class="flex flex-col md:flex-row gap-6 md:gap-8 hover:-translate-y-1 transition-transform duration-300">
                        {{-- Avatar Design --}}
                        <div class="shrink-0 relative mx-auto md:mx-0 mt-2">
                            {{-- Decorative background shape --}}
                            <div class="absolute -inset-3 bg-[#e8f2ec] rounded-full rounded-tr-none scale-[1.1] z-0"></div>
                            
                            {{-- Avatar Image Container --}}
                            <div class="relative z-10 w-24 h-24 sm:w-28 sm:h-28 rounded-full rounded-tr-none border-2 border-[{{ $t['color'] }}] overflow-hidden bg-white shadow-lg p-1.5">
                                <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}" class="w-full h-full object-cover rounded-full rounded-tr-none filter contrast-125">
                            </div>

                            {{-- Floating Dots --}}
                            <div class="absolute -top-1 -left-1 w-2.5 h-2.5 bg-yellow-400 rounded-full shadow-sm z-20"></div>
                            <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-[#3498db] rounded-full shadow-sm z-20"></div>
                            <div class="absolute bottom-2 -right-4 w-1.5 h-1.5 bg-[#130f40] rounded-full shadow-sm z-20"></div>
                        </div>

                        {{-- Content --}}
                        <div class="flex-grow text-center md:text-left">
                            <div class="flex flex-col md:flex-row md:items-start gap-3 mb-4">
                                {{-- Quote Icon --}}
                                <i class="ri-double-quotes-l text-4xl leading-none text-slate-700 font-serif"></i>
                                
                                <div class="mt-1 md:mt-2 border-b border-slate-200 pb-2 flex-grow">
                                    <span class="text-[{{ $t['color'] }}] font-bold text-[15px]">{{ $t['name'] }}</span>
                                    <span class="text-slate-500 font-medium text-xs">, {{ $t['role'] }}</span>
                                </div>
                            </div>
                            
                            {{-- Testimonial Text --}}
                            <p class="text-slate-600 text-[13px] md:text-sm leading-relaxed text-justify test-text">
                                {!! $t['quote'] !!}
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="flex justify-center items-center gap-3 mt-14">
                @foreach($chunks as $index => $slide)
                <button @click="goTo({{ $index }})" class="focus:outline-none flex items-center justify-center transition-all duration-300 w-4 h-4 rounded-full border border-transparent"
                    :class="active === {{ $index }} ? 'border-yellow-400 p-[2px]' : ''">
                    <span class="block rounded-full transition-all duration-300" 
                          :class="active === {{ $index }} ? 'w-full h-full bg-yellow-400' : 'w-[5px] h-[5px] bg-[#a9b0a6] hover:bg-slate-400'"></span>
                </button>
                @endforeach
            </div>

        </div>
    </div>
</section>

<style>
    .test-text strong {
        color: #1a1a1a;
        font-weight: 700;
    }
</style>
