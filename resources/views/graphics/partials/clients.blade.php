{{-- resources/views/graphics/partials/clients.blade.php --}}
<section class="relative py-16 bg-white overflow-hidden border-y border-slate-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-10 reveal">
        <span
            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-50 border border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">
            <i class="ri-verified-badge-line text-[#1ebba3]"></i> Trusted Globally
        </span>
        <h2 class="text-3xl font-black text-[#1a1a1a]">Leading Brands <span class="text-[#0984e3]">Choose Us</span>
            Across 30+ Countries</h2>
    </div>

    {{-- Dynamic Marquee Rows --}}
    @if(count($brands) > 0)
        @php
            $half = ceil(count($brands) / 2);
            $row1 = $brands->take($half);
            $row2 = $brands->skip($half);
        @endphp

        {{-- Row 1 --}}
        <div class="relative overflow-hidden mb-6">
            <div
                class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none">
            </div>
            <div
                class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none">
            </div>

            <div class="flex gap-6 animate-marquee w-max">
                @foreach(array_merge($row1->toArray(), $row1->toArray(), $row1->toArray()) as $brand)
                    <div
                        class="flex items-center gap-4 px-8 py-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-[#1ebba3]/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 cursor-default flex-shrink-0 group">
                        <img src="{{ asset('storage/' . $brand['logo']) }}" alt="{{ $brand['name'] }}"
                            class="h-8 w-auto max-w-[120px] object-contain opacity-70 group-hover:opacity-100 filter grayscale group-hover:grayscale-0 transition-all duration-500">
                        <span
                            class="text-xs font-bold text-slate-400 group-hover:text-[#1a1a1a] transition-colors whitespace-nowrap">{{ $brand['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Row 2 (Reverse) --}}
        <div class="relative overflow-hidden">
            <div
                class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none">
            </div>
            <div
                class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none">
            </div>

            <div class="flex gap-6 w-max" style="animation: marquee 40s linear infinite reverse;">
                @foreach(array_merge($row2->toArray(), $row2->toArray(), $row2->toArray()) as $brand)
                    <div
                        class="flex items-center gap-4 px-8 py-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-[#1ebba3]/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 cursor-default flex-shrink-0 group">
                        <img src="{{ asset('storage/' . $brand['logo']) }}" alt="{{ $brand['name'] }}"
                            class="h-8 w-auto max-w-[120px] object-contain opacity-70 group-hover:opacity-100 filter grayscale group-hover:grayscale-0 transition-all duration-500">
                        <span
                            class="text-xs font-bold text-slate-400 group-hover:text-[#1a1a1a] transition-colors whitespace-nowrap">{{ $brand['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        {{-- Fallback message if no brands added --}}
        <div class="text-center py-10 opacity-30">
            <p class="text-sm font-bold uppercase tracking-widest italic">Brands Gallery Loading...</p>
        </div>
    @endif
</section>