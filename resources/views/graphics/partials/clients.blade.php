{{-- resources/views/graphics/partials/clients.blade.php --}}
<section class="relative py-16 bg-slate-950 overflow-hidden border-y border-white/[0.04]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-10 reveal">
        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/5 border border-white/10 text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">
            <i class="ri-verified-badge-line text-emerald-400"></i> Renowned Clients
        </span>
        <h2 class="text-2xl font-bold text-white">Trusted by <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">industry leaders</span> across 30+ countries</h2>
    </div>

    {{-- Marquee Row 1 --}}
    <div class="relative overflow-hidden mb-5">
        <div class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-slate-950 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-slate-950 to-transparent z-10 pointer-events-none"></div>

        <div class="flex gap-5 animate-marquee w-max">
            @php
            $clients1 = [
                ['Amazon',      'ri-amazon-fill',      '#FF9900'],
                ['Apple',       'ri-apple-fill',       '#A2A2A2'],
                ['Adobe',       'ri-adobe-line',       '#FF0000'],
                ['Shopify',     'ri-shopping-bag-3-line','#96BF48'],
                ['eBay',        'ri-price-tag-3-line',  '#E43137'],
                ['Zalando',     'ri-shirt-line',        '#F4792F'],
                ['ASOS',        'ri-handbag-line',      '#2D2D2D'],
                ['Getty Images','ri-image-2-line',      '#C9A84C'],
                ['Shutterstock','ri-camera-3-line',     '#FF4081'],
                ['Wayfair',     'ri-sofa-line',         '#7B4397'],
                ['Target',      'ri-focus-3-line',      '#CC0000'],
                ['Walmart',     'ri-store-2-line',      '#0071CE'],
            ];
            @endphp
            @foreach(array_merge($clients1, $clients1) as [$name, $icon, $color])
            <div class="flex items-center gap-3 px-7 py-4 rounded-2xl bg-white/[0.03] border border-white/[0.05] hover:bg-white/[0.07] hover:border-white/10 transition-all duration-300 cursor-default flex-shrink-0 group">
                <i class="{{ $icon }} text-xl opacity-60 group-hover:opacity-100 transition-opacity" style="color:{{ $color }}"></i>
                <span class="text-sm font-semibold text-slate-400 group-hover:text-slate-200 transition-colors whitespace-nowrap">{{ $name }}</span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Marquee Row 2 (reverse) --}}
    <div class="relative overflow-hidden">
        <div class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-slate-950 to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-slate-950 to-transparent z-10 pointer-events-none"></div>

        <div class="flex gap-5 w-max" style="animation: marquee 35s linear infinite reverse;">
            @php
            $clients2 = [
                ['H&M',         'ri-t-shirt-2-line',    '#D0021B'],
                ['Zara',        'ri-handbag-2-line',    '#111111'],
                ['Nike',        'ri-run-line',          '#111111'],
                ['Adidas',      'ri-footprint-fill',    '#000000'],
                ['IKEA',        'ri-table-line',        '#0058A3'],
                ['Etsy',        'ri-store-line',        '#F1641E'],
                ['Poshmark',    'ri-shopping-cart-2-line','#C13584'],
                ['Farfetch',    'ri-award-line',        '#2E2E2E'],
                ['Revolve',     'ri-sparkle-line',      '#222222'],
                ['LVMH',        'ri-vip-crown-line',    '#B8860B'],
                ['Nordstrom',   'ri-building-line',     '#1A1A1A'],
                ['Bloomingdale\'s','ri-flower-line',    '#333333'],
            ];
            @endphp
            @foreach(array_merge($clients2, $clients2) as [$name, $icon, $color])
            <div class="flex items-center gap-3 px-7 py-4 rounded-2xl bg-white/[0.03] border border-white/[0.05] hover:bg-white/[0.07] hover:border-white/10 transition-all duration-300 cursor-default flex-shrink-0 group">
                <i class="{{ $icon }} text-xl opacity-60 group-hover:opacity-100 transition-opacity" style="color:{{ $color }}"></i>
                <span class="text-sm font-semibold text-slate-400 group-hover:text-slate-200 transition-colors whitespace-nowrap">{{ $name }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
