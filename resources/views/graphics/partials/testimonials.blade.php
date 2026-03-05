{{-- resources/views/graphics/partials/testimonials.blade.php --}}
@php
$testimonials = [
    [
        'name'    => 'Sarah Johnson',
        'role'    => 'E-Commerce Director',
        'company' => 'StyleHive London',
        'avatar'  => 'SJ',
        'color'   => 'indigo',
        'rating'  => 5,
        'quote'   => 'Our product photography used to take weeks to post-process. Since partnering with this studio, we\'ve cut our time-to-market by 60%. The quality is absolutely flawless.',
        'tag'     => 'Clipping Path',
    ],
    [
        'name'    => 'Marcus Chen',
        'role'    => 'Creative Director',
        'company' => 'Luxe Jewels NYC',
        'avatar'  => 'MC',
        'color'   => 'amber',
        'rating'  => 5,
        'quote'   => 'Jewelry retouching is notoriously difficult to outsource — but these guys nailed it from the first batch. Every diamond sparkles exactly the way it should.',
        'tag'     => 'Jewelry Retouching',
    ],
    [
        'name'    => 'Priya Nair',
        'role'    => 'Marketing Head',
        'company' => 'Urban Threads India',
        'avatar'  => 'PN',
        'color'   => 'purple',
        'rating'  => 5,
        'quote'   => 'Ghost mannequin service has completely transformed our product listings. Our conversion rate went up by 34% after switching to these professional images.',
        'tag'     => 'Ghost Mannequin',
    ],
    [
        'name'    => 'David Williams',
        'role'    => 'Senior Photographer',
        'company' => 'DW Studios, Berlin',
        'avatar'  => 'DW',
        'color'   => 'cyan',
        'rating'  => 5,
        'quote'   => 'Fast turnaround, excellent communication, and results that match exactly what I describe. I\'ve tried six other services — this is the only one I\'ve kept.',
        'tag'     => 'Photo Retouching',
    ],
    [
        'name'    => 'Emma Rodriguez',
        'role'    => 'Founder & CEO',
        'company' => 'FashionForward AU',
        'avatar'  => 'ER',
        'color'   => 'pink',
        'rating'  => 5,
        'quote'   => 'We ship 3,000+ images per month and this team handles every single one. Their consistency across large batch orders is remarkable — every image is perfect.',
        'tag'     => 'Batch Processing',
    ],
    [
        'name'    => 'Alex Thompson',
        'role'    => 'Product Manager',
        'company' => 'NovaMart Global',
        'avatar'  => 'AT',
        'color'   => 'emerald',
        'rating'  => 5,
        'quote'   => 'The 24-hour turnaround is real. I sent 200 images at 9 PM and had results ready by morning. That kind of reliability is what a high-volume operation needs.',
        'tag'     => 'Fast Delivery',
    ],
];

// Group into pairs for the slider
$chunks = array_chunk($testimonials, 2);
@endphp

<section id="quote" class="relative py-16 md:py-20 bg-slate-950 overflow-hidden" 
    x-data="{ 
        active: 0,
        count: {{ count($chunks) }},
        autoplay: true,
        timer: null,
        init() {
            if (this.autoplay) {
                this.startAutoplay();
            }
        },
        startAutoplay() {
            this.timer = setInterval(() => {
                this.active = (this.active + 1) % this.count;
            }, 6000);
        },
        stopAutoplay() {
            clearInterval(this.timer);
        },
        next() {
            this.stopAutoplay();
            this.active = (this.active + 1) % this.count;
            this.startAutoplay();
        },
        prev() {
            this.stopAutoplay();
            this.active = (this.active - 1 + this.count) % this.count;
            this.startAutoplay();
        }
    }">

    {{-- Luxury Background --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-px bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent"></div>
        <div class="absolute top-1/4 -left-1/4 w-[500px] h-[500px] bg-indigo-600/5 rounded-full blur-[120px] animate-pulse-glow"></div>
        <div class="absolute bottom-1/4 -right-1/4 w-[500px] h-[500px] bg-purple-600/5 rounded-full blur-[120px] animate-pulse-glow" style="animation-delay: 2s"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        {{-- Header --}}
        <div class="text-center mb-12 reveal">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/[0.03] border border-white/10 text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em] mb-6">
                Client Success
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6">
                Loved by Brands <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Worldwide</span>
            </h2>
        </div>

        {{-- Main Slider Container --}}
        <div class="relative max-w-6xl mx-auto px-4 md:px-12">
            
            {{-- Navigation Buttons --}}
            <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-white/10 transition-all z-20 group hidden md:flex">
                <i class="ri-arrow-left-s-line text-2xl group-hover:-translate-x-0.5 transition-transform"></i>
            </button>
            <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-white/10 transition-all z-20 group hidden md:flex">
                <i class="ri-arrow-right-s-line text-2xl group-hover:translate-x-0.5 transition-transform"></i>
            </button>

            {{-- Slider Track --}}
            <div class="relative min-h-[400px] md:min-h-[280px]">
                @foreach($chunks as $i => $slide)
                <div x-show="active === {{ $i }}" 
                     x-transition:enter="transition ease-out duration-700"
                     x-transition:enter-start="opacity-0 translate-x-8"
                     x-transition:enter-end="opacity-100 translate-x-0"
                     x-transition:leave="transition ease-in duration-500 absolute inset-0"
                     x-transition:leave-start="opacity-100 translate-x-0"
                     x-transition:leave-end="opacity-0 -translate-x-8"
                     class="w-full grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8"
                     x-cloak>
                    
                    @foreach($slide as $t)
                    <div class="bg-white/[0.02] border border-white/[0.05] rounded-3xl p-6 md:p-8 flex flex-col items-start text-left group hover:bg-white/[0.04] transition-all duration-300">
                        <div class="flex gap-1 mb-4">
                            @for($s=0;$s<5;$s++)
                            <i class="ri-star-fill text-amber-400 text-xs"></i>
                            @endfor
                        </div>

                        <p class="text-slate-300 text-sm md:text-base leading-relaxed mb-8 italic flex-grow">
                            "{{ $t['quote'] }}"
                        </p>

                        <div class="flex items-center gap-4 mt-auto">
                            <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/10">
                                <span class="text-xs font-black text-white uppercase">{{ $t['avatar'] }}</span>
                            </div>
                            <div>
                                <div class="text-sm font-black text-white tracking-wide uppercase">{{ $t['name'] }}</div>
                                <div class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1">{{ $t['company'] }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>

            {{-- Pagination Dots --}}
            <div class="flex justify-center gap-3 mt-10">
                @foreach($chunks as $i => $t)
                <button @click="stopAutoplay(); active = {{ $i }}; startAutoplay();" 
                        class="h-1.5 rounded-full transition-all duration-500"
                        :class="active === {{ $i }} ? 'w-12 bg-indigo-500' : 'w-3 bg-white/10 hover:bg-white/20'"></button>
                @endforeach
            </div>
        </div>

        {{-- Mini Stats --}}
        <div class="flex flex-wrap justify-center gap-x-12 gap-y-6 mt-16 pt-12 border-t border-white/5 opacity-60">
            @foreach([['500+','Clients'],['2M+','Assets'],['98%','SLA Hub'],['4.9★','Score']] as [$v,$l])
            <div class="flex items-center gap-3">
                <span class="text-lg font-black text-white">{{ $v }}</span>
                <span class="text-[9px] text-slate-500 font-bold uppercase tracking-widest">{{ $l }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
