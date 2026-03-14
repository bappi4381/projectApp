@extends('layouts.app')
@section('title', 'Special Offers | Graphics Studio')
@section('meta_description', 'Exclusive deals and limited-time discounts on professional photo editing and retouching services at PixelForge Graphics Studio.')

@section('content')

<div class="bg-slate-950 min-h-screen text-white font-sans selection:bg-[#6366f1] selection:text-white">

    {{-- ── PAGE HERO ─────────────────────────────────── --}}
    <div class="pt-32 md:pt-40 lg:pt-44 pb-20 relative overflow-hidden">
        {{-- Glow bg --}}
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[900px] h-[500px] bg-gradient-to-b from-yellow-400/10 to-transparent rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute top-20 right-0 w-[400px] h-[400px] bg-[#6366f1]/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="container mx-auto px-6 max-w-6xl text-center relative z-10">
            <span class="inline-block px-5 py-2 rounded-full bg-yellow-400/10 text-yellow-400 text-[11px] font-bold tracking-[0.25em] uppercase border border-yellow-400/20 mb-6 animate-pulse">
                🔥 Limited Time Deals
            </span>
            <h1 class="text-5xl md:text-7xl font-black tracking-tight text-white mb-6">
                Special <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-[#22d3ee]">Offers</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                Grab our exclusive discounts before they expire. Bulk deals, seasonal bundles, and new client bonuses — all in one place.
            </p>

            {{-- Countdown --}}
            <div class="mt-10 inline-flex items-center gap-2 px-6 py-4 rounded-2xl bg-white/[0.04] border border-white/[0.07]"
                 x-data="{
                    ends: new Date().getTime() + (3 * 24 * 60 * 60 * 1000),
                    d: '03', h: '00', m: '00', s: '00',
                    init() {
                        setInterval(() => {
                            const diff = this.ends - new Date().getTime();
                            if (diff <= 0) return;
                            this.d = String(Math.floor(diff / 86400000)).padStart(2,'0');
                            this.h = String(Math.floor((diff % 86400000) / 3600000)).padStart(2,'0');
                            this.m = String(Math.floor((diff % 3600000) / 60000)).padStart(2,'0');
                            this.s = String(Math.floor((diff % 60000) / 1000)).padStart(2,'0');
                        }, 1000);
                    }
                 }">
                <i class="ri-time-line text-yellow-400 text-xl"></i>
                <span class="text-slate-400 text-sm font-semibold mr-2">Offer ends in:</span>
                <div class="flex items-center gap-1 font-black text-white text-lg tabular-nums">
                    <span x-text="d" class="bg-slate-800 px-2.5 py-1 rounded-lg"></span>
                    <span class="text-yellow-400">:</span>
                    <span x-text="h" class="bg-slate-800 px-2.5 py-1 rounded-lg"></span>
                    <span class="text-yellow-400">:</span>
                    <span x-text="m" class="bg-slate-800 px-2.5 py-1 rounded-lg"></span>
                    <span class="text-yellow-400">:</span>
                    <span x-text="s" class="bg-slate-800 px-2.5 py-1 rounded-lg"></span>
                </div>
            </div>
        </div>
    </div>

    {{-- ── FEATURED BANNER OFFER ────────────────────── --}}
    <div class="container mx-auto px-6 max-w-7xl mb-10">
        <div class="relative rounded-3xl overflow-hidden border border-yellow-400/20 reveal">
            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1600&q=80" alt="Mega Deal" class="absolute inset-0 w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-[#6366f1]/30"></div>
            <div class="relative z-10 p-10 md:p-16 flex flex-col md:flex-row items-center justify-between gap-8">
                <div>
                    <span class="inline-block px-4 py-1.5 mb-4 rounded-full bg-yellow-400 text-slate-900 text-[10px] font-black tracking-[0.2em] uppercase">
                        🔥 Mega Deal of the Month
                    </span>
                    <h2 class="text-4xl md:text-5xl font-black text-white mb-3 leading-tight">
                        500 Images for<br><span class="text-yellow-400">$99</span>
                        <span class="text-2xl text-slate-400 line-through ml-3 font-medium">$199</span>
                    </h2>
                    <p class="text-slate-300 text-base max-w-lg">Any combination of clipping path, background removal, and basic retouching. No expiry on credits. Free revision included.</p>
                    <div class="flex flex-wrap gap-4 mt-6">
                        <span class="flex items-center gap-2 text-sm text-slate-300"><i class="ri-check-line text-[#22d3ee]"></i> 50% Off Regular Price</span>
                        <span class="flex items-center gap-2 text-sm text-slate-300"><i class="ri-check-line text-[#22d3ee]"></i> Free Revisions</span>
                        <span class="flex items-center gap-2 text-sm text-slate-300"><i class="ri-check-line text-[#22d3ee]"></i> 24h Turnaround</span>
                    </div>
                </div>
                <div class="shrink-0 text-center">
                    <div class="w-36 h-36 rounded-full bg-yellow-400 flex flex-col items-center justify-center shadow-[0_0_60px_rgba(250,204,21,0.4)] mb-4 mx-auto">
                        <span class="text-slate-900 font-black text-4xl leading-none">50%</span>
                        <span class="text-slate-900 font-black text-sm uppercase tracking-widest">OFF</span>
                    </div>
                    <a href="/graphics-studio/pricing" class="inline-flex items-center gap-2 px-8 py-4 rounded-2xl bg-white text-slate-900 font-black text-sm hover:bg-yellow-400 transition-all">
                        Grab Deal <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ── OFFER CARDS GRID ─────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-7xl pb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @php
            $offers = [
                [
                    'icon'  => 'ri-user-add-line',
                    'badge' => 'New Client',
                    'badge_color' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20',
                    'icon_bg' => 'bg-emerald-500/10 text-emerald-400',
                    'title' => 'New Client Welcome Pack',
                    'tag'   => '30% OFF',
                    'tag_color' => 'bg-emerald-500 text-white',
                    'desc'  => 'First-time customers get 30% off on their first order up to 100 images. Valid for all service types.',
                    'original' => null,
                    'discounted' => null,
                    'note'  => 'Use code: WELCOME30',
                    'cta'   => 'Claim Offer',
                    'expires' => 'Ends in 5 days',
                ],
                [
                    'icon'  => 'ri-stack-line',
                    'badge' => 'Bulk Deal',
                    'badge_color' => 'bg-[#6366f1]/10 text-[#818cf8] border-[#6366f1]/20',
                    'icon_bg' => 'bg-[#6366f1]/10 text-[#818cf8]',
                    'title' => '1000+ Images Bulk Package',
                    'tag'   => '45% OFF',
                    'tag_color' => 'bg-[#6366f1] text-white',
                    'desc'  => 'Order 1000 or more images in a single submission and receive our deepest bulk discount automatically.',
                    'original' => '$0.49/img',
                    'discounted' => '$0.27/img',
                    'note'  => 'Auto-applied at checkout',
                    'cta'   => 'See Pricing',
                    'expires' => 'Ongoing',
                ],
                [
                    'icon'  => 'ri-time-line',
                    'badge' => 'Weekend Special',
                    'badge_color' => 'bg-pink-500/10 text-pink-400 border-pink-500/20',
                    'icon_bg' => 'bg-pink-500/10 text-pink-400',
                    'title' => 'Weekend Rush Discount',
                    'tag'   => '20% OFF',
                    'tag_color' => 'bg-pink-500 text-white',
                    'desc'  => 'Submit your order on weekends and get 20% off on all standard turnaround services. No minimum order.',
                    'original' => null,
                    'discounted' => null,
                    'note'  => 'Saturday & Sunday only',
                    'cta'   => 'Order Now',
                    'expires' => 'Every weekend',
                ],
                [
                    'icon'  => 'ri-shopping-bag-3-line',
                    'badge' => 'E-Commerce',
                    'badge_color' => 'bg-orange-500/10 text-orange-400 border-orange-500/20',
                    'icon_bg' => 'bg-orange-500/10 text-orange-400',
                    'title' => 'E-commerce Store Launch Bundle',
                    'tag'   => 'Bundle',
                    'tag_color' => 'bg-orange-500 text-white',
                    'desc'  => 'Launching a new store? Get 300 product photos edited — clipping path, background removal & color correction combined.',
                    'original' => '$180',
                    'discounted' => '$99',
                    'note'  => 'Includes all 3 service types',
                    'cta'   => 'Get Bundle',
                    'expires' => 'Ends Mar 31',
                ],
                [
                    'icon'  => 'ri-refresh-line',
                    'badge' => 'Loyalty',
                    'badge_color' => 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20',
                    'icon_bg' => 'bg-yellow-500/10 text-yellow-400',
                    'title' => 'Returning Client Loyalty Bonus',
                    'tag'   => 'FREE 50 imgs',
                    'tag_color' => 'bg-yellow-400 text-slate-900',
                    'desc'  => 'Every time you complete an order of 500+ images, earn 50 free image credits added to your account automatically.',
                    'original' => null,
                    'discounted' => null,
                    'note'  => 'Applies to existing clients',
                    'cta'   => 'Learn More',
                    'expires' => 'Ongoing',
                ],
                [
                    'icon'  => 'ri-home-4-line',
                    'badge' => 'Real Estate',
                    'badge_color' => 'bg-cyan-500/10 text-[#22d3ee] border-cyan-500/20',
                    'icon_bg' => 'bg-cyan-500/10 text-[#22d3ee]',
                    'title' => 'Real Estate Agent Monthly Plan',
                    'tag'   => '35% OFF',
                    'tag_color' => 'bg-[#22d3ee] text-slate-900',
                    'desc'  => 'Subscribe monthly for unlimited real estate photo editing up to 200 images/week — sky replacement, HDR & staging.',
                    'original' => '$299/mo',
                    'discounted' => '$195/mo',
                    'note'  => 'Cancel anytime',
                    'cta'   => 'Subscribe',
                    'expires' => 'Limited seats',
                ],
            ];
            @endphp

            @foreach($offers as $i => $offer)
            <div class="group flex flex-col rounded-2xl border border-white/[0.07] bg-white/[0.03] hover:border-white/20 hover:bg-white/[0.06] transition-all duration-500 overflow-hidden reveal" style="animation-delay: {{ $i * 0.08 }}s">

                {{-- Card Top --}}
                <div class="p-7 flex-1">
                    <div class="flex items-start justify-between mb-5">
                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-xl {{ $offer['icon_bg'] }} flex items-center justify-center text-xl">
                                <i class="{{ $offer['icon'] }}"></i>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest border {{ $offer['badge_color'] }}">
                                {{ $offer['badge'] }}
                            </span>
                        </div>
                        <span class="shrink-0 px-3 py-1.5 rounded-xl {{ $offer['tag_color'] }} text-xs font-black uppercase tracking-widest">
                            {{ $offer['tag'] }}
                        </span>
                    </div>

                    <h3 class="text-lg font-black text-white mb-3 group-hover:text-[#22d3ee] transition-colors leading-snug">
                        {{ $offer['title'] }}
                    </h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-5">{{ $offer['desc'] }}</p>

                    @if($offer['original'])
                    <div class="flex items-center gap-3 mb-4">
                        <span class="text-slate-500 text-sm line-through">{{ $offer['original'] }}</span>
                        <span class="text-2xl font-black text-white">{{ $offer['discounted'] }}</span>
                    </div>
                    @endif

                    <div class="flex items-center gap-2 text-[11px] text-slate-500 font-medium">
                        <i class="ri-coupon-2-line text-yellow-400"></i>
                        {{ $offer['note'] }}
                    </div>
                </div>

                {{-- Card Footer --}}
                <div class="px-7 pb-7 flex items-center justify-between gap-4">
                    <a href="/graphics-studio/pricing" class="flex-1 text-center py-3 rounded-xl bg-white/5 hover:bg-[#6366f1] border border-white/10 hover:border-[#6366f1] text-white text-xs font-black uppercase tracking-widest transition-all">
                        {{ $offer['cta'] }}
                    </a>
                    <span class="text-[10px] text-slate-500 font-semibold shrink-0 flex items-center gap-1">
                        <i class="ri-alarm-line text-yellow-400"></i> {{ $offer['expires'] }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ── FREE TRIAL STRIP ─────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-7xl py-10 reveal">
        <div class="rounded-3xl border border-[#22d3ee]/20 bg-gradient-to-br from-[#22d3ee]/5 to-[#6366f1]/10 p-10 md:p-14 flex flex-col md:flex-row items-center gap-8 justify-between">
            <div>
                <span class="text-[#22d3ee] text-xs font-black uppercase tracking-widest block mb-3">🎁 Zero Risk</span>
                <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Try Before You Buy</h2>
                <p class="text-slate-400 max-w-lg">Send us 3 images completely free — no credit card, no commitment. Experience our quality first-hand before placing your first real order.</p>
                <ul class="mt-5 space-y-2">
                    @foreach(['3 images edited free of charge', 'Full quality, not a sample', 'Results in under 12 hours', 'No account required'] as $point)
                    <li class="flex items-center gap-2 text-sm text-slate-300">
                        <i class="ri-checkbox-circle-fill text-[#22d3ee]"></i> {{ $point }}
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="shrink-0 flex flex-col items-center gap-4 text-center">
                <div class="w-28 h-28 rounded-full border-4 border-dashed border-[#22d3ee]/40 flex flex-col items-center justify-center">
                    <span class="text-3xl font-black text-[#22d3ee]">3</span>
                    <span class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">FREE</span>
                </div>
                <a href="/graphics-studio/pricing" class="px-8 py-4 rounded-2xl bg-[#22d3ee] hover:bg-[#1cb8d1] text-slate-900 font-black text-sm transition-all shadow-lg shadow-[#22d3ee]/20 hover:-translate-y-0.5">
                    Start Free Trial
                </a>
            </div>
        </div>
    </div>

    {{-- ── FAQ SECTION ──────────────────────────────── --}}
    <div class="container mx-auto px-6 max-w-4xl pt-4 pb-20">
        <div class="text-center mb-8 reveal">
            <span class="inline-block px-5 py-2 rounded-full bg-[#6366f1]/10 text-[#818cf8] text-[11px] font-bold tracking-[0.25em] uppercase border border-[#6366f1]/20 mb-4">FAQ</span>
            <h2 class="text-3xl md:text-4xl font-black text-white">Common Questions</h2>
        </div>

        <div class="space-y-4" x-data="{ open: null }">
            @php
            $faqs = [
                ['q'=>'Can I combine multiple offers?', 'a'=>'In most cases, only one offer can be applied per order. However, bulk pricing is automatically applied alongside promotional codes on eligible services.'],
                ['q'=>'How do I apply a promo code?', 'a'=>'Enter your promo code at the Get Quote step before submitting your order. Discounts are applied automatically and shown before final confirmation.'],
                ['q'=>'Do bulk credits ever expire?', 'a'=>'No — all purchased or bonus image credits are valid indefinitely. There is no expiry date on any credits in your account.'],
                ['q'=>'Is the free trial really free?', 'a'=>'Absolutely. Send us 3 images of any complexity. We edit them to the same standard as paid orders. No card required, no catch.'],
                ['q'=>'What services are covered by seasonal offers?', 'a'=>'Most offers cover clipping path, background removal, color correction, and retouching. Ghost mannequin and video editing may have separate terms — check each offer detail.'],
            ];
            @endphp

            @foreach($faqs as $fi => $faq)
            <div class="rounded-2xl border border-white/[0.07] bg-white/[0.03] overflow-hidden reveal" style="animation-delay: {{ $fi * 0.06 }}s">
                <button class="w-full flex items-center justify-between px-7 py-5 text-left transition-colors"
                        @click="open = open === {{ $fi }} ? null : {{ $fi }}">
                    <span class="font-bold text-white text-[15px]">{{ $faq['q'] }}</span>
                    <i class="ri-arrow-down-s-line text-xl text-slate-400 transition-transform shrink-0 ml-4"
                       :class="open === {{ $fi }} ? 'rotate-180 text-[#22d3ee]' : ''"></i>
                </button>
                <div x-show="open === {{ $fi }}"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="px-7 pt-4 pb-6 text-slate-400 text-sm leading-relaxed border-t border-white/[0.05]"
                     x-cloak>
                    {{ $faq['a'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
