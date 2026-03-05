{{-- resources/views/graphics/partials/clients.blade.php --}}
<section class="relative py-16 bg-white overflow-hidden border-y border-slate-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-10 reveal">
        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-50 border border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">
            <i class="ri-verified-badge-line text-[#1ebba3]"></i> Trusted Globally
        </span>
        <h2 class="text-3xl font-black text-[#1a1a1a]">Leading Brands <span class="text-[#0984e3]">Choose Us</span> Across 30+ Countries</h2>
    </div>

    {{-- Marquee Row 1 --}}
    <div class="relative overflow-hidden mb-6">
        <div class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

        <div class="flex gap-6 animate-marquee w-max">
            @php
            $clients1 = [
                ['Amazon',      'ri-amazon-fill',      '#FF9900'],
                ['Apple',       'ri-apple-fill',       '#000000'],
                ['Adobe',       'ri-adobe-line',       '#FF0000'],
                ['Shopify',     'ri-shopping-bag-3-line','#96BF48'],
                ['eBay',        'ri-price-tag-3-line',  '#E43137'],
                ['Zalando',     'ri-shirt-line',        '#F4792F'],
                ['ASOS',        'ri-handbag-line',      '#2D2D2D'],
                ['Wayfair',     'ri-sofa-line',         '#7B4397'],
                ['Target',      'ri-focus-3-line',      '#CC0000'],
                ['Walmart',     'ri-store-2-line',      '#0071CE'],
            ];
            @endphp
            @foreach(array_merge($clients1, $clients1) as [$name, $icon, $color])
            <div class="flex items-center gap-4 px-8 py-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-[#1ebba3]/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 cursor-default flex-shrink-0 group">
                <i class="{{ $icon }} text-2xl opacity-70 group-hover:opacity-100 transition-opacity" style="color:{{ $color }}"></i>
                <span class="text-sm font-bold text-slate-600 group-hover:text-[#1a1a1a] transition-colors whitespace-nowrap">{{ $name }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Marquee Row 2 (reverse) --}}
    <div class="relative overflow-hidden">
        <div class="absolute left-0 top-0 bottom-0 w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-32 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

        <div class="flex gap-6 w-max" style="animation: marquee 40s linear infinite reverse;">
            @php
            $clients2 = [
                ['H&M',         'ri-t-shirt-2-line',    '#D0021B'],
                ['Zara',        'ri-handbag-2-line',    '#333333'],
                ['Nike',        'ri-run-line',          '#000000'],
                ['Adidas',      'ri-footprint-fill',    '#000000'],
                ['IKEA',        'ri-table-line',        '#0058A3'],
                ['Etsy',        'ri-store-line',        '#F1641E'],
                ['Farfetch',    'ri-award-line',        '#2E2E2E'],
                ['LVMH',        'ri-vip-crown-line',    '#B8860B'],
                ['Walmart',     'ri-store-2-line',      '#0071CE'],
                ['Getty Images','ri-image-2-line',      '#C9A84C'],
            ];
            @endphp
            @foreach(array_merge($clients2, $clients2) as [$name, $icon, $color])
            <div class="flex items-center gap-4 px-8 py-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-[#1ebba3]/20 hover:shadow-xl hover:shadow-slate-200/50 transition-all duration-500 cursor-default flex-shrink-0 group">
                <i class="{{ $icon }} text-2xl opacity-70 group-hover:opacity-100 transition-opacity" style="color:{{ $color }}"></i>
                <span class="text-sm font-bold text-slate-600 group-hover:text-[#1a1a1a] transition-colors whitespace-nowrap">{{ $name }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
