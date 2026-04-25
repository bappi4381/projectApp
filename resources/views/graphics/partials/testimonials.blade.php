{{-- resources/views/graphics/partials/testimonials.blade.php --}}

<section id="testimonials" class="py-24 bg-[#f8fafc] relative overflow-hidden" x-data="{ 
        active: 0,
        count: {{ count($chunks) }},
        goTo(index) {
            this.active = index;
        }
    }">
    {{-- Decorative background elements --}}
    <div class="absolute top-0 left-0 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Header Section --}}
        <div class="text-center mb-20">
            <span class="text-xs font-black text-emerald-500 uppercase tracking-[0.3em] mb-4 block">Endorsements</span>
            <h2 class="text-3xl md:text-5xl font-black uppercase text-[#082f49] tracking-tighter">
                What Our Clients Say
            </h2>
            <div class="w-20 h-1.5 bg-emerald-500 mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- Slider Container --}}
        <div class="relative w-full max-w-6xl mx-auto">
            <div class="relative min-h-[450px] md:min-h-[350px]">
                @foreach($chunks as $i => $slide)
                    <div x-show="active === {{ $i }}" 
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 translate-x-12"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-500 absolute inset-0"
                        x-transition:leave-start="opacity-100 translate-x-0"
                        x-transition:leave-end="opacity-0 -translate-x-12"
                        class="w-full grid grid-cols-1 md:grid-cols-2 gap-10" x-cloak>

                        @foreach($slide as $t)
                            <div class="relative bg-white rounded-[3rem] p-10 shadow-[0_15px_40px_rgba(0,0,0,0.02)] text-left border border-slate-100/50 hover:shadow-[0_30px_60px_rgba(0,0,0,0.05)] transition-all duration-500 group">
                                {{-- Quote Icon Watermark --}}
                                <i class="ri-double-quotes-r absolute top-10 right-10 text-7xl text-slate-100 opacity-40 group-hover:text-emerald-500 group-hover:opacity-10 transition-all duration-700"></i>
                                
                                <div class="relative z-10">
                                    <div class="flex items-center gap-6 mb-8">
                                        <div class="relative">
                                            <div class="w-16 h-16 rounded-full bg-gradient-to-tr from-emerald-500 to-blue-500 p-1 shadow-lg group-hover:rotate-6 transition-transform duration-500">
                                                <div class="w-full h-full rounded-full bg-white p-1 overflow-hidden">
                                                    <img src="{{ $t['avatar'] }}" alt="{{ $t['name'] }}" class="w-full h-full rounded-full object-cover">
                                                </div>
                                            </div>
                                            <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-white rounded-full flex items-center justify-center shadow-md">
                                                <i class="ri-checkbox-circle-fill text-emerald-500 text-sm"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-black text-lg text-[#0f172a] uppercase tracking-tight mb-0.5">{{ $t['name'] }}</div>
                                            <div class="flex items-center gap-2">
                                                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">{{ $t['role'] }}</span>
                                                <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                                <span class="text-[8px] text-emerald-500 font-black uppercase tracking-widest">Verified Client</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex gap-1 mb-6">
                                        <i class="ri-star-fill text-yellow-400 text-[10px]"></i>
                                        <i class="ri-star-fill text-yellow-400 text-[10px]"></i>
                                        <i class="ri-star-fill text-yellow-400 text-[10px]"></i>
                                        <i class="ri-star-fill text-yellow-400 text-[10px]"></i>
                                        <i class="ri-star-fill text-yellow-400 text-[10px]"></i>
                                    </div>

                                    <p class="text-slate-600 text-[15px] font-medium leading-relaxed italic line-clamp-4">
                                        "{!! $t['quote'] !!}"
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            {{-- Custom Pagination Dots --}}
            <div class="flex justify-center items-center gap-4 mt-12">
                @foreach($chunks as $index => $slide)
                    <button @click="goTo({{ $index }})" 
                            class="group relative h-2.5 rounded-full transition-all duration-500 flex items-center justify-center focus:outline-none"
                            :class="active === {{ $index }} ? 'w-10 bg-emerald-500' : 'w-2.5 bg-slate-200 hover:bg-slate-300'">
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</section>